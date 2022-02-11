<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HubController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SqlController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
|
*/

//auth
Auth::routes();
Route::get('login/{token}', [\App\Http\Controllers\Auth\LoginController::class, 'loginWithToken']);

//static
Route::get('/about', [StaticController::class, 'about']);
Route::get('/noad', [StaticController::class, 'noad']);

//logs
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->middleware('auth', 'role:admin');

/*
|--------------------------------------------------------------------------
| Web Routes for admin.instahub.test
|--------------------------------------------------------------------------
*/

//static
Route::domain(config('app.domain'))->group(function () {
    Route::get('/', [StaticController::class, 'landing']);
});

/*
|--------------------------------------------------------------------------
| Web Routes for admin.instahub.test
|--------------------------------------------------------------------------
*/

Route::domain(config('app.domain_admin'))->group(function () {
    //all
    Route::resource('hubs', HubController::class)->only(['create', 'store']);

    //only auth
    Route::middleware('auth', 'role:admin')->group(function () {
        Route::get('/', [HubController::class, 'index']);

        Route::get('/api/users/search/{query}', [UserController::class, 'search']);
        Route::get('/{username}/activate', [UserController::class, 'activate']);
        Route::get('/{username}/deactivate', [UserController::class, 'deactivate']);
        Route::get('api/users/{id}/password', [UserController::class, 'getNewPassword']);

        Route::get('/avatars/{photo_id}', [FileController::class, 'showavatar']);

        Route::get('/dba/trimanalytics', [AdminController::class, 'trimAnalytics']);

        //sql
        Route::get('/sql', [SqlController::class, 'getQuery']);
        Route::post('/sql', [SqlController::class, 'getQuery']);
        Route::get('/sql/select', [SqlController::class, 'selectGui']);
        Route::get('/api/sql/tables', [SqlController::class, 'getTables']);
        Route::post('/api/sql', [SqlController::class, 'getApiQuery']);
    });

    Route::middleware('auth', 'role:teacher')->group(function () {
        Route::get('/', [HubController::class, 'index']);

        Route::get('/explore/users/{filter?}', [UserController::class, 'index']);
        Route::get('/explore/users/{filter}/{param?}', [UserController::class, 'index']);

        Route::get('/password', [UserController::class, 'getPassword']);
        Route::post('/password', [UserController::class, 'postPassword']);
        Route::get('/password/{id}', [UserController::class, 'getNewPassword']);

        //dbadmin
        Route::resource('hubs', HubController::class)->except(['create', 'store']);
        Route::get('hubs/{id}/dba/redirect', [AdminController::class, 'redirect']);

        Route::get('api/hubs/{id}/dba/resetpw', [AdminController::class, 'setAdminPW']);
        Route::get('api/hubs/{id}/dba/gettablestatus', [AdminController::class, 'getTableStatus']);

        Route::get('api/hubs/filter/{text}', [HubController::class, 'apiSearch']);
        Route::get('api/hubs', [HubController::class, 'apiIndex']);

        Route::post('api/hubs/{id}/dba/readonly', [AdminController::class, 'setReadonly']);
        Route::post('api/hubs/{id}/dba/activate', [AdminController::class, 'setActivate']);
        Route::delete('api/hubs/{id}', [HubController::class, 'destroy']);

        Route::post('api/hubs/{name}/dba/table', [AdminController::class, 'changeTable']);

        Route::get('/{username}', [UserController::class, 'show']);

        Route::get('/{username}/edit', [UserController::class, 'edit']);
        Route::put('/{username}/update', [UserController::class, 'update']);
        Route::get('/{username}/destroy', [UserController::class, 'destroy']);
    });
});

/*
|--------------------------------------------------------------------------
| Web Routes for *.instahub.test
|--------------------------------------------------------------------------
*/
Route::domain(config('app.domain_hub'))->group(function () {
    //only auth
    Route::middleware('auth', 'role:dba')->group(function () {
        //admin
        Route::get('api/users/{id}/password', [UserController::class, 'getNewPassword']);

        Route::get('/follower', [FollowController::class, 'index']);
        Route::get('api/me/follower', [FollowController::class, 'apiIndex']);

        Route::get('/sql', [SqlController::class, 'getQuery']);
        Route::post('/sql', [SqlController::class, 'getQuery']);
        Route::get('/sql/select', [SqlController::class, 'selectGui']);
        Route::get('/api/sql/tables', [SqlController::class, 'getTables']);
        Route::post('/api/sql', [SqlController::class, 'getApiQuery']);

        Route::get('/dba/updateTags', [AdminController::class, 'updateTags']);
        Route::get('/dba/cryptPWs', [AdminController::class, 'cryptPWs']);
    });

    Route::middleware('auth', 'role:user')->group(function () {
        //feed
        Route::get('/', [PhotoController::class, 'index']);
        Route::get('/tag/{name}', [PhotoController::class, 'photosbytag']);

        //user
        Route::get('password', [UserController::class, 'getPassword']);
        Route::post('password', [UserController::class, 'postPassword']);

        Route::get('/explore/users/{filter?}', [UserController::class, 'index']);
        Route::get('/explore/users/{filter}/{param?}', [UserController::class, 'index']);
        Route::get('/api/users/search/{query}', [UserController::class, 'search']);

        //resources
        Route::get('/photos/{photo_id}', [FileController::class, 'showPhoto']);
        Route::get('/avatars/{photo_id}', [FileController::class, 'showAvatar']);

        //photo
        Route::get('/p/{photo_id}', [PhotoController::class, 'show']);
        Route::get('/p/{photo_id}/destroy', [FileController::class, 'destroyPhoto']);
        Route::get('/upload', [PhotoController::class, 'create']);

        //follow
        Route::delete('/api/me/follow/{id}', [FollowController::class, 'unfollow']);
        Route::post('api/me/follow/{id}', [FollowController::class, 'follow']); // Using a fix but this is not secure because no csrf user can be tricked to follow anyone

        Route::post('/upload', [PhotoController::class, 'store']);

        //like
        Route::post('/api/me/like/{id}', [LikeController::class, 'like']);

        //comment
        Route::post('/api/me/comment/{photo_id}', [CommentController::class, 'store']);
        Route::delete('/api/me/comment/{id}', [CommentController::class, 'destroy']);

        //Business (Analytic)
        Route::get('/business', [StaticController::class, 'business']);

        //Ads (nested in Business Submenu)
        Route::get('/ads', [AdController::class, 'index']);
        Route::get('/ads/create', [AdController::class, 'create']);
        Route::get('/ads/{id}', [AdController::class, 'edit']);
        Route::post('/ads', [AdController::class, 'store']);
        Route::put('/ads/{id}', [AdController::class, 'update']);
        Route::delete('/api/ads/{id}', [AdController::class, 'destroy']);

        //users - last so no one can override hub urls
        Route::get('{user_id}/followers', [FollowController::class, 'followers']);
        Route::get('{user_id}/following', [FollowController::class, 'following']);

        Route::get('{username}', [UserController::class, 'show']);

        Route::get('{username}/edit', [UserController::class, 'edit']);
        Route::put('{username}/update', [UserController::class, 'update']);
        Route::get('{username}/destroy', [UserController::class, 'destroy']);
        Route::get('{username}/activate', [UserController::class, 'activate']);
        Route::get('{username}/deactivate', [UserController::class, 'deactivate']);
    });
});
