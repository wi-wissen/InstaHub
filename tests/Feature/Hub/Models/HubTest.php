<?php

use App\Models\Hub;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

/*
|--------------------------------------------------------------------------
| App\Models\Hub
|--------------------------------------------------------------------------
*/

it('belongs to a teacher', function () {
    $teacher = $this->createTeacher();
    $hub = Hub::factory()->create(['teacher_id' => $teacher->id]);

    expect($hub->teacher)->toBeInstanceOf(User::class);
    expect($hub->teacher->id)->toBe($teacher->id);
});

describe('tenant-backed accessors', function () {
    it('reports activated=true, an admin username, and a working user once the hub is provisioned with users', function () {
        $hub = $this->createHub(creating: 'users');

        // `activated` proxies the raw (uncast) `is_active` column, so assert
        // truthiness rather than strict boolean identity.
        expect($hub->activated)->toBeTruthy();
        expect($hub->admin)->toBe('admin');
        expect($hub->has_working_user)->toBeTrue();
    });

    it('reports activated=false, no admin and no working user for an empty hub', function () {
        $hub = $this->createHub(creating: 'all_empty');

        expect($hub->activated)->toBeFalse();
        expect($hub->admin)->toBeNull();
        expect($hub->has_working_user)->toBeFalse();
    });

    it('setActivatedAttribute toggles the dba user\'s is_active flag', function () {
        $hub = $this->createHub(creating: 'users');

        expect($hub->activated)->toBeTruthy();

        $hub->activated = false;
        expect($hub->activated)->toBeFalsy();

        $hub->activated = true;
        expect($hub->activated)->toBeTruthy();
    });

    it('setActivatedAttribute creates a dba user from scratch when none exists', function () {
        $hub = $this->createHub(creating: 'all_empty');

        expect($hub->admin)->toBeNull();

        $hub->activated = true;

        expect($hub->admin)->toBe('admin');
        expect($hub->activated)->toBeTruthy();
    });

    it('is not readonly right after provisioning (the tenant user has full grants)', function () {
        $hub = $this->createHub();

        expect($hub->readonly)->toBeFalse();
    });

    it('setReadonlyAttribute revokes write privileges, and unsetting restores them', function () {
        $hub = $this->createHub();

        $hub->readonly = true;
        expect($hub->readonly)->toBeTrue();

        // A freshly loaded instance (no cached accessor) reflects the same
        // state directly from `mysql.db`.
        expect($hub->fresh()->readonly)->toBeTrue();

        $hub->readonly = false;
        expect($hub->readonly)->toBeFalse();
        expect($hub->fresh()->readonly)->toBeFalse();
    });
});

describe('resetAdminPassword()', function () {
    it('generates a password and updates (or creates) the admin user', function () {
        $hub = $this->createHub(creating: 'all_empty');

        $password = $hub->resetAdminPassword();

        expect($password)->toBeString();
        expect($password)->not->toBeEmpty();

        $this->withinHub($hub, function () use ($password) {
            $admin = User::where('username', 'admin')->first();

            expect($admin)->not->toBeNull();
            expect(Hash::check($password, $admin->password))->toBeTrue();
        });
    });
});

describe('changeTables() / migrateTable() / fillTable() / dropTable()', function () {
    it('drops a table via dropTable()', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, fn () => expect(Schema::hasTable('photos'))->toBeTrue());

        $hub->dropTable('photos');

        $this->withinHub($hub, fn () => expect(Schema::hasTable('photos'))->toBeFalse());
    });

    it('recreates a table via migrateTable() after it has been dropped', function () {
        $hub = $this->createHub();

        $hub->dropTable('photos');
        $hub->migrateTable('photos');

        $this->withinHub($hub, function () {
            expect(Schema::hasTable('photos'))->toBeTrue();
            expect(DB::table('photos')->count())->toBe(0);
        });
    });

    it('fillTable() seeds data and, for users, guarantees a dba admin user', function () {
        $hub = $this->createHub(creating: 'all_empty');

        $hub->fillTable('users');

        $this->withinHub($hub, function () {
            expect(User::count())->toBeGreaterThan(0);
            expect(User::where('role', 'dba')->exists())->toBeTrue();
        });
    });

    it('changeTables() applies the requested action to every given table', function () {
        $hub = $this->createHub();

        $hub->changeTables(['photos', 'tags'], 'drop');

        $this->withinHub($hub, function () {
            expect(Schema::hasTable('photos'))->toBeFalse();
            expect(Schema::hasTable('tags'))->toBeFalse();
        });

        $hub->changeTables(['photos', 'tags'], 'create');

        $this->withinHub($hub, function () {
            expect(Schema::hasTable('photos'))->toBeTrue();
            expect(Schema::hasTable('tags'))->toBeTrue();
        });
    });
});

describe('deleting()', function () {
    it('drops the tenant database and its DB user when the hub is deleted', function () {
        $hub = $this->createHub();
        $dbName = env('DB_DATABASE', 'testing').'_'.$hub->id;

        expect(DB::select('SELECT SCHEMA_NAME FROM information_schema.schemata WHERE SCHEMA_NAME = ?', [$dbName]))->toHaveCount(1);

        $hub->delete();

        expect(DB::select('SELECT SCHEMA_NAME FROM information_schema.schemata WHERE SCHEMA_NAME = ?', [$dbName]))->toHaveCount(0);
        expect(DB::select("SELECT User FROM mysql.user WHERE User = ?", [$dbName]))->toHaveCount(0);
    });
});
