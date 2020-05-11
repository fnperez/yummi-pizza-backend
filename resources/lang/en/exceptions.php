<?php

return [
    400 => [
        'message' => 'Bad request',
        'description' => 'The request is malformed or something went wrong',
    ],
    401 => [
      'message' => 'Unauthorized',
      'description' => 'Please login to continue',
    ],
    404 => [
        'message' => 'Resource not found',
        'description' => 'Resource not found',
    ],
    403 => [
        'message' => 'Resource forbidden',
        'description' => 'You don\'t have the access right to access this resource'
    ],
    500 => [
        'message' => 'Fatal error',
        'description' => 'Something went wrong, please try later.',
    ],
    'invalid_delivery_type' => [
        'message' => 'Delivery type is invalid.',
        'description' => 'Delivery type :type does not exist or it is not supported.'
    ],
    'already_payed' => [
        'message' => 'Invoice is already payed',
        'description' => 'Invoice :invoice is already payed'
    ]
];
