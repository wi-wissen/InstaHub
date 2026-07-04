<?php

use App\Models\User;
use App\Notifications\NewUser;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Notification;
use Ossycodes\FriendlyCaptcha\FriendlyCaptcha as FriendlyCaptchaClient;

/**
 * The registration form requires a FriendlyCaptcha solution, which is
 * verified against a real external HTTP endpoint by default. We swap the
 * bound client for a Mockery double so tests never hit the network.
 */
function fakeCaptcha(bool $success = true): void
{
    $mock = Mockery::mock(FriendlyCaptchaClient::class);
    $mock->shouldReceive('verifyResponse')->andReturn($mock);
    $mock->shouldReceive('isSuccess')->andReturn($success);

    if (! $success) {
        $mock->shouldReceive('getErrors')->andReturn(['solution_invalid']);
    }

    app()->instance(FriendlyCaptchaClient::class, $mock);
}

function validRegistrationPayload(array $overrides = []): array
{
    return array_merge([
        'username' => 'newteacher',
        'name' => 'New Teacher',
        'email' => 'newteacher@example.com',
        'password' => 'secret123',
        'password_confirmation' => 'secret123',
        'messageToAdmin' => 'Please activate my account.',
        'frc-captcha-solution' => 'solution',
    ], $overrides);
}

it('shows the registration form', function () {
    $this->get('http://localhost/register')
        ->assertOk()
        ->assertViewIs('auth.register');
});

it('registers a new teacher account on the main domain, notifies the admin and sends a verification email', function () {
    $admin = User::factory()->admin()->create();
    Notification::fake();
    fakeCaptcha(true);

    $response = $this->post('http://localhost/register', validRegistrationPayload());

    $response->assertRedirect('/');

    $user = User::where('email', 'newteacher@example.com')->first();
    expect($user)->not->toBeNull();
    expect($user->role)->toBe('teacher');
    expect($user->username)->toBe('newteacher');
    // is_active mirrors app()->environment('local'), which is false in tests.
    expect((bool) $user->is_active)->toBeFalse();
    expect($user->email_verified_at)->toBeNull();

    Notification::assertSentTo($admin, NewUser::class);
    Notification::assertSentTo($user, VerifyEmail::class);

    // the account is inactive, so it must not be logged in automatically.
    $this->assertGuest();
});

it('fails registration validation when required fields are missing', function () {
    $response = $this->post('http://localhost/register', []);

    $response->assertSessionHasErrors(['username', 'name', 'email', 'password']);
    $this->assertGuest();
});

it('fails registration when the password confirmation does not match', function () {
    fakeCaptcha(true);

    $response = $this->post('http://localhost/register', validRegistrationPayload([
        'password' => 'secret123',
        'password_confirmation' => 'does-not-match',
    ]));

    $response->assertSessionHasErrors('password');
});

it('fails registration when the username is already taken', function () {
    User::factory()->create(['username' => 'newteacher']);
    fakeCaptcha(true);

    $response = $this->post('http://localhost/register', validRegistrationPayload());

    $response->assertSessionHasErrors('username');
});

it('fails registration when the email is already taken', function () {
    User::factory()->create(['email' => 'newteacher@example.com']);
    fakeCaptcha(true);

    $response = $this->post('http://localhost/register', validRegistrationPayload());

    $response->assertSessionHasErrors('email');
});

it('fails registration when the username contains unsafe characters', function () {
    fakeCaptcha(true);

    $response = $this->post('http://localhost/register', validRegistrationPayload([
        'username' => 'not a safe name',
    ]));

    $response->assertSessionHasErrors('username');
});

it('fails registration when the captcha verification fails', function () {
    fakeCaptcha(false);

    $response = $this->post('http://localhost/register', validRegistrationPayload());

    $response->assertSessionHasErrors('frc-captcha-solution');
    $this->assertGuest();
});

it('redirects an already authenticated user away from the registration form', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('http://localhost/register');

    $response->assertRedirect('/');
});
