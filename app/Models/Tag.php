<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['photo_id', 'name'];

    public function photo(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Photo::class);
    }
}
