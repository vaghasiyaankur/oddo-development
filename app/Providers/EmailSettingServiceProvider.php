<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\EmailSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EmailSettingServiceProvider extends ServiceProvider
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
        if(Schema::hasTable('email_settings')) {
            $configuration = EmailSetting::first();

            if($configuration){
                $data = [
                    'transport' => 'smtp',
                    'host' => $configuration->host_name,
                    'port' => $configuration->port_name,
                    'encryption' => $configuration->encryption,
                    'username' => $configuration->username,
                    'password' => $configuration->password,
                    'from'   => [
                        'address' => $configuration->from_email,
                        'name' => $configuration->from_name
                    ]
                ];
                Config::set('mail.mailers.smtp',$data);
            }
        }
    }
}
