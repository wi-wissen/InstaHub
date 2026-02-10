<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function like($id, Request $request)
    {
        $like = Like::where([
            'photo_id' => $id,
            'user_id' => $request->user()->id,
        ])->first();

        if (! $like) {
            Like::create([
                'photo_id' => $id,
                'user_id' => $request->user()->id,
            ]);

            return response()->json([
                'like' => 'true',
            ]);
        } else {
            $like->delete(); // No need to query again

            return response()->json([
                'like' => 'false',
            ]);
        }
    }
}
