<?php

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
use App\Mail\NewUseKaribu;



Auth::routes();

Route::get('/email',function(){
    return new NewUseKaribu();
});

Route::post('follow/{user}','FollowsController@store');


Route::get('/','PostsController@index')->name('posts.show');
//Routes need to stay in order,anything with variable should stay at end
Route::get('/p/create','PostsController@create');
Route::get('/p/{post}','PostsController@show');
Route::get('/p/delete/{id}',['uses' => 'PostsController@delete', 'as' => 'post.delete']);
Route::post('/p','PostsController@store');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
