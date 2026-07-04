<?php

use App\Livewire\FollowButton;
use App\Models\User;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| App\Livewire\FollowButton
|--------------------------------------------------------------------------
|
| follow()/unfollow() act on Auth::user()->following() against the tenant
| `users`/`follows` tables, so every test provisions a hub and runs inside
| it via withinHub().
*/

test('mount exposes the target username and initial following state', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->withinHub($hub, function () {
        $target = User::factory()->create(['username' => 'target1']);
        $viewer = User::factory()->create();
        $this->actingAs($viewer);

        Livewire::test(FollowButton::class, ['username' => $target->username, 'isFollowing' => false])
            ->assertOk()
            ->assertSet('isFollowing', false)
            ->assertSee(__('Follow'));
    });
});

test('follow attaches the target user to the current user\'s following list', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->withinHub($hub, function () {
        $target = User::factory()->create(['username' => 'target2']);
        $viewer = User::factory()->create();
        $this->actingAs($viewer);

        Livewire::test(FollowButton::class, ['username' => $target->username])
            ->call('follow')
            ->assertSet('isFollowing', true);

        expect($viewer->following()->where('users.id', $target->id)->exists())->toBeTrue();
    });
});

test('unfollow detaches the target user again', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->withinHub($hub, function () {
        $target = User::factory()->create(['username' => 'target3']);
        $viewer = User::factory()->create();
        $viewer->following()->attach($target);
        $this->actingAs($viewer);

        Livewire::test(FollowButton::class, ['username' => $target->username, 'isFollowing' => true])
            ->call('unfollow')
            ->assertSet('isFollowing', false);

        expect($viewer->following()->where('users.id', $target->id)->exists())->toBeFalse();
    });
});
