<?php

namespace App\Providers;

use App\Helpers\HubHelper;
use App\Session\AnonymizedDatabaseSessionHandler;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
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

        /**
         * Paginate a standard Laravel Collection.
         *
         * @param int $perPage
         * @param int $total
         * @param int $page
         * @param string $pageName
         * @return array
         */
        if (! Collection::hasMacro('paginate')) {
            Collection::macro('paginate', function ($perPage, $total = null, $page = null, $pageName = 'page') {
                $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

                return new LengthAwarePaginator(
                    $this->forPage($page, $perPage),
                    $total ?: $this->count(),
                    $perPage,
                    $page,
                    [
                        'path' => LengthAwarePaginator::resolveCurrentPath(),
                        'pageName' => $pageName,
                    ]
                );
            });
        }

        if (! Collection::hasMacro('simplePaginate')) {
            Collection::macro('simplePaginate',
                function ($perPage = 15, $page = null, $options = []) {
                    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

                    return (
                    new Paginator(
                        $this->forPage($page, $perPage),
                        $perPage,
                        $page,
                        $options
                    )
                )->withPath('');
                });
        }
    }
}
