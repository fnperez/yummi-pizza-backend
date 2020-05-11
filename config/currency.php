<?php

return [
    'default' => env('APP_DEFAULT_CURRENCY', 'USD'),
    'currencies' => [
        'USD',
        'EUR'
    ],
    'exchanges' => [
        'EUR' => [
            'USD' => 1.25
        ]
    ]
];
