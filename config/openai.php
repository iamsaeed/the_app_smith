<?php

return [
    /*
    |--------------------------------------------------------------------------
    | OpenAI API Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for the OpenAI API integration.
    |
    */

    'api_key' => env('OPENAI_API_KEY'),
    'model' => env('OPENAI_MODEL', 'gpt-3.5-turbo-1106'),
    'request_timeout' => env('OPENAI_TIMEOUT', 30),
];
