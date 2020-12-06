<?php

// 可能用其他人的工具，所以冠ha
use hahaha\hahaha_define_tool_key_ha as key_ha;

return [
    key_ha::TOOL => [
        key_ha::GENERATE => [
            key_ha::DB_TABLE_PHP_CONST => [
                key_ha::DATABASE => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__DATABASE', ''),
                //
                key_ha::GENERATE_TABLE => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__GENERATE_TABLE', ''),
                key_ha::OUTPUT_TABLE_PATH => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__OUTPUT_TABLE_PATH', ''),
                key_ha::OUTPUT_TABLE_NAMESPACE => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__OUTPUT_TABLE_NAMESPACE', ''),
                key_ha::GENERATE_TABLE_FIELD => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__GENERATE_TABLE_FIELD', ''),
                key_ha::OUTPUT_TABLE_FIELD_PATH => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__OUTPUT_TABLE_FIELD_PATH', ''),
                key_ha::OUTPUT_TABLE_FIELD_NAMESPACE => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__OUTPUT_TABLE_FIELD_NAMESPACE', ''),
                //
                key_ha::DOCTRINE_STYLE => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__DOCTRINE_STYLE', ''),
            ],
            key_ha::DB_TABLE_PHP_CONST_HA => [
                key_ha::DATABASE => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST__DATABASE', ''),
                //
                key_ha::GENERATE_TABLE => [
                    key_ha::ENABLED => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST_HA__GENERATE_TABLE_ENABLED', ''),
                    key_ha::OUTPUT => [
                        key_ha::NAMESPACE => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST_HA__GENERATE_TABLE__OUTPUT__NAMESPACE', ''),
                        key_ha::PATH => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST_HA__GENERATE_TABLE__OUTPUT__PATH', ''),
                        key_ha::CLASS_ => [
                            key_ha::NAME => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST_HA__GENERATE_TABLE__OUTPUT__CLASS__NAME', ''),
                            key_ha::STYLE => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST_HA__GENERATE_TABLE__OUTPUT__CLASS__STYLE', ''),
                        ],
                        key_ha::INCLUDE_ALL => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST_HA__GENERATE_TABLE__OUTPUT__INCLUDE_ALL', ''),
                    ],
                ],
                key_ha::GENERATE_TABLE_FIELD => [
                    key_ha::ENABLED => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST_HA__GENERATE_TABLE_FIELD__ENABLED', ''),
                    key_ha::OUTPUT => [
                        key_ha::NAMESPACE => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST_HA__GENERATE_TABLE_FIELD__OUTPUT__NAMESPACE', ''),
                        key_ha::PATH => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST_HA__GENERATE_TABLE_FIELD__OUTPUT__PATH', ''),
                        key_ha::CLASS_ => [
                            // key_ha::NAME => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST_HA__GENERATE_TABLE_FIELD__OUTPUT__CLASS__NAME', ''),
                            key_ha::STYLE => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST_HA__GENERATE_TABLE_FIELD__OUTPUT__CLASS__STYLE', ''),
                        ],
                        key_ha::INCLUDE_ALL => env('HAHAHA__TOOL__GENERATE__DB_TABLE_PHP_CONST_HA__GENERATE_TABLE_FIELD__OUTPUT__INCLUDE_ALL', ''),
                    ],
                ],
                //

            ],
        ]
    ],


];
