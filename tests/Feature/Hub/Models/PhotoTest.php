<?php

use App\Collections\PhotoCollection;
use App\Models\Analytic;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Photo;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| App\Models\Photo
|--------------------------------------------------------------------------
|
| Photos only exist inside a tenant DB, so every test here provisions a hub
| and runs inside it via withinHub().
*/

describe('getHtmlAttribute()', function () {
    it('escapes HTML and links #tags and @mentions', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $photo = Photo::factory()->create([
                'description' => '<b>Hello</b> #World @alice',
            ]);

            $html = $photo->html;

            expect($html)->toContain('&lt;b&gt;Hello&lt;/b&gt;');
            expect($html)->not->toContain('<b>Hello</b>');
            expect($html)->toContain("<a href='/tag/World'>#World</a>");
            expect($html)->toContain("<a href='/alice'>@alice</a>");
        });
    });

    it('supports german umlauts in tags and mentions', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $photo = Photo::factory()->create(['description' => '#Über @Björn']);

            $html = $photo->html;

            expect($html)->toContain("<a href='/tag/Über'>#Über</a>");
            expect($html)->toContain("<a href='/Björn'>@Björn</a>");
        });
    });
});

describe('updateTags()', function () {
    it('parses #hashtags from the description into lowercase tag rows on create', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $photo = Photo::factory()->create(['description' => 'Look at this #Sunset #BEACH day']);

            $names = $photo->tags()->orderBy('id')->pluck('name')->all();

            expect($names)->toBe(['sunset', 'beach']);
        });
    });

    it('allows duplicate tags for repeated hashtags', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $photo = Photo::factory()->create(['description' => '#foo #Foo #FOO']);

            expect($photo->tags()->orderBy('id')->pluck('name')->all())->toBe(['foo', 'foo', 'foo']);
        });
    });

    it('creates no tags when the description has no hashtags', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $photo = Photo::factory()->create(['description' => 'just a plain caption']);

            expect($photo->tags()->count())->toBe(0);
        });
    });

    it('replaces old tags with new ones when the description is updated', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $photo = Photo::factory()->create(['description' => '#old']);
            expect($photo->tags()->orderBy('id')->pluck('name')->all())->toBe(['old']);

            $photo->update(['description' => '#new']);

            expect($photo->fresh()->tags()->orderBy('id')->pluck('name')->all())->toBe(['new']);
        });
    });
});

describe('relationships', function () {
    it('exposes user, likes, comments, tags and viewers', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $owner = User::factory()->create();
            $liker = User::factory()->create();
            $photo = Photo::factory()->create(['user_id' => $owner->id, 'description' => '#hi']);

            $like = Like::factory()->create(['photo_id' => $photo->id, 'user_id' => $liker->id]);
            $comment = Comment::factory()->create(['photo_id' => $photo->id, 'user_id' => $liker->id]);
            $view = Analytic::factory()->create(['photo_id' => $photo->id, 'user_id' => $liker->id]);

            expect($photo->user)->toBeInstanceOf(User::class);
            expect($photo->user->id)->toBe($owner->id);

            expect($photo->likes)->toHaveCount(1);
            expect($photo->likes->first()->id)->toBe($like->id);

            expect($photo->comments)->toHaveCount(1);
            expect($photo->comments->first()->id)->toBe($comment->id);

            expect($photo->tags)->toHaveCount(1);
            expect($photo->tags->first())->toBeInstanceOf(Tag::class);

            expect($photo->viewers)->toHaveCount(1);
            expect($photo->viewers->first()->id)->toBe($view->id);
        });
    });
});

describe('newCollection()', function () {
    it('returns a PhotoCollection instance from queries', function () {
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            Photo::factory()->count(2)->create();

            expect(Photo::all())->toBeInstanceOf(PhotoCollection::class);
            expect(Photo::query()->get())->toBeInstanceOf(PhotoCollection::class);
        });
    });
});

describe('deleting()', function () {
    it('deletes the stored file from disk when the photo is deleted', function () {
        Storage::fake('local');
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            Storage::disk('local')->put('photos/to-delete.jpg', 'fake-contents');

            $photo = Photo::factory()->create(['url' => 'photos/to-delete.jpg']);

            expect(Storage::disk('local')->exists('photos/to-delete.jpg'))->toBeTrue();

            $photo->delete();

            expect(Storage::disk('local')->exists('photos/to-delete.jpg'))->toBeFalse();
        });
    });

    it('does not error when the file is already missing', function () {
        Storage::fake('local');
        $hub = $this->createHub();

        $this->withinHub($hub, function () {
            $photo = Photo::factory()->create(['url' => 'photos/never-existed.jpg']);

            $photo->delete();

            expect(Photo::find($photo->id))->toBeNull();
        });
    });
});
