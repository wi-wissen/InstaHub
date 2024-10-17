<?php

namespace App\Http\Controllers\Auth;

use App\Facades\RequestHub;
use App\Helpers\HubHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\NewUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $hub = new HubHelper(); //this Controller runs before HubHelper in AppServiceProvider, so we force changing db
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if($user->is_active) {
            $this->guard()->login($user);
        }

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:users',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'bio' => 'nullable|max:500',
            'gender' => 'nullable',
            'birthday_birthDay' => 'nullable|date_format:Y-m-d',
            'city' => 'nullable|string',
            'country' => 'nullable|string',
            'centimeters' => 'nullable|numeric',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if (array_key_exists('avatar', $data)) {
            if ($data['avatar']) {
                $url = Storage::putFile('avatars', $data['avatar']);
            } else {
                $url = 'avatar.png';
            }
        } else {
            $url = 'avatar.png';
        }

        $user = User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'bio' => Arr::has($data, 'bio') ? $data['bio'] : null,
            'gender' => Arr::has($data, 'gender') ? $data['gender'] : null,
            'birthday' => Arr::has($data, 'birthday') ? $data['birthday'] : null,
            'city' => Arr::has($data, 'city') ? $data['city'] : null,
            'country' => Arr::has($data, 'country') ? $data['country'] : null,
            'centimeters' => Arr::has($data, 'centimeters') ? $data['centimeters'] : null,
            'avatar' => $url,
            'role' => (RequestHub::isHub()) ? 3 : 1,
            'is_active' => app()->environment('local'),
            'hub_default_generation' => config('hub.default_generation'),
        ]);

        $user->save();

        //send message to admin if teacher apply for account in root
        if (! RequestHub::isHub() && env('APP_ENV') != 'local') {
            User::where('role', '=', 'admin')->first()->notify(new NewUser($user, $data['messageToAdmin']));
        }

        return $user;
    }
}
