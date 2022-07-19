<?php

return [
    // Addresses Database Tables
    'tables' => [
        'addresses' => 'addresses',
    ],

    // Addresses Models
    'models' => [
        'address' => \CustomD\Addressable\Models\Address::class,
    ],

    // Addresses Geocoding Options
    'geocoding' => [
        'enabled' => false,
        'api_key' => env('GOOGLE_APP_KEY'),
    ],

];
