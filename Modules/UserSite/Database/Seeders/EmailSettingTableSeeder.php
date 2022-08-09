<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmailSetting;

class EmailSettingTableSeeder extends Seeder
{
    protected $model = EmailSetting::class;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmailSetting::create([
            'host_name' => 'smtp.gmail.com',
            'port_name' => '465',
            'encryption' => 'ssl',
            'username' => 'krupali.codetrinity@gmail.com',
            'password' => 'owppopybcbhvuslq',
            'from_email' => null,
            'from_name' => null,
        ]);
    }
}
