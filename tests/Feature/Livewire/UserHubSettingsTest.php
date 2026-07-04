<?php

use App\Livewire\UserHubSettings;
use App\Models\User;
use Livewire\Livewire;

test('mount fills the form from the authenticated user defaults', function () {
    $teacher = User::factory()->teacher()->create([
        'hub_default_generation' => 1,
        'hub_default_creating' => 'all_empty',
        'hub_default_query_level' => 'gui',
    ]);

    Livewire::actingAs($teacher)
        ->test(UserHubSettings::class)
        ->assertSet('generation', 1)
        ->assertSet('hubDefaultCreating', 'all_empty')
        ->assertSet('hubDefaultQueryLevel', 'gui')
        ->assertSet('availableGenerations', config('hub.generations'));
});

test('save persists valid settings and flashes a success message', function () {
    $teacher = User::factory()->teacher()->create([
        'hub_default_generation' => 1,
        'hub_default_creating' => 'all_empty',
        'hub_default_query_level' => 'gui',
    ]);

    Livewire::actingAs($teacher)
        ->test(UserHubSettings::class)
        ->set('generation', 2)
        ->set('hubDefaultCreating', 'all_full')
        ->set('hubDefaultQueryLevel', 'sql')
        ->call('save')
        ->assertHasNoErrors()
        ->assertSee(__('Settings updated successfully.'));

    $teacher->refresh();

    expect($teacher->hub_default_generation)->toBe(2);
    expect($teacher->hub_default_creating)->toBe('all_full');
    expect($teacher->hub_default_query_level)->toBe('sql');
});

test('save rejects an invalid hub default creating value', function () {
    $teacher = User::factory()->teacher()->create();

    Livewire::actingAs($teacher)
        ->test(UserHubSettings::class)
        ->set('hubDefaultCreating', 'not-a-real-option')
        ->call('save')
        ->assertHasErrors(['hubDefaultCreating' => 'in']);
});

test('save rejects an invalid query level value', function () {
    $teacher = User::factory()->teacher()->create();

    Livewire::actingAs($teacher)
        ->test(UserHubSettings::class)
        ->set('hubDefaultQueryLevel', 'not-a-real-level')
        ->call('save')
        ->assertHasErrors(['hubDefaultQueryLevel' => 'in']);
});
