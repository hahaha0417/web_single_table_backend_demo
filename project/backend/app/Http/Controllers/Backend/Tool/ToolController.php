<?php
/*
{{-- 原始 : hahaha --}}
{{-- 維護 :  --}}
{{-- 指揮 :  --}}
{{-- ---------------------------------------------------------------------------------------------- --}}
{{-- 決定 : name --}}
{{--
----------------------------------------------------------------------------
說明 :
----------------------------------------------------------------------------

----------------------------------------------------------------------------
--}}
{{-- ---------------------------------------------------------------------------------------------- --}}
 */
namespace App\Http\Controllers\Backend\Tool;

use App\Http\Models\Backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use entities\backend\Accounts;
use EntityManager;
use Config;

/*
使用laravel session處理login，有需要請自行換別種auth方式
目前知道可用的只有session & token & jwt auth

 -----------------------------------------------------------
重要 :
這邊SQL不打包成腳本
將其做進去stage(修修改)


*/
class ToolController extends CommonController
{
    //
    public function __construct()
    {

    }

    /*

    */
    public function table_field()
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        $parameter_->ip = !empty($_GET["ip"]) ? $_GET["ip"] : "127.0.0.1";
        $parameter_->port = !empty($_GET["port"]) ? $_GET["port"] : "12000";
        $parameter_->database = !empty($_GET["database"]) ? $_GET["database"] : "";
        $parameter_->table = !empty($_GET["table"]) ? $_GET["table"] : "";

        try
        {
            $db_hahaha = new \hahahalib\hahaha_db_mysql;
            $db_result_hahaha = new \hahahalib\hahaha_db_mysql_result;
            $db_function_hahaha = new \hahahalib\hahaha_db_mysql_function;
            // -------------------------------------------
            // 因為怕核心褲太多冗餘，其他框架的初始化設定請自己提供，目前沒寫
            // -------------------------------------------
            $ip_ = Config::Get('database.connections.mysql_backend.host');
            $port_ = Config::Get('database.connections.mysql_backend.port');
            $username_ = Config::Get('database.connections.mysql_backend.username');
            $password_ = Config::Get('database.connections.mysql_backend.password');
            $db_hahaha->Connect("{$ip_}:{$port_}}", "{$username_}", "{$password_}", "{$parameter_->database}");
            $db_hahaha->Set_Names("utf8");

            // 查資料庫
            $parameter_->table_items = [];
            $db_function_hahaha->Find_Db_Databases($db_hahaha, $db_result_hahaha, $parameter_->table_items, $parameter_->database);

            if($parameter_->table == "" && !empty($parameter_->table_items))
            {
                $parameter_->table = $parameter_->table_items[0]['TABLE_NAME'];
            }

            // 查資料表
            $parameter_->table_fields = [];
            $db_function_hahaha->Find_Db_Tables($db_hahaha, $db_result_hahaha, $parameter_->table_fields, $parameter_->database, $parameter_->table);

            $db_hahaha->Close();

        }
        catch (\Exception $e) {

        }

        return view('web.backend.tool.table_field');

    }

    public function generate_db_table_php_const()
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        $parameter_->ip = !empty($_GET["ip"]) ? $_GET["ip"] : "127.0.0.1";
        $parameter_->port = !empty($_GET["port"]) ? $_GET["port"] : "3306";
        $parameter_->database = !empty($_GET["database"]) ? $_GET["database"] : "";
        $parameter_->table = !empty($_GET["table"]) ? $_GET["table"] : "";
        // $parameter_->output_namespace = !empty($_GET["output_namespace"]) ? $_GET["output_namespace"] : "";
        //
        $parameter_->generate_table = !empty($_GET["generate_table"]) ? $_GET["generate_table"] : "";
        $parameter_->output_table_path = !empty($_GET["output_table_path"]) ? $_GET["output_table_path"] : "";
        $parameter_->output_table_namespace = !empty($_GET["output_table_namespace"]) ? $_GET["output_table_namespace"] : "";
        $parameter_->generate_table_field = !empty($_GET["generate_table_field"]) ? $_GET["generate_table_field"] : "";
        $parameter_->output_table_field_path = !empty($_GET["output_table_field_path"]) ? $_GET["output_table_field_path"] : "";
        $parameter_->output_table_field_namespace = !empty($_GET["output_table_field_namespace"]) ? $_GET["output_table_field_namespace"] : "";
        //
        $parameter_->pass_table_migrations = !empty($_GET["pass_table_migrations"]) ? $_GET["pass_table_migrations"] : "false";
        $parameter_->doctrine_style = !empty($_GET["doctrine_style"]) ? $_GET["doctrine_style"] : "";


        try
        {
            $db_hahaha = new \hahahalib\hahaha_db_mysql;
            $db_result_hahaha = new \hahahalib\hahaha_db_mysql_result;
            $db_function_hahaha = new \hahahalib\hahaha_db_mysql_function;
            // -------------------------------------------
            // 因為怕核心褲太多冗餘，其他框架的初始化設定請自己提供，目前沒寫
            // -------------------------------------------
            $ip_ = Config::Get('database.connections.mysql_backend.host');
            $port_ = Config::Get('database.connections.mysql_backend.port');
            $username_ = Config::Get('database.connections.mysql_backend.username');
            $password_ = Config::Get('database.connections.mysql_backend.password');
            $db_hahaha->Connect("{$ip_}:{$port_}}", "{$username_}", "{$password_}", "{$parameter_->database}");
            $db_hahaha->Set_Names("utf8");

            // 查資料庫
            $parameter_->table_items = [];
            $db_function_hahaha->Find_Db_Databases($db_hahaha, $db_result_hahaha, $parameter_->table_items, $parameter_->database);

            if($parameter_->table == "" && !empty($parameter_->table_items))
            {
                $parameter_->table = $parameter_->table_items[0]['TABLE_NAME'];
            }

            if($parameter_->pass_table_migrations == "true")
            {
                foreach($parameter_->table_items as $key => &$item)
                {
                    if($item['TABLE_NAME'] == 'migrations')
                    {
                        unset($parameter_->table_items[$key]);
                        break;
                    }
                }

            }

            $db_hahaha->Close();

        }
        catch (\Exception $e) {

        }

        return view('web.backend.tool.generate.db.table.php_const');

    }

}
