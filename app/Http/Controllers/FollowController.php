<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Http\Resources\Follow as FollowResource;
use Auth;

class FollowController extends Controller
{
	public function __construct ()
	{
		$this->middleware('auth'); // only authenticated users can access this route
     }
     
     public function index() 
     {
          return  FollowResource::collection(User::all());
          return view('follow.index', ['user' => $user]);
     }
   
    public function followers($username) 
	{
		$user = User::where('username', $username)->first();
		return view('user.index', ['users' => $user->followers()->paginate(10), 'heading' => 'Followers of ' . $user->username]);
	}

	public function following($username) 
	{
		$user = User::where('username', $username)->first();
		return view('user.index', ['users' => $user->following()->paginate(10), 'heading' => 'User that ' . $user->username . ' follows']);
    }
    
    public function follow($id, Request $request) // id of the person to be followed
   {
        Auth::user()->following()->attach($id); 
        flash('Now following ' . User::find($id)->name . '.')->success();
        return redirect('/user/' . User::find($id)->username);
   }

   public function unfollow($id, Request $request) // id of the person to be followed
   {
        Auth::user()->following()->detach(User::find($id));  
        flash('Unfollowed ' . User::find($id)->name . '.')->success();      
        return redirect('/user/' . $request->user()->username);
   }
}
