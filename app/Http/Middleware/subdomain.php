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
            //readonly
            $request->session()->put('readonly', \Request::get('hubreadonly'));
            Debugbar::info($request->session()->get('readonly'));

            //subdomain
            $request->session()->put('hub', $request->route()->parameter('subdomain')); //save in session
            Config::set('app.url', str_replace("//", "//" . $request->session()->get('hub') . ".", Config::get('app.url')) ); //change app domain (for mails for example)
            Debugbar::info($request->session()->get('hub'));
        } else {
            $request->session()->forget('hub');
        }

        //dd($next($request));

        return $next($request);
    }
}
