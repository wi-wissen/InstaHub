<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Schema;

use Storage;
use App\Tags;

class Hub extends Model
{
    protected $table = 'hubs';
	protected $fillable = ['teacher_id', 'password', 'name'];

    public function teacher()
    {
        return $this->belongsTo('App\User', 'teacher_id');
    }
}
