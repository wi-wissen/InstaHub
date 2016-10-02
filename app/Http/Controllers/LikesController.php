<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Like;

class LikesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like($id, Request $request)
    {
        $like = Like::where([
            'photo_id' => $id,
            'user_id' => $request->user()->id
        ])->first();

        if(!$like) {
            Like::create([
                'photo_id' => $id,
                'user_id' => $request->user()->id,
            ]);
            // return redirect('home');
            return response()->json([
                'liked' => 'true',
                'disliked' => 'false'
            ]);
        }

        $like->delete(); // No need to query again
        // return redirect('home');
        return response()->json([
            'liked' => 'false',
            'disliked' => 'true'
        ]);
        // Will refactor to make ajax requestw
    }
}
