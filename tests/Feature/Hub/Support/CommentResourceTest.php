<?php

use App\Http\Resources\Comment as CommentResource;
use App\Models\Comment;
use App\Models\Photo;
use App\Models\User;

it('exposes id, escaped html text and the comment owner', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $owner = User::factory()->create(['name' => 'Commenter', 'username' => 'commenter', 'avatar' => 'avatar.png']);
        $photo = Photo::factory()->create();
        $comment = Comment::factory()->create([
            'user_id' => $owner->id,
            'photo_id' => $photo->id,
            'body' => '<script>alert(1)</script>',
        ]);

        $data = (new CommentResource($comment))->toArray(request());

        expect($data['id'])->toBe($comment->id);
        expect($data['text'])->toBe($comment->html);
        expect($data['text'])->not->toContain('<script>');
        expect($data['owner'])->toBeInstanceOf(\App\Http\Resources\User::class);

        $ownerArray = $data['owner']->toArray(request());
        expect($ownerArray)->toBe([
            'username' => 'commenter',
            'name' => 'Commenter',
            'avatar' => 'avatar.png',
        ]);
    });
});
