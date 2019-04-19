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
Route::group(['domain' => env('APP_DOMAIN')], function () {   
    Auth::routes();

    Route::group(['middleware' => ['auth', 'role:user']], function () {

        //feed
        Route::get('/', 'HomeController@index');
        Route::get('/home', 'HomeController@index');
        Route::get('/tag/{name}', 'HomeController@photosbytag');

        //user
        Route::get('/user', 'ProfileController@index');
        Route::get('/user/letter/{char}', 'ProfileController@filter');
        Route::get('/user/{user_id}/followers', 'FollowController@followers');
        Route::get('/user/{user_id}/following', 'FollowController@following');

        Route::get('/user/{username}', 'ProfileController@show');

        Route::get('/user/{username}/edit', 'ProfileController@edit');
        Route::put('/user/{username}/update', 'ProfileController@update');
        Route::get('/user/{username}/destroy', 'UserController@destroy');
        Route::get('user/{username}/password', 'UserController@getPassword');
        Route::post('user/{username}/password', 'UserController@postPassword');
        Route::get('/user/{username}/activate', 'ProfileController@activate');
        Route::get('/user/{username}/deactivate', 'ProfileController@deactivate');

        //resources
        Route::get('/photos/{photo_id}', 'PhotoController@show');
        Route::get('/avatars/{photo_id}', 'PhotoController@showavatar');

        //photo
        Route::get('/photo/{photo_id}', 'HomeController@single');
        Route::get('/photo/{photo_id}/destroy', 'PhotoController@destroy');
        Route::get('/upload', 'PhotoController@create');

        //follow
        Route::delete('/user/follow/{id}', 'FollowController@unfollow');
        Route::post('/user/follow/{id}', 'FollowController@follow'); // Using a fix but this is not secure because no csrf user can be tricked to follow anyone

        Route::post('/upload', 'PhotoController@store');

        //like
        Route::post('/like/{id}', 'LikesController@like')->name('like');

        //comment
        Route::post('/comment/{photo_id}', 'CommentController@store');
        Route::get('/comment/{id}/destroy', 'CommentController@destroy');

        //Business (Analytic)
        Route::get('/business', 'BusinessController@index');
    });

    Route::group(['middleware' => ['auth', 'role:dba']], function () {
        //admin
        Route::get('user/password/{id}', 'UserController@getNewPassword');

        Route::get('/sql', 'SqlController@getQuery');
        Route::post('/sql', 'SqlController@getQuery');

        Route::get('/dba/updateTags', 'DbadminController@updateTags');
        Route::get('/dba/cryptPWs', 'DbadminController@cryptPWs');
    });

    //guest
    Route::get('/', function () {
        if(Auth::check()){
            return redirect('/home');
        }else{
            return view('welcome');
        }   
    });
});

Route::get('/', function () {
    if(Auth::check()){
        return redirect('/home');
    }else{
        return view('landing');
    }   
});

Route::get('/noad', function () {
    return view('errors.noad');   
});

Auth::routes();

Route::get('/home', 'HubController@index');

Route::resource('hubs', 'HubController');

Route::group(['middleware' => ['auth', 'role:teacher']], function () {
    Route::get('/user/{username}', 'ProfileController@show');

    Route::get('/user/letter/{char}', 'ProfileController@filter');

    Route::get('/user/{username}/edit', 'ProfileController@edit');
    Route::put('/user/{username}/update', 'ProfileController@update');
    Route::get('/user/{username}/destroy', 'UserController@destroy');
    Route::get('user/{username}/password', 'UserController@getPassword');
    Route::post('user/{username}/password', 'UserController@postPassword');
    Route::get('/user/{username}/activate', 'ProfileController@activate');
    Route::get('/user/{username}/deactivate', 'ProfileController@deactivate');

    Route::get('user/password/{id}', 'UserController@getNewPassword');

    Route::group(['middleware' => ['auth', 'role:teacher']], function () {
        //dbadmin
        Route::get('hubs/{id}/dba/activate', 'HubController@activate');
        Route::get('hubs/{id}/dba/deactivate', 'HubController@deactivate');

        Route::get('hubs/{id}/dba/admin', 'DbadminController@index');

        Route::get('hubs/{id}/dba/resetpw', 'DbadminController@setAdminPW');

        Route::get('hubs/{id}/dba/readonly', 'HubController@readonly');
        Route::get('hubs/{id}/dba/readwrite', 'HubController@readwrite');

        Route::get('hubs/{id}/dba/tables/fill/{list}', 'DbadminController@fillTables');

        Route::get('hubs/{id}/dba/table/create/{tablename}', 'DbadminController@migrateTable');
        Route::get('hubs/{id}/dba/table/fill/{tablename}', 'DbadminController@fillTable');
        Route::get('hubs/{id}/dba/table/drop/{tablename}', 'DbadminController@dropTable');
    });
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/user', 'ProfileController@index');
    Route::get('/avatars/{photo_id}', 'PhotoController@showavatar');

    Route::get('/trimanalytics', 'DbadminController@trimAnalytics');
    
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('auth', 'role:admin');
Route::get('/about', function () {
    return view('about');   
});