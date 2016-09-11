<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Follow;

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

       return redirect('home');
   }
}
