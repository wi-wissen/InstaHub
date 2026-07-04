<?php

use App\Livewire\Admin\SqlBuilder;
use Livewire\Livewire;

test('mount loads the available tables and columns of the current database', function () {
    $component = Livewire::test(SqlBuilder::class);

    $component->assertOk();
    expect($component->get('tablenames'))->toContain('users');
    expect($component->get('tables')['users'])->toContain('username');
});

test('selecting a single table exposes its columns as attributes and query rules', function () {
    Livewire::test(SqlBuilder::class)
        ->set('sql.tables', ['users'])
        ->assertSet('attr', fn ($attr) => in_array('username', $attr))
        ->tap(function ($component) {
            $rules = $component->get('rules');
            expect($rules)->not->toBeEmpty();
            expect($rules[0])->toHaveKeys(['type', 'id', 'label']);
        });
});

test('selecting multiple tables prefixes attributes with the table name', function () {
    Livewire::test(SqlBuilder::class)
        ->set('sql.tables', ['users', 'hubs'])
        ->tap(function ($component) {
            $attr = $component->get('attr');
            expect(collect($attr)->every(fn ($a) => str_contains($a, '.')))->toBeTrue();
        });
});

test('getResult runs the raw query and reports success', function () {
    Livewire::test(SqlBuilder::class)
        ->set('query', 'select 1 as one')
        ->call('getResult')
        ->assertSet('message.type', 'success');
});

test('getResult reports a warning for zero results', function () {
    Livewire::test(SqlBuilder::class)
        ->set('query', 'select * from users where 1 = 0')
        ->call('getResult')
        ->assertSet('message.type', 'warning');
});

test('getResult reports a danger message for an invalid query', function () {
    Livewire::test(SqlBuilder::class)
        ->set('query', 'select * from a_table_that_does_not_exist')
        ->call('getResult')
        ->assertSet('message.type', 'danger');
});

test('unsetResults clears message and results', function () {
    Livewire::test(SqlBuilder::class)
        ->set('query', 'select 1 as one')
        ->call('getResult')
        ->assertSet('message.type', 'success')
        ->call('unsetResults')
        ->assertSet('message', null)
        ->assertSet('results', []);
});
