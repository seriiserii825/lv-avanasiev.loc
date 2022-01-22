<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Author',
                'email' => 'seriiburduja@mail.ru',
                'password' => bcrypt('some1234')
            ],
            [
                'name' => 'Admin',
                'email' => 'seriiburduja@gmail.com',
                'password' => bcrypt('some1234')
            ]
        ];

        DB::table('users')->insert($users);
    }
}
