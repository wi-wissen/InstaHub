<?php

use App\Models\User;
use App\Notifications\UserActivated;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;

// tests/Pest.php only wires RefreshDatabase into a fixed set of directories
// (not Feature/Notifications), so opt this file in locally to keep each test
// isolated instead of leaking rows into the shared `testing_f` database.
uses(RefreshDatabase::class);

test('it is sent via mail only', function () {
    $notification = new UserActivated('http://example.localhost/');

    expect($notification->via(User::factory()->make()))->toBe(['mail']);
});

test('the mail message tells the user they were activated and links to the app', function () {
    $notification = new UserActivated('http://myhub.localhost/');

    $mail = $notification->toMail(User::factory()->make());

    expect($mail->actionUrl)->toBe('http://myhub.localhost/');
    expect($mail->actionText)->toBe(__('Visit').' '.config('app.name'));

    $rendered = implode(' ', $mail->introLines);
    expect($rendered)->toContain(__('Your account have been activated.'));
});

test('toArray returns an empty array', function () {
    $notification = new UserActivated('http://example.localhost/');

    expect($notification->toArray(User::factory()->make()))->toBe([]);
});

test('it is sent to a user when notified directly', function () {
    Notification::fake();

    $user = User::factory()->create();

    $user->notify(new UserActivated('http://example.localhost/'));

    Notification::assertSentTo($user, UserActivated::class);
});

test('saving an existing user as active triggers the notification outside a hub', function () {
    Notification::fake();

    // RequestHub::url(), used inside the User model's "updating" listener,
    // reads $_SERVER['HTTP_HOST'], which is only populated for real HTTP
    // requests. Simulate that here since this test saves the model directly.
    $_SERVER['HTTP_HOST'] = 'admin.localhost';

    $user = User::factory()->inactive()->create();

    $user->is_active = true;
    $user->save();

    Notification::assertSentTo($user, UserActivated::class);
});

test('creating an already-active user does not trigger the notification', function () {
    Notification::fake();

    User::factory()->create(['is_active' => true]);

    Notification::assertNothingSent();
});
