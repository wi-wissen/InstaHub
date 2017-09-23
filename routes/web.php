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

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/', function () {
    return view('welcome');
});

//Route::group(['domain' => '{db?}.myapp.com'], function () {

    Route::get('/home', 'HomeController@index');

    Route::get('/user', 'ProfileController@index');
    Route::get('/user/{user_id}/followers', 'ProfileController@followers');
    Route::get('/user/{user_id}/following', 'ProfileController@following');
    Auth::routes();

    Route::get('/photos/{photo_id}', 'PhotoController@show');
    Route::get('/avatars/{photo_id}', 'PhotoController@showavatar');

    Route::get('/photo/{photo_id}', 'HomeController@single');
    Route::get('/photo/{photo_id}/destroy', 'PhotoController@destroy');
    Route::get('/upload', 'PhotoController@create')->name('upload');

    Route::delete('/user/follow/{id}', 'ProfileController@unfollow')->name('unfollow');
    Route::post('/user/follow/{id}', 'ProfileController@follow')->name('follow'); // Using a fix but this is not secure because no csrf user can be tricked to follow anyone
    // Not using id because its not seo friendly

    Route::post('/upload', 'PhotoController@store');

    Route::post('/like/{id}', 'LikesController@like')->name('like');

    Route::post('/comment/{photo_id}', 'CommentController@store')->name('add_comment');
    Route::get('/comment/{id}/destroy', 'CommentController@destroy')->name('add_comment');

    Route::get('/user/{username}', 'ProfileController@show');
    Route::get('/user/{username}/edit', 'ProfileController@edit');
    Route::put('/user/{username}/update', 'ProfileController@update');
    Route::get('/user/{username}/destroy', 'UserController@destroy');

    Route::get('/sql', 'SqlController@getQuery');
    Route::post('/sql', 'SqlController@getQuery');
//});