<?php

namespace App\Http\Controllers\Auth;

use App\Facades\RequestHub;
use App\Helpers\HubHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'loginWithToken']);
        $this->middleware('auth')->only('logout');
        $hub = new HubHelper(); //this Controller runs before HubHelper in AppServiceProvider, so we force changing db
    }

    public function username()
    {
        return 'username';
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|exists:users,'.$this->username().',is_active,1',
            'password' => 'required|string',
        ], [
            $this->username().'.exists' => __('auth.unknownUser'),
        ]);
    }

    /**
     * Validate the user login request.
     *
     * @param  string  $token
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function loginWithToken(Request $request, $token)
    {
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        //do the same as $this->attemptLogin($request) but with a token
        if (Cache::has('hub-'.RequestHub::id().'-auth-token')) {
            $storedToken = Cache::get('hub-'.RequestHub::id().'-auth-token');
            if ($storedToken == $token) {
                //success
                Auth::login(User::where('role', '=', 'dba')->firstOrFail()); //login
                Cache::forget('hub-'.RequestHub::id().'-auth-token'); //works only once

                return $this->sendLoginResponse($request);
            }
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
