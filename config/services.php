<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'recaptcha' => [
        // Keep reCAPTCHA disabled during local review unless explicitly enabled.
        'enabled' => env('RECAPTCHA_ENABLED', env('APP_ENV', 'production') !== 'local'),
        'site_key' => env('RECAPTCHA_SITE_KEY'),
        'secret' => env('RECAPTCHA_SECRET_KEY'),
        'project_id' => env('RECAPTCHA_PROJECT_ID'),
        // When true, submissions are rejected if reCAPTCHA credentials are missing
        // (fail closed). When false (default), verification is skipped if unconfigured
        // and the honeypot/timing guard remains the active protection.
        'required' => env('RECAPTCHA_REQUIRED', false),
    ],

    'sendgrid' => [
        'api_key' => env('SENDGRID_API_KEY'),
        'data_residency' => env('SENDGRID_DATA_RESIDENCY'),
    ],

    /*
    | Search & analytics. All optional — each block is skipped entirely when its
    | value is empty, so local and staging stay clean without extra config.
    */
    'analytics' => [
        // GA4 Measurement ID, format G-XXXXXXXXXX.
        // Analytics → Admin → Data streams → your web stream (top right).
        'ga4_id' => env('GA4_MEASUREMENT_ID'),

        // Tracking is skipped in local by default so dev traffic never pollutes
        // the property. Set ANALYTICS_ENABLED=true to override.
        'enabled' => env('ANALYTICS_ENABLED', env('APP_ENV', 'production') !== 'local'),
    ],

    'search_console' => [
        // Content of the google-site-verification meta tag — the token ONLY, not
        // the whole tag. Search Console → Add property → HTML tag method.
        'verification' => env('GOOGLE_SITE_VERIFICATION'),

        // Bing Webmaster Tools verification token (optional). Bing's index also
        // feeds Microsoft Copilot and ChatGPT search.
        'bing_verification' => env('BING_SITE_VERIFICATION'),
    ],

];
