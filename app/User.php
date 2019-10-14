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
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->email;
    }

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
        return $this->hasMany('App\Photo')->orderBy('created_at', 'desc');
    }

    public function visits()
    {
        return $this->hasMany('App\Analytic')->orderBy('created_at', 'desc');
    }

    public function isfollowing($user)
    {
        //dd($this->following()->get()->where('id', $user->id)->count());
        return ($this->following()->get()->where('id', $user->id)->count());
    }

    public function hubs()
    {
        return $this->hasMany('App\Hub', 'teacher_id', 'id');
    }

    public function age()
    {
        $now = new DateTime();
        if ($this->birthday != null) {
            $interval = $this->birthday->diff($now);
            if ($interval->y > 2000) { //age set to 0
                return 'unknown';
            } else {
                return $interval->y;
            }
        } else {
            return 'unknown';   
        }

    }

    public static function boot() {
        parent::boot();

        self::deleting(function ($value) {
            if (User::where('avatar', '=', $value->avatar)->count() == 1 &&
                (!preg_match('/avatars\/[0-9]*\.jpg/', $value->avatar) ||
                $value->avatar == "avatar.jpg"))
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
            flash(__('Your account is not activated!'))->warning()->important();
            return false;
        }

    }

    //for unencrypted passwords after csv import
    public function cryptpw() {
        if (!(substr( $this->password, 0, 7 ) === "$2y$10$")) {
            $this->password = bcrypt($this->password);
            $this->save();
        }
    }
}
