<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
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
