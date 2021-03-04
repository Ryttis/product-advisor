<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Meteo extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'meteo';
    }
}
