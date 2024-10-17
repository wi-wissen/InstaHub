<?php

namespace App\Http\Controllers;

use App\Facades\RequestHub;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserActivated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Mailer\Exception\TransportException;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $filter = null, $param = null)
    {
        if ($filter == 'suggested') {
            return view('user.index', ['users' => User::getSuggested(), 'heading' => __('Suggested')]); //TODO: Lassen sich Punkte mit übertragen?
        } elseif ($filter == 'letter') {
            return view('user.index', ['users' => User::where('username', 'LIKE', $param.'%')->orderBy('username', 'asc')->paginate(10), 'char' => $param]);
        } else {
            return view('user.index', ['users' => User::orderBy('username', 'asc')->paginate(10), 'char' => 'All']);
        }
    }

    public function show($username, Request $request)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('user.show', ['user' => $user]);
    }

    public function edit($username)
    {
        $user = User::where('username', $username)->firstOrFail();

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'bio' => 'max:500',
            'birthday' => 'nullable|date_format:Y-m-d',
            'city' => 'nullable|string',
            'country' => 'nullable|string',
            'centimeters' => 'nullable|numeric',
            'is_active' => 'boolean',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->bio = $request->input('bio');
        $user->gender = $request->input('gender') ?: null;
        $user->birthday = $request->input('birthday') ?: null;
        $user->city = $request->input('city') ?: null;
        $user->country = $request->input('country') ?: null;
        $user->centimeters = $request->input('centimeters') ?: null;
        if (Auth::user()->allowed('dba')) {
            $user->is_active = ($request->has('is_active')) ? true : false;
        }

        if ($request->hasFile('avatar')) {
            if ($request->file('avatar')->isValid()) {
                $user->avatar = Storage::putFile('avatars', $request->file('avatar'));
            } else {
                flash(__('Can not upload Avatar'))->error();
            }
        }
        $user->save();
        flash(__('All Changes saved'))->success();

        return redirect('/'.$user->username);
    }

    public function activate($username, Request $request)
    {
        $user = User::where('username', $username)->firstOrFail();

        if (Auth::user()->allowed('dba')) {
            $user->save();
            $user->is_active = true;
            $user->save();
            flash(__('User activated'))->success();

            if (! RequestHub::isHub()) {
                try{
                    $user->notify(new UserActivated(RequestHub::url()));
                }
                catch(TransportException $e){
                    flash(__('Can\'t send mail: '.$e->getMessage()))->error();
                }
            }
        } else {
            flash(__('You are not allowed to do this!'))->error();
        }

        return redirect('/'.$user->username);
    }

    public function deactivate($username, Request $request)
    {
        $user = User::where('username', $username)->firstOrFail();

        if (Auth::user()->allowed('dba')) {
            $user->save();
            $user->is_active = false;
            $user->save();
            flash(__('User deactivated'))->success();
        } else {
            flash(__('You are not allowed to do this!'))->error();
        }

        return redirect('/'.$user->username);
    }

    public function destroy($username)
    {
        $user = User::where('username', $username)->first();
        $user->delete();
        flash(__('User deleted'))->success();

        return redirect('/');
    }

    public function getPassword()
    {
        return view('auth.passwords.set');
    }

    public function postPassword(Request $request)
    {
        $this->validate(request(), [
            'password' => 'required|min:5',
            'password_confirmation' => 'same:password',
        ]);

        if (Hash::check($request->input('old_password'), Auth::user()->getAuthPassword())) {
            if (! strcmp($request->input('password'), $request->input('password_confirmation'))) {
                if (strlen($request->input('password')) > 4) {
                    Auth::user()->password = bcrypt($request->input('password'));
                    Auth::user()->save();
                    flash(__('Password changed'), 'success');
                } else {
                    flash(__('Password minlength is 5 characters'), 'warning');
                }
            } else {
                flash(__('New password does not match with confirmed password'), 'danger');
            }
        } else {
            flash(__('Wrong password'), 'danger');
        }

        return redirect('/');
    }

    public function getNewPassword($username)
    {
        $this->middleware('role:dba');

        //generate id
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $pw = ''; $i < 6; $i++) {
            $index = rand(0, $count - 1);
            $pw .= mb_substr($chars, $index, 1);
        }

        $user = User::where('username', $username)->firstOrFail();

        $user->password = bcrypt($pw);
        $user->save();

        return response()->json([
            'password' => $pw,
        ]);
    }
}
