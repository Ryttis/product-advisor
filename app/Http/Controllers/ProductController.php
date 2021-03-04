<?php

namespace App\Http\Controllers;

use App\Facades\Meteo;
use App\Facades\Advisor;

class ProductController extends Controller
{
    /**
     * Display the specified places weather forecats and products suggestions.
     *
     * @param  string  $place
     * @return array
     */
    public function show($place): array
    {
        $forecast = Meteo::getForecast($place);
        $suggestion = Advisor::AdviceProduct($forecast);
        return $suggestion;
    }

}
