<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','welcomeController@index')->name('welcome.index');
Route::get('/posts.show','PostsController@show')->name('posts.show');


Auth::routes();
Route::group(['middleware'=>'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/tags', 'TagsController');
    Route::resource('/categories', 'CategoriesController');
    Route::resource('/posts', 'PostsController');
    Route::get('/trashed-posts', 'PostsController@trashed')->name('trashed.index');
});

Route::group(['auth', 'admin'], function(){
    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::get('/users/create', 'UsersController@create')->name('users.create');
    Route::get('/users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

});

Route::group(['auth'], function(){
    Route::get('/users/{user}/profil', 'usersController@profil')->name('users.profil');
    Route::post('/users/{user}/update', 'usersController@update')->name('users.update');
});



