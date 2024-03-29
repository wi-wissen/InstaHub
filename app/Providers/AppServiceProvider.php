<?php

namespace App\Providers;

use App\Helpers\HubHelper;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('requestHub', function () {
            return new HubHelper();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //for older databases add length for utf84mb support - https://laravel-news.com/laravel-5-4-key-too-long-error
        Schema::defaultStringLength(191);

        //The paginator now uses Tailwind for its default styling in Laravel 8.
        \Illuminate\Pagination\Paginator::useBootstrap();

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
