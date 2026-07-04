<?php

use App\Models\Photo;
use App\Models\Tag;

/*
|--------------------------------------------------------------------------
| App\Models\Tag
|--------------------------------------------------------------------------
*/

it('is fillable for photo_id and name', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        // Use a description without hashtags so Photo::updateTags() does not
        // wipe out the tag we create manually below.
        $photo = Photo::factory()->create(['description' => 'no hashtags here']);

        $tag = Tag::create([
            'photo_id' => $photo->id,
            'name' => 'sunset',
        ]);

        expect($tag->exists)->toBeTrue();
        expect($tag->name)->toBe('sunset');
    });
});

it('belongs to a photo', function () {
    $hub = $this->createHub();

    $this->withinHub($hub, function () {
        $photo = Photo::factory()->create(['description' => 'no hashtags here']);
        $tag = Tag::factory()->create(['photo_id' => $photo->id]);

        expect($tag->photo)->toBeInstanceOf(Photo::class);
        expect($tag->photo->id)->toBe($photo->id);
    });
});
