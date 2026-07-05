<?php

test('welcome page renders for guests', function () {
    $this->get('http://localhost/')->assertOk()->assertSee('InstaHub');
});

test('about page renders', function () {
    $this->get('http://localhost/about')->assertOk();
});

test('noad page renders', function () {
    // The /noad fallback link is a hub-relative route, so it only resolves on a hub subdomain.
    $this->get('http://example.localhost/noad')->assertOk();
});

test('documentation redirect sends generation 1 to its plain configured url', function () {
    $response = $this->get('http://localhost/documentation/redirect/1');

    $response->assertRedirect(config('hub.generations.1.url'));
});

test('documentation redirect signs the url with a hash for generations that have a secret', function () {
    $response = $this->get('http://localhost/documentation/redirect/2');

    $response->assertRedirect();
    $location = $response->headers->get('Location');

    expect($location)->toContain(config('hub.generations.2.url'));
    expect($location)->toContain('timestamp=');
    expect($location)->toContain('hash=');
});

test('documentation redirect forwards a return_url when given', function () {
    $response = $this->get('http://localhost/documentation/redirect/1?return_url='.urlencode('http://example.test/back'));

    $location = $response->headers->get('Location');

    expect($location)->toContain('return_url=');
});
