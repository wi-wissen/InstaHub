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

class ProfileController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
	}
	
	public function index(Request $request) 
	{
		return view('user.index', ['users' => User::orderBy('username', 'asc')->paginate(10)]);
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

		$this->validate($request, [
			'name' => 'required|max:255|unique:users,id,'.$user->id,
			'email' => 'required|email|unique:users,id,'.$user->id,
			'bio' => 'string',
			'gender' => 'required',
			'birthday' => 'date',
			'city' => 'string',
			'country' => 'string',
			'centimeters' => 'numeric',
			'is_active' => 'boolean'
		]);

		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->bio = $request->input('bio');
		$user->gender = $request->input('gender');
		$user->birthday = $request->input('birthday_birthDay');
		$user->city = $request->input('city');
		$user->country = $request->input('country');
		$user->centimeters = $request->input('centimeters');
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

	public function followers($username) 
	{
		$user = User::where('username', $username)->first();
		return view('user.index', ['users' => $user->followers()->paginate(10)]);
	}

	public function following($username) 
	{
		$user = User::where('username', $username)->first();
		return view('user.index', ['users' => $user->following()->paginate(10)]);
	}

	public function follow($id, Request $request) // id of the person to be followed
	{
		Auth::user()->following()->attach($id); 
		return redirect('/user/' . User::find($id)->username);
	}
 
	public function unfollow($id, Request $request) // id of the person to be unfollowed
	{
	 Auth::user()->following()->detach($request->user()->id);        
	 return redirect('/user/' . $request->user()->username);
	}
}
