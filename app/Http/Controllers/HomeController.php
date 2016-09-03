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
    public function index()
    {
        $photos = Photo::all();
        // return view('main.index')->with('photos', $photos);

        return view('home', ['photos' => $photos]);
    }

    public function users()
    {
        $users = User::all();
        return view('list_user', ['users' => $users]);
    }
}
