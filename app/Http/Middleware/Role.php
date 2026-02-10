<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (! $request->user()->allowed($role)) {
            flash(__('You are not allowed to do this!'))->error();

            return redirect('/');
        } else {
            return $next($request);
        }
    }
}
