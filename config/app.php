<?php

return [

    /*
    |--------------------------------------------------------------------------
    | App Name
    |--------------------------------------------------------------------------
    |
    | The name of your Application
    |
    */

    'name' => env('APP_NAME', ''),

    /*
    |--------------------------------------------------------------------------
    | App Domain Name
    |--------------------------------------------------------------------------
    |
    | Your application domain name.
    |
    */

    'domain' => env('APP_DOMAIN',NULL),

    /*
    |--------------------------------------------------------------------------
    | Enviormental Variables
    |--------------------------------------------------------------------------
    |
    | Available Timezones: http://php.net/manual/en/timezones.php
    |
    */

    'timezone' => env('APP_TIMEZONE', 'America/New_York'),

    'encoding' => env('APP_ENCODING', 'UTF-8'),

    'environment' => env('APP_ENV', 'development'),


    /*
    |--------------------------------------------------------------------------
    | (OPTIONAL) Register service providers for this application
    |--------------------------------------------------------------------------
    |
    | These service providers will load automatically on boot
    | They will load up the boot() method if one exist.
    | They will be available through the app() instance for reference.
    |
    */

    'providers' => [

    ]

];
