<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Closure;

class IsHubMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! str_starts_with($request->url(), config('app.url_admin'))) {
            return $next($request);
        }

        return abort(403);
    }
}
