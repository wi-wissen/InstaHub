<?php

namespace App\Http\Middleware;

use Closure;

use Config;
use Session;
use Auth;

use Debugbar;
use App\User;

class subdomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->route()->parameter('subdomain') != null) {
            $request->session()->put('hub', $request->route()->parameter('subdomain'));
        } else {
            $request->session()->forget('hub');
        }

        //dd($next($request));

        return $next($request);
    }
}
