<?php

return [
    'default_generation' => env('HUB_DEFAULT_GENERATION'),
    'generations' => [
        1 => [
            'name' => 'Generation 2017',
            'url' => env('HUB_DOC_1_URL'),
        ],
        2 => [
            'name' => 'Generation 2024',
            'url' => env('HUB_DOC_2_URL'),
            'secret' => env('HUB_DOC_2_SECRET'),
        ],
    ],
];