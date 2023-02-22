<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;

class EmailSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\EmailSetting::create(
            [
                'host_name' => 'smtp.gmail.com',
                'port_name' => '465',
                'encryption' => 'ssl',
                'username' => 'krupali.codetrinity@gmail.com',
                'password' => 'owppopybcbhvuslq',
                'from_email' => 'krupali.codetrinity@gmail.com',
                'from_name' => 'Krupali',
            ]
        );
    }
}
