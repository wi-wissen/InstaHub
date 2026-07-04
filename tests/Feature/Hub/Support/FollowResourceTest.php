<?php

use App\Http\Resources\Follow as FollowResource;
use App\Http\Resources\FollowFollower as FollowFollowerResource;
use App\Models\User;

it('exposes id, name, username and the collection of followed users', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $user = User::factory()->create(['name' => 'Alice', 'username' => 'alice']);
        $followedUser = User::factory()->create(['name' => 'Bob', 'username' => 'bob']);

        // $user->following() is keyed so that attach() records $user as the
        // "following_id" side and $followedUser as "follower_id" (see
        // App\Models\User::following()).
        $user->following()->attach($followedUser->id);

        $data = (new FollowResource($user))->toArray(request());

        expect($data['id'])->toBe($user->id);
        expect($data['name'])->toBe('Alice');
        expect($data['username'])->toBe('alice');
        expect($data['follows'])->toHaveCount(1);
        expect($data['follows'][0])->toBeInstanceOf(FollowFollowerResource::class);
    });
});

it('returns an empty follows collection when the user follows nobody', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $user = User::factory()->create();

        $data = (new FollowResource($user))->toArray(request());

        expect($data['follows'])->toHaveCount(0);
    });
});

it('FollowFollower exposes id, name, username and the pivot "since" timestamp', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $followedUser = User::factory()->create(['name' => 'Bob', 'username' => 'bob']);

        $user->following()->attach($followedUser->id);

        $followed = $user->following()->first();
        $data = (new FollowFollowerResource($followed))->toArray(request());

        expect($data['id'])->toBe($followedUser->id);
        expect($data['name'])->toBe('Bob');
        expect($data['username'])->toBe('bob');
        expect($data['since'])->toBe($followed->pivot->created_at->toDateTimeString());
    });
});
