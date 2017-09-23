<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Storage;

class Photo extends Model
{
    protected $table = 'photos';
	protected $fillable = ['user_id', 'description', 'url'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public static function boot() {
        parent::boot();
        
        self::deleting(function ($value) {
            if (Photo::where('url', '=', $value->url)->count == 1)
            {
                //prevent deleting a file who is in use in an other photo
                Storage::disk('local')->delete($value->url);
            }
        });
    }
}
