<?php

use App\Models\User;

test('guest cannot follow a user', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $target = $this->withinHub($hub, fn () => User::factory()->create());

    $this->onHub($hub)
        ->post($this->hubUrl($hub, 'api/me/follow/'.$target->username))
        ->assertRedirect();
});

test('authenticated user can follow another user', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $follower = User::factory()->create();
        $target = User::factory()->create();

        return compact('follower', 'target');
    });

    $this->onHub($hub)->actingAs($ids['follower'])
        ->post($this->hubUrl($hub, 'api/me/follow/'.$ids['target']->username))
        ->assertOk()
        ->assertJson(['follow' => 'true']);

    $this->withinHub($hub, function () use ($ids) {
        expect($ids['follower']->fresh()->following()->pluck('users.id'))->toContain($ids['target']->id);
        expect($ids['target']->fresh()->followers()->pluck('users.id'))->toContain($ids['follower']->id);
    });
});

test('authenticated user can unfollow a user', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $follower = User::factory()->create();
        $target = User::factory()->create();
        $follower->following()->attach($target);

        return compact('follower', 'target');
    });

    $this->onHub($hub)->actingAs($ids['follower'])
        ->delete($this->hubUrl($hub, 'api/me/follow/'.$ids['target']->username))
        ->assertOk()
        ->assertJson(['follow' => 'false']);

    $this->withinHub($hub, function () use ($ids) {
        expect($ids['follower']->fresh()->following()->pluck('users.id'))->not->toContain($ids['target']->id);
    });
});

test('guest cannot unfollow a user', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $follower = User::factory()->create();
        $target = User::factory()->create();
        $follower->following()->attach($target);

        return compact('follower', 'target');
    });

    $this->onHub($hub)
        ->delete($this->hubUrl($hub, 'api/me/follow/'.$ids['target']->username))
        ->assertRedirect();
});

test('followers page lists the users following a given user', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $follower = User::factory()->create();
        $target = User::factory()->create();
        $follower->following()->attach($target);

        return compact('follower', 'target');
    });

    $this->onHub($hub)->actingAs($ids['follower'])
        ->get($this->hubUrl($hub, $ids['target']->username.'/followers'))
        ->assertOk()
        ->assertSee($ids['follower']->username);
});

test('following page lists the users a given user follows', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $follower = User::factory()->create();
        $target = User::factory()->create();
        $follower->following()->attach($target);

        return compact('follower', 'target');
    });

    $this->onHub($hub)->actingAs($ids['follower'])
        ->get($this->hubUrl($hub, $ids['follower']->username.'/following'))
        ->assertOk()
        ->assertSee($ids['target']->username);
});

test('guest cannot view the followers page', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $target = $this->withinHub($hub, fn () => User::factory()->create());

    $this->onHub($hub)
        ->get($this->hubUrl($hub, $target->username.'/followers'))
        ->assertRedirect();
});
