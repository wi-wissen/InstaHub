<?php

namespace App\Http\Middleware;

use Closure;

use Config;
use Session;
use Auth;

use Debugbar;
use App\Hub;

class silo
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
        $request->session()->put('hub', $request->route()->parameter('subdomain'));

        Debugbar::info("orig: " . Session::get('orig_hub'));
        Debugbar::info("hub: " . Session::get('hub'));

        $request->route()->forgetParameter('subdomain');

        return $next($request);
    }
}
