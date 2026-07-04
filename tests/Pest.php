<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\ProvisionsHubs;
use Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case bindings
|--------------------------------------------------------------------------
|
| InstaHub is a multi-tenant app: each "hub" lives in its own database that is
| provisioned at runtime via CREATE DATABASE / GRANT. Those DDL statements
| implicitly commit, which is incompatible with the transaction-based
| RefreshDatabase trait. We therefore split the suite:
|
|  - Most tests run against the primary DB only and use the fast,
|    transactional RefreshDatabase.
|  - Tests under Feature/Hub provision real tenant databases and instead use
|    DatabaseMigrations (migrate:fresh per test, no wrapping transaction) plus
|    the ProvisionsHubs helpers. Tenant DBs are dropped in TestCase::tearDown.
|
*/

uses(TestCase::class)->in('Feature', 'Unit');

uses(RefreshDatabase::class)
    ->in('Feature/Auth', 'Feature/Admin', 'Feature/Controllers', 'Feature/Livewire', 'Unit');

uses(DatabaseMigrations::class, ProvisionsHubs::class)->in('Feature/Hub');

/*
|--------------------------------------------------------------------------
| Expectations & helpers
|--------------------------------------------------------------------------
*/

expect()->extend('toBeActiveUser', function () {
    expect($this->value->is_active)->toBeTrue();

    return $this;
});
