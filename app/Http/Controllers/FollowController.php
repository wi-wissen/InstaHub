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
          $follow = FollowResource::collection(User::all());
          return view('follow.index', ['follow' => $follow->response()->content()]);
     }

     public function apiIndex() 
     {
          return  FollowResource::collection(User::all());
     }
   
    public function followers($username) 
	{
		$user = User::where('username', $username)->first();
		return view('user.index', ['users' => $user->followers()->paginate(10), 'heading' => __('Followers of ') . $user->username]);
	}

	public function following($username) 
	{
		$user = User::where('username', $username)->first();
		return view('user.index', ['users' => $user->following()->paginate(10), 'heading' => __('User that ') . $user->username . __(' follows')]);
    }
    
    public function follow($id, Request $request) // id of the person to be followed
   {
        Auth::user()->following()->attach($id); 
        return response()->json([
          'follow' => 'true'
        ]);
   }

   public function unfollow($id, Request $request) // id of the person to be followed
   {
        Auth::user()->following()->detach(User::find($id));       
        return response()->json([
          'follow' => 'false'
        ]);
   }
}
