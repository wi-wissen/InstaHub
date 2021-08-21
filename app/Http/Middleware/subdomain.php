<?php

namespace App\Http\Middleware;

use App\Facades\RequestHub;
use Closure;

use Config;
use Session;
use Auth;

use Debugbar;
use App\User;
use App\Hub;

class SubDomain
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
            if(RequestHub::isHub()) {
                RequestHub::setHubDB();
                $request->route()->forgetParameter('subdomain');
            }
        }
        
        return $next($request);
    }
}
