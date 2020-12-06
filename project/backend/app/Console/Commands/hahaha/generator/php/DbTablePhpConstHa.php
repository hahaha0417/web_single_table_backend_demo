<?php

namespace App\Console\Commands\hahaha\generator\php;

use Illuminate\Console\Command;
use Config;

use hahaha\hahaha_define_tool_key_ha as key;

/*
O .O Ha Style，不爽勿用
b
*/
class DbTablePhpConstHa extends Command
{
    // -----------------------------------------------------
    // 統一作法 - 全部
    // -----------------------------------------------------
    const CONFIG_DB = key::DATABASE . "." . key::CONNECTIONS . "." . key::MYSQL_BACKEND;
    const CONFIG = key::HAHAHA . "." . key::TOOL . "." . key::GENERATE . "." . key::DB_TABLE_PHP_CONST_HA;
    // -----------------------------------------------------
    // 統一作法 - 內部
    // -----------------------------------------------------

    // -----------------------------------------------------

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:db_table_php_const:ha';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $db_hahaha = new \hahahalib\hahaha_db_mysql;
        $db_result_hahaha = new \hahahalib\hahaha_db_mysql_result;
        $db_function_hahaha = new \hahahalib\hahaha_db_mysql_function;
        // -------------------------------------------
        // 因為怕核心褲太多冗餘，其他框架的初始化設定請自己提供，目前沒寫
        // -------------------------------------------

        // -----------------------------------------------------
        // 統一作法 - 全部
        // -----------------------------------------------------
        $config_ = Config::Get(self::CONFIG);
        $config_db_ = Config::Get(self::CONFIG_DB);
        // -------------------------------------------
        $ip_ = &$config_db_[key::HOST];
        $port_ = &$config_db_[key::PORT];
        $username_ = &$config_db_[key::USERNAME];
        $password_ = &$config_db_[key::PASSWORD];
        // -------------------------------------------
        $database_ = &$config_[key::DATABASE];
        // -----------------------------------------------------
        // 統一作法 - 內部
        // -----------------------------------------------------
        $config_generate_table_ = &$config_[key::GENERATE_TABLE];
        $config_generate_table_field_ = &$config_[key::GENERATE_TABLE_FIELD];
        // -----------------------------------------------------



        $db_hahaha->Connect("{$ip_}:{$port_}}", $username_, $password_, $database_);
        $db_hahaha->Set_Names("utf8");

        // 查資料庫
        $table_items_ = [];
        $db_function_hahaha->Find_Db_Databases($db_hahaha, $db_result_hahaha, $table_items_, $database_);

        $tables_ = [];
        foreach($table_items_ as $key => &$item)
        {
            $tables_[] = $item['TABLE_NAME'];
        }

        $pass_tables_ = [
            key::MIGRATES,
        ];

        $text_deal_main_ = \g_plib\db\table\hahaha_generate_php_const::Instance()->Initial_Setting($ip_, $port_, $username_, $password_);

        // 因為接口，所以回轉成\n
        $content_ = implode("\r\n", $tables_);

