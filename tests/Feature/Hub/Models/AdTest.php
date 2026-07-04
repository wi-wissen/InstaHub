<?php

use App\Models\Ad;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| App\Models\Ad :: getAd()
|--------------------------------------------------------------------------
|
| getAd($photo_id) queries "banner" ads when a photo id is given and "photo"
| ads otherwise, runs each ad's raw `query` (substituting the literal
| placeholders "$user"/"$photo"), and decides a match either via a single
| boolean-like "CASE ..." column or by looking for the current user/photo id
| among the result rows. All of this only exists on the tenant DB.
*/

it('is fillable for name, type, priority, url, img and query', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $ad = Ad::create([
            'name' => 'Sale banner',
            'type' => 'banner',
            'priority' => 1,
            'url' => 'https://example.test',
            'img' => 'ads/sale.jpg',
            'query' => 'SELECT 1',
        ]);

        expect($ad->exists)->toBeTrue();
        expect($ad->name)->toBe('Sale banner');
    });
});

describe('getAd()', function () {
    it('matches via a CASE-style boolean column when the $user placeholder evaluates truthy', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $user = User::factory()->create();
            Auth::login($user);

            $ad = Ad::factory()->create([
                'type' => 'photo',
                'priority' => 1,
                'query' => 'SELECT ($user > 0) as case_matches',
            ]);

            expect(Ad::getAd()?->id)->toBe($ad->id);
        });
    });

    it('does not match a CASE-style boolean column that evaluates falsy', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $user = User::factory()->create();
            Auth::login($user);

            Ad::factory()->create([
                'type' => 'photo',
                'priority' => 1,
                'query' => 'SELECT ($user < 0) as case_matches',
            ]);

            expect(Ad::getAd())->toBeNull();
        });
    });

    it('matches "photo" type ads when the authenticated user id is found in a user_id column', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $user = User::factory()->create();
            Auth::login($user);

            $ad = Ad::factory()->create([
                'type' => 'photo',
                'priority' => 1,
                'query' => 'SELECT id, id as user_id FROM users',
            ]);

            expect(Ad::getAd()?->id)->toBe($ad->id);
        });
    });

    it('queries "banner" type ads and matches via a photo_id column when a photo id is given', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $photo = Photo::factory()->create();

            $ad = Ad::factory()->create([
                'type' => 'banner',
                'priority' => 1,
                'query' => 'SELECT id, id as photo_id FROM photos',
            ]);
            // A "photo" type ad must be ignored when a photo id is given.
            Ad::factory()->create([
                'type' => 'photo',
                'priority' => 1,
                'query' => 'SELECT id, id as photo_id FROM photos',
            ]);

            expect(Ad::getAd($photo->id)?->id)->toBe($ad->id);
        });
    });

    it('returns null when no ad matches', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $user = User::factory()->create();
            Auth::login($user);

            Ad::factory()->create([
                'type' => 'photo',
                'priority' => 1,
                'query' => 'SELECT id, id as user_id FROM users WHERE id = -1',
            ]);

            expect(Ad::getAd())->toBeNull();
        });
    });

    it('skips a non-matching ad and falls through to the next one in priority order', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $user = User::factory()->create();
            Auth::login($user);

            Ad::factory()->create([
                'type' => 'photo',
                'priority' => 1,
                'query' => 'SELECT id, id as user_id FROM users WHERE id = -1',
            ]);
            $secondAd = Ad::factory()->create([
                'type' => 'photo',
                'priority' => 2,
                'query' => 'SELECT id, id as user_id FROM users',
            ]);

            expect(Ad::getAd()?->id)->toBe($secondAd->id);
        });
    });

    it('does not throw when an ad query is broken SQL, and simply yields no match', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            Ad::factory()->create([
                'type' => 'photo',
                'priority' => 1,
                'query' => 'THIS IS NOT VALID SQL',
            ]);

            expect(fn () => Ad::getAd())->not->toThrow(\Throwable::class);
            expect(Ad::getAd())->toBeNull();
        });
    });
});
