<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Photo;

class ProfileController extends Controller
{
	public function all(Request $request) 
	{
		$user_follows = $request->user()->following;
		$following_id = [];
		foreach($user_follows as $following) {
			array_push($following_id, $following->following_id);
		}
		$users = User::select()->whereNotIn('id', $following_id)->get();
		return view('user.list', ['users' => $users]);
	}

	public function single_user($username, Request $request) 
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

		return view('user.profile', ['user' => $user, 'photos' => $photos, 'following' => $following]);
	}
}
