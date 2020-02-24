<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Schema;

use Storage;
use Config;
use App\Tags;
use App\Users;

class Hub extends Model
{
    protected $table = 'hubs';
	protected $fillable = ['teacher_id', 'password', 'name'];

    public function teacher()
    {
        return $this->belongsTo('App\User', 'teacher_id');
    }

    public function hasWorkingUser()
    {
        //set db
        Config::set("database.connections." . env('DB_DATABASE') . "_" . $this->id, array(
            'driver'    => 'mysql',
            'host'      => env('DB_HOST'),
            'database'  => env('DB_DATABASE') . "_" . $this->id,
            'username'  => env('DB_DATABASE') . "_" . $this->id,
            'password'  => $this->password,
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
        ));

        Config::set('database.default', env('DB_DATABASE') . "_" . $this->id);

        if (Schema::hasTable('users'))
        {
            if (Schema::hasColumn('users', 'id') && Schema::hasColumn('users', 'password') && 
               Schema::hasColumn('users', 'username') && Schema::hasColumn('users', 'role')&& 
               Schema::hasColumn('users', 'created_at'))
            {
                if (User::where('role', '=', 'dba')->count() > 0)
                {
                    return true;
                }
            } 
        }
        return false; 
    }
    public function activated()
    {
        //set db
        Config::set("database.connections." . env('DB_DATABASE') . "_" . $this->id, array(
            'driver'    => 'mysql',
            'host'      => env('DB_HOST'),
            'database'  => env('DB_DATABASE') . "_" . $this->id,
            'username'  => env('DB_DATABASE') . "_" . $this->id,
            'password'  => $this->password,
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
        ));

        Config::set('database.default', env('DB_DATABASE') . "_" . $this->id);
        
        $user = User::where('role', '=', 'dba')->first();

        if($user) {
            return $user->is_active;
        }
        else {
            return false;
        }
        
    }

    public function activate(Boolean $yes)
    {
        //set db
        Config::set("database.connections." . env('DB_DATABASE') . "_" . $this->id, array(
            'driver'    => 'mysql',
            'host'      => env('DB_HOST'),
            'database'  => env('DB_DATABASE') . "_" . $this->id,
            'username'  => env('DB_DATABASE') . "_" . $this->id,
            'password'  => $this->password,
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
        ));

        Config::set('database.default', env('DB_DATABASE') . "_" . $this->id);

        $user = User::where('role', '=', 'dba')->first();
        $user->is_active = $yes;
        $user->save();

    }

    public function adminname()
    {
        //set db
        Config::set("database.connections." . env('DB_DATABASE') . "_" . $this->id, array(
            'driver'    => 'mysql',
            'host'      => env('DB_HOST'),
            'database'  => env('DB_DATABASE') . "_" . $this->id,
            'username'  => env('DB_DATABASE') . "_" . $this->id,
            'password'  => $this->password,
            'charset'   => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix'    => '',
        ));

        Config::set('database.default', env('DB_DATABASE') . "_" . $this->id);

        return User::where('role', '=', 'dba')->first()->name;
    }

    public function readonly()
    {   
        //select root user
        Config::set('database.default', env('DB_CONNECTION'));
        //checks for privilege to update in selected database, this is only given in this case if user have all privilegs
        $r = \DB::select('select Update_priv from mysql.db where db=? and User =?', [env('DB_DATABASE') . "_" . $this->id,env('DB_DATABASE') . "_" . $this->id,]);
        $r = (array) $r;
        if(current((array) $r[0]) == "Y") {
            return false;
        }
        else {
            return true;
        }
    }
}
