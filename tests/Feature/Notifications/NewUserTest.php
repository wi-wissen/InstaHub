<?php

use App\Models\User;
use App\Notifications\NewUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;

// tests/Pest.php only wires RefreshDatabase into a fixed set of directories
// (not Feature/Notifications), so opt this file in locally to keep each test
// isolated instead of leaking rows into the shared `testing_f` database.
uses(RefreshDatabase::class);

test('it is sent via mail only', function () {
    $teacher = User::factory()->teacher()->create();

    $notification = new NewUser($teacher, 'Please let me in.');

    expect($notification->via($teacher))->toBe(['mail']);
});

test('the mail message links to the activation action and includes the message', function () {
    $teacher = User::factory()->teacher()->create([
        'name' => 'Ada Lovelace',
        'email' => 'ada@example.test',
        'username' => 'adalovelace',
    ]);

    $notification = new NewUser($teacher, 'Custom message <b>with html</b>');

    $mail = $notification->toMail($teacher);

    expect($mail->subject)->toBe('New Teacher');
    expect($mail->actionUrl)->toBe(config('app.url_admin').'/adalovelace/activate');
    expect($mail->actionText)->toBe('Activate Teacher');

    $rendered = implode(' ', $mail->introLines);
    expect($rendered)->toContain('Ada Lovelace');
    expect($rendered)->toContain('ada@example.test');

    $messageLine = implode(' ', $mail->outroLines);
    expect($messageLine)->toContain('Custom message &lt;b&gt;with html&lt;/b&gt;');
});

test('toArray returns an empty array', function () {
    $teacher = User::factory()->teacher()->create();

    $notification = new NewUser($teacher, 'hi');

    expect($notification->toArray($teacher))->toBe([]);
});

test('it can be dispatched to a notifiable via notify()', function () {
    Notification::fake();

    $admin = User::factory()->admin()->create();
    $teacher = User::factory()->teacher()->create();

    $admin->notify(new NewUser($teacher, 'hello'));

    Notification::assertSentTo($admin, NewUser::class, function ($notification) use ($teacher) {
        return $notification->user->is($teacher) && $notification->message === 'hello';
    });
});
