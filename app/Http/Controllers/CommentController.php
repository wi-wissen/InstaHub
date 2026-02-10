<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Resources\Comment as CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',
        ];
    }

    public function store($photo_id, Request $request)
    {
        $comment = Comment::create([
            'user_id' => Auth::id(),
            'photo_id' => $photo_id,
            'body' => $request->comment,
        ]);

        return new CommentResource($comment);
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

        // $this->authorize('view', $entry);

        $entry->delete();

        return response()->json([
            'success' => 'true',
        ]);
    }
}
