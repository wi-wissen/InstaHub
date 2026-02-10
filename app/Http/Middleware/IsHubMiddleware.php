<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
