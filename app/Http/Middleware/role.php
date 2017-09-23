<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if ($request->user()->is_active) {
            if (!$request->user()->allowed($role)) {
                flash('You are not allowed to do this!')->error();
                return redirect('/home');
            } else {
                return $next($request);
            }
        } else {
            Auth::logout();
            flash('Your account is not activated!')->warning();
            return redirect('/login');
        }
    }
}
