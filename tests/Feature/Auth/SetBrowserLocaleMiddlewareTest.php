<?php

use App\Http\Middleware\SetBrowserLocale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

beforeEach(function () {
    $this->originalLocale = App::getLocale();
    $this->hadHeader = array_key_exists('HTTP_ACCEPT_LANGUAGE', $_SERVER);
    $this->originalHeader = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? null;
});

afterEach(function () {
    App::setLocale($this->originalLocale);

    if ($this->hadHeader) {
        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = $this->originalHeader;
    } else {
        unset($_SERVER['HTTP_ACCEPT_LANGUAGE']);
    }
});

it('sets the app locale from the first two letters of Accept-Language', function () {
    $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'de-DE,de;q=0.9,en;q=0.8';
    App::setLocale('en');

    $middleware = new SetBrowserLocale;
    $request = Request::create('http://localhost/');

    $response = $middleware->handle($request, fn ($req) => new Response('next-called'));

    expect($response->getContent())->toBe('next-called');
    expect(App::getLocale())->toBe('de');
});

it('leaves the current locale untouched when no Accept-Language header is present', function () {
    unset($_SERVER['HTTP_ACCEPT_LANGUAGE']);
    App::setLocale('en');

    $middleware = new SetBrowserLocale;
    $request = Request::create('http://localhost/');

    $middleware->handle($request, fn ($req) => new Response('ok'));

    expect(App::getLocale())->toBe('en');
});

it('always calls the next middleware and forwards its response', function () {
    unset($_SERVER['HTTP_ACCEPT_LANGUAGE']);

    $middleware = new SetBrowserLocale;
    $request = Request::create('http://localhost/');

    $response = $middleware->handle($request, fn ($req) => new Response('the-next-response'));

    expect($response->getContent())->toBe('the-next-response');
});
