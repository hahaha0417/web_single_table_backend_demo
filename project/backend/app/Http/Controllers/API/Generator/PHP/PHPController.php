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
		$username_ = &$_POST["username"];
        $password_ = &$_POST["password"];
        $text_deal_main_ = \g_plib\db\table\hahaha_generate_php_const::Instance()->Initial_Setting($ip_, $port_, $username_, $password_);

        // 二次打包，收集在composite
        if ($command_ == "generate") {
            if ($method_ == "db_table_php_const") {
                $database_ = &$_POST["database"];
                // $output_namespace_ = &$_POST["output_namespace"];
                //
                $generate_table_ = &$_POST["generate_table"] == "true" ? true : false;
                $output_table_path_ = $_POST["output_table_path"];
                $output_table_namespace_ = &$_POST["output_table_namespace"];
                $generate_table_field_ = $_POST["generate_table_field"] == "true" ? true : false;
                $output_table_field_path_ = $_POST["output_table_field_path"];
                $output_table_field_namespace_ = &$_POST["output_table_field_namespace"];
                //
                $pass_table_migrations = $_POST["pass_table_migrations"] == "true" ? true : false;
                $doctrine_style_ = $_POST["doctrine_style"] == "true" ? true : false;

                $pass_tables_ = [];
                if($pass_table_migrations) {
                    $pass_tables_ = [
                        "migrations"
                    ];
                }

                if($generate_table_)
                {
                    $text_deal_main_->Generate_Table($content_,
                        $database_,
                        $output_table_path_,
                        $output_table_namespace_,
                        $doctrine_style_,
                        $pass_tables_
                    );
                }

                if($generate_table_field_)
                {
                    $text_deal_main_->Generate_Table_Field($content_,
                        $database_,
                        $output_table_field_path_,
                        $output_table_field_namespace_,
                        $doctrine_style_,
                        $pass_tables_
                    );
                }


            }
        }


    }


}
