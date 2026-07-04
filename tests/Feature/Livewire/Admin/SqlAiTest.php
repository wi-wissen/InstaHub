<?php

use App\Livewire\Admin\SqlAi;
use App\Models\User;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| App\Livewire\Admin\SqlAi
|--------------------------------------------------------------------------
|
| runQuery() calls out to an external OpenAI-compatible API whenever a
| prompt is present, so only the network-free paths are covered here:
| mount()'s table loading and the early return for an empty prompt. The
| view also calls RequestHub::hasTokens(), which needs an authenticated
| user outside of a hub.
*/

test('mount loads the last prompt from the session and the table list', function () {
    session(['last_prompt' => 'show me all users']);

    Livewire::actingAs(User::factory()->admin()->create())
        ->test(SqlAi::class)
        ->assertSet('prompt', 'show me all users')
        ->assertSet('query', '')
        ->tap(function ($component) {
            expect($component->get('tables'))->toContain('users');
        });
});

test('running the query with an empty prompt does nothing', function () {
    Livewire::actingAs(User::factory()->admin()->create())
        ->test(SqlAi::class)
        ->set('prompt', '')
        ->call('runQuery')
        ->assertSet('query', '')
        ->assertSet('message', null)
        ->assertSet('results', []);
});

test('unsetResults clears results and message', function () {
    Livewire::actingAs(User::factory()->admin()->create())
        ->test(SqlAi::class)
        ->set('message', ['type' => 'success', 'text' => 'x'])
        ->set('results', [1, 2, 3])
        ->call('unsetResults')
        ->assertSet('message', null)
        ->assertSet('results', []);
});
