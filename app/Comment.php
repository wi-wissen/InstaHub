<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'photo_id', 'body'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
