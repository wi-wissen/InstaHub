<?php

namespace App\Http\Middleware;

use Closure;

class IsHubMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!str_starts_with($request->url(), config('app.url_admin'))) {
            return $next($request);
        }
        
        return abort(403);
    }
}