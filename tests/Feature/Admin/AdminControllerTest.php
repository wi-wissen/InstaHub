<?php

use App\Models\Hub;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

// --- trimAnalytics (admin-context: /dba/trimanalytics, role:admin) ---

test('admin can trigger trimAnalytics when there are no hubs', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->get('http://admin.localhost/dba/trimanalytics')
        ->assertOk();
});

test('non-admin cannot trigger trimAnalytics', function () {
    $teacher = User::factory()->teacher()->create();

    $this->actingAs($teacher)
        ->get('http://admin.localhost/dba/trimanalytics')
        ->assertRedirect('/');
});

test('guest cannot trigger trimAnalytics', function () {
    $this->get('http://admin.localhost/dba/trimanalytics')
        ->assertRedirect('/login');
});

// --- redirect (hubs/{hub}/dba/redirect, role:teacher) ---
// Building the redirect URL never touches the tenant DB, so a plain
// (non-provisioned) Hub row is sufficient here.

test('teacher can redirect into their own hub', function () {
    $teacher = User::factory()->teacher()->create();
    $hub = Hub::factory()->create(['teacher_id' => $teacher->id, 'name' => 'myredirecthub']);

    $response = $this->actingAs($teacher)
        ->get("http://admin.localhost/hubs/{$hub->id}/dba/redirect");

    $response->assertRedirect();
    expect($response->headers->get('Location'))->toContain('myredirecthub.localhost/login/');
});

test('admin can redirect into any hub', function () {
    $admin = User::factory()->admin()->create();
    $teacher = User::factory()->teacher()->create();
    $hub = Hub::factory()->create(['teacher_id' => $teacher->id, 'name' => 'adminredirecthub']);

    $response = $this->actingAs($admin)
        ->get("http://admin.localhost/hubs/{$hub->id}/dba/redirect");

    $response->assertRedirect();
    expect($response->headers->get('Location'))->toContain('adminredirecthub.localhost/login/');
});

test('teacher cannot redirect into another teachers hub', function () {
    $teacher = User::factory()->teacher()->create();
    $otherTeacher = User::factory()->teacher()->create();
    $hub = Hub::factory()->create(['teacher_id' => $otherTeacher->id]);

    $this->actingAs($teacher)
        ->get("http://admin.localhost/hubs/{$hub->id}/dba/redirect")
        ->assertForbidden();
});

test('redirect stores a one-time auth token in cache', function () {
    $teacher = User::factory()->teacher()->create();
    $hub = Hub::factory()->create(['teacher_id' => $teacher->id, 'name' => 'cachetokenhub']);

    $this->actingAs($teacher)->get("http://admin.localhost/hubs/{$hub->id}/dba/redirect");

    expect(Cache::has('hub-'.$hub->id.'-auth-token'))->toBeTrue();
});
