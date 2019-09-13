<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    
    'google' => [
        'client_id'     => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect'      => env('GOOGLE_REDIRECT')
    ],
    
    'godaddy' => [
        'api' => [
            'url' => env('GODADDY_URL', 'https://api.ote-godaddy.com'),
            'key' => env('GODADDY_KEY'),
            'secret' => env('GODADDY_SECRET'),
            'debug' => env('GODADDY_DEBUG_ON', FALSE),
        ],
    ],
    
    'slack' => [
        'webhook' => [
            'url' => env('SLACK_WEBHOOK_URL'),
        ],
        'dev_alert_channel' => env('SLACK_DEV_ALERT_CHANNEL'),
        'accounts_alert_channel' => env('SLACK_ACCOUNTS_ALERT_CHANNEL'),
    ],

];
