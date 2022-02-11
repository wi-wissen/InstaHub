<?php

namespace App\Http\Middleware;

use App\Facades\RequestHub;
use App\Models\Hub;
use App\Models\User;
use Auth;
use Closure;
use Config;
use Debugbar;
use Session;

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

            //change app domain (for mails for example)
            Config::set('app.url', RequestHub::url());

            //help controllers to ignore subdomain
            if (RequestHub::isHub()) {
                RequestHub::setHubDB();
                $request->route()->forgetParameter('subdomain');
            }
        }

        return $next($request);
    }
}
