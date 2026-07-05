<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HubController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SqlController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// auth
Auth::routes(['verify' => true]);
Route::get('login/{token}', [LoginController::class, 'loginWithToken']);

// Excludes the global auth paths from the /{user} catch-all, which otherwise wins on subdomains (domain routes match first).
$userAuthRoutePattern = '^(?!(?:login|logout|register|password|email)$)[^/]+$';

// static (domain-agnostic, multi-segment paths are never shadowed by the /{user} catch-all)
Route::get('/documentation/redirect/{generation}', [StaticController::class, 'redirectDocumentation'])->name('documentation.redirect');

/*
|--------------------------------------------------------------------------
| Web Routes for instahub.test
|--------------------------------------------------------------------------
*/

// static
Route::domain(config('app.domain'))->group(function () {
    Route::get('/', [StaticController::class, 'welcome']);
    Route::get('/about', [StaticController::class, 'about']);
});

/*
|--------------------------------------------------------------------------
| Web Routes for admin.instahub.test
|--------------------------------------------------------------------------
*/

Route::domain(config('app.domain_admin'))->group(function () use ($userAuthRoutePattern) {
    // all
    Route::resource('hubs', HubController::class)->only(['create', 'store']);

    // only auth
    Route::middleware('auth', 'verified', 'role:admin')->group(function () use ($userAuthRoutePattern) {
        Route::get('/explore/users/{filter?}', [UserController::class, 'index']);
        Route::get('/explore/users/{filter}/{param?}', [UserController::class, 'index']);

        Route::get('/avatars/{photo_id}', [FileController::class, 'showavatar']);

        Route::get('/dba/trimanalytics', [AdminController::class, 'trimAnalytics']);

        // sql
        Route::get('/sql', [SqlController::class, 'sql']);
        Route::get('/sql/select', [SqlController::class, 'selectGui']);
        Route::get('/sql/ai', [SqlController::class, 'sqlAi']);

        Route::get('/{user}/activate', [UserController::class, 'activate'])->where('user', $userAuthRoutePattern);
        Route::get('/{user}/deactivate', [UserController::class, 'deactivate'])->where('user', $userAuthRoutePattern);
    });

    Route::middleware('auth', 'verified', 'role:teacher')->group(function () use ($userAuthRoutePattern) {
        Route::get('/', [HubController::class, 'index']);

        // dbadmin
        Route::resource('hubs', HubController::class)->except(['create', 'store']);
        Route::get('hubs/{hub}/dba/redirect', [AdminController::class, 'redirect'])->name('hubs.redirect');

        // users
        Route::get('/password', [UserController::class, 'getPassword']);
        Route::post('/password', [UserController::class, 'postPassword']);

        Route::get('/{user}', [UserController::class, 'show'])->where('user', $userAuthRoutePattern);
        Route::get('/{user}/edit', [UserController::class, 'edit'])->where('user', $userAuthRoutePattern);
        Route::put('/{user}/update', [UserController::class, 'update'])->where('user', $userAuthRoutePattern);
        Route::get('/{user}/destroy', [UserController::class, 'destroy'])->where('user', $userAuthRoutePattern);
    });
});

/*
|--------------------------------------------------------------------------
| Web Routes for *.instahub.test
|--------------------------------------------------------------------------
*/
Route::domain(config('app.domain_hub'))->group(function () use ($userAuthRoutePattern) {
    // public (registered before the /{user} catch-all so relative ad links like "/noad" resolve on hubs)
    Route::get('/noad', [StaticController::class, 'noad']);

    // only auth
    Route::middleware('auth', 'verified', 'role:dba', 'isHub')->group(function () {
        // admin
        Route::get('/sql', [SqlController::class, 'sql']);
        Route::get('/sql/select', [SqlController::class, 'selectGui']);
        Route::get('/sql/ai', [SqlController::class, 'sqlAi']);

        Route::get('/dba/updateTags', [AdminController::class, 'updateTags']);
        Route::get('/dba/cryptPWs', [AdminController::class, 'cryptPWs']);
    });

    Route::middleware('auth', 'verified', 'role:user', 'isHub')->group(function () use ($userAuthRoutePattern) {
        // feed
        Route::get('/', [PhotoController::class, 'index']);
        Route::get('/tag/{name}', [PhotoController::class, 'photosbytag']);

        // user
        Route::get('password', [UserController::class, 'getPassword']);
        Route::post('password', [UserController::class, 'postPassword']);

        Route::get('/explore/users/{filter?}', [UserController::class, 'index']);
        Route::get('/explore/users/{filter}/{param?}', [UserController::class, 'index']);

        // resources
        Route::get('/photos/{photo_id}', [FileController::class, 'showPhoto']);
        Route::get('/avatars/{photo_id}', [FileController::class, 'showAvatar']);

        // photo
        Route::get('/p/{photo}', [PhotoController::class, 'show']);
        Route::get('/p/{photo_id}/destroy', [FileController::class, 'destroyPhoto']);
        Route::get('/upload', [PhotoController::class, 'create']);

        // follow
        Route::delete('/api/me/follow/{user}', [FollowController::class, 'unfollow']);
        Route::post('api/me/follow/{user}', [FollowController::class, 'follow']); // Using a fix but this is not secure because no csrf user can be tricked to follow anyone

        Route::post('/upload', [PhotoController::class, 'store']);

        // like
        Route::post('/api/me/like/{id}', [LikeController::class, 'like']);

        // comment
        Route::post('/api/me/comment/{photo_id}', [CommentController::class, 'store']);
        Route::delete('/api/me/comment/{id}', [CommentController::class, 'destroy']);

        // Business (Analytic)
        Route::get('/business', [StaticController::class, 'business']);

        // Ads (nested in Business Submenu)
        Route::resource('ads', AdController::class);
        Route::delete('/api/ads/{id}', [AdController::class, 'destroy']);

        // users - last so no one can override hub urls
        Route::get('{user}/followers', [FollowController::class, 'followers'])->where('user', $userAuthRoutePattern);
        Route::get('{user}/following', [FollowController::class, 'following'])->where('user', $userAuthRoutePattern);

        Route::get('{user}', [UserController::class, 'show'])->where('user', $userAuthRoutePattern);

        Route::get('{user}/edit', [UserController::class, 'edit'])->where('user', $userAuthRoutePattern);
        Route::put('{user}/update', [UserController::class, 'update'])->where('user', $userAuthRoutePattern);
        Route::get('{user}/destroy', [UserController::class, 'destroy'])->where('user', $userAuthRoutePattern);
        Route::get('{user}/activate', [UserController::class, 'activate'])->where('user', $userAuthRoutePattern);
        Route::get('{user}/deactivate', [UserController::class, 'deactivate'])->where('user', $userAuthRoutePattern);
    });
});
