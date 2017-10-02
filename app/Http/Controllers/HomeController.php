<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

use App\Photo;
use App\User;
use Auth;
use Debugbar;
use Config;

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
        $photos = [];

        if (Schema::hasTable('follows') && Schema::hasTable('photos')) {
            $user = Auth::user();

            $following_ids = []; // hmm i dont feel this is good practice refactor later

            foreach ($user->following as $following) {
                array_push($following_ids, $following->id);
            }
            array_push($following_ids, Auth::user()->id); //always show own posts
            //dd($following_ids);

            //print_r($following_ids);

            
            if (!empty($following_ids)) {
                if (Photo::where('user_id', $following_ids)->exists())
                {
                $photos = Photo::whereIn('user_id', $following_ids)->orderBy('created_at', 'desc')->paginate(5);
                }
            }

        }

       //dd($photos);
        return view('home', ['photos' => $photos]);
    }

    public function photosbytag ($name) {
        if (Schema::hasTable('tags')) {
            $photos = Photo::whereHas('tags', function ($query) use($name) {
                    $query->where('name', '=', strtolower($name));
                })->paginate(5);
            return view('home', ['photos' => $photos]); 
        } elseif (Schema::hasTable('photos')) {
            $photos = Photo::where('description', 'like', "%#$name%" )->paginate(5);
            return view('home', ['photos' => $photos]); 
        }
    }

    public function single($photo_id, Request $request) 
	{
		$photo = Photo::find($photo_id);

		Debugbar::info($photo);
		return view('photo.show', ['photo' => $photo]);
	}
}
