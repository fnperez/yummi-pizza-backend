<?php

return [
    'default' => env('APP_DEFAULT_CURRENCY', 'USD'),
    'currencies' => [
        'USD',
        'EUR'
    ],
    'exchanges' => [
        'EUR' => [
            'USD' => 1.25,
            'EUR' => 1,
        ],
        'USD' => [
            'USD' => 1,
            'EUR' => 1/1.25
        ]
    ]
];
