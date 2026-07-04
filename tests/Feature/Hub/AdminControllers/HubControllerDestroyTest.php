<?php

use App\Models\Hub;
use App\Models\User;
use Illuminate\Support\Facades\DB;

function adminControllersTenantDbExists(string $name): bool
{
    return DB::connection('mysql')->selectOne(
        'SELECT SCHEMA_NAME FROM information_schema.schemata WHERE SCHEMA_NAME = ?',
        [$name]
    ) !== null;
}

/**
 * ProvisionsHubs::createTeacher() inserts via User::create(), and
 * `email_verified_at` is deliberately not mass-assignable, so it is silently
 * dropped there, leaving the teacher unverified. That's invisible on
 * hub-domain requests but the admin domain's `verified` middleware enforces
 * it for real, so any test authenticating as a createTeacher()-made user
 * against admin.localhost needs it marked verified first.
 */
function destroyTestVerifyEmail(User $user): User
{
    $user->forceFill(['email_verified_at' => now()])->save();

    return $user;
}

// --- destroy: real provisioning + real drop ---

test('owner teacher can destroy their hub and its tenant database is dropped', function () {
    $teacher = destroyTestVerifyEmail($this->createTeacher());
    $hub = $this->createHub($teacher);

    $dbName = env('DB_DATABASE', 'testing').'_'.$hub->id;
    expect(adminControllersTenantDbExists($dbName))->toBeTrue();

    $response = $this->actingAs($teacher)->delete("http://admin.localhost/hubs/{$hub->id}");

    $response->assertOk();
    $response->assertJson(['destroyed' => true]);

    expect(Hub::find($hub->id))->toBeNull();
    expect(adminControllersTenantDbExists($dbName))->toBeFalse();
});

test('admin can destroy any hub and its tenant database is dropped', function () {
    $teacher = $this->createTeacher();
    $hub = $this->createHub($teacher);
    $admin = User::factory()->admin()->create();

    $dbName = env('DB_DATABASE', 'testing').'_'.$hub->id;

    $response = $this->actingAs($admin)->delete("http://admin.localhost/hubs/{$hub->id}");

    $response->assertOk();
    $response->assertJson(['destroyed' => true]);

    expect(Hub::find($hub->id))->toBeNull();
    expect(adminControllersTenantDbExists($dbName))->toBeFalse();
});

test('destroying a hub also drops its dedicated tenant db user', function () {
    $teacher = destroyTestVerifyEmail($this->createTeacher());
    $hub = $this->createHub($teacher);
    $dbName = env('DB_DATABASE', 'testing').'_'.$hub->id;

    $this->actingAs($teacher)->delete("http://admin.localhost/hubs/{$hub->id}");

    $userExists = DB::connection('mysql')->selectOne(
        "SELECT User FROM mysql.user WHERE User = ?",
        [$dbName]
    );

    expect($userExists)->toBeNull();
});
