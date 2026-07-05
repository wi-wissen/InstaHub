<?php

use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;

it('shows the login form', function () {
    $this->get('http://localhost/login')
        ->assertOk()
        ->assertViewIs('auth.login');
});

it('shows the login form on the admin domain', function () {
    $this->get('http://admin.localhost/login')
        ->assertOk()
        ->assertViewIs('auth.login');
});

it('logs in an active, existing user with correct credentials', function () {
    $user = User::factory()->create([
        'username' => 'janedoe',
        'password' => bcrypt('correct-password'),
        'is_active' => true,
    ]);

    $response = $this->post('http://localhost/login', [
        'username' => 'janedoe',
        'password' => 'correct-password',
    ]);

    $response->assertRedirect('/');
    $this->assertAuthenticatedAs($user);
});

it('rejects login with a wrong password and flashes the generic auth.failed message', function () {
    User::factory()->create([
        'username' => 'janedoe',
        'password' => bcrypt('correct-password'),
        'is_active' => true,
    ]);

    $response = $this->from('http://localhost/login')->post('http://localhost/login', [
        'username' => 'janedoe',
        'password' => 'wrong-password',
    ]);

    $response->assertRedirect('http://localhost/login');
    $response->assertSessionHasErrors(['username' => __('auth.failed')]);
    $this->assertGuest();
});

it('rejects login for a username that does not exist', function () {
    $response = $this->from('http://localhost/login')->post('http://localhost/login', [
        'username' => 'nobody-here',
        'password' => 'whatever',
    ]);

    $response->assertSessionHasErrors(['username' => __('auth.failed')]);
    $this->assertGuest();
});

it('rejects login for an inactive user even with the correct password', function () {
    User::factory()->inactive()->create([
        'username' => 'inactiveuser',
        'password' => bcrypt('correct-password'),
    ]);

    $response = $this->from('http://localhost/login')->post('http://localhost/login', [
        'username' => 'inactiveuser',
        'password' => 'correct-password',
    ]);

    // the "exists" rule is scoped with `is_active,1`, so an inactive user
    // fails validation the same way a non-existent user would.
    $response->assertSessionHasErrors(['username' => __('auth.failed')]);
    $this->assertGuest();
});

it('requires username and password', function () {
    $response = $this->post('http://localhost/login', []);

    $response->assertSessionHasErrors(['username', 'password']);
});

it('locks out the login form after too many failed attempts', function () {
    RateLimiter::clear('janedoe|127.0.0.1');

    User::factory()->create([
        'username' => 'janedoe',
        'password' => bcrypt('correct-password'),
        'is_active' => true,
    ]);

    for ($i = 0; $i < 5; $i++) {
        $this->post('http://localhost/login', [
            'username' => 'janedoe',
            'password' => 'wrong-password',
        ]);
    }

    $response = $this->post('http://localhost/login', [
        'username' => 'janedoe',
        'password' => 'wrong-password',
    ]);

    $response->assertStatus(302);
    $response->assertSessionHasErrors('username');
    $errors = session('errors')->getBag('default')->get('username');
    expect($errors[0])->toContain('Too many login attempts');

    RateLimiter::clear('janedoe|127.0.0.1');
});

it('redirects an already authenticated user away from the login form', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('http://localhost/login');

    $response->assertRedirect('/');
});

it('logs out an authenticated user', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('http://localhost/logout');

    $response->assertRedirect('/');
    $this->assertGuest();
});

it('does not allow a guest to log out', function () {
    $response = $this->post('http://localhost/logout');

    // "auth" middleware redirects guests to the login route.
    $response->assertRedirect('http://localhost/login');
});
