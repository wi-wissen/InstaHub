<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Schema;

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
        return $this->hasMany('App\Tag');
    }

    
    public function viewers()
    {
        return $this->hasMany('App\Analytic');
    }

    public static function boot() {
        parent::boot();
        
        self::deleting(function ($value) {
            //can't delete file couse stock images my be in use in other hubs. 
            //Storage::disk('local')->delete($entry->url);
            //TODO: Cronjob for deleting unneccesary images which leaves stockphots untuched.
        });

        self::created(function($model){
            // ... code here
           $model->updateTags();
        });

        self::updated(function($model){
            // ... code here
            $model->updateTags();
        });
    }

    public function updateTags() {
        if (Schema::hasTable('tags')) {
            $this->tags()->delete();
            preg_match_all('/#([a-zA-Z0-9äöüÄÖÜß]*)/', $this->description, $treffer);
            foreach ($treffer[1] as $tag) {
                $db_tag = new Tag;
                $db_tag->name = mb_strtolower($tag);
                $this->tags()->save($db_tag);
            }
        }
    }

    public function getHtmlAttribute() {
        $html = htmlspecialchars($this->description); //secure user input
        $html = preg_replace('/#([a-zA-Z0-9äöüÄÖÜß]*)/', "<a href='/tag/$1'>$0</a>", $html);
        $html = preg_replace('/@([a-zA-Z0-9äöüÄÖÜß]*)/', "<a href='/user/$1'>$0</a>", $html);
        return $html;
    }
}
