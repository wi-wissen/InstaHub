<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'photo_id', 'body'];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function getHtmlAttribute()
    {
        $html = htmlspecialchars($this->body); //secure user input
        $html = preg_replace('/#([a-zA-Z0-9äöüÄÖÜß]*)/', "<a href='/tag/$1'>$0</a>", $html);
        $html = preg_replace('/@([a-zA-Z0-9äöüÄÖÜß]*)/', "<a href='/$1'>$0</a>", $html);

        return $html;
    }
}
