<?php

return [
    /*
    |--------------------------------------------------------------------------
    | SendGrid API Configuration
    |--------------------------------------------------------------------------
    |
    | Configure your SendGrid API settings here
    |
    */

    'api_key' => env('SENDGRID_API_KEY'),

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Agunfon'),
    ],

    // Optional: Data residency (e.g., 'eu' for European data center)
    'data_residency' => env('SENDGRID_DATA_RESIDENCY', null),
];
