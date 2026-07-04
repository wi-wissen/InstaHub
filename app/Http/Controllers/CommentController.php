<?php

namespace App\Http\Controllers;

use App\Http\Resources\Comment as CommentResource;
use App\Models\Comment;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
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

        abort_if($entry === null, 404);

        // A comment may be removed by its author or by the owner of the photo
        // it belongs to.
        $photoOwnerId = Photo::whereKey($entry->photo_id)->value('user_id');
        abort_unless(
            $entry->user_id === Auth::id() || $photoOwnerId === Auth::id(),
            403
        );

        $entry->delete();

        return response()->json([
            'success' => 'true',
        ]);
    }
}
