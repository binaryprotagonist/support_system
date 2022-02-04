<?php

namespace Database\Seeders;

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
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@mailinator.com',
                'is_admin'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Support',
                'email'=>'support@mailinator.com',
                 'is_admin'=>'1',
                'password'=> bcrypt('123456'),
             ],
            [
               'name'=>'Client One',
               'email'=>'client1@mailinator.com',
                'is_admin'=>'0',
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Client Two',
                'email'=>'client2@mailinator.com',
                 'is_admin'=>'0',
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'Client Three',
                'email'=>'client3@mailinator.com',
                 'is_admin'=>'0',
                'password'=> bcrypt('123456'),
             ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
