<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Photo;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $photos = Photo::where('user_id', $user->following);

        return view('home', ['photos' => $photos]);
    }

    public function users()
    {
        $users = User::all();
        return view('list_user', ['users' => $users]);
    }
}
