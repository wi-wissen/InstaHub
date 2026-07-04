<?php

use App\Livewire\Ad\Index;
use App\Models\Ad;
use App\Models\User;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| App\Livewire\Ad\Index
|--------------------------------------------------------------------------
|
| Ads only exist inside a tenant DB, so every test provisions a hub and
| runs inside it via withinHub().
*/

test('lists the tenant ads, most recent first', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->withinHub($hub, function () {
        $viewer = User::factory()->dba()->create();
        $this->actingAs($viewer);

        $older = Ad::factory()->create(['name' => 'Older Ad', 'created_at' => now()->subDay()]);
        $newer = Ad::factory()->create(['name' => 'Newer Ad', 'created_at' => now()]);

        $html = Livewire::test(Index::class)->assertOk()->html();

        expect(strpos($html, $newer->name))->toBeLessThan(strpos($html, $older->name));
    });
});

test('deleteAd removes the ad when not read-only', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->withinHub($hub, function () {
        $viewer = User::factory()->dba()->create();
        $this->actingAs($viewer);

        $ad = Ad::factory()->create();

        Livewire::test(Index::class)
            ->call('deleteAd', $ad->id);

        expect(Ad::find($ad->id))->toBeNull();
    });
});

test('deleteAd is blocked in read-only mode', function () {
    $hub = $this->createHub(creating: 'all_empty');

    // Create the viewer and ad while the tenant DB is still writable...
    [$viewerId, $adId] = $this->withinHub($hub, function () {
        $viewer = User::factory()->dba()->create();
        $ad = Ad::factory()->create();

        return [$viewer->id, $ad->id];
    });

    // ...then flip the hub to read-only before exercising the component.
    $hub->readonly = true;

    $this->withinHub($hub, function () use ($viewerId, $adId) {
        $this->actingAs(User::find($viewerId));

        Livewire::test(Index::class)
            ->call('deleteAd', $adId)
            ->assertHasErrors('delete');

        expect(Ad::find($adId))->not->toBeNull();
    });
});
