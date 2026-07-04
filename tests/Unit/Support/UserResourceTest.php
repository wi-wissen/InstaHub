<?php

use App\Http\Resources\User as UserResource;
use App\Models\User;

it('exposes only username, name and avatar', function () {
    $user = User::factory()->create([
        'username' => 'jdoe',
        'name' => 'Jane Doe',
        'avatar' => 'avatars/jane.jpg',
        'email' => 'jane@example.test',
    ]);

    $data = (new UserResource($user))->toArray(request());

    expect($data)->toBe([
        'username' => 'jdoe',
        'name' => 'Jane Doe',
        'avatar' => 'avatars/jane.jpg',
    ]);

    // Sensitive / unrelated attributes must not leak through the resource.
    expect($data)->not->toHaveKey('email')
        ->and($data)->not->toHaveKey('password')
        ->and($data)->not->toHaveKey('id');
});
