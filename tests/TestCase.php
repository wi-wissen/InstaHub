<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Views reference compiled Vite assets via @vite; there is no build in
        // the test/CI environment, so replace Vite with a no-op to avoid
        // "Vite manifest not found" errors while rendering views.
        $this->withoutVite();
    }


    /**
     * Clean up any tenant ("hub") databases created during a test.
     *
     * InstaHub provisions one MySQL/MariaDB database per hub
     * (`<DB_DATABASE>_<hub_id>`). Those live outside the transactional
     * RefreshDatabase lifecycle (CREATE/DROP DATABASE implicitly commits),
     * so we drop them explicitly after every test to keep the server clean.
     */
    protected function tearDown(): void
    {
        $this->dropTenantDatabases();

        // Reset any hub-subdomain host set by the ProvisionsHubs helpers so it
        // cannot leak into the next test.
        unset($_SERVER['HTTP_HOST']);
        if ($this->app !== null) {
            $this->app->forgetInstance('requestHub');
        }

        parent::tearDown();
    }

    protected function dropTenantDatabases(): void
    {
        // Make sure we are talking to the primary connection.
        config(['database.default' => 'mysql']);

        $prefix = env('DB_DATABASE', 'testing').'_';

        try {
            $databases = DB::connection('mysql')->select(
                'SELECT SCHEMA_NAME AS name FROM information_schema.schemata WHERE SCHEMA_NAME LIKE ?',
                [str_replace('_', '\_', $prefix).'%']
            );
        } catch (\Throwable $e) {
            // Connection might not be available (e.g. pure unit test) – nothing to clean.
            return;
        }

        foreach ($databases as $database) {
            $name = $database->name;

            DB::connection('mysql')->statement("DROP DATABASE IF EXISTS `{$name}`");
            DB::connection('mysql')->statement("DROP USER IF EXISTS '{$name}'@'localhost'");
            DB::connection('mysql')->statement("DROP USER IF EXISTS '{$name}'@'%'");
        }

        if (! empty($databases)) {
            DB::connection('mysql')->statement('FLUSH PRIVILEGES');
        }
    }
}
