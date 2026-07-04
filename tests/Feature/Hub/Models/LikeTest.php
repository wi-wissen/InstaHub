<?php

use App\Models\Like;
use App\Models\Photo;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| App\Models\Like
|--------------------------------------------------------------------------
*/

it('is fillable for photo_id and user_id', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $photo = Photo::factory()->create();

        $like = Like::create([
            'photo_id' => $photo->id,
            'user_id' => $user->id,
        ]);

        expect($like->exists)->toBeTrue();
        expect($like->photo_id)->toBe($photo->id);
        expect($like->user_id)->toBe($user->id);
    });
});

it('belongs to a user and a photo', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $photo = Photo::factory()->create();
        $like = Like::factory()->create(['user_id' => $user->id, 'photo_id' => $photo->id]);

        expect($like->user)->toBeInstanceOf(User::class);
        expect($like->user->id)->toBe($user->id);

        expect($like->photo)->toBeInstanceOf(Photo::class);
        expect($like->photo->id)->toBe($photo->id);
    });
});
