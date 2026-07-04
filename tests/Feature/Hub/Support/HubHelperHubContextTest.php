<?php

use App\Facades\RequestHub;
use App\Models\Hub;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Hub-context behaviour of App\Helpers\HubHelper
|--------------------------------------------------------------------------
|
| Uses ProvisionsHubs::createHub()/withinHub() to provision a real tenant
| database and switch the app into hub context (RequestHub::isHub() ===
| true), exercising the parts of HubHelper that only make sense once a hub
| subdomain has been detected.
*/

it('reports hub identity, teacher and generation once inside a hub', function () {
    $teacher = $this->createTeacher(['hub_default_generation' => 1, 'hub_default_query_level' => 'sql']);
    $hub = $this->createHub($teacher, ['generation' => 1, 'query_level' => 'sql']);

    $this->withinHub($hub, function () use ($hub, $teacher) {
        expect(RequestHub::isHub())->toBeTrue();
        expect(RequestHub::id())->toBe($hub->id);
        expect(RequestHub::name())->toBe($hub->name);
        expect(RequestHub::generation())->toBe(1);
        expect(RequestHub::query_level())->toBe('sql');

        $resolvedTeacher = RequestHub::teacher();
        expect($resolvedTeacher)->toBeInstanceOf(User::class);
        expect($resolvedTeacher->id)->toBe($teacher->id);
    });
});

it('hasTable reflects the tenant database schema, not the primary one', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () use ($hub) {
        expect(RequestHub::hasTable('users'))->toBeTrue();
        expect(RequestHub::hasTable('photos'))->toBeTrue();
        // "hubs" only exists on the primary database, not inside a tenant DB.
        expect(RequestHub::hasTable('hubs'))->toBeFalse();
    });
});

it('isHub is false again once execution returns to the primary database', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        expect(RequestHub::isHub())->toBeTrue();
    });

    expect(RequestHub::isHub())->toBeFalse();
    expect(RequestHub::id())->toBeNull();
});

it('hasTokens delegates to the hub teacher while inside a hub', function () {
    $teacher = $this->createTeacher();
    $teacher->update(['tokens_used' => 5, 'tokens_max' => 10]);
    $hub = $this->createHub($teacher);

    $this->withinHub($hub, function () {
        expect(RequestHub::hasTokens(5))->toBeTrue();
        expect(RequestHub::hasTokens(6))->toBeFalse();
    });
});

it('decrementTokens increments tokens_used on the hub teacher in the primary DB', function () {
    $teacher = $this->createTeacher();
    $teacher->update(['tokens_used' => 0]);
    $hub = $this->createHub($teacher);

    $this->withinHub($hub, function () {
        RequestHub::decrementTokens(4);
    });

    expect($teacher->fresh()->tokens_used)->toBe(4);
});
