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

Route::get('/home', 'HomeController@index');


Route::get('/discover', 'ProfileController@all');
Auth::routes();
Route::get('/{username}', 'ProfileController@single_user');



Route::get('/photo/{photo_id}', 'HomeController@single');
Route::get('/upload', 'PhotoController@index')->name('upload');

Route::post('/user/follow/{id}', 'FollowController@follow')->name('follow'); // Using a fix but this is not secure because no csrf user can be tricked to follow anyone
 // Not using id because its not seo friendly

Route::post('/upload', 'PhotoController@store');

Route::post('/like/{id}', 'LikesController@like')->name('like');

Route::post('/comment/{photo_id}', 'CommentController@store')->name('add_comment');