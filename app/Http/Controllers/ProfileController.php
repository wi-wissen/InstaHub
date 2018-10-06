<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Photo;
use Auth;
use Storage;

use Debugbar;
use Config;

use Session;

use App\Notifications\UserActivated;

class ProfileController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
	}
	
	public function index(Request $request) 
	{
		return view('user.index', ['users' => User::orderBy('username', 'asc')->paginate(10), 'char' => 'All']);
	}

	public function filter($filter, Request $request) 
	{
		return view('user.index', ['users' => User::where('username', 'LIKE', $filter . '%')->orderBy('username', 'asc')->paginate(10), 'char' => $filter]);
	}

	
	public function show($username, Request $request) 
	{
		Debugbar::info(Config::get('database.default'));

		$user = User::where('username', $username)->first();

		Debugbar::info($user);
		return view('user.show', ['user' => $user]);
	}

	public function edit($username)
    {
        $user = User::where('username', $username)->first();
        return view('user.edit',compact('user'));
    }

	 public function update(Request $request, $username)
	 {
		$user = User::where('username', $username)->first();

		if ($request->input('birthday_birthDay') == "NaN-NaN-NaN")
		{
			//fix error in js
			$request->merge(['birthday_birthDay' => null]);
		}

		$this->validate($request, [
			'name' => 'required|max:255',
			'email' => 'required|email|unique:users,email,'.$user->id,
			'bio' => 'max:500',
			'gender' => 'required',
			'birthday_birthDay' => 'nullable|date',
			'city' => 'nullable|string',
			'country' => 'nullable|string',
			'centimeters' => 'nullable|numeric',
			'is_active' => 'boolean'
		]);

		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->bio = $request->input('bio');
		$user->gender = $request->input('gender');
		$user->birthday = $request->input('birthday_birthDay') ?: null;
		$user->city = $request->input('city') ?: null;
		$user->country = $request->input('country') ?: null;
		$user->centimeters = $request->input('centimeters') ?: null;
		if (Auth::user()->allowed('dba')) $user->is_active = ($request->has('is_active')) ? true : false ;
		
		if ($request->hasFile('avatar')) {
			if ($request->file('avatar')->isValid()) {
				$user->avatar = Storage::putFile('avatars', $request->file('avatar'));
			} else {
				flash('Can not upload Avatar')->error();
			}	
		}
		$user->save();
		flash('All Changes saved')->success();
		return redirect('user/' . $user->username);
	 }

	public function activate($username, Request $request) 
	{
		Debugbar::info(Config::get('database.default'));

		$user = User::where('username', $username)->first();

		if (Auth::user()->allowed('dba')) {
			$user->save();
			$user->is_active = true;
			$user->save();
			flash('User activated')->success();

			if (Session::get('hub', 'root') == 'root') {
				$user->notify(new UserActivated());
			}
		}
		else {
			flash('You are not allowed to do this.')->error();
		}

		return redirect('user/' . $user->username);
	}

	public function deactivate($username, Request $request) 
	{
		Debugbar::info(Config::get('database.default'));

		$user = User::where('username', $username)->first();

		if (Auth::user()->allowed('dba')) {
			$user->save();
			$user->is_active = false;
			$user->save();
			flash('User deactivated')->success();
		}
		else {
			flash('You are not allowed to do this.')->error();
		}

		return redirect('user/' . $user->username);
	}



}
