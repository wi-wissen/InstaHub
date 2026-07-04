<?php

use App\Http\Middleware\Subdomain;
use Illuminate\Http\Request;

it('detects no subdomain for the main domain host', function () {
    $middleware = new Subdomain;
    $request = Request::create('http://localhost/');

    expect($middleware->checkSubdomain($request))->toBeNull();
});

it('detects no subdomain for the admin domain host', function () {
    $middleware = new Subdomain;
    $request = Request::create('http://admin.localhost/');

    expect($middleware->checkSubdomain($request))->toBeNull();
});

it('detects a hub subdomain for a genuine hub host', function () {
    $middleware = new Subdomain;
    $request = Request::create('http://myhub.localhost/');

    expect($middleware->checkSubdomain($request))->toBe('myhub');
});

it('leaves the main domain request unaffected end-to-end', function () {
    $response = $this->get('http://localhost/');

    $response->assertOk();
    expect(config('app.url'))->toBe('http://localhost');
});

it('leaves the admin domain request unaffected (no hub context)', function () {
    // Unauthenticated request to a protected admin route: routing/middleware
    // still runs correctly and simply redirects to login, proving the
    // Subdomain middleware did not misidentify "admin.localhost" as a hub.
    $response = $this->get('http://admin.localhost/password');

    $response->assertRedirect('http://admin.localhost/login');
});
