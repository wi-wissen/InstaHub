<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Storage;
use App\Tags;

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

    public function tags()
    {
        return $this->hasMany('App\Tags');
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

        self::created(function($model){
            // ... code here
           $this->updateTags();
        });

        self::updated(function($model){
            // ... code here
            $this->updateTags();
        });
    }

    public function updateTags() {
        $this->tags()->delete();
        preg_match_all('/#([a-zA-Z0-9]*)/', $this->description, $treffer);
        foreach ($treffer[1] as $tag) {
            $db_tag = new Tags;
            $db_tag->name = strtolower($tag);

            $this->tags()->save($db_tag);
        }
        dd($treffer);
    }

    public function htmldescription() {
        return preg_replace('/#([a-zA-Z0-9]*)/', "<a href='/tag/$1'>$0</a>", htmlspecialchars($this->description));
    }
}
