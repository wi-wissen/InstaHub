<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = ['photo_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function photo()
    {
        return $this->belongsTo(\App\Photo::class);
    }
}
