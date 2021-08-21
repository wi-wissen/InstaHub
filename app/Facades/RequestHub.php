<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class RequestHub extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'requestHub';
    }
}
