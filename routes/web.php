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
    Auth::routes();

    Route::group(['domain' => '{subdomain}.instahub.app'], function () {
        //guest
        Route::get('/', function () {
            return view('welcome');
        });
        
        Auth::routes();

        Route::group(['middleware' => ['silo', 'auth', 'role:user']], function () {

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
            Route::get('user/{username}/password', 'UserController@getPassword');
            Route::post('user/{username}/password', 'UserController@postPassword');

            //resources
            Route::get('/photos/{photo_id}', 'PhotoController@show');
            Route::get('/avatars/{photo_id}', 'PhotoController@showavatar');

            //photo
            Route::get('/photo/{photo_id}', 'HomeController@single');
            Route::get('/photo/{photo_id}/destroy', 'PhotoController@destroy');
            Route::get('/upload', 'PhotoController@create');

            Route::delete('/user/follow/{id}', 'ProfileController@unfollow');
            Route::post('/user/follow/{id}', 'ProfileController@follow'); // Using a fix but this is not secure because no csrf user can be tricked to follow anyone

            Route::post('/upload', 'PhotoController@store');

            //like
            Route::post('/like/{id}', 'LikesController@like')->name('like');

            //comment
            Route::post('/comment/{photo_id}', 'CommentController@store');
            Route::get('/comment/{id}/destroy', 'CommentController@destroy');
        });

        Route::group(['middleware' => ['silo', 'auth', 'role:dba']], function () {
            //admin
            Route::get('user/password/{id}', 'UserController@getNewPassword');

            Route::get('/sql', 'SqlController@getQuery');
            Route::post('/sql', 'SqlController@getQuery');

            Route::get('/dba/updateTags', 'DbadminController@updateTags');
            Route::get('/dba/cryptPWs', 'DbadminController@cryptPWs');
        });

        Route::group(['middleware' => ['silo', 'auth', 'role:teacher']], function () {
            //teacher
            Route::get('/dba/admin', 'DbadminController@index');

            Route::get('/dba/table/create/{tablename}', 'DbadminController@migrateTable');
            Route::get('/dba/table/fill/{tablename}', 'DbadminController@fillTable');
            Route::get('/dba/table/drop/{tablename}', 'DbadminController@dropTable');
        });

    });


    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('auth', 'role:admin');
//});