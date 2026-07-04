<?php

use App\Models\User;
use Illuminate\Support\Facades\Storage;

test('admin can fetch an uploaded avatar', function () {
    Storage::fake('local');
    Storage::disk('local')->put('avatars/myavatar.webp', 'fake-image-bytes');

    $admin = User::factory()->admin()->create();
    $target = User::factory()->create(['avatar' => 'avatars/myavatar.webp']);

    $response = $this->actingAs($admin)->get('http://admin.localhost/avatars/myavatar.webp');

    $response->assertOk();
    expect($response->getContent())->toBe('fake-image-bytes');
});

test('avatar lookup 404s for an unknown filename', function () {
    Storage::fake('local');
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get('http://admin.localhost/avatars/does-not-exist.webp')
        ->assertNotFound();
});

test('non-admin cannot fetch avatars in the admin area', function () {
    Storage::fake('local');
    Storage::disk('local')->put('avatars/myavatar.webp', 'fake-image-bytes');

    $teacher = User::factory()->teacher()->create();
    User::factory()->create(['avatar' => 'avatars/myavatar.webp']);

    $this->actingAs($teacher)
        ->get('http://admin.localhost/avatars/myavatar.webp')
        ->assertRedirect('/');
});

test('guest cannot fetch avatars in the admin area', function () {
    $this->get('http://admin.localhost/avatars/myavatar.webp')
        ->assertRedirect('/login');
});
