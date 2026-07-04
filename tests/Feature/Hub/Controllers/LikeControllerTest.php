<?php

use App\Models\Like;
use App\Models\Photo;
use App\Models\User;

test('guest cannot like a photo', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $photoId = $this->withinHub($hub, function () {
        $user = User::factory()->create();

        return Photo::factory()->create(['user_id' => $user->id])->id;
    });

    $this->onHub($hub)
        ->post($this->hubUrl($hub, '/api/me/like/'.$photoId))
        ->assertRedirect();
});

test('liking a photo toggles the like on and off', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $photo = Photo::factory()->create(['user_id' => $user->id]);

        return compact('user', 'photo');
    });

    // First request: like.
    $this->onHub($hub)->actingAs($ids['user'])
        ->post($this->hubUrl($hub, '/api/me/like/'.$ids['photo']->id))
        ->assertOk()
        ->assertJson(['like' => 'true']);

    $this->withinHub($hub, function () use ($ids) {
        expect(Like::where('photo_id', $ids['photo']->id)->where('user_id', $ids['user']->id)->exists())->toBeTrue();
    });

    // Second request: unlike.
    $this->onHub($hub)->actingAs($ids['user'])
        ->post($this->hubUrl($hub, '/api/me/like/'.$ids['photo']->id))
        ->assertOk()
        ->assertJson(['like' => 'false']);

    $this->withinHub($hub, function () use ($ids) {
        expect(Like::where('photo_id', $ids['photo']->id)->where('user_id', $ids['user']->id)->exists())->toBeFalse();
    });
});

test('two different users can independently like the same photo', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $owner = User::factory()->create();
        $liker1 = User::factory()->create();
        $liker2 = User::factory()->create();
        $photo = Photo::factory()->create(['user_id' => $owner->id]);

        return compact('liker1', 'liker2', 'photo');
    });

    $this->onHub($hub)->actingAs($ids['liker1'])
        ->post($this->hubUrl($hub, '/api/me/like/'.$ids['photo']->id))
        ->assertJson(['like' => 'true']);

    $this->onHub($hub)->actingAs($ids['liker2'])
        ->post($this->hubUrl($hub, '/api/me/like/'.$ids['photo']->id))
        ->assertJson(['like' => 'true']);

    $this->withinHub($hub, function () use ($ids) {
        expect(Like::where('photo_id', $ids['photo']->id)->count())->toBe(2);
    });
});
