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



//Route::group(['domain' => '{db?}.myapp.com'], function () {
    //guest
    Route::get('/', function () {
        return view('welcome');
    });
    Auth::routes();

    Route::group(['middleware' => 'auth', 'middleware' => 'role:user'], function () {
        //feed
        Route::get('/home', 'HomeController@index');
        Route::get('/tag/{name}', 'HomeController@photosbytag');

        //user
        Route::get('/user', 'ProfileController@index');
        Route::get('/user/{user_id}/followers', 'ProfileController@followers');
        Route::get('/user/{user_id}/following', 'ProfileController@following');

        Route::get('/user/{username}', 'ProfileController@show');

        Route::get('/user/{username}/edit', 'ProfileController@edit');
        Route::put('/user/{username}/update', 'ProfileController@update');
        Route::get('/user/{username}/destroy', 'UserController@destroy');

        //resources
        Route::get('/photos/{photo_id}', 'PhotoController@show');
        Route::get('/avatars/{photo_id}', 'PhotoController@showavatar');

        //photo
        Route::get('/photo/{photo_id}', 'HomeController@single');
        Route::get('/photo/{photo_id}/destroy', 'PhotoController@destroy');
        Route::get('/upload', 'PhotoController@create')->name('upload');

        Route::delete('/user/follow/{id}', 'ProfileController@unfollow')->name('unfollow');
        Route::post('/user/follow/{id}', 'ProfileController@follow')->name('follow'); // Using a fix but this is not secure because no csrf user can be tricked to follow anyone

        Route::post('/upload', 'PhotoController@store');

        //like
        Route::post('/like/{id}', 'LikesController@like')->name('like');

        //comment
        Route::post('/comment/{photo_id}', 'CommentController@store')->name('add_comment');
        Route::get('/comment/{id}/destroy', 'CommentController@destroy')->name('add_comment');
    });

    Route::group(['middleware' => 'auth', 'middleware' => 'role:dba'], function () {
        //admin
        Route::get('/sql', 'SqlController@getQuery');
        Route::post('/sql', 'SqlController@getQuery');
        Route::get('/updateTags', 'DbadminController@updateTags');
    });

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('auth', 'role:admin');;
//});