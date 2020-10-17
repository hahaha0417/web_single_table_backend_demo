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

/*
使用laravel session處理login，有需要請自行換別種auth方式
目前知道可用的只有session & token & jwt auth
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
            $db_hahaha->Connect("127.0.0.1:3306", "root", "hahaha", "{$parameter_->database}");
            $db_hahaha->Set_Names("utf8");
            
            // 查資料表
            $parameter_->table_items = [];

            // 要比數小用like %%
            $result = $db_hahaha->Query("SELECT * FROM information_schema.`TABLES` WHERE TABLE_SCHEMA='{$parameter_->database}'");
            if($result)
            {
                $db_result_hahaha->Fetch_All($result, $parameter_->table_items); 
                
            }

            if($parameter_->table == "" && !empty($parameter_->table_items)) 
            {
                $parameter_->table = $parameter_->table_items[0]['TABLE_NAME'];
            }

            // 查資料表欄位
            $parameter_->table_fields = [];
            $result = $db_hahaha->Query("SELECT * FROM information_schema.`COLUMNS` WHERE TABLE_SCHEMA='{$parameter_->database}' AND TABLE_NAME = '{$parameter_->table}'");
            if($result)
            {
                $db_result_hahaha->Fetch_All($result, $parameter_->table_fields);    
                
            }

            $db_hahaha->Close();
            
        }
        catch (\Exception $e) {
            
        }
        
        return view('web.backend.tool.table_field');
        
    }

    

}
