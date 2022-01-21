<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BlogPost;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(BlogPost::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3, 8), true);
    $text = $faker->realText(rand(1000, 4000));
    $isPublished = rand(1, 5) > 1;
    $createdAt = $faker->dateTimeBetween('-6 months', '-1 day');

    return [
        'category_id' => rand(1, 10),
//        'user_id' => '2',
        'title' => $title,
        'slug' => Str::slug($title),
        'excerpt' => $faker->text(rand(100, 400)),
        'content_raw' => $text,
        'content_html' => $text,
        'is_published' => $isPublished,
        'published_at' => $isPublished ? $faker->dateTimeBetween('-6 months', '-1day') : null,
        'created_at' => $createdAt,
        'updated_at' => $createdAt
    ];
});
