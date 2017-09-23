<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Photo;
use App\User;
use Auth;

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
        $user = Auth::user();

        $following_ids = []; // hmm i dont feel this is good practice refactor later

        foreach ($user->following as $following) {
            array_push($following_ids, $following->id);
        }
        array_push($following_ids, Auth::user()->id); //always show own posts
        //dd($following_ids);

        //print_r($following_ids);

        $photos = [];
        if (!empty($following_ids)) {
            if (Photo::where('user_id', $following_ids)->exists())
            {
               $photos = Photo::whereIn('user_id', $following_ids)->orderBy('created_at', 'desc')->paginate(5);
            }
        }

       //dd($photos);
        return view('home', ['photos' => $photos]);
    }


    public function single(Photo $photo_id)
    {
        return view('photo.show', ['photo' => $photo_id]);
    }
}
