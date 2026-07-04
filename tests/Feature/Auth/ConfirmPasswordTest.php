<?php

use App\Models\User;

it('shows the password confirmation form to an authenticated user', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('http://localhost/password/confirm');

    $response->assertOk();
    $response->assertViewIs('auth.passwords.confirm');
});

it('redirects a guest away from the confirm-password form to the login page', function () {
    $response = $this->get('http://localhost/password/confirm');

    $response->assertRedirect('http://localhost/login');
});

it('confirms the password when the current password is correct', function () {
    $user = User::factory()->create(['password' => bcrypt('correct-password')]);

    $response = $this->actingAs($user)->post('http://localhost/password/confirm', [
        'password' => 'correct-password',
    ]);

    $response->assertRedirect('/');
    expect(session('auth.password_confirmed_at'))->not->toBeNull();
});

it('fails to confirm the password when the current password is wrong', function () {
    $user = User::factory()->create(['password' => bcrypt('correct-password')]);

    $response = $this->actingAs($user)->post('http://localhost/password/confirm', [
        'password' => 'wrong-password',
    ]);

    $response->assertSessionHasErrors('password');
    expect(session('auth.password_confirmed_at'))->toBeNull();
});
