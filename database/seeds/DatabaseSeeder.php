<?php

use App\BlogPost;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(BlogCategorySeeder::class);
        $users = \App\User::all();
        $result = [];
        foreach ($users as $user) {
            $result[] = $user->id;
        }
//        dd($result);
        factory(BlogPost::class, 1)->create();
    }
}

?>
