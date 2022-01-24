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
        $user = \App\User::create([
            'name' => 'Admin',
            'email' => 'seriiburduja@mail.ru',
            'password' => bcrypt('some1234')
        ]);
        $this->call(BlogCategorySeeder::class);
        $user->blogposts()->saveMany(BlogPost::factory(1));
    }
}
?>
