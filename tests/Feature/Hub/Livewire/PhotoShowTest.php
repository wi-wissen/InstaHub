<?php

use App\Livewire\Photo\Show;
use App\Models\Comment;
use App\Models\Photo;
use App\Models\User;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| App\Livewire\Photo\Show
|--------------------------------------------------------------------------
|
| Photos, likes and comments only exist inside a tenant DB, and the
| component relies on Auth::user() being a tenant user. Every test runs
| inside withinHub() so RequestHub::isHub() is true and the tenant
| connection is active for the whole Livewire lifecycle.
*/

test('renders a photo with its author, likes and comments', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->withinHub($hub, function () use ($hub) {
        $author = User::factory()->create(['username' => 'author1']);
        $viewer = User::factory()->dba()->create();
        $photo = Photo::factory()->for($author)->create(['description' => 'Hello #world']);
        Comment::factory()->create(['photo_id' => $photo->id, 'user_id' => $author->id, 'body' => 'nice shot']);

        $this->actingAs($viewer);

        Livewire::test(Show::class, ['photo' => $photo])
            ->assertOk()
            ->assertSet('readonly', false)
            ->assertSet('admin', true)
            ->assertSee('author1')
            ->assertSee('nice shot');
    });
});

test('toggleLike creates a like for the current user and removes it on toggle', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->withinHub($hub, function () use ($hub) {
        $author = User::factory()->create();
        $viewer = User::factory()->create();
        $photo = Photo::factory()->for($author)->create();

        $this->actingAs($viewer);

        $component = Livewire::test(Show::class, ['photo' => $photo])
            ->call('toggleLike');

        expect($photo->fresh()->likes()->where('user_id', $viewer->id)->exists())->toBeTrue();

        $component->call('toggleLike');

        expect($photo->fresh()->likes()->where('user_id', $viewer->id)->exists())->toBeFalse();
    });
});

test('postComment stores a new comment and resets the input', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->withinHub($hub, function () use ($hub) {
        $author = User::factory()->create();
        $viewer = User::factory()->create();
        $photo = Photo::factory()->for($author)->create();

        $this->actingAs($viewer);

        Livewire::test(Show::class, ['photo' => $photo])
            ->set('comment', 'a fresh comment')
            ->call('postComment')
            ->assertSet('comment', '')
            ->assertSet('showInput', false);

        expect($photo->fresh()->comments()->where('body', 'a fresh comment')->exists())->toBeTrue();
    });
});

test('postComment requires a non-empty comment', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->withinHub($hub, function () use ($hub) {
        $author = User::factory()->create();
        $viewer = User::factory()->create();
        $photo = Photo::factory()->for($author)->create();

        $this->actingAs($viewer);

        Livewire::test(Show::class, ['photo' => $photo])
            ->set('comment', '')
            ->call('postComment')
            ->assertHasErrors(['comment' => 'required']);
    });
});

test('deleteComment is only allowed for dba/admin users', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->withinHub($hub, function () use ($hub) {
        $author = User::factory()->create();
        $plainViewer = User::factory()->create();
        $photo = Photo::factory()->for($author)->create();
        $comment = Comment::factory()->create(['photo_id' => $photo->id, 'user_id' => $author->id]);

        $this->actingAs($plainViewer);

        Livewire::test(Show::class, ['photo' => $photo])
            ->call('deleteComment', $comment->id);

        expect(Comment::find($comment->id))->not->toBeNull();
    });
});

test('deleteComment removes the comment for its author', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->withinHub($hub, function () {
        $owner = User::factory()->create();
        $author = User::factory()->create();
        $photo = Photo::factory()->for($owner)->create();
        $comment = Comment::factory()->create(['photo_id' => $photo->id, 'user_id' => $author->id]);

        $this->actingAs($author);

        Livewire::test(Show::class, ['photo' => $photo])
            ->call('deleteComment', $comment->id);

        expect(Comment::find($comment->id))->toBeNull();
    });
});

test('deleteComment removes the comment for the photo owner', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->withinHub($hub, function () {
        $owner = User::factory()->create();
        $author = User::factory()->create();
        $photo = Photo::factory()->for($owner)->create();
        $comment = Comment::factory()->create(['photo_id' => $photo->id, 'user_id' => $author->id]);

        $this->actingAs($owner);

        Livewire::test(Show::class, ['photo' => $photo])
            ->call('deleteComment', $comment->id);

        expect(Comment::find($comment->id))->toBeNull();
    });
});

test('deleteComment does not remove the comment for an unrelated dba user', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->withinHub($hub, function () {
        $owner = User::factory()->create();
        $author = User::factory()->create();
        $dba = User::factory()->dba()->create();
        $photo = Photo::factory()->for($owner)->create();
        $comment = Comment::factory()->create(['photo_id' => $photo->id, 'user_id' => $author->id]);

        $this->actingAs($dba);

        Livewire::test(Show::class, ['photo' => $photo])
            ->call('deleteComment', $comment->id);

        // The CommentPolicy only allows the author or the photo owner, so a dba
        // with no relation to the comment cannot delete it.
        expect(Comment::find($comment->id))->not->toBeNull();
    });
});
