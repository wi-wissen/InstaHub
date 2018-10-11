<?php

namespace App\Http\Middleware;

use Closure;

use Config;
use Session;
use Auth;

use Debugbar;
use App\User;
use App\Hub;

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
        $request->session()->put('readonly', 0);

        if ($request->route()->parameter('subdomain') != null) {
            $request->session()->put('readonly', \Request::get('hubreadonly'));

            Debugbar::info($request->session()->get('readonly'));
            $request->session()->put('hub', $request->route()->parameter('subdomain'));
        } else {
            $request->session()->forget('hub');
        }

        //dd($next($request));

        return $next($request);
    }
}
