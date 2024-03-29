<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Resources\Follow as FollowResource;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function __construct()
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

        return view('user.index', ['users' => $user->followers()->paginate(10), 'heading' => __('Followers of ').$user->username]);
    }

    public function following($username)
    {
        $user = User::where('username', $username)->first();

        return view('user.index', ['users' => $user->following()->paginate(10), 'heading' => $user->username.__(' is following')]);
    }

    public function follow($username, Request $request) // id of the person to be followed
    {
        $user = User::where('username', $username)->first();
        Auth::user()->following()->attach($user);

        return response()->json([
            'follow' => 'true',
        ]);
    }

    public function unfollow($username, Request $request) // id of the person to be followed
    {
        $user = User::where('username', $username)->first();
        Auth::user()->following()->detach(User::find($user));

        return response()->json([
            'follow' => 'false',
        ]);
    }
}
