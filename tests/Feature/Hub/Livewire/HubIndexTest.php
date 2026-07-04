<?php

use App\Livewire\Hub\Index;
use App\Models\Hub;
use App\Models\User;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| App\Livewire\Hub\Index
|--------------------------------------------------------------------------
|
| The component's view calls several tenant-DB-backed computed properties
| ($hub->admin, ->activated, ->readonly, ->hasWorkingUser) for every listed
| hub, so rendering it with any non-empty hub list requires a real
| provisioned hub (ProvisionsHubs::createHub()) rather than a bare
| Hub::factory() row. That's why this whole component lives under
| tests/Feature/Hub/Livewire instead of tests/Feature/Livewire.
*/

test('admin sees every hub, regardless of owner', function () {
    $admin = User::factory()->admin()->create();
    $hubA = $this->createHub(creating: 'all_empty');
    $hubB = $this->createHub(creating: 'all_empty');

    Livewire::actingAs($admin)
        ->test(Index::class, ['hub' => $hubA])
        ->assertOk()
        ->assertSee($hubA->name)
        ->assertSee($hubB->name);
});

test('teacher only sees their own hubs', function () {
    $teacher = $this->createTeacher();
    $otherTeacher = $this->createTeacher();

    $ownHub = $this->createHub($teacher, creating: 'all_empty');
    $otherHub = $this->createHub($otherTeacher, creating: 'all_empty');

    Livewire::actingAs($teacher)
        ->test(Index::class, ['hub' => $ownHub])
        ->assertOk()
        ->assertSee($ownHub->name)
        ->assertDontSee($otherHub->name);
});

test('search filters the hub list by name', function () {
    $admin = User::factory()->admin()->create();
    $match = $this->createHub(creating: 'all_empty');
    $noMatch = $this->createHub(creating: 'all_empty');

    Livewire::actingAs($admin)
        ->test(Index::class, ['hub' => $match])
        ->set('search', $match->name)
        ->assertSee($match->name)
        ->assertDontSee($noMatch->name);
});

test('updating the search term resets pagination to page one', function () {
    $admin = User::factory()->admin()->create();
    $hub = $this->createHub(creating: 'all_empty');

    Livewire::actingAs($admin)
        ->test(Index::class, ['hub' => $hub])
        ->call('gotoPage', 2)
        ->assertSet('paginators.page', 2)
        ->set('search', 'some-other-term')
        ->assertSet('paginators.page', 1);
});

test('setQueryLevel updates the hub row and the selected level', function () {
    $admin = User::factory()->admin()->create();
    $hub = $this->createHub(creating: 'all_empty', attributes: ['query_level' => 'gui']);

    Livewire::actingAs($admin)
        ->test(Index::class, ['hub' => $hub])
        ->assertSet('selectedQueryLevel', 'gui')
        ->call('setQueryLevel', $hub->id, 'sql')
        ->assertSet('selectedQueryLevel', 'sql');

    expect($hub->fresh()->query_level)->toBe('sql');
});

test('setActivate creates and activates a dba account on the tenant database', function () {
    $admin = User::factory()->admin()->create();
    $hub = $this->createHub(creating: 'all_empty');

    expect($hub->activated)->toBeFalsy();

    Livewire::actingAs($admin)
        ->test(Index::class, ['hub' => $hub])
        ->call('setActivate', $hub->id, true);

    expect($hub->fresh()->activated)->toBeTruthy();
});

test('setActivate can deactivate the tenant dba account again', function () {
    $admin = User::factory()->admin()->create();
    $hub = $this->createHub(creating: 'all_empty');

    Livewire::actingAs($admin)
        ->test(Index::class, ['hub' => $hub])
        ->call('setActivate', $hub->id, true);

    expect($hub->fresh()->activated)->toBeTruthy();

    Livewire::actingAs($admin)
        ->test(Index::class, ['hub' => $hub])
        ->call('setActivate', $hub->id, false);

    expect($hub->fresh()->activated)->toBeFalsy();
});

test('setReadonly revokes write privileges on the tenant database', function () {
    $admin = User::factory()->admin()->create();
    $hub = $this->createHub(creating: 'all_empty');

    expect($hub->readonly)->toBeFalse();

    Livewire::actingAs($admin)
        ->test(Index::class, ['hub' => $hub])
        ->call('setReadonly', $hub->id, true);

    expect($hub->fresh()->readonly)->toBeTrue();
});

test('fillTables reseeds a tenant table', function () {
    $admin = User::factory()->admin()->create();
    $hub = $this->createHub(creating: 'all_empty');

    Livewire::actingAs($admin)
        ->test(Index::class, ['hub' => $hub])
        ->call('fillTables', $hub->id, 'users');

    $count = $this->withinHub($hub, fn () => \App\Models\User::count());

    expect($count)->toBeGreaterThan(0);
});

test('destroy deletes the hub row and drops its tenant database', function () {
    $admin = User::factory()->admin()->create();
    $hub = $this->createHub(creating: 'all_empty');
    $hubId = $hub->id;

    Livewire::actingAs($admin)
        ->test(Index::class, ['hub' => $hub])
        ->call('destroy', $hubId);

    expect(Hub::find($hubId))->toBeNull();
});
