<?php

namespace App\Providers;

use App\BlogPost;
use App\Models\BlogCategory;
use App\Observers\BlogCategoryObserver;
use App\Observers\BlogPostObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        BlogPost::observe(BlogPostObserver::class);
        BlogCategory::observe(BlogCategoryObserver::class);
    }
}
