<?php

return [
    /*
    |--------------------------------------------------------------------------
    | LinkedIn API Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for the LinkedIn API integration.
    |
    */

    'client_id' => env('LINKEDIN_CLIENT_ID'),
    'client_secret' => env('LINKEDIN_CLIENT_SECRET'),
    'redirect_uri' => env('LINKEDIN_REDIRECT_URI', null),

    /*
    |--------------------------------------------------------------------------
    | LinkedIn Token Storage
    |--------------------------------------------------------------------------
    |
    | Configure how LinkedIn tokens are stored. By default, tokens are stored
    | in the database.
    |
    */
    'token_storage' => env('LINKEDIN_TOKEN_STORAGE', 'database'),
];
