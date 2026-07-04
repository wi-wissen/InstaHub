<?php

use App\Livewire\UserActivate;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;

test('mount exposes the user and the current read-only state', function () {
    $target = User::factory()->create(['is_active' => false]);

    Livewire::test(UserActivate::class, ['user' => $target])
        ->assertOk()
        ->assertSet('isReadOnly', false)
        ->assertSee(__('Activate'));
});

test('toggleActive flips an inactive user to active', function () {
    Notification::fake();

    // Activating a user triggers User::boot()'s "updating" listener, which
    // builds a UserActivated notification via RequestHub::url() — that reads
    // $_SERVER['HTTP_HOST'], only populated for real HTTP requests.
    $_SERVER['HTTP_HOST'] = 'admin.localhost';

    $target = User::factory()->create(['is_active' => false]);

    Livewire::test(UserActivate::class, ['user' => $target])
        ->call('toggleActive');

    expect($target->fresh()->is_active)->toBeTruthy();
    Notification::assertSentTo($target, \App\Notifications\UserActivated::class);
});

test('toggleActive flips an active user to inactive', function () {
    $target = User::factory()->create(['is_active' => true]);

    Livewire::test(UserActivate::class, ['user' => $target])
        ->call('toggleActive');

    expect($target->fresh()->is_active)->toBeFalsy();
});
