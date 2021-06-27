<?php

use Illuminate\Support\Str;

/*
補充 database - 設定
*/
return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql_backend'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
        ],

        'mysql' => [
            'driver' => 'pdo_mysql',
            'path' => env('DB_PATH'),
        ],

		'mysql_front' => [
            'driver' => 'pdo_mysql',
            'path' => env('DB_FRONT_PATH'),
        ],

        'mysql_front_read_only' => [
            'driver' => 'pdo_mysql',
            'path' => env('DB_FRONT_PATH'),
        ],

        'mysql_backend' => [
            'driver' => 'pdo_mysql',
            'path' => env('DB_BACKEND_PATH'),
        ],

        'mysql_backend_read_only' => [
            'driver' => 'pdo_mysql',
            'path' => env('DB_PATH'),
        ],



    ],



];
