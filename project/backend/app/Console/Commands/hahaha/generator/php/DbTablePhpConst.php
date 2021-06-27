<?php

namespace App\Console\Commands\hahaha\generator\php;

use Illuminate\Console\Command;
use Config;

use hahaha\hahaha_define_tool_key_ha as key;

class DbTablePhpConst extends Command
{
    // -----------------------------------------------------
    // 統一作法 - 全部
    // -----------------------------------------------------
    const CONFIG_DB = key::DATABASE . "." . key::CONNECTIONS . "." . key::MYSQL_BACKEND;
    const CONFIG = key::HAHAHA . "." . key::TOOL . "." . key::GENERATE . "." . key::DB_TABLE_PHP_CONST;
    // -----------------------------------------------------
    // 統一作法 - 內部
    // -----------------------------------------------------

    // -----------------------------------------------------

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:db_table_php_const';

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

        // -----------------------------------------------------

        //
        $generate_table_ = &$config_[key::GENERATE_TABLE];
        $output_table_path_ = &$config_[key::OUTPUT_TABLE_PATH];
        $output_table_namespace_ = &$config_[key::OUTPUT_TABLE_NAMESPACE];
        $generate_table_field_ = &$config_[key::GENERATE_TABLE_FIELD];
        $output_table_field_path_ = &$config_[key::OUTPUT_TABLE_FIELD_PATH];
        $output_table_field_namespace_ = &$config_[key::OUTPUT_TABLE_FIELD_NAMESPACE];
        //
        $doctrine_style_ = &$config_[key::DOCTRINE_STYLE];




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

        // echo $generate_table_ = Config::Get('hahaha.tool.generate.db_table_php_const.generate_table') . PHP_EOL;
        // echo $output_table_path_ = Config::Get('hahaha.tool.generate.db_table_php_const.output_table_path') . PHP_EOL;
        // echo $output_table_namespace_ = Config::Get('hahaha.tool.generate.db_table_php_const.output_table_namespace') . PHP_EOL;
        // echo $generate_table_field_ = Config::Get('hahaha.tool.generate.db_table_php_const.generate_table_field') . PHP_EOL;
        // echo $output_table_field_path_ = Config::Get('hahaha.tool.generate.db_table_php_const.output_table_field_path') . PHP_EOL;
        // echo $output_table_field_namespace_ = Config::Get('hahaha.tool.generate.db_table_php_const.output_table_field_namespace') . PHP_EOL;

        if($generate_table_)
        {
            $text_deal_main_->Generate_Table_From_String($content_,
                $database_,
                $output_table_path_,
                $output_table_namespace_,
                $doctrine_style_,
                $pass_tables_
            );
        }

        if($generate_table_field_)
        {
            $text_deal_main_->Generate_Table_Field_From_String($content_,
                $database_,
                $output_table_field_path_,
                $output_table_field_namespace_,
                $doctrine_style_,
                $pass_tables_
            );
        }

        echo "產生php const 成功";
    }
}
