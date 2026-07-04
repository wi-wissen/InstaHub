<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

// --- index (role:admin) ---

test('admin can list all users', function () {
    // The shared admin-area navbar links to the documentation for any
    // "teacher-or-above" user (Auth::user()->allowed('teacher')) using their
    // hub_default_generation, so an admin needs one set too (real admin
    // accounts are promoted teachers and already have it).
    $admin = User::factory()->admin()->create(['hub_default_generation' => 1]);
    $other = User::factory()->create(['username' => 'zulu']);

    $this->actingAs($admin)
        ->get('http://admin.localhost/explore/users')
        ->assertOk()
        ->assertSee($other->username);
});

test('non-admin cannot list all users', function () {
    // /explore/users sits behind the role:admin route middleware, which
    // redirects (not 403s) when the role check fails.
    $teacher = User::factory()->teacher()->create();

    $this->actingAs($teacher)
        ->get('http://admin.localhost/explore/users')
        ->assertRedirect('/');
});

test('admin can filter the user listing by starting letter', function () {
    $admin = User::factory()->admin()->create(['hub_default_generation' => 1]);
    $alice = User::factory()->create(['username' => 'alice123']);
    $bob = User::factory()->create(['username' => 'bob456']);

    $this->actingAs($admin)
        ->get('http://admin.localhost/explore/users/letter/a')
        ->assertOk()
        ->assertSee($alice->username)
        ->assertDontSee($bob->username);
});

// --- show / edit / update / destroy (role:teacher; policy checks admin or self) ---

test('teacher can view their own profile in the admin area', function () {
    $teacher = User::factory()->teacher()->create();

    $this->actingAs($teacher)
        ->get("http://admin.localhost/{$teacher->username}")
        ->assertOk();
});

test('teacher cannot view another users profile in the admin area', function () {
    $teacher = User::factory()->teacher()->create();
    $other = User::factory()->create();

    $this->actingAs($teacher)
        ->get("http://admin.localhost/{$other->username}")
        ->assertForbidden();
});

test('admin can view any users profile', function () {
    $admin = User::factory()->admin()->create(['hub_default_generation' => 1]);
    $other = User::factory()->create();

    $this->actingAs($admin)
        ->get("http://admin.localhost/{$other->username}")
        ->assertOk();
});

test('teacher can edit and update their own profile', function () {
    $teacher = User::factory()->teacher()->create();

    $this->actingAs($teacher)
        ->get("http://admin.localhost/{$teacher->username}/edit")
        ->assertOk();

    $response = $this->actingAs($teacher)->put("http://admin.localhost/{$teacher->username}/update", [
        'name' => 'Updated Name',
        'email' => $teacher->email,
    ]);

    $response->assertRedirect();
    expect($teacher->fresh()->name)->toBe('Updated Name');
});

test('teacher cannot update another users profile', function () {
    $teacher = User::factory()->teacher()->create();
    $other = User::factory()->create(['name' => 'Original']);

    $this->actingAs($teacher)->put("http://admin.localhost/{$other->username}/update", [
        'name' => 'Hacked Name',
        'email' => $other->email,
    ])->assertForbidden();

    expect($other->fresh()->name)->toBe('Original');
});

test('only admin can activate a user', function () {
    // Activating a user flips it to `is_active = true`, which triggers a
    // UserActivated notification; building its URL falls back to reading
    // $_SERVER['HTTP_HOST'] directly (see App\Helpers\HubHelper::url()).
    // Laravel's HTTP test client never populates that PHP superglobal (only
    // the ProvisionsHubs onHub()/withinHub() helpers do, for hub-domain
    // tests), so we set it here too; TestCase::tearDown() unsets it again.
    $_SERVER['HTTP_HOST'] = 'admin.localhost';

    $admin = User::factory()->admin()->create();
    $teacher = User::factory()->teacher()->create();
    $target = User::factory()->inactive()->create();

    $this->actingAs($teacher)
        ->get("http://admin.localhost/{$target->username}/activate")
        ->assertRedirect('/');
    expect($target->fresh()->is_active)->toBeFalsy();

    $this->actingAs($admin)
        ->get("http://admin.localhost/{$target->username}/activate");
    expect($target->fresh()->is_active)->toBeTruthy();
});

test('only admin can deactivate a user', function () {
    $admin = User::factory()->admin()->create();
    $target = User::factory()->create(['is_active' => true]);

    $this->actingAs($admin)
        ->get("http://admin.localhost/{$target->username}/deactivate");

    expect($target->fresh()->is_active)->toBeFalsy();
});

test('only admin can destroy a user', function () {
    $admin = User::factory()->admin()->create();
    $teacher = User::factory()->teacher()->create();
    $target = User::factory()->create();

    $this->actingAs($teacher)
        ->get("http://admin.localhost/{$target->username}/destroy")
        ->assertForbidden();
    expect(User::find($target->id))->not->toBeNull();

    $this->actingAs($admin)
        ->get("http://admin.localhost/{$target->username}/destroy");
    expect(User::find($target->id))->toBeNull();
});

// --- password (role:teacher, any authenticated teacher manages their own) ---

test('teacher can view the change password form', function () {
    $teacher = User::factory()->teacher()->create();

    $this->actingAs($teacher)
        ->get('http://admin.localhost/password')
        ->assertOk();
});

test('teacher can change their password with correct old password', function () {
    $teacher = User::factory()->teacher()->create(['password' => Hash::make('old-password')]);

    $response = $this->actingAs($teacher)->post('http://admin.localhost/password', [
        'old_password' => 'old-password',
        'password' => 'brand-new-password',
        'password_confirmation' => 'brand-new-password',
    ]);

    $response->assertRedirect('/');
    expect(Hash::check('brand-new-password', $teacher->fresh()->password))->toBeTrue();
});

test('teacher password change fails with wrong old password', function () {
    $teacher = User::factory()->teacher()->create(['password' => Hash::make('old-password')]);

    $this->actingAs($teacher)->post('http://admin.localhost/password', [
        'old_password' => 'wrong-password',
        'password' => 'brand-new-password',
        'password_confirmation' => 'brand-new-password',
    ]);

    expect(Hash::check('old-password', $teacher->fresh()->password))->toBeTrue();
});
