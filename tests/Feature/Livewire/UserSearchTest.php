<?php

use App\Livewire\UserSearch;
use App\Models\User;
use Livewire\Livewire;

test('query shorter than two characters hides the dropdown and clears results', function () {
    Livewire::test(UserSearch::class)
        ->set('query', 'a')
        ->assertSet('showDropdown', false)
        ->assertSet('users', []);
});

test('matching users by username populate the dropdown', function () {
    $match = User::factory()->create(['username' => 'johndoe', 'name' => 'Zed Zed']);
    User::factory()->create(['username' => 'somebodyelse', 'name' => 'Nobody Here']);

    Livewire::test(UserSearch::class)
        ->set('query', 'john')
        ->assertSet('showDropdown', true)
        ->assertSee($match->username);
});

test('matching users by forename or lastname populate the dropdown', function () {
    $forename = User::factory()->create(['username' => 'aaa111', 'name' => 'Marple Someone']);
    $lastname = User::factory()->create(['username' => 'bbb222', 'name' => 'Someone Marple']);
    User::factory()->create(['username' => 'ccc333', 'name' => 'Totally Unrelated']);

    $component = Livewire::test(UserSearch::class)->set('query', 'Marple');

    $component->assertSee($forename->username)
        ->assertSee($lastname->username);
});

test('resetDropdown hides the dropdown', function () {
    User::factory()->create(['username' => 'findable']);

    Livewire::test(UserSearch::class)
        ->set('query', 'find')
        ->assertSet('showDropdown', true)
        ->call('resetDropdown')
        ->assertSet('showDropdown', false);
});
