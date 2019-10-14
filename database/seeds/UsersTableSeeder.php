<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'      => 'Hassan',
            'email'     => 'hassan@gmail.com',
            'password'     => bcrypt('123456789'),
            'role_id'   => '1',
            'avatar'    => 'avatar.png'
        ]);
    }
}
