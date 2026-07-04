<?php

use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;

function signedVerificationUrl(User $user): string
{
    return URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1($user->email)]
    );
}

it('shows the verification notice to an unverified user', function () {
    $user = User::factory()->unverified()->create();

    $response = $this->actingAs($user)->get('http://localhost/email/verify');

    $response->assertOk();
    $response->assertViewIs('auth.verify');
});

it('redirects an already verified user away from the verification notice', function () {
    $user = User::factory()->create(); // verified by default via the factory

    $response = $this->actingAs($user)->get('http://localhost/email/verify');

    $response->assertRedirect('/');
});

it('redirects a guest trying to view the verification notice to the login form', function () {
    $response = $this->get('http://localhost/email/verify');

    $response->assertRedirect('http://localhost/login');
});

it('marks the email as verified when visiting a valid signed verification link', function () {
    $user = User::factory()->unverified()->create();
    $url = signedVerificationUrl($user);

    $response = $this->actingAs($user)->get($url);

    $response->assertRedirect('/');
    $response->assertSessionHas('verified', true);
    expect($user->fresh()->hasVerifiedEmail())->toBeTrue();
});

it('rejects a verification link with a tampered hash', function () {
    $user = User::factory()->unverified()->create();
    $badUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1('someone-else@example.com')]
    );

    $response = $this->actingAs($user)->get($badUrl);

    $response->assertForbidden();
    expect($user->fresh()->hasVerifiedEmail())->toBeFalse();
});

it('rejects an unsigned (tampered) verification link', function () {
    $user = User::factory()->unverified()->create();

    $response = $this->actingAs($user)->get("http://localhost/email/verify/{$user->id}/".sha1($user->email));

    $response->assertForbidden();
    expect($user->fresh()->hasVerifiedEmail())->toBeFalse();
});

it('does nothing but redirect when visiting the verify link as an already verified user', function () {
    $user = User::factory()->create(); // already verified
    $url = signedVerificationUrl($user);

    $response = $this->actingAs($user)->get($url);

    $response->assertRedirect('/');
    $response->assertSessionMissing('verified');
});

it('resends the verification email to an unverified authenticated user', function () {
    $user = User::factory()->unverified()->create();
    Notification::fake();

    $response = $this->actingAs($user)->from('http://localhost/email/verify')->post('http://localhost/email/resend');

    $response->assertRedirect('http://localhost/email/verify');
    $response->assertSessionHas('resent', true);
    Notification::assertSentTo($user, VerifyEmail::class);
});

it('does not resend the verification email to an already verified user', function () {
    $user = User::factory()->create();
    Notification::fake();

    $response = $this->actingAs($user)->post('http://localhost/email/resend');

    $response->assertRedirect('/');
    Notification::assertNothingSent();
});

it('redirects unverified users away from routes protected by the verified middleware', function () {
    $teacher = User::factory()->teacher()->unverified()->create();

    $response = $this->actingAs($teacher)->get('http://admin.localhost/password');

    // route() resolves against the current request's host, not a forced root.
    $response->assertRedirect('http://admin.localhost/email/verify');
});
