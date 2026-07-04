<?php

use App\Models\Comment;
use App\Models\Photo;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| App\Models\Comment
|--------------------------------------------------------------------------
*/

it('is fillable for user_id, photo_id and body', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $photo = Photo::factory()->create();

        $comment = Comment::create([
            'user_id' => $user->id,
            'photo_id' => $photo->id,
            'body' => 'Nice shot!',
        ]);

        expect($comment->exists)->toBeTrue();
        expect($comment->body)->toBe('Nice shot!');
    });
});

it('belongs to a user, eager loaded by default', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $comment = Comment::factory()->create(['user_id' => $user->id]);

        $fresh = Comment::find($comment->id);

        expect($fresh->relationLoaded('user'))->toBeTrue();
        expect($fresh->user->id)->toBe($user->id);
    });
});

describe('getHtmlAttribute()', function () {
    it('escapes HTML and links #tags and @mentions', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $comment = Comment::factory()->create(['body' => '<i>rude</i> #cool @bob']);

            $html = $comment->html;

            expect($html)->toContain('&lt;i&gt;rude&lt;/i&gt;');
            expect($html)->toContain("<a href='/tag/cool'>#cool</a>");
            expect($html)->toContain("<a href='/bob'>@bob</a>");
        });
    });
});
