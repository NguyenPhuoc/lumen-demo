<?php
return [
    'default' => 'lumen_db',

    'migrations' => 'migrations',

    'connections' => [

        'lumen_db' => [
            'driver' => env('DB_CONNECTION','mysql'),
            'host' => env('DB_HOST', 'localhost'),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],

        'mongo_db' => [
            'driver' => 'mongodb',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', 27017),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'options' => [
                'database' => 'admin' // sets the authentication database required by mongo 3
            ]
        ]
    ],

    'redis' => [
//        'client' => 'predis',
        'cluster' => false,
        'default' => [
            'host' => env('REDIS_HOST'),
            'pass' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT'),
            'database' => env('REDIS_DATABASE'),
        ]
    ]
];