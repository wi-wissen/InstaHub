<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/upload', 'PhotoController@index')->name('upload');

Route::get('/users', 'UserController@all');
Route::post('/user/follow/{id}', 'FollowController@follow')->name('follow'); // Using a fix but this is not secure because no csrf user can be tricked to follow anyone
Route::get('/user/{username}', 'UserController@profile'); // Not using id because its not seo friendly

Route::post('/upload', 'PhotoController@store');

Route::post('photo/like/{id}', 'LikesController@like')->name('like');

Route::post('photo/comment/{photo_id}', 'CommentController@store')->name('add_comment');