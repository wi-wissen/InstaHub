<?php

use App\Facades\RequestHub;
use App\Livewire\Hub\Show;
use App\Models\User;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| App\Livewire\Hub\Show
|--------------------------------------------------------------------------
|
| This component switches to the tenant DB itself via RequestHub::setHubDB(),
| so it does not need withinHub()/onHub() — only a real provisioned hub.
|
| mount() leaves the default DB connection pointed at the tenant DB (by
| design: this admin screen stays "on" the hub while managing it). In real
| usage each Livewire action round-trips through a fresh HTTP request/
| process, so the connection default always starts back at `mysql`. Our
| single-process test run has no such reset between mount() and a
| subsequent ->call(), and Livewire rehydrates the $hub property using
| whatever the *current* default connection is — so we restore it
| explicitly before issuing a follow-up action, mirroring what a fresh
| request would naturally provide.
*/

test('mount reports table row counts for the tenant database', function () {
    $teacher = $this->createTeacher();
    $hub = $this->createHub($teacher, creating: 'users');

    Livewire::actingAs($teacher)
        ->test(Show::class, ['hub' => $hub])
        ->assertOk()
        ->assertSet('adminPassword', null)
        ->tap(function ($component) {
            $status = collect($component->get('tableStatus'));
            expect($status->pluck('name'))->toContain('users');
            expect($status->firstWhere('name', 'users')['count'])->toBeGreaterThan(0);
        });
});

test('fillTables (re)creates an empty tenant table and updates the table status', function () {
    $teacher = $this->createTeacher();
    $hub = $this->createHub($teacher, creating: 'users');

    $component = Livewire::actingAs($teacher)
        ->test(Show::class, ['hub' => $hub]);

    RequestHub::setDefaultDB();
    $component->call('fillTables', 'ads', 'create');

    $status = collect($component->get('tableStatus'));
    expect($status->pluck('name'))->toContain('ads');
    expect($status->firstWhere('name', 'ads')['count'])->toBe(0);
});

test('resetAdminPassword sets a new password on the tenant admin account', function () {
    $teacher = $this->createTeacher();
    $hub = $this->createHub($teacher, creating: 'users');

    $component = Livewire::actingAs($teacher)
        ->test(Show::class, ['hub' => $hub]);

    RequestHub::setDefaultDB();
    $component->call('resetAdminPassword');

    $newPassword = $component->get('adminPassword');

    expect($newPassword)->toBeString()->not->toBeEmpty();

    $adminHashedPassword = $this->withinHub($hub, function () {
        return \App\Models\User::where('username', 'admin')->first()?->password;
    });

    expect($adminHashedPassword)->not->toBeNull();
    expect(\Illuminate\Support\Facades\Hash::check($newPassword, $adminHashedPassword))->toBeTrue();
});
