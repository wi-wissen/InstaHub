<?php
/*
* force to aknowladge changes: php artisan clear-compiled
* source: http://laravel-recipes.com/recipes/59/clearing-the-compiled-class
*/
namespace App\Http\Middleware;

use Closure;

use Config;
use Session;

use Debugbar;
use App\Hub;

class selectdb
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
        Session::forget('readonly');

        //run only on subdomains
        if (substr_count($request->server('HTTP_HOST'), '.') == 2) {
            
            $hub = Hub::where('name', '=', str_replace(env('SESSION_DOMAIN'), '',$request->server('HTTP_HOST')))->first();

            if (!$hub) {
                // hub does not exist
                flash('Hub does not exist!')->warning();
                return redirect(env('APP_URL'));
            } else {
                Session::put('readonly', (($hub->readonly()) ? 1 : 0 ));
                Debugbar::info('readonly:' . (($hub->readonly()) ? 1 : 0 ));

                Config::set("database.connections." . env('DB_DATABASE') . "_" . $hub->id, array(
                    'driver'    => 'mysql',
                    'host'      => 'localhost',
                    'database'  => env('DB_DATABASE') . "_" . $hub->id,
                    'username'  => env('DB_DATABASE') . "_" . $hub->id,
                    'password'  => $hub->password,
                    'charset'   => 'utf8mb4',
					'collation' => 'utf8mb4_unicode_ci',
                    'prefix'    => '',
                ));

                Config::set('database.default', env('DB_DATABASE') . "_" . $hub->id);
 
            }
        }

        Debugbar::info('db:' .Config::get('database.default'));

        return $next($request);
        
    }
}
