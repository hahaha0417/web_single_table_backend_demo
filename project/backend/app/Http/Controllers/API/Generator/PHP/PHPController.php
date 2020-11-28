<?php

namespace App\Http\Controllers\API\Generator\PHP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;

class PHPController extends Controller
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
        $text_deal_main_ = \g_plib\db\table\hahaha_generate_php_const::Instance()->Initial_Setting($ip_, $port_);

        // 二次打包，收集在composite
        if ($command_ == "generate") {
            if ($method_ == "db_table_php_const") {
                $database_ = &$_POST["database"];
                $output_namespace_ = &$_POST["output_namespace"];
                $output_path_ = &$_POST["output_path"];
                $pass_table_migrations = &$_POST["pass_table_migrations"];
                $doctrine_style_ = $_POST["doctrine_style"] == "true" ? true : false;

                $pass_tables_ = [];
                if($pass_table_migrations) {
                    $pass_tables_ = [
                        "migrates"
                    ];
                }

                $text_deal_main_->Generate($content_,
                    $database_,
                    $output_path_,
                    $output_namespace_,
                    $doctrine_style_,
                    $pass_tables_
                );

            }
        }


    }


}
