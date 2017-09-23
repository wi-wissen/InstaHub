<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }
}
