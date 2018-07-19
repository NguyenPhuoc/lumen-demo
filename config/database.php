<?php
return [
    'default' => 'lumen_db',

    'migrations' => 'migrations',

    'connections' => [

        'lumen_db' => [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'database' => 'lumen_db',
            'username' => 'demo_user',
            'password' => '1',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],

        'mysql2' => [
            'driver' => 'mysql',
            'host' => 'host2',
            'database' => 'database2',
            'username' => 'user2',
            'password' => 'pass2',
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
            'host' => '127.0.0.1',
            'pass' => null,
            'port' => 6379,
            'database' => 0,
        ]
    ]
];