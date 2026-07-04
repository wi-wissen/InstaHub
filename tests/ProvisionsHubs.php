<?php

namespace Tests;

use App\Facades\RequestHub;
use App\Models\Hub;
use App\Models\User;
use Closure;
use Illuminate\Support\Facades\DB;

/**
 * Test helpers for InstaHub's multi-tenant ("hub") architecture.
 *
 * Every hub gets its own MySQL/MariaDB database (`<DB_DATABASE>_<hub_id>`)
 * with a dedicated DB user, exactly mirroring what HubController@store does in
 * production. These helpers let feature/unit tests create fully provisioned
 * hubs and run assertions "inside" a hub (i.e. with the tenant DB active and
 * RequestHub::isHub() returning true).
 *
 * Requires a MySQL/MariaDB server the test user can CREATE/DROP DATABASE and
 * CREATE USER / GRANT on (root in CI). Tenant databases are torn down in
 * Tests\TestCase::tearDown().
 */
trait ProvisionsHubs
{
    /**
     * Create an active teacher in the primary database.
     */
    protected function createTeacher(array $attributes = []): User
    {
        RequestHub::setDefaultDB();

        $user = User::create(array_merge([
            'username' => 'teacher_'.uniqid(),
            'name' => 'Teacher',
            'email' => 'teacher_'.uniqid().'@instahub.test',
            'password' => bcrypt('password'),
            'role' => 'teacher',
            'is_active' => true,
            'hub_default_generation' => 1,
            'hub_default_creating' => 'all_empty',
            'hub_default_query_level' => 1,
        ], $attributes));

        // email_verified_at is guarded, so it is dropped by mass assignment
        // above; set it explicitly so the teacher passes the `verified`
        // middleware on the admin domain.
        if (! array_key_exists('email_verified_at', $attributes)) {
            $user->forceFill(['email_verified_at' => now()])->save();
        }

        return $user;
    }

    /**
     * Provision a fully working hub, mirroring HubController@store.
     *
     * @param  string  $creating  one of: users | all_empty | all_full
     */
    protected function createHub(?User $teacher = null, array $attributes = [], string $creating = 'all_empty'): Hub
    {
        RequestHub::setDefaultDB();

        $teacher ??= $this->createTeacher();

        $hub = Hub::create(array_merge([
            'name' => 'hub'.strtolower(str_replace('.', '', uniqid())),
            'teacher_id' => $teacher->id,
            'password' => 'secret'.rand(1000, 9999),
            'generation' => $teacher->hub_default_generation,
            'query_level' => $teacher->hub_default_query_level,
        ], $attributes));

        $dbName = env('DB_DATABASE', 'testing').'_'.$hub->id;

        DB::statement("CREATE DATABASE IF NOT EXISTS `{$dbName}`");
        DB::statement("GRANT ALL ON `{$dbName}`.* TO '{$dbName}'@'localhost' IDENTIFIED BY '{$hub->password}'");

        RequestHub::useHubDB($hub->id, function () use ($hub, $creating) {
            if ($creating === 'users') {
                $hub->changeTables(['users'], 'fill');
            } elseif ($creating === 'all_full') {
                $hub->changeTables(['users', 'photos', 'tags', 'likes', 'follows', 'comments', 'analytics', 'ads'], 'fill');
            } else { // all_empty
                $hub->changeTables(['users', 'photos', 'tags', 'likes', 'follows', 'comments', 'analytics', 'ads'], 'create');
            }
        });

        RequestHub::setDefaultDB();

        return $hub;
    }

    /**
     * Run a callback with the given hub's tenant database active and
     * RequestHub reporting hub context (isHub() === true).
     */
    protected function withinHub(Hub $hub, Closure $callback)
    {
        $previousHost = $_SERVER['HTTP_HOST'] ?? null;
        $_SERVER['HTTP_HOST'] = $hub->name.'.'.$this->hubBaseDomain();

        app()->forgetInstance('requestHub');
        RequestHub::clearResolvedInstances();
        app('requestHub'); // HubHelper constructor detects the hub subdomain

        try {
            return $callback($hub);
        } finally {
            RequestHub::setDefaultDB();
            if ($previousHost === null) {
                unset($_SERVER['HTTP_HOST']);
            } else {
                $_SERVER['HTTP_HOST'] = $previousHost;
            }
            app()->forgetInstance('requestHub');
            RequestHub::clearResolvedInstances();
        }
    }

    /**
     * Prepare the environment so a subsequent HTTP request ($this->get(...))
     * to an absolute hub URL is handled in hub context.
     *
     * Usage: $this->onHub($hub)->get('http://'.$hub->name.'.localhost/');
     */
    protected function onHub(Hub $hub): static
    {
        $_SERVER['HTTP_HOST'] = $hub->name.'.'.$this->hubBaseDomain();
        app()->forgetInstance('requestHub');
        RequestHub::clearResolvedInstances();

        return $this->withServerVariables(['HTTP_HOST' => $_SERVER['HTTP_HOST']]);
    }

    /**
     * Absolute base URL for a hub subdomain, e.g. "http://foo.localhost".
     */
    protected function hubUrl(Hub $hub, string $path = '/'): string
    {
        return 'http://'.$hub->name.'.'.$this->hubBaseDomain().'/'.ltrim($path, '/');
    }

    protected function hubBaseDomain(): string
    {
        // domain_hub is like "{subdomain}.localhost" -> "localhost"
        return trim(str_replace('{subdomain}', '', config('app.domain_hub')), '.');
    }
}
