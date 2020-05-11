<?php

return [
    'default' => env('APP_DELIVERY_TYPE', 'fixed'),
    'fixed' => [ // config to be unpacked, the config should be in the order the object needs the params
        10, // USD
    ],
];
