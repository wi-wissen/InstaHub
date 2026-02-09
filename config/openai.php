<?php

return [
    'api_key' => env('OPENAI_API_KEY'),
    'base_url' => env('OPENAI_BASE_URL', 'https://api.tokenfactory.nebius.com/v1'),
    'model' => env('OPENAI_MODEL', 'Qwen/Qwen3-235B-A22B-Instruct-2507'),
    
    'max_tokens' => env('OPENAI_MAX_TOKENS', 100000),
];
