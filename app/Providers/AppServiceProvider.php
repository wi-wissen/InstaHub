<?php

namespace App\Providers;

use App\Helpers\HubHelper;
use App\Session\AnonymizedDatabaseSessionHandler;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('requestHub', function () {
            return new HubHelper();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // Livewire::setUpdateRoute(function ($handle) {
        //     return Route::post('/livewire/update', $handle)
        //         ->middleware(\App\Http\Middleware\Subdomain::class);
        // });

        Livewire::addPersistentMiddleware([ 
            \App\Http\Middleware\Subdomain::class,
        ]);

        Session::extend('anonymized_database', function ($app) {
            $connection = $app['config']['session.connection'];
            $table = $app['config']['session.table'];
            $lifetime = $app['config']['session.lifetime'];
            $lockForSeconds = $app['config']['session.lock_for_seconds'] ?? 0;

            return new AnonymizedDatabaseSessionHandler(
                $app['db']->connection($connection),
                $table,
                $lifetime,
                $app,
                $lockForSeconds
            );
        });
    }
}
