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
                'password' => bcrypt('serii1981;')
            ],
            [
                'name' => 'Admin',
                'email' => 'seriiburduja@gmail.com',
                'password' => bcrypt('serii1981;')
            ]
        ];

        DB::table('users')->insert($users);
    }
}
