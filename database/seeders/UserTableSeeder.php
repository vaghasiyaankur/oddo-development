<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

  
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin',
               'last_name' => 'admin',
               'email'=>'admin@example.com',
               'type'=>1,
               'password'=> bcrypt('Demo@12345'),
               'email_verified_at' => Carbon::now()->timestamp
            ],
            [
               'name'=>'User',
               'last_name' => 'user',
               'email'=>'user@example.com',
               'type'=>0,
               'password'=> bcrypt('Demo@12345'),
               'email_verified_at' => Carbon::now()->timestamp
            ],
            [
                'name'=>'jemin',
                'last_name' => 'khunt',
                'email'=>'jemin@demo.com',
                'type'=>0,
                'password'=> bcrypt('Demo@12345'),
                'email_verified_at' => Carbon::now()->timestamp
             ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}