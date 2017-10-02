<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Follow;
use Auth;

class FollowController extends Controller
{
	public function __construct ()
	{
		$this->middleware('auth'); // only authenticated users can access this route
	}
   public function follow($id, Request $request) // id of the person to be followed
   {
        $follow = new Follow;
        $follow->following_id = $id;
        $follow->follower_id = $request->user()->id;
        $follow->save();

       return redirect('/user/' . $request->user()->username);
   }

   public function unfollow($id, Request $request) // id of the person to be followed
   {
    Auth::user()->following()->detach($request->user()->id);        
    return redirect('/user/' . $request->user()->username);
   }
}
