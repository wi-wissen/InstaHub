<?php

use App\Livewire\Admin\Sql;
use Livewire\Livewire;

test('mount loads the current database table/column list', function () {
    Livewire::test(Sql::class)
        ->assertSet('query', '')
        ->assertSee('users');
});

test('a successful select query populates results and a success message', function () {
    Livewire::test(Sql::class)
        ->set('query', 'select 1 as one')
        ->call('runQuery')
        ->assertSet('message.type', 'success');
});

test('a select query with zero rows reports a warning', function () {
    Livewire::test(Sql::class)
        ->set('query', 'select * from users where 1 = 0')
        ->call('runQuery')
        ->assertSet('message.type', 'warning');
});

test('a non-select statement is executed directly', function () {
    $component = Livewire::test(Sql::class)
        ->set('query', "update users set name = name where 1 = 0")
        ->call('runQuery');

    $component->assertSet('message.type', 'success')
        ->assertSet('message.text', __('Query executed.'));
});

test('an invalid query reports a danger message with the SQL error', function () {
    Livewire::test(Sql::class)
        ->set('query', 'select * from a_table_that_does_not_exist')
        ->call('runQuery')
        ->assertSet('message.type', 'danger');
});

test('the last query is remembered across runs via the session', function () {
    Livewire::test(Sql::class)
        ->set('query', 'select 1')
        ->call('runQuery');

    expect(session('last_query'))->toBe('select 1');
});

test('unsetResults clears results and message', function () {
    Livewire::test(Sql::class)
        ->set('query', 'select 1 as one')
        ->call('runQuery')
        ->assertSet('message.type', 'success')
        ->call('unsetResults')
        ->assertSet('message', null)
        ->assertSet('results', []);
});
