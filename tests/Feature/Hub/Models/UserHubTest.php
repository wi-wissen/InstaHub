<?php

use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| App\Models\User (tenant-only behaviour)
|--------------------------------------------------------------------------
|
| following()/followers()/photos()/isfollowing() rely on the tenant-only
| `follows`/`photos` tables, and getSuggested() runs raw SQL (FIELD()) that
| requires a real hub database. All of these must run inside a provisioned
| hub.
*/

describe('following() / followers() / isfollowing()', function () {
    it('reports a followed user via following(), isfollowing() and the inverse via followers()', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $a = User::factory()->create();
            $b = User::factory()->create();

            // Pivot columns are (following_id, follower_id); belongsToMany maps
            // following(): foreignPivotKey=following_id, relatedPivotKey=follower_id.
            DB::table('follows')->insert([
                'following_id' => $a->id,
                'follower_id' => $b->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            expect($a->following()->get()->pluck('id'))->toContain($b->id);
            expect($a->isfollowing($b))->toBe(1);

            expect($b->followers()->get()->pluck('id'))->toContain($a->id);
            expect($b->isfollowing($a))->toBe(0);
        });
    });
});

describe('photos() relationship', function () {
    it('returns only this user\'s photos, newest first', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $user = User::factory()->create();
            $other = User::factory()->create();

            $older = Photo::factory()->create(['user_id' => $user->id, 'created_at' => now()->subDay()]);
            $newer = Photo::factory()->create(['user_id' => $user->id, 'created_at' => now()]);
            Photo::factory()->create(['user_id' => $other->id]);

            $photos = $user->photos;

            expect($photos)->toHaveCount(2);
            expect($photos->first()->id)->toBe($newer->id);
            expect($photos->last()->id)->toBe($older->id);
        });
    });
});

describe('getSuggested()', function () {
    it('excludes users who already follow the authenticated user and ranks photo owners higher', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $auth = User::factory()->create();
            $alreadyFollower = User::factory()->create();
            $withPhotos = User::factory()->create();
            $plain = User::factory()->create();

            // $alreadyFollower follows $auth -> the "remove already related"
            // query in getSuggested() matches follower_id = X, following_id = auth.
            DB::table('follows')->insert([
                'following_id' => $auth->id,
                'follower_id' => $alreadyFollower->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Photo::factory()->count(3)->create(['user_id' => $withPhotos->id]);

            Auth::login($auth);

            $suggestions = User::getSuggested(10);
            $ids = $suggestions->pluck('id')->all();

            expect($ids)->not->toContain($alreadyFollower->id);
            expect($ids)->toContain($withPhotos->id);
            expect($ids)->toContain($plain->id);

            // Every returned suggestion carries its computed score.
            foreach ($suggestions as $suggestion) {
                expect($suggestion->score)->not->toBeNull();
            }

            // The user with uploaded photos scores strictly higher than one
            // with no relation at all, and therefore sorts before it.
            $withPhotosScore = $suggestions->firstWhere('id', $withPhotos->id)->score;
            $plainScore = $suggestions->firstWhere('id', $plain->id)->score;
            expect($withPhotosScore)->toBeGreaterThan($plainScore);

            $indexOfWithPhotos = $ids ? array_search($withPhotos->id, $ids) : null;
            $indexOfPlain = array_search($plain->id, $ids);
            expect($indexOfWithPhotos)->toBeLessThan($indexOfPlain);
        });
    });

    it('respects the given limit', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $auth = User::factory()->create();
            User::factory()->count(5)->create();
            Auth::login($auth);

            $suggestions = User::getSuggested(2);

            expect($suggestions->count())->toBeLessThanOrEqual(2);
        });
    });
});
