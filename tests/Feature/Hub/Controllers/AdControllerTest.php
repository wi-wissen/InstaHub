<?php

use App\Models\Ad;
use App\Models\User;

test('guest cannot view the ads index', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->onHub($hub)->get($this->hubUrl($hub, '/ads'))->assertRedirect();
});

test('authenticated user can view the ads index', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $ad = Ad::factory()->create(['name' => 'Summer Sale']);

        return compact('user', 'ad');
    });

    $this->onHub($hub)->actingAs($ids['user'])
        ->get($this->hubUrl($hub, '/ads'))
        ->assertOk()
        ->assertSee('Summer Sale');
});

test('authenticated user can view the create ad form', function () {
    $hub = $this->createHub(creating: 'all_empty');
    $user = $this->withinHub($hub, fn () => User::factory()->create());

    $this->onHub($hub)->actingAs($user)
        ->get($this->hubUrl($hub, '/ads/create'))
        ->assertOk();
});

test('authenticated user can create an ad', function () {
    $hub = $this->createHub(creating: 'all_empty');
    $user = $this->withinHub($hub, fn () => User::factory()->create());

    $response = $this->onHub($hub)->actingAs($user)
        ->post($this->hubUrl($hub, '/ads'), [
            'name' => 'Winter Sale',
            'type' => 'banner',
            'priority' => 1,
            'url' => '/noad',
            'img' => '/img/ad/winter.jpg',
            'query' => 'SELECT id FROM users WHERE id=$user',
        ]);

    $response->assertRedirect('/ads');

    $this->withinHub($hub, function () {
        expect(Ad::where('name', 'Winter Sale')->exists())->toBeTrue();
    });
});

test('creating an ad validates required fields', function () {
    $hub = $this->createHub(creating: 'all_empty');
    $user = $this->withinHub($hub, fn () => User::factory()->create());

    $this->onHub($hub)->actingAs($user)
        ->post($this->hubUrl($hub, '/ads'), [])
        ->assertSessionHasErrors(['type', 'url', 'img', 'query']);
});

test('authenticated user can view the edit ad form', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $ad = Ad::factory()->create();

        return compact('user', 'ad');
    });

    $this->onHub($hub)->actingAs($ids['user'])
        ->get($this->hubUrl($hub, '/ads/'.$ids['ad']->id.'/edit'))
        ->assertOk();
});

test('authenticated user can update an ad', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $ad = Ad::factory()->create(['name' => 'Old Name']);

        return compact('user', 'ad');
    });

    $this->onHub($hub)->actingAs($ids['user'])
        ->put($this->hubUrl($hub, '/ads/'.$ids['ad']->id), [
            'name' => 'New Name',
            'type' => 'banner',
            'priority' => 2,
            'url' => '/noad',
            'img' => '/img/ad/winter.jpg',
            'query' => 'SELECT id FROM users WHERE id=$user',
        ])
        ->assertRedirect('/ads');

    $this->withinHub($hub, function () use ($ids) {
        expect($ids['ad']->fresh()->name)->toBe('New Name');
    });
});

test('authenticated user can delete an ad via the custom destroy route', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $ad = Ad::factory()->create();

        return compact('user', 'ad');
    });

    $this->onHub($hub)->actingAs($ids['user'])
        ->delete($this->hubUrl($hub, '/api/ads/'.$ids['ad']->id))
        ->assertOk()
        ->assertJsonStructure(['success']);

    $this->withinHub($hub, function () use ($ids) {
        expect(Ad::find($ids['ad']->id))->toBeNull();
    });
});

test('guest cannot delete an ad', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $adId = $this->withinHub($hub, fn () => Ad::factory()->create()->id);

    $this->onHub($hub)
        ->delete($this->hubUrl($hub, '/api/ads/'.$adId))
        ->assertRedirect();

    $this->withinHub($hub, function () use ($adId) {
        expect(Ad::find($adId))->not->toBeNull();
    });
});

test('deleting a non-existent ad returns a 404', function () {
    $hub = $this->createHub(creating: 'all_empty');
    $user = $this->withinHub($hub, fn () => User::factory()->create());

    $this->onHub($hub)->actingAs($user)
        ->delete($this->hubUrl($hub, '/api/ads/999999'))
        ->assertNotFound();
});
