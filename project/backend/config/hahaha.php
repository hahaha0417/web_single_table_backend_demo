<?php

return [

    /*

    */

    'tool' => [
        'generate' => [
            'db_table_php_const' => [
                'database' => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__DATABASE', ''),
                //
                'generate_table' => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__GENERATE_TABLE', ''),
                'output_table_path' => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__OUTPUT_TABLE_PATH', ''),
                'output_table_namespace' => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__OUTPUT_TABLE_NAMESPACE', ''),
                'generate_table_field' => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__GENERATE_TABLE_FIELD', ''),
                'output_table_field_path' => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__OUTPUT_TABLE_FIELD_PATH', ''),
                'output_table_field_namespace' => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__OUTPUT_TABLE_FIELD_NAMESPACE', ''),
                //
                'doctrine_style' => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__DOCTRINE_STYLE', ''),
            ],
        ]
    ],


];
