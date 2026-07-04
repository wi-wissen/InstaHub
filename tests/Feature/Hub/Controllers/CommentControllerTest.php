<?php

use App\Models\Comment;
use App\Models\Photo;
use App\Models\User;

test('guest cannot post a comment', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $photoId = $this->withinHub($hub, function () {
        $user = User::factory()->create();

        return Photo::factory()->create(['user_id' => $user->id])->id;
    });

    $this->onHub($hub)
        ->post($this->hubUrl($hub, '/api/me/comment/'.$photoId), ['comment' => 'hi'])
        ->assertRedirect();
});

test('authenticated user can post a comment on a photo', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $owner = User::factory()->create();
        $commenter = User::factory()->create();
        $photo = Photo::factory()->create(['user_id' => $owner->id]);

        return compact('commenter', 'photo');
    });

    $response = $this->onHub($hub)->actingAs($ids['commenter'])
        ->post($this->hubUrl($hub, '/api/me/comment/'.$ids['photo']->id), [
            'comment' => 'Nice #photo!',
        ]);

    $response->assertCreated()
        ->assertJsonPath('data.owner.username', $ids['commenter']->username);

    $this->withinHub($hub, function () use ($ids) {
        $comment = Comment::where('photo_id', $ids['photo']->id)->first();

        expect($comment)->not->toBeNull();
        expect($comment->body)->toBe('Nice #photo!');
        expect($comment->user_id)->toBe($ids['commenter']->id);
    });
});

test('authenticated user can delete a comment', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $photo = Photo::factory()->create(['user_id' => $user->id]);
        $comment = Comment::factory()->create(['user_id' => $user->id, 'photo_id' => $photo->id]);

        return compact('user', 'comment');
    });

    $this->onHub($hub)->actingAs($ids['user'])
        ->delete($this->hubUrl($hub, '/api/me/comment/'.$ids['comment']->id))
        ->assertOk()
        ->assertJson(['success' => 'true']);

    $this->withinHub($hub, function () use ($ids) {
        expect(Comment::find($ids['comment']->id))->toBeNull();
    });
});

test('guest cannot delete a comment', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $commentId = $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $photo = Photo::factory()->create(['user_id' => $user->id]);

        return Comment::factory()->create(['user_id' => $user->id, 'photo_id' => $photo->id])->id;
    });

    $this->onHub($hub)
        ->delete($this->hubUrl($hub, '/api/me/comment/'.$commentId))
        ->assertRedirect();

    $this->withinHub($hub, function () use ($commentId) {
        expect(Comment::find($commentId))->not->toBeNull();
    });
});

test('a user who is neither the author nor the photo owner cannot delete a comment', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $owner = User::factory()->create();
        $author = User::factory()->create();
        $stranger = User::factory()->create();
        $photo = Photo::factory()->create(['user_id' => $owner->id]);
        $comment = Comment::factory()->create(['user_id' => $author->id, 'photo_id' => $photo->id]);

        return compact('stranger', 'comment');
    });

    $this->onHub($hub)->actingAs($ids['stranger'])
        ->delete($this->hubUrl($hub, '/api/me/comment/'.$ids['comment']->id))
        ->assertForbidden();

    $this->withinHub($hub, function () use ($ids) {
        expect(Comment::find($ids['comment']->id))->not->toBeNull();
    });
});

test('the photo owner can delete a comment left on their photo by someone else', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $owner = User::factory()->create();
        $author = User::factory()->create();
        $photo = Photo::factory()->create(['user_id' => $owner->id]);
        $comment = Comment::factory()->create(['user_id' => $author->id, 'photo_id' => $photo->id]);

        return compact('owner', 'comment');
    });

    $this->onHub($hub)->actingAs($ids['owner'])
        ->delete($this->hubUrl($hub, '/api/me/comment/'.$ids['comment']->id))
        ->assertOk()
        ->assertJson(['success' => 'true']);

    $this->withinHub($hub, function () use ($ids) {
        expect(Comment::find($ids['comment']->id))->toBeNull();
    });
});
