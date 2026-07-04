<?php

use App\Models\User;
use Illuminate\Support\Facades\Cache;

// Outside of a hub, RequestHub::id() returns null, so the cache key used by
// LoginController@loginWithToken is always "hub--auth-token" in these tests.
const HUB_TOKEN_CACHE_KEY = 'hub--auth-token';

it('logs the dba in when the token matches the cached token and consumes it', function () {
    $dba = User::factory()->dba()->create();

    Cache::put(HUB_TOKEN_CACHE_KEY, 'secret-token', now()->addMinutes(5));

    $response = $this->get('http://localhost/login/secret-token');

    $response->assertRedirect('/');
    $this->assertAuthenticatedAs($dba);
    expect(Cache::has(HUB_TOKEN_CACHE_KEY))->toBeFalse();
});

it('fails when the token does not match the cached token', function () {
    User::factory()->dba()->create();

    Cache::put(HUB_TOKEN_CACHE_KEY, 'secret-token', now()->addMinutes(5));

    $response = $this->from('http://localhost/login')->get('http://localhost/login/wrong-token');

    $response->assertSessionHasErrors('username');
    $this->assertGuest();
    // the valid token is untouched since it never matched
    expect(Cache::has(HUB_TOKEN_CACHE_KEY))->toBeTrue();
});

it('fails when there is no cached token at all', function () {
    Cache::forget(HUB_TOKEN_CACHE_KEY);

    $response = $this->from('http://localhost/login')->get('http://localhost/login/anything');

    $response->assertSessionHasErrors('username');
    $this->assertGuest();
});

it('is reachable even when a user is already authenticated (no guest middleware)', function () {
    $existing = User::factory()->create();
    $dba = User::factory()->dba()->create();

    Cache::put(HUB_TOKEN_CACHE_KEY, 'secret-token', now()->addMinutes(5));

    $response = $this->actingAs($existing)->get('http://localhost/login/secret-token');

    $response->assertRedirect('/');
    $this->assertAuthenticatedAs($dba);
});
