<?php

use App\Models\Hub;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * HubController@store is the crown-jewel provisioning path: it creates the
 * `hubs` row, a real tenant MySQL database + DB user (GRANT), hydrates the
 * tenant schema, and updates the tenant `admin` user. These tests exercise
 * the real thing end-to-end (no mocking), so they must live here (DatabaseMigrations
 * + ProvisionsHubs, no wrapping transaction).
 */
function tenantDatabaseExists(string $name): bool
{
    return DB::connection('mysql')->selectOne(
        'SELECT SCHEMA_NAME FROM information_schema.schemata WHERE SCHEMA_NAME = ?',
        [$name]
    ) !== null;
}

test('a teacher creating their own hub gets a fully provisioned, auto-activated tenant', function () {
    // hub_default_creating must be 'users' (the real column default) so the
    // tenant `users` table is seeded and an `admin` user actually exists for
    // HubController@store to update; the ProvisionsHubs/UserFactory default
    // of 'all_empty' only migrates empty tables and would leave the
    // controller updating a null $admin (a pre-existing app quirk, not
    // something this test suite should paper over).
    $teacher = $this->createTeacher(['hub_default_creating' => 'users']);

    $response = $this->actingAs($teacher)->post('http://admin.localhost/hubs', [
        'hub' => 'selfmadehub',
        'password' => 'secret123',
        'password_confirmation' => 'secret123',
        'teacher' => $teacher->username,
        'username' => 'admin',
        'name' => 'Hub Admin',
        'email' => 'hubadmin@example.test',
        'bio' => 'Hello there',
        'birthday' => '2000-01-01',
        'city' => 'Leipzig',
        'country' => 'Germany',
        'centimeters' => '180',
    ]);

    $response->assertRedirect('/');

    $hub = Hub::where('name', 'selfmadehub')->firstOrFail();
    expect((int) $hub->teacher_id)->toBe($teacher->id);
    expect($hub->password)->not->toBeEmpty();

    $dbName = env('DB_DATABASE', 'testing').'_'.$hub->id;
    expect(tenantDatabaseExists($dbName))->toBeTrue();

    $admin = $this->withinHub($hub, fn () => User::where('username', 'admin')->first());

    expect($admin)->not->toBeNull();
    expect($admin->name)->toBe('Hub Admin');
    expect($admin->email)->toBe('hubadmin@example.test');
    expect($admin->bio)->toBe('Hello there');
    expect($admin->city)->toBe('Leipzig');
    expect((bool) $admin->is_active)->toBeTrue(); // self-created hubs are trusted immediately
});

test('a teacher whose default is all_empty still gets a working dba admin user', function () {
    $teacher = $this->createTeacher(['hub_default_creating' => 'all_empty']);

    $response = $this->actingAs($teacher)->post('http://admin.localhost/hubs', [
        'hub' => 'emptyhub',
        'password' => 'secret123',
        'password_confirmation' => 'secret123',
        'teacher' => $teacher->username,
        'username' => 'admin',
        'name' => 'Hub Admin',
        'email' => 'hubadmin@example.test',
    ]);

    $response->assertRedirect('/');

    $hub = Hub::where('name', 'emptyhub')->firstOrFail();
    expect(tenantDatabaseExists(env('DB_DATABASE', 'testing').'_'.$hub->id))->toBeTrue();

    // The all_empty creating mode migrates empty tables and seeds no admin, so
    // HubController@store must create one itself (previously it fatally called
    // ->update() on null).
    $admin = $this->withinHub($hub, fn () => User::where('username', 'admin')->first());

    expect($admin)->not->toBeNull()
        ->and($admin->name)->toBe('Hub Admin')
        ->and($admin->role)->toBe('dba')
        ->and((bool) $admin->is_active)->toBeTrue();
});

test('store provisions the avatar upload into the tenant admin user', function () {
    Storage::fake('local');

    $teacher = $this->createTeacher(['hub_default_creating' => 'users']);

    $avatar = UploadedFile::fake()->image('avatar.jpg', 300, 300);

    $response = $this->actingAs($teacher)->post('http://admin.localhost/hubs', [
        'hub' => 'avatarhub',
        'password' => 'secret123',
        'password_confirmation' => 'secret123',
        'teacher' => $teacher->username,
        'username' => 'admin',
        'name' => 'Hub Admin',
        'email' => 'hubadmin@example.test',
        'avatar' => $avatar,
    ]);

    $response->assertRedirect('/');

    $hub = Hub::where('name', 'avatarhub')->firstOrFail();
    $admin = $this->withinHub($hub, fn () => User::where('username', 'admin')->first());

    expect($admin->avatar)->toStartWith('avatars/');
    expect($admin->avatar)->toEndWith('.webp');
    Storage::disk('local')->assertExists($admin->avatar);
});

test('a hub created by someone else for a teacher is not auto-activated', function () {
    $teacher = $this->createTeacher(['hub_default_creating' => 'users']);

    $response = $this->withSession(['register_hub_name' => 'guestmadehub'])
        ->post('http://admin.localhost/hubs', [
            'hub' => 'guestmadehub',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'teacher' => $teacher->username,
            'username' => 'admin',
            'name' => 'Hub Admin',
            'email' => 'hubadmin@example.test',
        ]);

    $hub = Hub::where('name', 'guestmadehub')->firstOrFail();
    expect((int) $hub->teacher_id)->toBe($teacher->id);

    $response->assertRedirect('http://guestmadehub.localhost');

    $admin = $this->withinHub($hub, fn () => User::where('username', 'admin')->first());
    expect((bool) $admin->is_active)->toBeFalse(); // must be activated by the teacher
});

test('guest registration is rejected when the hub name was not pre-issued in the session', function () {
    $teacher = $this->createTeacher(['hub_default_creating' => 'users']);

    $response = $this->withSession(['register_hub_name' => 'expectedname'])
        ->post('http://admin.localhost/hubs', [
            'hub' => 'differentname',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'teacher' => $teacher->username,
            'username' => 'admin',
            'name' => 'Hub Admin',
            'email' => 'hubadmin@example.test',
        ]);

    $response->assertSessionHasErrors('hub');
    expect(Hub::where('name', 'differentname')->exists())->toBeFalse();
});

test('the tenant grant actually works: the tenant db user can connect and query its own database', function () {
    $teacher = $this->createTeacher(['hub_default_creating' => 'users']);

    $this->actingAs($teacher)->post('http://admin.localhost/hubs', [
        'hub' => 'grantcheckhub',
        'password' => 'secret123',
        'password_confirmation' => 'secret123',
        'teacher' => $teacher->username,
        'username' => 'admin',
        'name' => 'Hub Admin',
        'email' => 'hubadmin@example.test',
    ]);

    $hub = Hub::where('name', 'grantcheckhub')->firstOrFail();
    $dbName = env('DB_DATABASE', 'testing').'_'.$hub->id;

    $pdo = new PDO(
        'mysql:host='.config('database.connections.mysql.host').';dbname='.$dbName,
        $dbName,
        $hub->password
    );

    $tables = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);

    expect($tables)->toContain('users');
});
