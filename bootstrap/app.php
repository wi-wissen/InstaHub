<?php

use App\Http\Middleware\Role;
use App\Http\Middleware\SetBrowserLocale;
use App\Http\Middleware\Subdomain;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(prepend: [
            SetBrowserLocale::class,
            Subdomain::class,
        ]);
        $middleware->alias([
            'role' => Role::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
