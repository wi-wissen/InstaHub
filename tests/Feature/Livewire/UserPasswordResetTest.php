<?php

use App\Livewire\UserPasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;

test('mount exposes the username and read-only state with no password yet', function () {
    $target = User::factory()->create(['username' => 'targetuser']);

    Livewire::test(UserPasswordReset::class, ['username' => $target->username])
        ->assertSet('username', 'targetuser')
        ->assertSet('newPassword', null)
        ->assertSet('isReadOnly', false);
});

test('getNewPassword generates and persists a fresh 6 character password', function () {
    $target = User::factory()->create(['username' => 'targetuser']);
    $originalHash = $target->password;

    $component = Livewire::test(UserPasswordReset::class, ['username' => $target->username])
        ->call('getNewPassword');

    $newPassword = $component->get('newPassword');

    expect($newPassword)->toBeString();
    expect(mb_strlen($newPassword))->toBe(6);

    $target->refresh();
    expect($target->password)->not->toBe($originalHash);
    expect(Hash::check($newPassword, $target->password))->toBeTrue();
});
