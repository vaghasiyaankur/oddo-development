<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Config;

class TimeZoneServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $GeneralSetting = GeneralSetting::first();
        
        if($GeneralSetting){
            date_default_timezone_set($GeneralSetting->time_zone);
        }
        
    }
}
