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

        $following_ids = []; // hmm i dont feel this is good practice refactor later

        foreach ($user->following as $following) {
            array_push($following_ids, $following->following_id);
        }

        print_r($following_ids);

        $photos = Photo::where('user_id',$following_ids)->orderBy('created_at', 'desc')->paginate(5);
//        dd($photos);
        return view('home', ['photos' => $photos]);
    }

    public function users()
    {
        $users = User::all();
        return view('list_user', ['users' => $users]);
    }

    public function single(Photo $photo_id)
    {
        return view('single', ['photo' => $photo_id]);
    }
}
