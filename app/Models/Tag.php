<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function photo()
    {
        return $this->belongsTo(\App\Models\Photo::class);
    }
}
