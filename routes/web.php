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
| These first Rules overrule Rules in Hubs
|
*/

Auth::routes();
Route::get('login/{token}', '\App\Http\Controllers\Auth\LoginController@loginWithToken');

Route::get('/about', 'StaticController@about');
Route::get('/noad', 'StaticController@noad');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('auth', 'role:admin');

/*
|--------------------------------------------------------------------------
| Web Routes for Main (will also handle unhandled Routes in Hub)
|--------------------------------------------------------------------------
*/

Route::group(['domain' => config('app.domain_admin')], function () {

    //guest
    Route::get('/', 'StaticController@landingHub');

    Route::group(['middleware' => ['auth', 'role:admin']], function () {
        Route::get('/api/users/search/{query}', 'UserController@search');
        Route::get('/{username}/activate', 'UserController@activate');
        Route::get('/{username}/deactivate', 'UserController@deactivate');
        Route::get('api/users/{id}/password', 'UserController@getNewPassword');

        Route::get('/avatars/{photo_id}', 'FileController@showavatar');

        Route::get('/dba/trimanalytics', 'AdminController@trimAnalytics');

        //sql
        Route::get('/sql', 'SqlController@getQuery');
        Route::post('/sql', 'SqlController@getQuery');
        Route::get('/sql/select', 'SqlController@selectGui');
        Route::get('/api/sql/tables', 'SqlController@getTables');
        Route::post('/api/sql', 'SqlController@getApiQuery');
    });

    Route::group(['middleware' => ['auth', 'role:teacher']], function () {
        Route::get('/explore/users/{filter?}', 'UserController@index');
        Route::get('/explore/users/{filter}/{param?}', 'UserController@index');

        Route::get('/password', 'UserController@getPassword');
        Route::post('/password', 'UserController@postPassword');
        Route::get('/password/{id}', 'UserController@getNewPassword');

        Route::get('/home', 'HubController@index');

        //dbadmin
        Route::resource('hubs', 'HubController');
        Route::get('hubs/{id}/dba/redirect', 'AdminController@redirect');

        Route::get('api/hubs/{id}/dba/resetpw', 'AdminController@setAdminPW');
        Route::get('api/hubs/{id}/dba/gettablestatus', 'AdminController@getTableStatus');

        Route::get('api/hubs/filter/{text}', 'HubController@apiSearch');
        Route::get('api/hubs', 'HubController@apiIndex');

        Route::post('api/hubs/{id}/dba/readonly', 'AdminController@setReadonly');
        Route::post('api/hubs/{id}/dba/activate', 'AdminController@setActivate');
        Route::delete('api/hubs/{id}', 'HubController@destroy');

        Route::post('api/hubs/{name}/dba/table', 'AdminController@changeTable');

        Route::get('/{username}', 'UserController@show');

        Route::get('/{username}/edit', 'UserController@edit');
        Route::put('/{username}/update', 'UserController@update');
        Route::get('/{username}/destroy', 'UserController@destroy');
    });
});

/*
|--------------------------------------------------------------------------
| Web Routes for Hubs
|--------------------------------------------------------------------------
*/
Route::group(['domain' => config('app.domain_hub')], function () {

    //guest
    Route::get('/', 'StaticController@landingHub');

    Route::group(['middleware' => ['auth', 'role:dba']], function () {
        //admin
        Route::get('api/users/{id}/password', 'UserController@getNewPassword');

        Route::get('/follower', 'FollowController@index');
        Route::get('api/me/follower', 'FollowController@apiIndex');

        Route::get('/sql', 'SqlController@getQuery');
        Route::post('/sql', 'SqlController@getQuery');
        Route::get('/sql/select', 'SqlController@selectGui');
        Route::get('/api/sql/tables', 'SqlController@getTables');
        Route::post('/api/sql', 'SqlController@getApiQuery');

        Route::get('/dba/updateTags', 'AdminController@updateTags');
        Route::get('/dba/cryptPWs', 'AdminController@cryptPWs');
    });

    Route::group(['middleware' => ['auth', 'role:user']], function () {

        //feed
        Route::get('/home/{sort?}', 'PhotoController@index');
        Route::get('/tag/{name}/{sort?}', 'PhotoController@photosbytag');

        //user
        Route::get('password', 'UserController@getPassword');
        Route::post('password', 'UserController@postPassword');

        Route::get('/explore/users/{filter?}', 'UserController@index');
        Route::get('/explore/users/{filter}/{param?}', 'UserController@index');
        Route::get('/api/users/search/{query}', 'UserController@search');

        //resources
        Route::get('/photos/{photo_id}', 'FileController@showPhoto');
        Route::get('/avatars/{photo_id}', 'FileController@showAvatar');

        //photo
        Route::get('/p/{photo_id}', 'PhotoController@show');
        Route::get('/p/{photo_id}/destroy', 'FileController@destroyPhoto');
        Route::get('/upload', 'PhotoController@create');

        //follow
        Route::delete('/api/me/follow/{id}', 'FollowController@unfollow');
        Route::post('api/me/follow/{id}', 'FollowController@follow'); // Using a fix but this is not secure because no csrf user can be tricked to follow anyone

        Route::post('/upload', 'PhotoController@store');

        //like
        Route::post('/api/me/like/{id}', 'LikeController@like');

        //comment
        Route::post('/api/me/comment/{photo_id}', 'CommentController@store');
        Route::delete('/api/me/comment/{id}', 'CommentController@destroy');

        //Business (Analytic)
        Route::get('/business', 'StaticController@business');

        //Ads (nested in Business Submenu)
        Route::get('/ads', 'AdController@index');
        Route::get('/ads/create', 'AdController@create');
        Route::get('/ads/{id}', 'AdController@edit');
        Route::post('/ads', 'AdController@store');
        Route::put('/ads/{id}', 'AdController@update');
        Route::delete('/api/ads/{id}', 'AdController@destroy');

        //users - last so no one can override hub urls
        Route::get('{user_id}/followers', 'FollowController@followers');
        Route::get('{user_id}/following', 'FollowController@following');

        Route::get('{username}', 'UserController@show');

        Route::get('{username}/edit', 'UserController@edit');
        Route::put('{username}/update', 'UserController@update');
        Route::get('{username}/destroy', 'UserController@destroy');
        Route::get('{username}/activate', 'UserController@activate');
        Route::get('{username}/deactivate', 'UserController@deactivate');
    });
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
| These last Rules are used if they are not fetched un Hubs.
|
*/

Route::get('/', 'StaticController@landingMain');
