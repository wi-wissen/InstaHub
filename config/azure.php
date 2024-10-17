<?php

return [
    'resource_name' => env('AZURE_RESOURCE_NAME'),
    'deployment_id' => env('AZURE_DEPLOYMENT_ID'),
    'openai_key' => env('AZURE_OPENAI_KEY'),
    'api_version' => env('AZURE_VERSION'),
    
    'max_tokens' => env('AZURE_MAX_TOKENS', 100000),
];