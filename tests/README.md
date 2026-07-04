# InstaHub Test Suite (Pest)

InstaHub is a **multi-tenant Laravel + Livewire app**. Each "hub" (subdomain)
lives in its **own MySQL/MariaDB database** (`<DB_DATABASE>_<hub_id>`) with its
own DB user. The active database is switched at runtime by
`App\Facades\RequestHub` (backed by `App\Helpers\HubHelper`) based on
`$_SERVER['HTTP_HOST']`.

Tests run against a real **MariaDB/MySQL** server (never SQLite): the code uses
`SHOW TABLES`, `FIELD()`, `CREATE/DROP DATABASE`, `GRANT ... IDENTIFIED BY`, and
the `mysql`/`information_schema` catalogs.

## Directory layout & database lifecycle

| Directory                | Trait applied (via `tests/Pest.php`)            | Use for |
|--------------------------|-------------------------------------------------|---------|
| `tests/Unit`             | `RefreshDatabase` (transactional)               | Pure model/rule/helper logic. |
| `tests/Feature/Auth`     | `RefreshDatabase`                               | Login, register, password reset, verification, middleware. |
| `tests/Feature/Admin`    | `RefreshDatabase`                               | Controllers/routes on `admin.localhost` (primary DB only). |
| `tests/Feature/Controllers` | `RefreshDatabase`                            | Controllers on the primary DB / main domain. |
| `tests/Feature/Livewire` | `RefreshDatabase`                               | Livewire components that only touch the primary DB. |
| `tests/Feature/Hub`      | `DatabaseMigrations` + `ProvisionsHubs`         | **Anything that provisions or uses a tenant DB.** |

**Why the split:** provisioning a hub runs `CREATE DATABASE` / `GRANT`, which
implicitly commits and breaks the transactional `RefreshDatabase`. So tenant
tests use `DatabaseMigrations` (no wrapping transaction). Tenant databases are
dropped automatically after every test in `Tests\TestCase::tearDown()`.

> Put a test in `Feature/Hub` **iff** it calls `createHub()` / `withinHub()` /
> `onHub()` or otherwise switches to a tenant DB. Everything else goes in the
> transactional directories (much faster).

## Golden rules

1. **Use factories, not `User::create([...])`.** `email_verified_at`, `role`
   nuances etc. are guarded; `User::create()` silently drops guarded fields and
   your user ends up unverified → redirected to `/email/verify`. Factories
   bypass mass-assignment protection.
   - `User::factory()->teacher()->create()` / `->admin()` / `->dba()` /
     `->user()` / `->unverified()` / `->inactive()`.
   - Tenant model factories: `Photo`, `Comment`, `Like`, `Tag`, `Ad`,
     `Analytic`. `Hub::factory()` inserts a row **without** provisioning a tenant
     DB (fine for admin listing tests only).
2. **Views need no Vite build** — `TestCase::setUp()` calls `withoutVite()`
   globally. Just `->assertOk()`.
3. **Domains matter.** Routes are grouped by domain:
   - main site: `http://localhost/`
   - admin area: `http://admin.localhost/`
   - a hub: `http://<hubname>.localhost/`
   Always request **absolute URLs** so the correct route group matches.

## Hub helpers (available in `tests/Feature/Hub`, via `ProvisionsHubs`)

```php
// Fully provision a hub (real tenant DB + tables), mirroring HubController@store.
$hub = $this->createHub();                       // empty tables (all_empty)
$hub = $this->createHub(creating: 'users');      // seed users generation
$hub = $this->createHub(creating: 'all_full');   // seed all tables
$teacher = $this->createTeacher();               // active teacher in primary DB
$hub = $this->createHub($teacher);

// Run code with the tenant DB active and RequestHub::isHub() === true.
$user = $this->withinHub($hub, function () {
    return \App\Models\User::factory()->create();   // created in the tenant DB
});

// Make an authenticated HTTP request in hub context:
$this->onHub($hub)
    ->actingAs($user)                                 // $user fetched via withinHub()
    ->get($this->hubUrl($hub, '/'))                   // http://<hub>.localhost/
    ->assertOk();
```

Notes:
- Tenant models (`Photo`, `Comment`, `Like`, `Tag`, `Ad`, `Analytic`) only exist
  inside a hub — create/query them inside `withinHub()` or during an `onHub()`
  request.
- `RequestHub` is a facade; mock hub context in *unit* tests with
  `RequestHub::shouldReceive('isHub')->andReturn(true)` etc.

## Running

```bash
php vendor/bin/pest                 # whole suite
php vendor/bin/pest tests/Unit      # a directory
php vendor/bin/pest --filter=foo
```

Requires a reachable MySQL/MariaDB (`DB_HOST`/`DB_PORT`/`DB_USERNAME`/
`DB_PASSWORD`/`DB_DATABASE` — see `phpunit.xml`) whose user may
`CREATE/DROP DATABASE`, `CREATE USER` and `GRANT` (root in CI). The DB server
must sit on the **same host** as the app (so `127.0.0.1` resolves to `localhost`
and the hubs' `@'localhost'` grants match) — CI installs MariaDB directly on the
runner rather than using a service container.
