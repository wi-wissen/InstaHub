<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store($photo_id, Request $request)
    {
        Comment::create([
            'user_id' => $request->user()->id,
            'photo_id' =>  $photo_id,
            'body' => $request->comment,
        ]);
        
        return response()->json([
            'success' => 'true',
        ]);
    }

    /**
     * Delete the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function destroy($id)
	 {
        $entry = Comment::find($id);
		
		//$this->authorize('view', $entry);

		$entry->delete();
		flash('Comment deleted')->success();
        return redirect('home');
	 }


}
