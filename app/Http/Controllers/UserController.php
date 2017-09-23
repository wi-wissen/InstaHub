<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Input;
use Config;
use Auth;
use Schema;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function destroy($username)
    {
        $user = User::where('username', $username)->first();
        if (User::where('avatar', '=', $user->avatar)->count == 1)
		{
			//prevent deleting a file who is in use in an other avatar
			Storage::disk('local')->delete($user->avatar);
		}  
        $user->delete();
        flash('User deleted')->success();
        return redirect('home');
    }

    public function getPassword()
    {
        return view('auth.set');
    }

    public function postPassword()
    {
        if (Hash::check(Input::get('old_password'), Auth::user()->getAuthPassword())) {
            if (!strcmp(Input::get('password'), Input::get('password_confirmation'))) {
                if (strlen(Input::get('password'))>5) {
                    Auth::user()->password = bcrypt(Input::get('password'));
                    Auth::user()->save();
                    flash('Password changed', 'success');
                } else {
                    flash('password minlength is 6 characters', 'warning');
                }
                
            } else {
                flash('New password does not match with confirmed password', 'danger');
            }

        }
        else {
            flash('Wrong password', 'danger');
        }
        

        
        return view('auth.set');
    }

}