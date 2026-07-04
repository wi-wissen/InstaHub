<?php

use App\Rules\UrlSafeString;
use Illuminate\Support\Facades\Validator;

/**
 * Directly exercise the rule's validate() callback with a captured failure.
 */
function urlSafeStringFails(string $value): array
{
    $rule = new UrlSafeString;
    $failures = [];

    $rule->validate('field', $value, function (string $message) use (&$failures) {
        $failures[] = $message;
    });

    return $failures;
}

it('passes plain alphanumeric strings', function () {
    expect(urlSafeStringFails('my-cool_username123'))->toBeEmpty();
});

it('passes an empty string (no forbidden chars present)', function () {
    expect(urlSafeStringFails(''))->toBeEmpty();
});

it('passes dots and hyphens and underscores', function () {
    expect(urlSafeStringFails('foo.bar-baz_qux'))->toBeEmpty();
});

it('fails and reports a single forbidden character', function (string $char) {
    expect(urlSafeStringFails("abc{$char}def"))->not->toBeEmpty();
})->with([
    '/', '?', '#', '[', ']', '@', '!', '$', '&', "'",
    '(', ')', '*', '+', ',', ';', '=',
]);

it('fails on a literal space and reports the translated placeholder', function () {
    $failures = urlSafeStringFails('hello world');

    expect($failures)->not->toBeEmpty()
        ->and($failures[0])->toContain(__('validation.chars.space'));
});

it('fails on a tab character and reports the translated placeholder', function () {
    $failures = urlSafeStringFails("hello\tworld");

    expect($failures)->not->toBeEmpty()
        ->and($failures[0])->toContain(__('validation.chars.tab'));
});

it('fails on newlines and carriage returns, both reported as line break', function () {
    $failuresNewline = urlSafeStringFails("hello\nworld");
    $failuresCarriage = urlSafeStringFails("hello\rworld");

    expect($failuresNewline[0])->toContain(__('validation.chars.line_break'));
    expect($failuresCarriage[0])->toContain(__('validation.chars.line_break'));
});

it('deduplicates repeated forbidden characters in the message', function () {
    $failures = urlSafeStringFails('a/b/c/d');

    expect($failures)->toHaveCount(1);
    // Only one occurrence of "/" should show up despite 3 matches.
    $occurrences = substr_count($failures[0], '/');
    expect($occurrences)->toBe(1);
});

it('reports every distinct forbidden character found', function () {
    $failures = urlSafeStringFails('a b/c?d');

    expect($failures)->toHaveCount(1)
        ->and($failures[0])->toContain(__('validation.chars.space'))
        ->and($failures[0])->toContain('/')
        ->and($failures[0])->toContain('?');
});

it('integrates with the Laravel validator and fails invalid values', function () {
    $validator = Validator::make(
        ['slug' => 'not valid/slug'],
        ['slug' => [new UrlSafeString]]
    );

    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('slug'))->toBeTrue();
});

it('integrates with the Laravel validator and passes valid values', function () {
    $validator = Validator::make(
        ['slug' => 'valid-slug_123'],
        ['slug' => [new UrlSafeString]]
    );

    expect($validator->fails())->toBeFalse();
});
