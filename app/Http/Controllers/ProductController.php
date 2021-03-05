<?php

namespace App\Http\Controllers;

use App\Facades\Meteo;
use App\Facades\Advisor;
use App\Models\Product;

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
     /**
     * Display the specified places weather forecats and products suggestions.
     *
     * @param  string  $place
     * @return array
     */
    public function index(): array
    {
        return Product::get()->all();
    }

}
