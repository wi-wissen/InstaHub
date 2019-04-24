<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;
use App\User;

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
        //help controllers to ignore subdomain
        $request->route()->forgetParameter('subdomain');

        //check subdomain
        \Debugbar::info('user_hub:' . \Session::get('user_hub', 'not logged in'));
        if (Session::get('hub', 'root') != Session::get('user_hub', 'root')) {
            flash('This was not your hub! You have to first logout from from this hub.')->warning();
            if (Session::get('user_hub', 'root') == 'root') {
                return redirect(env('APP_URL') . '/home');
            } else {
                return redirect('https://' . $request->session()->get('user_hub') . env('SESSION_DOMAIN') . '/home');
            }
            
        }

        //is user activated?
        if ($request->user()->is_active) {
            //is user allowed to do so?
            if (!($request->user()->allowed($role) || $this->sessionRole($role))) {
                flash('You are not allowed to do this!')->error();
                return redirect('/');
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
