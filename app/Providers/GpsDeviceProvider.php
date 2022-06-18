<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\GpsDevice;

class GpsDeviceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GpsDevice::class, function ($app) {
            return new GpsDevice(config('app.distance-filter'));
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
