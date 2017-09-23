<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Storage;
use DateTime;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $dates = ['birthday'];
    protected $fillable = [
        'username','name', 'email', 'password','bio', 'avatar', 'birthday', 'city', 'country', 'gender', 'centimeters', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function following ()
    {
        //return $this->hasMany('App\Follow', 'follower_id');
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'follower_id')->withTimestamps();
    }

    public function followers ()
    {
        //return $this->hasMany('App\Follow', 'following_id');
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'following_id')->withTimestamps();
    }

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function isfollowing($user)
    {
        //dd($this->following()->get()->where('id', $user->id)->count());
        return ($this->following()->get()->where('id', $user->id)->count());
    }

    public function age()
    {
        $now = new DateTime();
        if ($this->birthday != null) {
            $interval = $this->birthday->diff($now);
            return $interval->y;
        } else {
            return 'unknown';   
        }

    }

    public static function boot() {
        parent::boot();
        
        self::deleting(function ($value) {
            if (User::where('avatar', '=', $value->avatar)->count == 1)
            {
                //prevent deleting a file who is in use in an other avatar
                Storage::disk('local')->delete($value->avatar);
            }  
        });
    }

    public function allowed($role) {
        if ($this->is_active) {
            if ($role == "dba" && ($this->role == "dba" || $this->role == "teacher" || $this->role == "admin")) return true;
            else if ($role == "teacher" && ($this->role == "teacher" || $this->role == "admin")) return true;
            else if ($role == "admin" && ($this->role == "admin")) return true;
            else if ($role == "user") return true;
            else return false;
        } else {
            flash('Your account is not activated!')->warning()->important();
            return false;
        }

    }
}
