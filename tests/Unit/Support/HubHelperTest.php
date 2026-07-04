<?php

use App\Facades\RequestHub;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Non-hub context behaviour of App\Helpers\HubHelper
|--------------------------------------------------------------------------
|
| No $_SERVER['HTTP_HOST'] is set to a hub subdomain in these tests, so the
| singleton resolves to "not a hub" (RequestHub::isHub() === false). This
| exercises the primary-DB-only paths of the helper.
*/

it('defaults to the primary "mysql" connection and is not a hub', function () {
    expect(config('database.default'))->toBe('mysql');
    expect(RequestHub::isHub())->toBeFalse();
});

it('setDefaultDB always points the default connection back at mysql', function () {
    config(['database.default' => 'some_other_connection']);

    RequestHub::setDefaultDB();

    expect(config('database.default'))->toBe('mysql');
});

it('useDefaultDB runs the callback against mysql and restores the previous connection', function () {
    // Force the singleton to be constructed first: HubHelper's constructor
    // itself resets database.default to "mysql", so it must run *before* we
    // simulate being on a non-default connection.
    RequestHub::isHub();
    config(['database.default' => 'previous_connection']);

    $seenDuringCallback = null;

    $result = RequestHub::useDefaultDB(function () use (&$seenDuringCallback) {
        $seenDuringCallback = config('database.default');

        return 'callback-result';
    });

    expect($seenDuringCallback)->toBe('mysql');
    expect($result)->toBe('callback-result');
    expect(config('database.default'))->toBe('previous_connection');
});

it('useDefaultDB restores the previous connection even if the callback throws', function () {
    RequestHub::isHub();
    config(['database.default' => 'previous_connection']);

    expect(fn () => RequestHub::useDefaultDB(function () {
        throw new RuntimeException('boom');
    }))->toThrow(RuntimeException::class, 'boom');

    expect(config('database.default'))->toBe('previous_connection');
});

it('reports null for hub-scoped accessors outside of a hub', function () {
    expect(RequestHub::isReadOnly())->toBeFalse();
    expect(RequestHub::id())->toBeNull();
    expect(RequestHub::name())->toBeNull();
    expect(RequestHub::teacher())->toBeNull();
    expect(RequestHub::generation())->toBeNull();
    expect(RequestHub::query_level())->toBeNull();
});

it('hasTable reflects the tables that exist on the current (primary) connection', function () {
    expect(RequestHub::hasTable('users'))->toBeTrue();
    expect(RequestHub::hasTable('this_table_does_not_exist_xyz'))->toBeFalse();
});

it('hasTokens delegates to the authenticated user outside of a hub', function () {
    // User::boot() forces tokens_max to config('openai.max_tokens') on
    // *creation* whenever we are not in hub context, so set the final
    // values via an update() (which does not go through that hook) to get
    // deterministic boundaries.
    $user = User::factory()->create();
    $user->update(['tokens_used' => 5, 'tokens_max' => 10]);
    Auth::login($user);

    expect(RequestHub::hasTokens(5))->toBeTrue();
    expect(RequestHub::hasTokens(6))->toBeFalse();
});

it('decrementTokens is a no-op outside of a hub', function () {
    $user = User::factory()->create(['tokens_used' => 0, 'tokens_max' => 10]);
    Auth::login($user);

    RequestHub::decrementTokens(3);

    expect($user->fresh()->tokens_used)->toBe(0);
});

it('url() without a name returns the protocol + current HTTP host', function () {
    $_SERVER['HTTP_HOST'] = 'example.localhost';
    unset($_SERVER['HTTPS']);

    expect(RequestHub::url())->toBe('http://example.localhost');
});

it('url() with a name builds the hub subdomain URL from config', function () {
    unset($_SERVER['HTTPS']);

    expect(RequestHub::url('myhub'))->toBe('http://myhub.localhost');
});

it('url() uses https when the request was secure', function () {
    $_SERVER['HTTPS'] = 'on';

    expect(RequestHub::url('myhub'))->toBe('https://myhub.localhost');

    unset($_SERVER['HTTPS']);
});
