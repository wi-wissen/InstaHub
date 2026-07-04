<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    /**
     * Determine whether the user can delete the comment.
     *
     * Allowed if the user is the comment author or the owner of the photo
     * the comment belongs to.
     */
    public function delete(User $user, Comment $comment): bool
    {
        return $user->id === $comment->user_id
            || $user->id === $comment->photo->user_id;
    }
}
