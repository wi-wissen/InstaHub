<?php

use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('guest is redirected away from the feed', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->onHub($hub)->get($this->hubUrl($hub, '/'))->assertRedirect();
});

test('authenticated user sees an empty feed', function () {
    $hub = $this->createHub(creating: 'all_empty');
    $user = $this->withinHub($hub, fn () => User::factory()->create());

    $this->onHub($hub)->actingAs($user)
        ->get($this->hubUrl($hub, '/'))
        ->assertOk()
        ->assertSee('Nothing to show.');
});

test('feed lists photos sorted by date by default', function () {
    $hub = $this->createHub(creating: 'all_empty');

    [$user, $photo] = $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $photo = Photo::factory()->create(['user_id' => $user->id]);

        return [$user, $photo];
    });

    $this->onHub($hub)->actingAs($user)
        ->get($this->hubUrl($hub, '/'))
        ->assertOk()
        ->assertSee($photo->url, false);
});

test('feed only shows photos of followed users when the follows table exists', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $me = User::factory()->create();
        $stranger = User::factory()->create();
        $ownPhoto = Photo::factory()->create(['user_id' => $me->id]);
        $strangerPhoto = Photo::factory()->create(['user_id' => $stranger->id]);

        return compact('me', 'ownPhoto', 'strangerPhoto');
    });

    $this->onHub($hub)->actingAs($ids['me'])
        ->get($this->hubUrl($hub, '/'))
        ->assertOk()
        ->assertSee($ids['ownPhoto']->url, false)
        ->assertDontSee($ids['strangerPhoto']->url, false);
});

test('feed can be sorted by best and stores the choice in the session', function () {
    $hub = $this->createHub(creating: 'all_empty');
    $user = $this->withinHub($hub, function () {
        $user = User::factory()->create();
        Photo::factory()->create(['user_id' => $user->id]);

        return $user;
    });

    $this->onHub($hub)->actingAs($user)
        ->get($this->hubUrl($hub, '/?sort=best'))
        ->assertOk()
        ->assertSessionHas('sort_feed', 'best');
});

test('feed can be sorted with custom weights', function () {
    $hub = $this->createHub(creating: 'all_empty');
    $user = $this->withinHub($hub, function () {
        $user = User::factory()->create();
        Photo::factory()->create(['user_id' => $user->id]);

        return $user;
    });

    $this->onHub($hub)->actingAs($user)
        ->get($this->hubUrl($hub, '/?sort=custom&weights[like_weight]=5'))
        ->assertOk()
        ->assertSessionHas('sort_feed', 'custom')
        ->assertSessionHas('sort_feed_weights.like_weight', '5');
});

test('photosbytag filters photos by hashtag', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $tagged = Photo::factory()->create(['user_id' => $user->id, 'description' => 'Look at this #sunset']);
        $untagged = Photo::factory()->create(['user_id' => $user->id, 'description' => 'no tags here']);

        return compact('user', 'tagged', 'untagged');
    });

    $this->onHub($hub)->actingAs($ids['user'])
        ->get($this->hubUrl($hub, '/tag/sunset'))
        ->assertOk()
        ->assertSee($ids['tagged']->url, false)
        ->assertDontSee($ids['untagged']->url, false);
});

test('show renders a single photo and records an analytic visit', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $photo = Photo::factory()->create(['user_id' => $user->id]);

        return compact('user', 'photo');
    });

    $this->onHub($hub)->actingAs($ids['user'])
        ->get($this->hubUrl($hub, '/p/'.$ids['photo']->id))
        ->assertOk();

    $this->withinHub($hub, function () use ($ids) {
        expect(\App\Models\Analytic::where('photo_id', $ids['photo']->id)->where('user_id', $ids['user']->id)->exists())->toBeTrue();
    });
});

test('create renders the upload form', function () {
    $hub = $this->createHub(creating: 'all_empty');
    $user = $this->withinHub($hub, fn () => User::factory()->create());

    $this->onHub($hub)->actingAs($user)
        ->get($this->hubUrl($hub, '/upload'))
        ->assertOk()
        ->assertSee('Upload new Photo');
});

test('guest cannot access the upload form', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->onHub($hub)->get($this->hubUrl($hub, '/upload'))->assertRedirect();
});

test('store uploads a photo and parses hashtags from the description', function () {
    Storage::fake('local');

    $hub = $this->createHub(creating: 'all_empty');
    $user = $this->withinHub($hub, fn () => User::factory()->create());

    $file = UploadedFile::fake()->image('photo.jpg', 200, 200);

    $response = $this->onHub($hub)->actingAs($user)
        ->post($this->hubUrl($hub, '/upload'), [
            'photo' => $file,
            'description' => 'Great day at the #beach with #Friends',
        ]);

    $response->assertRedirect();

    $this->withinHub($hub, function () use ($user) {
        $photo = Photo::where('user_id', $user->id)->firstOrFail();

        expect($photo->description)->toBe('Great day at the #beach with #Friends');
        expect(Storage::disk('local')->exists($photo->url))->toBeTrue();

        $tagNames = $photo->tags()->pluck('name')->sort()->values()->all();
        expect($tagNames)->toBe(['beach', 'friends']);
    });
});

test('store validates required fields', function () {
    $hub = $this->createHub(creating: 'all_empty');
    $user = $this->withinHub($hub, fn () => User::factory()->create());

    $this->onHub($hub)->actingAs($user)
        ->post($this->hubUrl($hub, '/upload'), [])
        ->assertSessionHasErrors(['photo', 'description']);
});

test('guest cannot store a photo', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $this->onHub($hub)->post($this->hubUrl($hub, '/upload'), [
        'description' => 'nope',
    ])->assertRedirect();
});

test('hub-only routes are blocked when accessed through the admin domain', function () {
    $hub = $this->createHub(creating: 'all_empty');

    $ids = $this->withinHub($hub, function () {
        $user = User::factory()->create();
        $photo = Photo::factory()->create(['user_id' => $user->id]);

        return compact('user', 'photo');
    });

    // The hub route group's domain pattern ("{subdomain}.localhost") also
    // technically matches "admin.localhost" - IsHubMiddleware explicitly
    // rejects that case. We use the like-route here (rather than /upload)
    // because single-segment hub paths collide with a catch-all "/{user}"
    // route that already exists on the literal admin domain.
    $this->actingAs($ids['user']);
    $_SERVER['HTTP_HOST'] = config('app.domain_admin');
    app()->forgetInstance('requestHub');

    $this->withServerVariables(['HTTP_HOST' => config('app.domain_admin')])
        ->post('http://'.config('app.domain_admin').'/api/me/like/'.$ids['photo']->id)
        ->assertForbidden();
});
