<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Photo;
use Auth;
use Storage;

class ProfileController extends Controller
{
	public function index(Request $request) 
	{
		return view('user.index', ['users' => User::orderBy('username', 'asc')->paginate(10)]);
	}

	
	public function show($username, Request $request) 
	{
		$user = User::where('username', $username)->first();
		// dd($user);
		$photos = Photo::where('user_id', $user->id)->get();

		$user_follows = $request->user()->following;
		$following_id = [];
		foreach($user_follows as $following) {
			array_push($following_id, $following->following_id);
		}

		$following = in_array($user->id, $following_id);

		return view('user.show', ['user' => $user, 'photos' => $photos, 'following' => $following]);
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
		]);

		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->bio = $request->input('bio');
		$user->gender = $request->input('gender');
		$user->birthday = $request->input('birthday_birthDay');
		$user->city = $request->input('city');
		$user->country = $request->input('country');
		$user->centimeters = $request->input('centimeters');
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
		return view('user.index', ['users' => $user->followers()->get()]);
	}

	public function following($username) 
	{
		$user = User::where('username', $username)->first();
		return view('user.index', ['users' => $user->following()->get()]);
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
