<?php

use App\Models\Analytic;
use App\Models\Photo;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| App\Models\Analytic
|--------------------------------------------------------------------------
*/

it('is fillable for user_id and photo_id only, other columns come from boot()', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $photo = Photo::factory()->create();

        $analytic = Analytic::create([
            'user_id' => $user->id,
            'photo_id' => $photo->id,
        ]);

        expect($analytic->exists)->toBeTrue();
        expect($analytic->user_id)->toBe($user->id);
        expect($analytic->photo_id)->toBe($photo->id);
    });
});

describe('boot() creating hook', function () {
    it('populates browser/platform/device metadata and anonymizes the IP', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $analytic = Analytic::factory()->create();

            expect($analytic->device)->not->toBeNull();
            expect($analytic->browser_family)->not->toBeNull();
            expect($analytic->platform_family)->not->toBeNull();

            // The last IPv4 octet (or the trailing IPv6 group) is always
            // zeroed out for anonymization.
            expect($analytic->ip)->toMatch('/(\.0|:0)$/');
        });
    });
});

describe('relationships', function () {
    it('belongs to a user and a photo', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $user = User::factory()->create();
            $photo = Photo::factory()->create();
            $analytic = Analytic::factory()->create(['user_id' => $user->id, 'photo_id' => $photo->id]);

            expect($analytic->user)->toBeInstanceOf(User::class);
            expect($analytic->user->id)->toBe($user->id);

            expect($analytic->photo)->toBeInstanceOf(Photo::class);
            expect($analytic->photo->id)->toBe($photo->id);
        });
    });
});

describe('accessors', function () {
    it('getBrowserAttribute concatenates browser_family and browser_version', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            // boot()'s creating() hook always overwrites browser_family /
            // browser_version from the (headless, in this test run) request's
            // user agent, ignoring whatever the factory passed in.
            $analytic = Analytic::factory()->create();

            expect($analytic->browser)->toBe($analytic->browser_family.' '.$analytic->browser_version);
        });
    });

    it('getBrandAttribute reads the (non-existent) device_family/device_model attributes, not brand_family/brand_model', function () {
        // This documents existing behaviour rather than intended behaviour:
        // getBrandAttribute() reads `device_family`/`device_model`, but the
        // actual columns are `brand_family`/`brand_model`. Since those
        // attributes are never set, Eloquent resolves them to null and the
        // accessor always returns a single space.
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $analytic = Analytic::factory()->create([
                'brand_family' => 'Apple',
                'brand_model' => 'iPhone',
            ]);

            expect($analytic->brand)->toBe(' ');
        });
    });
});
