<?php

use App\Models\Hub;
use App\Models\User;

/**
 * HubController@index and @show render Livewire components (`hub.index`,
 * `hub.show`) that read real per-hub computed attributes (`$hub->admin`,
 * `->activated`, `->readonly`, `->hasWorkingUser`, table listings) which open
 * an actual connection to that hub's tenant database. So, unlike pure
 * listing/validation tests, any scenario that renders a non-empty hub row
 * needs a *really* provisioned hub (createHub()), which is why these live
 * here rather than in Feature/Admin.
 */

/**
 * ProvisionsHubs::createTeacher() inserts the row via User::create(), and
 * `email_verified_at` is intentionally not mass-assignable (see
 * App\Models\User::$fillable / tests/README.md rule #1) so it is silently
 * dropped, leaving the teacher unverified. That's invisible for hub-domain
 * requests (User::hasVerifiedEmail() short-circuits to true there), but the
 * admin domain's `verified` middleware does check it for real, so any test
 * that authenticates *as* a createTeacher()-made user against admin.localhost
 * needs it marked verified first.
 */
function indexShowTestVerifyEmail(User $user): User
{
    $user->forceFill(['email_verified_at' => now()])->save();

    return $user;
}

test('teacher only sees their own hubs', function () {
    $teacher = indexShowTestVerifyEmail($this->createTeacher());
    $otherTeacher = $this->createTeacher();

    $ownHub = $this->createHub($teacher, ['name' => 'ownhub'.uniqid()], 'all_empty');
    $this->createHub($otherTeacher, ['name' => 'otherhub'.uniqid()], 'all_empty');

    $this->actingAs($teacher)
        ->get('http://admin.localhost/')
        ->assertOk()
        ->assertSee($ownHub->name);
});

test('admin sees all hubs', function () {
    $admin = User::factory()->admin()->create(['hub_default_generation' => 1]);
    $teacher = $this->createTeacher();

    $hubA = $this->createHub($teacher, ['name' => 'firsthub'.uniqid()], 'all_empty');
    $hubB = $this->createHub($teacher, ['name' => 'secondhub'.uniqid()], 'all_empty');

    $this->actingAs($admin)
        ->get('http://admin.localhost/hubs')
        ->assertOk()
        ->assertSee($hubA->name)
        ->assertSee($hubB->name);
});

test('hub listing can be searched by name', function () {
    $admin = User::factory()->admin()->create(['hub_default_generation' => 1]);
    $teacher = $this->createTeacher();

    $match = $this->createHub($teacher, ['name' => 'findmehub'], 'all_empty');
    $noMatch = $this->createHub($teacher, ['name' => 'unrelated'], 'all_empty');

    $this->actingAs($admin)
        ->get('http://admin.localhost/hubs?search=findme')
        ->assertOk()
        ->assertSee($match->name)
        ->assertDontSee($noMatch->name);
});

test('hub listing is paginated at 10 per page', function () {
    $admin = User::factory()->admin()->create(['hub_default_generation' => 1]);
    $teacher = $this->createTeacher();

    $hubs = collect(range(1, 11))->map(
        fn ($i) => $this->createHub($teacher, ['name' => 'pagehub'.$i], 'all_empty')
    );

    $firstPage = $this->actingAs($admin)->get('http://admin.localhost/hubs');
    $firstPage->assertOk();
    foreach ($hubs->take(10) as $hub) {
        $firstPage->assertSee($hub->name);
    }
    $firstPage->assertDontSee($hubs->last()->name);

    $this->actingAs($admin)
        ->get('http://admin.localhost/hubs?page=2')
        ->assertOk()
        ->assertSee($hubs->last()->name);
})->group('slow');

// --- show, against a real provisioned tenant ---

test('teacher can view their own hub', function () {
    $teacher = indexShowTestVerifyEmail($this->createTeacher());
    $hub = $this->createHub($teacher, creating: 'users');

    $this->actingAs($teacher)
        ->get("http://admin.localhost/hubs/{$hub->id}")
        ->assertOk();
});

test('admin can view any hub', function () {
    $admin = User::factory()->admin()->create(['hub_default_generation' => 1]);
    $teacher = $this->createTeacher();
    $hub = $this->createHub($teacher, creating: 'users');

    $this->actingAs($admin)
        ->get("http://admin.localhost/hubs/{$hub->id}")
        ->assertOk()
        ->assertSee('users');
});
