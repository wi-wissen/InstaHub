<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Photo;
use App\User;
use Auth;

class DbadminController extends Controller
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
    public function updateTags(Request $request)
    {
        $photos = Photo::all();
        foreach ($photos as $photo) {
            $photo->updateTags();
            echo "updated $photo->id <br />";
        }
    }

}
