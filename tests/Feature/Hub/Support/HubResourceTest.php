<?php

use App\Facades\RequestHub;
use App\Http\Resources\Hub as HubResource;

it('serializes a hub with no working user (empty tenant) to the expected shape', function () {
    $hub = $this->createHub(creating: 'all_empty');

    RequestHub::setDefaultDB();

    $data = (new HubResource($hub))->toArray(request());

    expect($data)->toHaveKeys(['id', 'name', 'hasWorkingUser', 'activated', 'admin', 'readonly', 'created_at'])
        ->and($data['id'])->toBe($hub->id)
        ->and($data['name'])->toBe($hub->name)
        ->and($data['hasWorkingUser'])->toBeFalse() // all_empty seeds no dba user
        ->and($data['activated'])->toBeFalse()
        ->and($data['admin'])->toBe('');
});

it('reports a working, activated hub once a dba user exists', function () {
    $hub = $this->createHub(creating: 'users');

    RequestHub::setDefaultDB();

    $data = (new HubResource($hub))->toArray(request());

    expect($data['hasWorkingUser'])->toBeTrue()
        ->and($data['activated'])->toBeTruthy()
        ->and($data['admin'])->toBe('admin');
});
