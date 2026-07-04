<?php

use App\Http\Middleware\IsHubMiddleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

it('aborts with 403 when the request URL starts with the admin URL', function () {
    $middleware = new IsHubMiddleware;
    $request = Request::create(config('app.url_admin').'/some/path');

    try {
        $middleware->handle($request, fn ($req) => $req);
        $this->fail('Expected an HttpException to be thrown.');
    } catch (HttpException $e) {
        expect($e->getStatusCode())->toBe(403);
    }
});

it('passes the request through when the URL does not start with the admin URL', function () {
    $middleware = new IsHubMiddleware;
    $request = Request::create('http://localhost/foo');

    $result = $middleware->handle($request, fn ($req) => new Response('passed-through:'.$req->getUri()));

    expect($result->getContent())->toBe('passed-through:http://localhost/foo');
});

it('passes a hub-subdomain request through untouched', function () {
    $middleware = new IsHubMiddleware;
    $request = Request::create('http://myhub.localhost/');

    $result = $middleware->handle($request, fn ($req) => new Response('ok'));

    expect($result->getContent())->toBe('ok');
});
