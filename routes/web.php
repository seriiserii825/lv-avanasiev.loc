<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'blog'], function(){
    Route::resource('posts', '\App\Http\Controllers\Blog\PostController')->names('blog.posts');
});

Route::group(['prefix' => 'admin/blog'], function(){
    Route::resource('categories', '\App\Http\Controllers\Blog\Admin\CategoryController')->except('show')->names('blog.admin.categories');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
