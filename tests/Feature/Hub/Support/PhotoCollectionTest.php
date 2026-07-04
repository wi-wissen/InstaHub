<?php

use App\Collections\PhotoCollection;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

it('Photo::all() returns a PhotoCollection instance', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $owner = User::factory()->create();
        Photo::factory()->create(['user_id' => $owner->id]);

        expect(Photo::all())->toBeInstanceOf(PhotoCollection::class);
    });
});

it('addPhotoScoreGlobal ranks photos with more likes/comments higher', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $owner = User::factory()->create();
        $liker = User::factory()->create();
        $commenter = User::factory()->create();

        $popular = Photo::factory()->create(['user_id' => $owner->id, 'created_at' => now()]);
        $quiet = Photo::factory()->create(['user_id' => $owner->id, 'created_at' => now()]);

        Like::factory()->create(['photo_id' => $popular->id, 'user_id' => $liker->id]);
        Comment::factory()->create(['photo_id' => $popular->id, 'user_id' => $commenter->id]);

        $scored = Photo::all()->addPhotoScoreGlobal();

        $popularScored = $scored->firstWhere('id', $popular->id);
        $quietScored = $scored->firstWhere('id', $quiet->id);

        expect($popularScored->score)->toBeGreaterThan($quietScored->score);
        expect($popularScored->score_edge_likes)->toBe(1);
        expect($popularScored->score_edge_comments)->toBe(2);
        expect($quietScored->score_edge_likes)->toBe(0);

        // Sorted descending by score: the popular photo comes first.
        expect($scored->first()->id)->toBe($popular->id);
    });
});

it('addPhotoScoreGlobal decays scores of old photos toward the floor of 0.01', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $owner = User::factory()->create();

        $fresh = Photo::factory()->create(['user_id' => $owner->id, 'created_at' => now()]);
        $old = Photo::factory()->create(['user_id' => $owner->id, 'created_at' => now()->subDays(30)]);

        $scored = Photo::all()->addPhotoScoreGlobal();

        $freshScored = $scored->firstWhere('id', $fresh->id);
        $oldScored = $scored->firstWhere('id', $old->id);

        expect($oldScored->score_decay)->toBe(0.01);
        expect($freshScored->score_decay)->toBeGreaterThan($oldScored->score_decay);
        expect($scored->first()->id)->toBe($fresh->id);
    });
});

it('addPhotoScore boosts photos from users the current user has interacted with', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $currentUser = User::factory()->create();
        $friendAuthor = User::factory()->create();
        $strangerAuthor = User::factory()->create();

        $friendPhoto = Photo::factory()->create(['user_id' => $friendAuthor->id, 'created_at' => now()]);
        $strangerPhoto = Photo::factory()->create(['user_id' => $strangerAuthor->id, 'created_at' => now()]);

        // The current user has liked and commented on the friend's photos
        // before (affinity signal), but never interacted with the stranger.
        Like::factory()->create(['photo_id' => $friendPhoto->id, 'user_id' => $currentUser->id]);
        Comment::factory()->create(['photo_id' => $friendPhoto->id, 'user_id' => $currentUser->id]);

        Auth::login($currentUser);

        $scored = Photo::all()->addPhotoScore();

        $friendScored = $scored->firstWhere('id', $friendPhoto->id);
        $strangerScored = $scored->firstWhere('id', $strangerPhoto->id);

        expect($friendScored->score_affinity)->toBeGreaterThan($strangerScored->score_affinity);
        expect($strangerScored->score_affinity)->toBe(1);
    });
});

it('addPhotoScore falls back to affinity 1 when the follows table is absent', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () use ($hub) {
        $owner = User::factory()->create();
        $currentUser = User::factory()->create();
        Photo::factory()->create(['user_id' => $owner->id, 'created_at' => now()]);

        // Drop the follows table so RequestHub::hasTable('follows') is false
        // and the collection takes the "no affinity data available" branch.
        $hub->dropTable('follows');

        Auth::login($currentUser);

        $scored = Photo::all()->addPhotoScore();

        expect($scored->first()->score_affinity)->toBe(1);
    });
});

it('addPhotoScore respects custom weights', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $owner = User::factory()->create();
        $liker = User::factory()->create();

        $photo = Photo::factory()->create(['user_id' => $owner->id, 'created_at' => now()]);
        Like::factory()->create(['photo_id' => $photo->id, 'user_id' => $liker->id]);

        Auth::login($liker);

        $scored = Photo::all()->addPhotoScore(['like_edge' => 100]);

        expect($scored->first()->score_edge_likes)->toBeGreaterThanOrEqual(100);
        expect($scored->first()->score_weights['like_edge'])->toBe(100);
    });
});
