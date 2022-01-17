<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [];
        $cName = 'Without Category';
        $categories[] = [
            'name' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 1
        ];
        for ($i = 2; $i < 11; $i++) {
            $category_name = 'Category ' . $i;
            $parent_id = ($i > 4) ? rand(1, 4) : 1;
            $categories[] = [
                'name' => $category_name,
                'slug' => Str::slug($category_name),
                'parent_id' => $parent_id
            ];
        }
        DB::table('blog_categories')->insert($categories);
    }
}
