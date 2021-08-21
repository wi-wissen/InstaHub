<?php

namespace App\Models;

use App\Facades\RequestHub;
use App\Tags;
use App\Users;
use Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Storage;

class Hub extends Model
{
    protected $table = 'hubs';
    protected $fillable = ['teacher_id', 'password', 'name'];

    public function teacher()
    {
        return $this->belongsTo(\App\Models\User::class, 'teacher_id');
    }

    public function hasWorkingUser()
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

    public function activated()
    {
        RequestHub::setHubDB($this->id);

        $user = User::where('role', '=', 'dba')->first();

        if ($user) {
            return $user->is_active;
        } else {
            return false;
        }
    }

    public function activate(Boolean $yes)
    {
        RequestHub::setHubDB($this->id);

        $user = User::where('role', '=', 'dba')->first();
        $user->is_active = $yes;
        $user->save();
    }

    public function adminname()
    {
        RequestHub::setHubDB($this->id);

        return User::where('role', '=', 'dba')->first()->name;
    }

    public function readonly()
    {
        //select root user
        RequestHub::setDefaultDB();
        //checks for privilege to update in selected database, this is only given in this case if user have all privilegs
        $r = \DB::select('select Update_priv from mysql.db where db=? and User =?', [env('DB_DATABASE').'_'.$this->id, env('DB_DATABASE').'_'.$this->id]);
        $r = (array) $r;
        if (current((array) $r[0]) == 'Y') {
            return false;
        } else {
            return true;
        }
    }
}
