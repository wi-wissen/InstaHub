<?php

use App\Http\Resources\Photo as PhotoResource;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

it('exposes id, description, url, owner, like state, like count and comments', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $owner = User::factory()->create(['name' => 'Owner', 'username' => 'owner', 'avatar' => 'avatar.png']);
        $viewer = User::factory()->create();

        $photo = Photo::factory()->create([
            'user_id' => $owner->id,
            'description' => 'a nice #sunset',
            'url' => 'photos/sunset.jpg',
        ]);

        Like::factory()->create(['photo_id' => $photo->id, 'user_id' => $viewer->id]);
        Comment::factory()->create(['photo_id' => $photo->id, 'user_id' => $viewer->id, 'body' => 'nice shot']);

        Auth::login($viewer);

        $data = (new PhotoResource($photo))->resolve();

        expect($data['id'])->toBe($photo->id);
        expect($data['url'])->toBe('photos/sunset.jpg');
        expect($data['owner']->toArray(request()))->toBe([
            'username' => 'owner',
            'name' => 'Owner',
            'avatar' => 'avatar.png',
        ]);
        expect($data['like'])->toBeTrue();
        expect($data['likes'])->toBe(1);
        expect($data['comments'])->toHaveCount(1);
    });
});

it('reports like as false when the current user has not liked the photo', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $owner = User::factory()->create();
        $viewer = User::factory()->create();
        $photo = Photo::factory()->create(['user_id' => $owner->id]);

        Auth::login($viewer);

        $data = (new PhotoResource($photo))->resolve();

        expect($data['like'])->toBeFalse();
        expect($data['likes'])->toBe(0);
        expect($data['comments'])->toHaveCount(0);
    });
});

it('omits like/likes/comments entirely when their tables do not exist', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () use ($hub) {
        $owner = User::factory()->create();
        $photo = Photo::factory()->create(['user_id' => $owner->id]);

        $hub->dropTable('likes');
        $hub->dropTable('comments');

        Auth::login($owner);

        $data = (new PhotoResource($photo))->resolve();

        expect($data)->not->toHaveKey('like');
        expect($data)->not->toHaveKey('likes');
        expect($data)->not->toHaveKey('comments');
        expect($data['id'])->toBe($photo->id);
    });
});
