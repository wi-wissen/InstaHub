<?php

use App\Http\Resources\Ad as AdResource;
use App\Models\Ad;

it('exposes the id, name, type, url and img fields', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $ad = Ad::factory()->create([
            'name' => 'Summer Sale',
            'type' => 'banner',
            'url' => 'https://example.test/ad',
            'img' => 'ads/summer.jpg',
        ]);

        $data = (new AdResource($ad))->toArray(request());

        expect($data)->toBe([
            'id' => $ad->id,
            'name' => 'Summer Sale',
            'type' => 'banner',
            'url' => 'https://example.test/ad',
            'img' => 'ads/summer.jpg',
        ]);
    });
});
