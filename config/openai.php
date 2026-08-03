<?php

return [
    'api_key' => env('OPENAI_API_KEY'),
    'base_url' => env('OPENAI_BASE_URL', 'https://api.melious.ai/v1'),
    'model' => env('OPENAI_MODEL', 'gemma-4-31b'),

    'max_tokens' => env('OPENAI_MAX_TOKENS', 100000),
];
