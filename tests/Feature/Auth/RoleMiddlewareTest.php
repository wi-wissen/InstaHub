<?php

use App\Http\Middleware\Role;
use App\Models\User;
use Illuminate\Http\Request;

it('allows a teacher to access a teacher-only admin-domain route', function () {
    $teacher = User::factory()->teacher()->create();

    $response = $this->actingAs($teacher)->get('http://admin.localhost/password');

    $response->assertOk();
    $response->assertViewIs('auth.passwords.set');
});

it('redirects a plain user away from a teacher-only admin-domain route and flashes an error', function () {
    $user = User::factory()->user()->create();

    $response = $this->actingAs($user)->get('http://admin.localhost/password');

    $response->assertRedirect('http://admin.localhost');
    $response->assertSessionHas('flash_notification', function ($messages) {
        return $messages->first()->message === __('You are not allowed to do this!')
            && $messages->first()->level === 'danger';
    });
});

it('redirects a teacher away from an admin-only admin-domain route', function () {
    $teacher = User::factory()->teacher()->create();

    $response = $this->actingAs($teacher)->get('http://admin.localhost/explore/users');

    $response->assertRedirect('http://admin.localhost');
    $response->assertSessionHas('flash_notification');
});

it('allows an admin to access an admin-only admin-domain route', function () {
    $admin = User::factory()->admin()->create();

    $response = $this->actingAs($admin)->get('http://admin.localhost/dba/trimanalytics');

    $response->assertOk();
});

it('calls the next middleware when the user is allowed() the given role', function () {
    $user = Mockery::mock(User::class)->makePartial();
    $user->shouldReceive('allowed')->with('teacher')->andReturn(true);

    $request = Mockery::mock(Request::class)->makePartial();
    $request->shouldReceive('user')->andReturn($user);

    $middleware = new Role;

    $called = false;
    $next = new Symfony\Component\HttpFoundation\Response('next-response');
    $response = $middleware->handle($request, function ($req) use (&$called, $next) {
        $called = true;

        return $next;
    }, 'teacher');

    expect($called)->toBeTrue();
    expect($response)->toBe($next);
});

it('redirects to / and flashes an error when the user is not allowed() the given role', function () {
    $user = Mockery::mock(User::class)->makePartial();
    $user->shouldReceive('allowed')->with('admin')->andReturn(false);

    $request = Mockery::mock(Request::class)->makePartial();
    $request->shouldReceive('user')->andReturn($user);

    $middleware = new Role;

    $called = false;
    $response = $middleware->handle($request, function () use (&$called) {
        $called = true;
    }, 'admin');

    expect($called)->toBeFalse();
    expect($response->getTargetUrl())->toContain('/');
    expect(session('flash_notification'))->not->toBeNull();
});
