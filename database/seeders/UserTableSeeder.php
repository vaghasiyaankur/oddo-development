<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
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
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'last_name' => 'user',
               'email'=>'user@example.com',
               'type'=>0,
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'jemin',
                'last_name' => 'khunt',
                'email'=>'jemin@demo.com',
                'type'=>0,
                'password'=> bcrypt('123456'),
             ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}