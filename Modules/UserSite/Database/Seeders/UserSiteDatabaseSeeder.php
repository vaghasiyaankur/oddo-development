<?php

namespace Modules\UserSite\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UserSiteDatabaseSeeder extends Seeder
{
    /**
     * Run the UserSite seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
