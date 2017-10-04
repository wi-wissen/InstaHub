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

        if (!Auth::guest()) {
            if (Auth::user()->is_active) {
                if ($request->session()->get('orig_hub') != $request->session()->get('hub') && !$request->user()->allowed('teacher')) {
                    //user is in wrong hub -> redirect to his hub
                    dd($request->user()->allowed('teacher'));
                    flash('You are not allowed to visit this hub!')->error();
                    return redirect($request->session()->get('orig_hub') . env('APP_URL'));
                }
            }
        }

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
