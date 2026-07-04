<?php

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;

it('shows the forgot-password form', function () {
    $this->get('http://localhost/password/reset')
        ->assertOk()
        ->assertViewIs('auth.passwords.email');
});

it('sends a reset link notification to an active, existing user', function () {
    $user = User::factory()->create(['email' => 'active@example.com', 'is_active' => true]);
    Notification::fake();

    $response = $this->post('http://localhost/password/email', [
        'email' => 'active@example.com',
    ]);

    $response->assertSessionHas('status', __('passwords.sent'));
    Notification::assertSentTo($user, ResetPassword::class);
});

it('fails with the "no user" message for an unknown email', function () {
    Notification::fake();

    $response = $this->post('http://localhost/password/email', [
        'email' => 'unknown@example.com',
    ]);

    $response->assertSessionHasErrors(['email' => __('passwords.user')]);
    Notification::assertNothingSent();
});

it('fails with the "not active" message for an inactive user', function () {
    User::factory()->inactive()->create(['email' => 'inactive@example.com']);
    Notification::fake();

    $response = $this->post('http://localhost/password/email', [
        'email' => 'inactive@example.com',
    ]);

    $response->assertSessionHasErrors(['email' => __('passwords.active')]);
    Notification::assertNothingSent();
});

it('requires a valid email to request a reset link', function () {
    $response = $this->post('http://localhost/password/email', ['email' => 'not-an-email']);

    $response->assertSessionHasErrors('email');
});
