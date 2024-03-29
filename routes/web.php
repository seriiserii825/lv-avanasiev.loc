<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'blog'], function(){
    Route::resource('posts', '\App\Http\Controllers\Blog\PostController')->names('blog.posts');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::group(['prefix' => 'blog'], function(){
        Route::resource('admin_categories', '\App\Http\Controllers\Blog\Admin\CategoryController')->except(['show']);
        Route::resource('admin_posts', '\App\Http\Controllers\Blog\Admin\PostController')->except(['show']);
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
