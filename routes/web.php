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

Route::get('/about', 'StaticController@about');

/*
|--------------------------------------------------------------------------
| Web Routes for Hubs
|--------------------------------------------------------------------------
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
        Route::get('/api/user/search/{query}', 'UserController@search');

        Route::get('/user/password', 'UserController@getPassword');
        Route::post('/user/password', 'UserController@postPassword');

        Route::get('/user/{user_id}/followers', 'FollowController@followers');
        Route::get('/user/{user_id}/following', 'FollowController@following');

        Route::get('/user/{username}', 'ProfileController@show');

        Route::get('/user/{username}/edit', 'ProfileController@edit');
        Route::put('/user/{username}/update', 'ProfileController@update');
        Route::get('/user/{username}/destroy', 'UserController@destroy');
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
        Route::delete('/api/user/follow/{id}', 'FollowController@unfollow');
        Route::post('/api/user/follow/{id}', 'FollowController@follow'); // Using a fix but this is not secure because no csrf user can be tricked to follow anyone

        Route::post('/upload', 'PhotoController@store');

        //like
        Route::post('/api/like/{id}', 'LikesController@like');

        //comment
        Route::post('/api/comment/{photo_id}', 'CommentController@store');
        Route::delete('/api/comment/{id}', 'CommentController@destroy');

        //Business (Analytic)
        Route::get('/business', 'BusinessController@index');

        //Ads (nested in Business Submenu)
        Route::get('/ads', 'AdController@index');
        Route::get('/ads/create', 'AdController@create');
        Route::get('/ads/{id}', 'AdController@edit');
        Route::post('/ads', 'AdController@store');
        Route::put('/ads/{id}', 'AdController@update');
        Route::delete('/api/ads/{id}', 'AdController@destroy');
    });

    Route::group(['middleware' => ['auth', 'role:dba']], function () {
        //admin
        Route::get('/api/user/password/{id}', 'UserController@getNewPassword');

        Route::get('/follower', 'FollowController@index');
        Route::get('/api/follower', 'FollowController@apiIndex');
        
        Route::get('/sql', 'SqlController@getQuery');
        Route::post('/sql', 'SqlController@getQuery');
        Route::get('/sql/select', 'SqlController@selectGui');
        Route::get('/api/sql/tables', 'SqlController@getTables');
        Route::post('/api/sql', 'SqlController@getApiQuery');

        Route::get('/dba/updateTags', 'DbadminController@updateTags');
        Route::get('/dba/cryptPWs', 'DbadminController@cryptPWs');
    });

    //guest
	Route::get('/', 'StaticController@landingHub');
	
	Route::get('/noad', 'StaticController@noad');
});

/*
|--------------------------------------------------------------------------
| Web Routes for Main (will also handle unhandled Routes in Hub)
|--------------------------------------------------------------------------
*/
Route::get('/', 'StaticController@landingMain');

Route::get('/noad', 'StaticController@noad');

Auth::routes();

Route::resource('hubs', 'HubController');

Route::group(['middleware' => ['auth', 'role:teacher']], function () {
    Route::get('/user/{username}', 'ProfileController@show');

    Route::get('/user/letter/{char}', 'ProfileController@filter');

    Route::get('/user/password', 'UserController@getPassword');
    Route::post('/user/password', 'UserController@postPassword');

    Route::get('/user/{username}/edit', 'ProfileController@edit');
    Route::put('/user/{username}/update', 'ProfileController@update');
    Route::get('/user/{username}/destroy', 'UserController@destroy');

    Route::get('user/password/{id}', 'UserController@getNewPassword');

    Route::group(['middleware' => ['auth', 'role:teacher']], function () {
        Route::get('/home', 'HubController@index');

        //dbadmin
        Route::get('hubs/{id}/dba/admin', 'DbadminController@index');

        Route::get('api/hubs/{id}/dba/resetpw', 'DbadminController@setAdminPW');
        Route::get('api/hubs/{id}/dba/gettablestatus', 'DbadminController@getTableStatus');

        Route::get('api/hubs/filter/{text}', 'HubController@apiSearch');
        Route::get('api/hubs', 'HubController@apiIndex');
        
        Route::post('api/hubs/{id}/dba/readonly', 'HubController@setReadonly');
        Route::post('api/hubs/{id}/dba/activate', 'HubController@setActivate');
        Route::delete('api/hubs/{id}', 'HubController@destroy');

        Route::post('api/hubs/{name}/dba/table', 'DbadminController@changeTable');
    });
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/user', 'ProfileController@index');
    Route::get('/api/user/search/{query}', 'UserController@search');
    Route::get('/user/{username}/activate', 'ProfileController@activate');
    Route::get('/user/{username}/deactivate', 'ProfileController@deactivate');
    Route::get('/api/user/password/{id}', 'UserController@getNewPassword');

    Route::get('/avatars/{photo_id}', 'PhotoController@showavatar');

    Route::get('/trimanalytics', 'DbadminController@trimAnalytics');

    //sql
    Route::get('/sql', 'SqlController@getQuery');
    Route::post('/sql', 'SqlController@getQuery');
    Route::get('/sql/select', 'SqlController@selectGui');
    Route::get('/api/sql/tables', 'SqlController@getTables');
    Route::post('/api/sql', 'SqlController@getApiQuery');
    
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('auth', 'role:admin');