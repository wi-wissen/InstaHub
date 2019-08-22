<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App as App;

class SetBrowserLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(isset( $_SERVER['HTTP_ACCEPT_LANGUAGE'] )) {
            //get langs
            $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
                    
            //chrome sends de-DE instead of de, so we ignore the second part:
            $lang = substr($lang, 0, 2);

            //set locale
            App::setLocale($lang);
        }
        
        return $next($request);
    }
}
