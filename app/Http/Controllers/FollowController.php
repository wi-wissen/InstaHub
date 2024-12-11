<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // only authenticated users can access this route
    }

    public function followers(User $user)
    {
        return view('user.index', ['users' => $user->followers()->paginate(10), 'heading' => __('Followers of ').$user->username]);
    }

    public function following(User $user)
    {
        return view('user.index', ['users' => $user->following()->paginate(10), 'heading' => $user->username.__(' is following')]);
    }

    public function follow(User $user, Request $request) // id of the person to be followed
    {
        Auth::user()->following()->attach($user);

        return response()->json([
            'follow' => 'true',
        ]);
    }

    public function unfollow(User $user, Request $request) // id of the person to be followed
    {
        Auth::user()->following()->detach(User::find($user));

        return response()->json([
            'follow' => 'false',
        ]);
    }
}
