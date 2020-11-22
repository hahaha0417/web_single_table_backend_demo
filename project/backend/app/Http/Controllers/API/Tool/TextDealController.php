<?php

namespace App\Http\Controllers\API\Tool;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TextDealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function command()
    {
        $command_ = &$_POST['command'];
        $method_ = &$_POST['method'];
        $content_ = &$_POST['content'];

        $ip_ = &$_POST["ip"];
        $port_ = &$_POST["port"];
        $database_ = &$_POST["database"];
        $output_namespace_ = &$_POST["output_namespace"];
        $output_path_ = &$_POST["output_path"];

        // 二次打包
        if($command_ == "send")
        {
            if($method_ == "origin")
            {
                // 快速接口
                // 有空整入hahalib
                $upd_client_ = \hahahalib\hahaha_socket_udp_client::instance();
                $upd_client_->Create();
                $upd_client_->Connect($_POST['ip'], $_POST['port']);

                // ---------------------------------
                $length_ = strlen($command_);
                $upd_client_->Send($upd_client_->Socket_, $command_, $length_);
                // ---------------------------------

                // ---------------------------------
                $length_ = strlen($method_);
                $upd_client_->Send($upd_client_->Socket_, $method_, $length_);
                // ---------------------------------

                // ---------------------------------
                $length_ = strlen($content_);
                $upd_client_->Send($upd_client_->Socket_, $content_, $length_);
                // ---------------------------------

                $upd_client_->Close();
            }
        }
        else if($command_ == "generate")
        {
            if ($method_ == "table_php_const")
            {
                $tables_ = preg_split('/\n|\r\n?\s*/', $content_);

                foreach($tables_ as $key => &$table)
                {
                    if(empty(trim($table)) )
                    {
                        continue;
                    }

                    // ---------------------------------------------------
                    $db_hahaha = new \hahahalib\hahaha_db_mysql;
                    $db_result_hahaha = new \hahahalib\hahaha_db_mysql_result;
                    $db_hahaha->Connect("{$ip_}:{$port_}", "root", "hahaha", "{$database_}");
                    $db_hahaha->Set_Names("utf8");

                    // 查資料表欄位
                    $table_fields = [];
                    $result = $db_hahaha->Query("SELECT * FROM information_schema.`COLUMNS` WHERE TABLE_SCHEMA='{$database_}' AND TABLE_NAME = '{$table}'");
                    if($result)
                    {
                        $db_result_hahaha->Fetch_All($result, $table_fields);
                    }
                    $db_hahaha->Close();
                    // ---------------------------------------------------
                    $fields_ = [];
                    foreach($table_fields as $key => &$fields)
                    {
                        foreach($fields as $key_item => &$item)
                        {
                            if($key_item == "COLUMN_NAME")
                            {
                                $fields_[] = &$item;
                            }
                        }
                    }



                    $rrr = 0;
                }
            }
        }



    }


}
