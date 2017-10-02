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

        Debugbar::info(Session::get('orig_hub'));
        Debugbar::info(Session::get('hub'));

        if (Session::get('orig_hub') != Session::get('hub') && !Auth::user()->allowed('teacher')) {
            //user is in wrong hub -> redirect to his hub
            return redirect(Session::get('orig_hub') . env('APP_URL'));
        }

        $hub = Hub::where('name', '=', $request->route()->parameter('subdomain'))->first();

        if (!$hub) {
            // hub does not exist
            flash('Hub does not exist!')->warning();
            return redirect(env('APP_URL'));
        } else {
            Config::set("database.connections." . env('DB_DATABASE') . "_" . $hub->name, array(
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'database'  => env('DB_DATABASE') . "_" . $hub->name,
                'username'  => env('DB_DATABASE') . "_" . $hub->name,
                'password'  => $hub->password,
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
            ));

            Config::set('database.default', env('DB_DATABASE') . "_" . $hub->name);
            Debugbar::info(Config::get('database.default'));

            $request->route()->forgetParameter('subdomain');

            return $next($request);

        }
    }
}
