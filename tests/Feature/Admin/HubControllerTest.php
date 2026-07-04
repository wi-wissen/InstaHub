<?php

use App\Models\Hub;
use App\Models\User;

// --- index ---

test('guest is redirected away from the admin hub listing', function () {
    $this->get('http://admin.localhost/')->assertRedirect('/login');
});

test('plain user cannot view the admin hub listing', function () {
    $user = User::factory()->user()->create();

    $this->actingAs($user)
        ->get('http://admin.localhost/')
        ->assertRedirect('/');
});

// NOTE: listing hubs that actually appear as rows renders the
// `livewire.hub.index` table, which reads real per-hub computed attributes
// (`$hub->admin`, `->activated`, `->readonly`, `->hasWorkingUser`) that open a
// real connection to that hub's tenant database. Hub::factory() rows have no
// such database, so those listing scenarios are covered with real
// provisioned hubs in tests/Feature/Hub/AdminControllers/HubControllerIndexTest.php
// instead. Here we only cover the always-empty-listing paths.

test('teacher sees an empty hub listing when they have no hubs', function () {
    $teacher = User::factory()->teacher()->create();

    $this->actingAs($teacher)
        ->get('http://admin.localhost/')
        ->assertOk();
});

// --- create ---

test('create hub form renders for a guest', function () {
    $this->get('http://admin.localhost/hubs/create')->assertOk();
});

test('create hub form renders for an authenticated teacher', function () {
    $teacher = User::factory()->teacher()->create();

    $this->actingAs($teacher)
        ->get('http://admin.localhost/hubs/create')
        ->assertOk();
});

// --- store: validation (no tenant DB is ever provisioned for these) ---

test('store fails validation when hub name is not alphanumeric', function () {
    $teacher = User::factory()->teacher()->create();

    $response = $this->actingAs($teacher)->post('http://admin.localhost/hubs', [
        'hub' => 'not valid!!',
        'password' => 'secret123',
        'password_confirmation' => 'secret123',
        'teacher' => $teacher->username,
        'username' => 'admin',
        'name' => 'Admin',
        'email' => 'admin@example.test',
    ]);

    $response->assertSessionHasErrors('hub');
    expect(Hub::where('name', 'not valid!!')->exists())->toBeFalse();
});

test('store fails validation when hub name is already taken', function () {
    $teacher = User::factory()->teacher()->create();
    $existing = Hub::factory()->create(['name' => 'takenhub']);

    $response = $this->actingAs($teacher)->post('http://admin.localhost/hubs', [
        'hub' => 'takenhub',
        'password' => 'secret123',
        'password_confirmation' => 'secret123',
        'teacher' => $teacher->username,
        'username' => 'admin',
        'name' => 'Admin',
        'email' => 'admin@example.test',
    ]);

    $response->assertSessionHasErrors('hub');
});

test('store fails validation when password is too short or unconfirmed', function () {
    $teacher = User::factory()->teacher()->create();

    $response = $this->actingAs($teacher)->post('http://admin.localhost/hubs', [
        'hub' => 'freshhubname',
        'password' => 'abc',
        'password_confirmation' => 'abc',
        'teacher' => $teacher->username,
        'username' => 'admin',
        'name' => 'Admin',
        'email' => 'admin@example.test',
    ]);

    $response->assertSessionHasErrors('password');

    $response = $this->actingAs($teacher)->post('http://admin.localhost/hubs', [
        'hub' => 'freshhubname',
        'password' => 'secret123',
        'password_confirmation' => 'doesnotmatch',
        'teacher' => $teacher->username,
        'username' => 'admin',
        'name' => 'Admin',
        'email' => 'admin@example.test',
    ]);

    $response->assertSessionHasErrors('password');
    expect(Hub::where('name', 'freshhubname')->exists())->toBeFalse();
});

test('store fails validation when the referenced teacher does not exist or is inactive', function () {
    $teacher = User::factory()->teacher()->create();
    $inactiveTeacher = User::factory()->teacher()->inactive()->create();

    $response = $this->actingAs($teacher)->post('http://admin.localhost/hubs', [
        'hub' => 'freshhubname',
        'password' => 'secret123',
        'password_confirmation' => 'secret123',
        'teacher' => 'no-such-username',
        'username' => 'admin',
        'name' => 'Admin',
        'email' => 'admin@example.test',
    ]);
    $response->assertSessionHasErrors('teacher');

    $response = $this->actingAs($teacher)->post('http://admin.localhost/hubs', [
        'hub' => 'freshhubname',
        'password' => 'secret123',
        'password_confirmation' => 'secret123',
        'teacher' => $inactiveTeacher->username,
        'username' => 'admin',
        'name' => 'Admin',
        'email' => 'admin@example.test',
    ]);
    $response->assertSessionHasErrors('teacher');

    expect(Hub::where('name', 'freshhubname')->exists())->toBeFalse();
});

test('store fails validation when the username is not admin', function () {
    $teacher = User::factory()->teacher()->create();

    $response = $this->actingAs($teacher)->post('http://admin.localhost/hubs', [
        'hub' => 'freshhubname',
        'password' => 'secret123',
        'password_confirmation' => 'secret123',
        'teacher' => $teacher->username,
        'username' => 'not-admin',
        'name' => 'Admin',
        'email' => 'admin@example.test',
    ]);

    $response->assertSessionHasErrors('username');
    expect(Hub::where('name', 'freshhubname')->exists())->toBeFalse();
});

// --- show ---
// A successful `show` renders the `livewire.hub.show` component, which also
// opens a real connection to the hub's tenant database (to list its tables).
// That scenario lives in Feature/Hub/AdminControllers; the unauthorized path
// below is rejected by the `can:view` policy before any of that happens, so
// it is safe with a plain, non-provisioned Hub::factory() row.

test('teacher cannot view another teachers hub', function () {
    $teacher = User::factory()->teacher()->create();
    $otherTeacher = User::factory()->teacher()->create();
    $hub = Hub::factory()->create(['teacher_id' => $otherTeacher->id]);

    $this->actingAs($teacher)
        ->get("http://admin.localhost/hubs/{$hub->id}")
        ->assertForbidden();
});

// --- destroy: authorization only (unauthorized requests never reach the
// tenant-DB-dropping code, so no real tenant DB is needed here) ---

test('teacher cannot destroy another teachers hub', function () {
    $teacher = User::factory()->teacher()->create();
    $otherTeacher = User::factory()->teacher()->create();
    $hub = Hub::factory()->create(['teacher_id' => $otherTeacher->id]);

    $this->actingAs($teacher)
        ->delete("http://admin.localhost/hubs/{$hub->id}")
        ->assertForbidden();

    expect(Hub::find($hub->id))->not->toBeNull();
});

test('guest cannot destroy a hub', function () {
    $teacher = User::factory()->teacher()->create();
    $hub = Hub::factory()->create(['teacher_id' => $teacher->id]);

    $this->delete("http://admin.localhost/hubs/{$hub->id}")
        ->assertRedirect('/login');

    expect(Hub::find($hub->id))->not->toBeNull();
});
