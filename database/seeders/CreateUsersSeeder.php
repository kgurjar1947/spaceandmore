<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
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
               'name'=>'Super Admin',
               'email'=>'admin@spacesandmore.com',
               'type'=>0,
               'password'=> bcrypt('admin@123'),
            ],
            [
               'name'=>'admin',
               'email'=>'user_admin@spacesandmore.com',
               'type'=> 1,
               'password'=> bcrypt('admin@123'),
            ],
            [
               'name'=>'user',
               'email'=>'user@spacesandmore.com',
               'type'=>2,
               'password'=> bcrypt('123456'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}