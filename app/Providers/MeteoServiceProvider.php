<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MeteoService;

class MeteoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('meteo', function(){
            return new MeteoService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 
    }
}
