<?php

namespace App\Models;

use App\Facades\RequestHub;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Hub extends Model
{
    protected $table = 'hubs';

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($hub) {

            //delete all old photos from disk

            RequestHub::setHubDB($hub->id);

            if (RequestHub::hasTable('photos')) {
                $photos = Photo::all();
                foreach ($photos as $photo) {
                    $photo->delete();
                }
            }

            if (RequestHub::hasTable('users')) {
                $users = User::all();
                foreach ($users as $user) {
                    $user->delete();
                }
            }

            //set primary db
            RequestHub::setDefaultDB();

            DB::statement('DROP DATABASE IF EXISTS '.env('DB_DATABASE').'_'.$hub->id.';');
            DB::statement("DROP USER IF EXISTS '".env('DB_DATABASE').'_'.$hub->id."'@'%';");
            DB::statement("DROP USER IF EXISTS '".env('DB_DATABASE').'_'.$hub->id."'@'%';");
        });
    }

    protected $fillable = ['teacher_id', 'password', 'name', 'generation', 'query_level'];

    public function teacher()
    {
        return $this->belongsTo(\App\Models\User::class, 'teacher_id');
    }

    public function getHasWorkingUserAttribute()
    {
        RequestHub::setHubDB($this->id);

        if (RequestHub::hasTable('users')) {
            if (Schema::hasColumn('users', 'id') && Schema::hasColumn('users', 'password') &&
               Schema::hasColumn('users', 'username') && Schema::hasColumn('users', 'role') &&
               Schema::hasColumn('users', 'created_at')) {
                if (User::where('role', '=', 'dba')->count() > 0) {
                    return true;
                }
            }
        }

        return false;
    }

    // Getter for 'activated' attribute
    public function getActivatedAttribute()
    {
        RequestHub::setHubDB($this->id);

        if (RequestHub::hasTable('users')) {
            return User::where('role', '=', 'dba')->first()?->is_active ?? false;
        }

        return false;
    }

    // Setter for 'activated' attribute
    public function setActivatedAttribute($value)
    {
        RequestHub::setHubDB($this->id);

        $user = User::where('role', '=', 'dba')->first();

        if(!$user) {
            $user = User::where('name', 'admin')->first();
            if($user) {
                $user->role = 'dba';
            }
            else {
                $user = User::create([
                    'username' => 'admin',
                    'name' => 'admin',
                    'email' => 'admin@instahub.test',
                    'password' => bcrypt(substr(uniqid(), 8)),
                    'avatar' => 'avatar.png',
                    'is_active' => true,
                    'role' => 'dba',
                ]);
            }
        }

        $user->is_active = $value;
        $user->save();
    }

    public function getAdminAttribute()
    {
        RequestHub::setHubDB($this->id);

        if (RequestHub::hasTable('users')) {
            return User::where('role', '=', 'dba')->first()?->name;
        }

        return null;
    }

    public function getReadonlyAttribute()
    {
        //select root user
        RequestHub::setDefaultDB();
        //checks for privilege to update in selected database, this is only given in this case if user have all privilegs
        $r = DB::select('select Update_priv from mysql.db where db=? and User =?', [env('DB_DATABASE').'_'.$this->id, env('DB_DATABASE').'_'.$this->id]);
        $r = (array) $r;
        if (current((array) $r[0]) == 'Y') {
            return false;
        } else {
            return true;
        }
    }

    public function setReadonlyAttribute($value)
    {
        if ($value) {
            DB::statement('REVOKE ALL ON ' . env('DB_DATABASE') . '_' . $this->id . ".* FROM '" . env('DB_DATABASE') . '_' . $this->id . "'@'%';");
            DB::statement('GRANT SELECT ON ' . env('DB_DATABASE') . '_' . $this->id . ".* TO '" . env('DB_DATABASE') . '_' . $this->id . "'@'%';");
            DB::statement('GRANT CREATE, INSERT ON ' . env('DB_DATABASE') . '_' . $this->id . ".analytics TO '" . env('DB_DATABASE') . '_' . $this->id . "'@'%';");
            DB::statement('REVOKE CREATE ON ' . env('DB_DATABASE') . '_' . $this->id . ".analytics FROM '" . env('DB_DATABASE') . '_' . $this->id . "'@'%';");
            DB::statement('GRANT UPDATE (remember_token, updated_at) ON ' . env('DB_DATABASE') . '_' . $this->id . ".users TO '" . env('DB_DATABASE') . '_' . $this->id . "'@'%';");
            DB::statement('GRANT SELECT, INSERT, UPDATE, DELETE ON ' . env('DB_DATABASE') . '_' . $this->id . ".sessions TO '" . env('DB_DATABASE') . '_' . $this->id . "'@'%';");
            if (config('app.allow_public_db_access')) {
                DB::statement('REVOKE ALL ON ' . env('DB_DATABASE') . '_' . $this->id . ".* FROM '" . env('DB_DATABASE') . '_' . $this->id . "'@'%'");
                DB::statement('GRANT SELECT ON ' . env('DB_DATABASE') . '_' . $this->id . ".* TO '" . env('DB_DATABASE') . '_' . $this->id . "'@'%';");
                DB::statement('GRANT CREATE, INSERT ON ' . env('DB_DATABASE') . '_' . $this->id . ".analytics TO '" . env('DB_DATABASE') . '_' . $this->id . "'@'%';");
                DB::statement('REVOKE CREATE ON ' . env('DB_DATABASE') . '_' . $this->id . ".analytics FROM '" . env('DB_DATABASE') . '_' . $this->id . "'@'%';");
                DB::statement('GRANT SELECT, INSERT, UPDATE, DELETE ON ' . env('DB_DATABASE') . '_' . $this->id . ".sessions TO '" . env('DB_DATABASE') . '_' . $this->id . "'@'%';");
            }
        } else {
            DB::statement('GRANT ALL ON ' . env('DB_DATABASE') . '_' . $this->id . ".* TO '" . env('DB_DATABASE') . '_' . $this->id . "'@'%' IDENTIFIED BY '" . $this->password . "';");
            if (config('app.allow_public_db_access')) {
                DB::statement('GRANT ALL ON ' . env('DB_DATABASE') . '_' . $this->id . ".* TO '" . env('DB_DATABASE') . '_' . $this->id . "'@'%' IDENTIFIED BY '" . $this->password . "';");
            }
        }
    }

    public function resetAdminPassword()
    {
        $password = substr(uniqid(), 8);

        $this->admin_password = $password;

        return $password;
    }

    public function setAdminPasswordAttribute($value)
    {
        RequestHub::setHubDB($this->id);

        if (! RequestHub::hasTable('users')) {
            $this->migrateTable('users');
        } //to make sure that needed table exists

        $user = User::where('username', '=', 'admin')->first();

        if ($user) {
            $user->password = bcrypt($value);
            $user->save();
        } else {
            $user = User::create([
                'username' => 'admin',
                'name' => 'admin',
                'email' => 'admin@instahub.test',
                'password' => bcrypt($value),
                'avatar' => 'avatar.png',
                'is_active' => true,
            ]);
        }
    }

    public function changeTables($tables, $action)
    {
        RequestHub::setHubDB($this->id);

        foreach ($tables as $t) {
            if ($action == 'fill') {
                $this->fillTable($t);
            } elseif ($action == 'drop') {
                $this->dropTable($t);
            } elseif ($action == 'create') {
                $this->migrateTable($t);
            }
        }
    }

    public function migrateTable($tablename)
    {
        RequestHub::setHubDB($this->id);
        $this->dropTable($tablename);
        Artisan::call('migrate', ['--path' => "database/migrations/create/$tablename", '--force' => true]);
        Schema::dropIfExists('migrations'); //sorry laravel, but thats the only way.
    }

    public function fillTable($tablename)
    {
        RequestHub::setHubDB($this->id);

        $user = null;
        if ($tablename == 'users' && RequestHub::hasTable('users')) {
            $user = User::where('username', 'admin')->first();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $this->migrateTable($tablename);

        // create if not exist
        if (! RequestHub::hasTable($tablename)) {
            Artisan::call('migrate', ['--path' => "database/migrations/create/$tablename", '--force' => true]);
            Schema::dropIfExists('migrations'); //sorry laravel, but thats the only way.
        }

        // migrate
        Artisan::call('db:seed', ['--class' => 'Database\Seeders\Generation'.Auth::user()->hub_default_generation.'\\'.ucfirst($tablename).'TableSeeder', '--force' => true]);

        if ($tablename == 'users') {
            if ($user) {
                $user = User::create([
                    'username' => $user->username,
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'avatar' => $user->avatar,
                    'is_active' => $user->is_active,
                ]);
            } else {
                //create dummy dba for managing this hub
                $pw = substr(uniqid(), 8);
                $user = User::create([
                    'username' => 'admin',
                    'name' => 'admin',
                    'email' => 'admin@instahub.test',
                    'password' => bcrypt($pw),
                    'avatar' => 'avatar.png',
                    'is_active' => true,
                ]);
            }

            $user->role = 2; //dba - role is not massfillable for security reasons
            $user->save();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

    public function dropTable($tablename)
    {
        RequestHub::setHubDB($this->id);

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists($tablename);
        if ($tablename == 'users') {
            Schema::dropIfExists('password_resets');
        } //users migrates this table too.
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
