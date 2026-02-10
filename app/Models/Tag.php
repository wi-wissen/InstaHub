<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function photo(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Photo::class);
    }
}
