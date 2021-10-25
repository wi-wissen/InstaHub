<?php

namespace App\Http\Controllers\Auth;

use App\Facades\RequestHub;
use App\Http\Controllers\Controller;
use App\Notifications\NewUser;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use Storage;

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
     * Where to redirect users after login / registration.
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
     * @return User
     */
    protected function create(array $data)
    {
        //$url = $data['avatar']->file('avatar')->store('avatars');
        if (array_key_exists('avatar', $data)) {
            if ($data['avatar']) {
                $url = Storage::putFile('avatars', $data['avatar']);
            } else {
                $url = 'avatar.png';
            }
        } else {
            $url = 'avatar.png';
        }

        $role = 1;
        if (! RequestHub::isHub()) {
            $role = 3;
        }

        $user = User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'bio' => array_has($data, 'bio') ? $data['bio'] : null,
            'gender' => array_has($data, 'gender') ? $data['gender'] : null,
            'birthday' => array_has($data, 'birthday') ? $data['birthday'] : null,
            'city' => array_has($data, 'city') ? $data['city'] : null,
            'country' => array_has($data, 'country') ? $data['country'] : null,
            'centimeters' => array_has($data, 'centimeters') ? $data['centimeters'] : null,
            'avatar' => $url,
            'role' => $role,
        ]);

        if (env('APP_ENV') == 'local') {
            $user->is_active = 1;
        }

        //don't work above. I have no clue...
        $user->role = $role;
        $user->save();

        //send message to admin if teacher apply for account in root
        if (! RequestHub::isHub() && env('APP_ENV') != 'local') {
            //Mail::to(User::where('role','=', 'admin')->first())->send(new NewUser($user, $data['messageToAdmin']));
            User::where('role', '=', 'admin')->first()->notify(new NewUser($user, $data['messageToAdmin']));
        }

        return $user;
    }
}
