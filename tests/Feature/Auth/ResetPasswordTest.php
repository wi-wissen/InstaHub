<?php

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;

function capturePasswordResetToken(User $user): string
{
    Notification::fake();

    Password::broker()->sendResetLink(['email' => $user->email]);

    $token = null;
    Notification::assertSentTo($user, ResetPasswordNotification::class, function ($notification) use (&$token) {
        $token = $notification->token;

        return true;
    });

    Notification::fake(); // reset the fake so the reset itself doesn't record this notification

    return $token;
}

it('shows the reset-password form for a token', function () {
    $response = $this->get('http://localhost/password/reset/some-token?email=someone@example.com');

    $response->assertOk();
    $response->assertViewIs('auth.passwords.reset');
    $response->assertViewHas('token', 'some-token');
});

it('resets the password with a valid token and logs the user in', function () {
    $user = User::factory()->create(['email' => 'reset-me@example.com']);
    $token = capturePasswordResetToken($user);

    $response = $this->post('http://localhost/password/reset', [
        'token' => $token,
        'email' => 'reset-me@example.com',
        'password' => 'brand-new-password',
        'password_confirmation' => 'brand-new-password',
    ]);

    $response->assertRedirect('/');
    $response->assertSessionHas('status', __('passwords.reset'));

    $this->assertAuthenticatedAs($user->fresh());
    expect(Hash::check('brand-new-password', $user->fresh()->password))->toBeTrue();
});

it('fails to reset the password with an invalid token', function () {
    $user = User::factory()->create(['email' => 'reset-me@example.com']);

    $response = $this->from('http://localhost/password/reset/bad-token')->post('http://localhost/password/reset', [
        'token' => 'totally-bogus-token',
        'email' => 'reset-me@example.com',
        'password' => 'brand-new-password',
        'password_confirmation' => 'brand-new-password',
    ]);

    $response->assertSessionHasErrors(['email' => __('passwords.token')]);
    $this->assertGuest();
    expect(Hash::check('brand-new-password', $user->fresh()->password))->toBeFalse();
});

it('requires matching password confirmation and a minimum length to reset', function () {
    $user = User::factory()->create(['email' => 'reset-me@example.com']);
    $token = capturePasswordResetToken($user);

    $response = $this->post('http://localhost/password/reset', [
        'token' => $token,
        'email' => 'reset-me@example.com',
        'password' => 'short',
        'password_confirmation' => 'not-the-same',
    ]);

    $response->assertSessionHasErrors('password');
});
