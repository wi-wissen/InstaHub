<?php

namespace App\Models;

use App\Collections\PhotoCollection;
use App\Facades\RequestHub;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $table = 'photos';

    protected $fillable = ['user_id', 'description', 'url'];

    /**
     * Create a new Eloquent Collection instance.
     *
     * @param  array  $models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function newCollection(array $models = [])
    {
        return new PhotoCollection($models);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function likes()
    {
        return $this->hasMany(\App\Models\Like::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\Comment::class);
    }

    public function tags()
    {
        return $this->hasMany(\App\Models\Tag::class);
    }

    public function viewers()
    {
        return $this->hasMany(\App\Models\Analytic::class);
    }

    public static function boot()
    {
        parent::boot();

        self::deleting(function ($model) {
            if (Storage::disk('local')->get($model->url)) {
                Storage::disk('local')->delete($model->url);
            }
            // given photos are stored in `public`
        });

        self::created(function ($model) {
            // ... code here
            $model->updateTags();
        });

        self::updated(function ($model) {
            // ... code here
            $model->updateTags();
        });
    }

    public function updateTags()
    {
        if (RequestHub::hasTable('tags')) {
            $this->tags()->delete();
            preg_match_all('/#([a-zA-Z0-9äöüÄÖÜß]*)/', $this->description, $treffer);
            foreach ($treffer[1] as $tag) {
                $db_tag = new Tag;
                $db_tag->name = mb_strtolower($tag);
                $this->tags()->save($db_tag);
            }
        }
    }

    public function getHtmlAttribute()
    {
        $html = htmlspecialchars($this->description); //secure user input
        $html = preg_replace('/#([a-zA-Z0-9äöüÄÖÜß]*)/', "<a href='/tag/$1'>$0</a>", $html);
        $html = preg_replace('/@([a-zA-Z0-9äöüÄÖÜß]*)/', "<a href='/$1'>$0</a>", $html);

        return $html;
    }
}