        if($config_generate_table_[key::ENABLED])
        {
            $config_output_ = &$config_generate_table_[key::OUTPUT];
            $parameters_ = [
                // 輸出
                key::OUTPUT => [
                    key::NAMESPACE => $config_output_[key::NAMESPACE],
                    key::PATH => $config_output_[key::PATH],
                    key::CLASS_ => [
                        key::NAME => $config_output_[key::CLASS_][key::NAME],
                        key::STYLE => $config_output_[key::CLASS_][key::STYLE],
                    ],
                    key::INCLUDE_ALL => $config_output_[key::INCLUDE_ALL],
                ],
                // 略過
                key::PASS => [
                    key::TABLES => [
                        key::MIGRATES,
                    ],
                ],
                // 快速使用
                key::FAST_USES => [
                    key::NONE => [
                        key::PREFIX => [],
                        key::POSTFIX => [],
                    ],
                    key::TABLE => [
                        key::PREFIX => [key::DATABASE],
                        key::POSTFIX => [],
                    ],
                ],
                // 分類 - 多層確定再看看要不要做
                key::CLASSES => [
                    "accounts",
                ],
                // 註解
                key::COMMENTS => [
                    // ---------------------------------------------------------
                    key::NAMESPACE => [
                        "/*",
                        " ------------------------------------------------------ ",
                        "說明",
                        " ------------------------------------------------------ ",
                        "*/",
                    ],
                    key::CLASS_ => [
                        "/*",
                        " ------------------------------------------------------ ",
                        "說明",
                        " ------------------------------------------------------ ",
                        "*/",
                    ],
                    // ---------------------------------------------------------
                    // key::_ORDER => [
                    //     key::CONST_,
                    //     key::CONST_CLASS,
                    //     key::CONST_CONST,
                    // ],
                    // ---------------------------------------------------------
                    key::CONST_ => [
                            "// ------------------------------------------------------------------------------ ",
                            "// ------------------------------------------------------------------------------ ",
                            "// 常數 ",
                            "// ------------------------------------------------------------------------------ ",
                            "// ------------------------------------------------------------------------------ ",
                    ],
                    key::CONST_CLASS => [
                        key::_COMMENTS => [
                            "// ------------------------------------------------------ ",
                            "// 常數 - 分類",
                            "// ------------------------------------------------------ ",
                        ],

                        "accounts" => [
                            "// ------------------------------ ",
                            "// 會員 ",
                            "// ------------------------------ ",
                        ],
                    ],
                    key::CONST_CONST => [
                            "// ------------------------------------------------------ ",
                            "// 常數 ",
                            "// ------------------------------------------------------ ",
                    ],
                    // ---------------------------------------------------------
                ],
            ];

            $text_deal_main_->Generate_Table_Custom_From_String($content_,
                $database_,
                $parameters_
            );
        }

        if($config_generate_table_[key::ENABLED])
        {
            $config_output_ = &$config_generate_table_field_[key::OUTPUT];
            $parameters_ = [
                // 輸出
                key::OUTPUT => [
                    key::NAMESPACE => $config_output_[key::NAMESPACE],
                    key::PATH => $config_output_[key::PATH],
                    key::CLASS_ => [
                        key::STYLE => $config_output_[key::CLASS_][key::STYLE],
                    ],
                    key::INCLUDE_ALL => $config_output_[key::INCLUDE_ALL],
                ],
                // 略過
                key::PASS => [
                    key::TABLES => [
                        key::MIGRATES,
                    ],
                ],
                // 快速使用
                key::FAST_USES => [
                    key::NONE => [
                        key::PREFIX => [],
                        key::POSTFIX => [],
                    ],
                    key::TABLE => [
                        key::PREFIX => [key::TABLE],
                        key::POSTFIX => [],
                    ],
                ],
                // 註解
                key::COMMENTS => [
                    // ---------------------------------------------------------
                    key::NAMESPACE => [
                        "/*",
                        " ------------------------------------------------------ ",
                        "說明",
                        " ------------------------------------------------------ ",
                        "*/",
                    ],
                    key::CLASS_ => [
                        "/*",
                        " ------------------------------------------------------ ",
                        "說明",
                        " ------------------------------------------------------ ",
                        "*/",
                    ],
                    // ---------------------------------------------------------
                    // key::_ORDER => [
                    //     key::CONST_,
                    //     key::CONST_CLASS,
                    //     key::CONST_CONST,
                    // ],
                    // ---------------------------------------------------------
                    key::CONST_ => [
                            "// ------------------------------------------------------------------------------ ",
                            "// ------------------------------------------------------------------------------ ",
                            "// 常數 ",
                            "// ------------------------------------------------------------------------------ ",
                            "// ------------------------------------------------------------------------------ ",
                    ],
                    key::CONST_CLASS => [
                        key::_COMMENTS => [
                            "// ------------------------------------------------------ ",
                            "// 常數 - 分類",
                            "// ------------------------------------------------------ ",
                        ],

                        "accounts" => [
                            "// ------------------------------ ",
                            "// 會員 ",
                            "// ------------------------------ ",
                        ],
                    ],
                    key::CONST_CONST => [
                            "// ------------------------------------------------------ ",
                            "// 常數 ",
                            "// ------------------------------------------------------ ",
                    ],
                    // ---------------------------------------------------------
                ],
            ];

            $text_deal_main_->Generate_Table_Field_Custom_From_String($content_,
                $database_,
                $parameters_
            );
        }

        echo "產生php const - Ha Style 成功";
    }
}
