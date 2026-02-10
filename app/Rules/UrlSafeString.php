<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;

class UrlSafeString implements ValidationRule
{
    private const FORBIDDEN_CHARS = [
        '/', '?', '#', '[', ']', '@', '!', '$', '&', "'",
        '(', ')', '*', '+', ',', ';', '=', ' ', "\t", "\n", "\r",
    ];

    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        $foundChars = [];

        foreach (self::FORBIDDEN_CHARS as $char) {
            if (str_contains($value, $char)) {
                $displayChar = match ($char) {
                    ' ' => __('validation.chars.space'),
                    "\t" => __('validation.chars.tab'),
                    "\n", "\r" => __('validation.chars.line_break'),
                    default => $char
                };
                $foundChars[] = $displayChar;
            }
        }

        if (! empty($foundChars)) {
            $fail(__('validation.url_safe_string', [
                'chars' => implode(', ', array_unique($foundChars)),
            ]));
        }
    }
}
