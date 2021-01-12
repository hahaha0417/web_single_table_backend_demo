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
use \hahahalib\hahaha_file;
use hahaha\hahaha_define_tool_key_ha as key_ha;

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

    /*
    因為沒有其他應用場景 - 這綁定我的const設計，所以不整入腳本reuse
    */
    public function generate_db_table_php_const()
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        $parameter_->ip = !empty($_GET["ip"]) ? $_GET["ip"] : "127.0.0.1";
        $parameter_->port = !empty($_GET["port"]) ? $_GET["port"] : "3306";
        $parameter_->username = !empty($_GET["username"]) ? $_GET["username"] : "root";
        $parameter_->password = !empty($_GET["password"]) ? $_GET["password"] : "hahaha";
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

    public function tree(&$nodes, &$files)
    {
        foreach($files as $key => &$file)
        {
            $node = str_replace("\\", "/", $file);
            $node = explode("/", $node);
            $n = count($node);
            $nodes_temp_ = &$nodes;
            foreach($node as $key => &$value) {
                if($key == $n - 1) {
                    if(empty($nodes_temp_["_items"])) {
                        $nodes_temp_["_items"] = [];
                    }
                    $nodes_temp_["_items"][] = $value;
                } else {
                    if(empty($nodes_temp_[$value])) {
                        $nodes_temp_[$value] = [];
                    }
                    $nodes_temp_ = &$nodes_temp_[$value];
                }
            }
            unset($nodes_temp_);
        }
    }

    public function tree_deal(&$nodes, &$files)
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        foreach($files as $key => &$file)
        {
            $node = str_replace("\\", "/", $file);
            $node = explode("/", $node);
            $n = count($node);
            $nodes_temp_ = &$nodes;
            foreach($node as $key => &$value) {
                if($key == $n - 1) {
                    if(empty($nodes_temp_["_items"])) {
                        $nodes_temp_["_items"] = [];
                    }
                    // 文件
                    $file_use_ = $parameter_->path . "/" . $file;
                    $namespace_ = "";
                    $class_ = "";
                    $fast_uses_ = [];
                    $consts_ = [];
                    $this->parser_text_php_file($file_use_,
                        $namespace_,
                        $class_,
                        $fast_uses_,
                        $consts_
                    );

                    $token_ = explode("/", $file);
                    $file_name_ = end($token_);
                    $nodes_temp_["_items"][$file_name_] = [
                        key_ha::NAMESPACE_ => $namespace_,
                        key_ha::CLASS_ => $class_,
                        key_ha::FAST_USES => $fast_uses_,
                        key_ha::CONSTS => $consts_
                    ];
                } else {
                    if(empty($nodes_temp_[$value])) {
                        $nodes_temp_[$value] = [];
                    }
                    $nodes_temp_ = &$nodes_temp_[$value];
                }
            }
            unset($nodes_temp_);
        }
    }

    /*
    $file 檔名

     ---------------------------------------------------
    常數表 - 固定格式
     ---------------------------------------------------
    <?php

    namespace xxx;

    // 必須最前面
    / *
    use xxx as xxx;
    * /

    class xxx {
        const XXX = "";
    }

     ---------------------------------------------------
    */
    public function parser_text_php_file(&$file,
        &$namespace,
        &$class,
        &$fast_uses,
        &$consts
    )
    {
        $text = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $n = count($text);

        // ------------------------------------
        $is_php_file_ = false;
        $has_namespace_ = false;
        $line_namespace_ = 0;
        $has_class_ = false;
        $line_class_ = 0;
        // ------------------------------------

        // ------------------------------------
        // 基本
        // ------------------------------------
        for($i = 0; $i < $n; $i++)
        {
            $line_ = trim($text[$i]);

            if(!$is_php_file_) {
                $pos_ = false;
                $pos_ = strpos($line_, "<?php", $pos_);
                if($pos_ === 0)
                {
                    $is_php_file_ = true;
                    continue;
                }

                if(!$is_php_file_)
                {
                    continue;
                }
            }

            // namespace
            if(!$has_namespace_) {
                $pos_ = false;
                $pos_ = strpos($line_, "namespace ", $pos_);
                if($pos_ === 0)
                {
                    $token_ = explode("namespace " , $line_);
                    if(count($token_) <= 1)
                    {
                        continue;
                    }
                    $temp_ = $token_[1];
                    $temp_ = trim($temp_);
                    $temp_ = explode(";" , $temp_)[0];
                    $namespace = trim($temp_);

                    $has_namespace_ = true;
                    $line_namespace_ = $i;
                    continue;
                }

                if(!$has_namespace_)
                {
                    continue;
                }
            }

            // class
            if(!$has_class_)
            {
                $pos_ = false;
                $pos_ = strpos($line_, "class ", $pos_);
                if($pos_ === 0)
                {
                    $token_ = explode("class " , $line_);
                    if(count($token_) <= 1)
                    {
                        continue;
                    }
                    $temp_ = $token_[1];
                    $temp_ = trim($temp_);
                    $temp_ = explode(" " , $temp_)[0];
                    $class = trim($temp_);

                    $has_class_ = true;
                    $line_class_ = $i;
                    continue;
                }

                if(!$has_class_)
                {
                    continue;
                }
            }

            if($is_php_file_ &&
                $has_namespace_ &&
                $has_class_
            )
            {
                break;
            }

        }

        if(!$is_php_file_)
        {
            return false;
        }

        // fast_use find
        $has_fast_use_start_ = false;
        $line_fast_use_start_ = 0;
        $has_fast_use_end_ = false;
        $line_fast_use_end_ = 0;
        for($i = $line_namespace_; $i <= $line_class_; $i++)
        {
            $line_ = trim($text[$i]);

            // /*
            if(!$has_fast_use_start_)
            {
                $pos_ = false;
                $pos_ = strpos($line_, "/*", $pos_);
                if($pos_ === 0)
                {
                    $has_fast_use_start_ = true;
                    $line_fast_use_start_ = $i;
                    continue;
                }

                if(!$has_fast_use_start_)
                {
                    continue;
                }
            }

            // /*
            if(!$has_fast_use_end_)
            {
                $pos_ = false;
                $pos_ = strpos($line_, "*/", $pos_);
                if($pos_ === 0)
                {
                    $has_fast_use_end_ = true;
                    $line_fast_use_end_ = $i;
                    continue;
                }

                if($has_fast_use_end_)
                {
                    continue;
                }

                if(!$has_fast_use_end_)
                {
                    continue;
                }
            }

            if($has_fast_use_start_ &&
                $has_fast_use_end_
            )
            {
                break;
            }
        }

        // fast_use get
        for($i = $line_fast_use_start_ + 1; $i < $line_fast_use_end_; $i++)
        {
            $line_ = trim($text[$i]);

            $pos_ = false;
            $pos_ = strpos($line_, "use ", $pos_);
            if($pos_ === 0)
            {
                $token_ = explode("use " , $line_);
                if(count($token_) <= 1)
                {
                    continue;
                }
                $temp_ = $token_[1];
                $temp_ = trim($temp_);
                $temp_ = explode(";" , $temp_)[0];
                $temp_ = trim($temp_);
                $token_ = explode(" as " , $temp_);
                if(count($token_) <= 1)
                {
                    if($token_[0] == $namespace . "\\" . $class)
                    {
                        $fast_uses[] = trim($class);
                    }

                    continue;
                }
                $fast_uses[] = trim($token_[1]);
            }

        }

        // const
        // 因為格式是死的，讀取的檔案一定格式正確
        // // & /**/，可以簡單略過
        $is_comment_ = false;
        // 0 //
        // 1 /*
        $comment_type_ = 0;
        for($i = $line_class_ + 1; $i < $n; $i++)
        {
            $line_ = trim($text[$i]);

            if(!$is_comment_)
            {
                $pos_ = false;
                $pos_ = strpos($line_, "//", $pos_);
                if($pos_ === 0)
                {
                    // 註解
                    $comment_type_ = 1;
                    continue;
                }

                $pos_ = false;
                $pos_ = strpos($line_, "/*", $pos_);
                if($pos_ === 0)
                {
                    // 註解
                    $comment_type_ = 1;
                    $is_comment_ = true;
                    continue;
                }

                // 常數
                $token_ = explode("const " , $line_);
                if(count($token_) <= 1)
                {
                    continue;
                }
                $token_ = explode(";" , $token_[1]);
                if(count($token_) <= 1)
                {
                    continue;
                }
                $temp_ = $token_[0];
                $temp_ = trim($temp_);
                $token_ = explode("=" , $temp_);
                if(count($token_) <= 1)
                {
                    continue;
                }

                $const_key_ = trim($token_[0]);
                $const_value_ = trim(str_replace("\"", "", $token_[1]));

                $consts[$const_key_] = $const_value_;
            }
            else
            {
                $pos_ = false;
                $pos_ = strpos($line_, "*/", $pos_);
                if($pos_ !== false)
                {
                    // 註解
                    $comment_type_ = 0;
                    $is_comment_ = false;
                    continue;
                }
            }

        }

        return true;

    }


    public function path_as_const_style()
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        $parameter_->path = !empty($_GET["path"]) ? $_GET["path"] : "";
        $parameter_->only_php_file = !empty($_GET["only_php_file"]) ? $_GET["only_php_file"] : "";
        $parameter_->styles = [
            0 => "as::const",
            1 => "as::const,",
            2 => 'as::const => "",',
            3 => 'as::const => [],',
        ];

        $file_ = hahaha_file::Instance();

        $filter = [];
        if($parameter_->only_php_file == "true")
        {
            $filter[] = "php";
        }

        // ------------------------------------------------------------
        $nodes_files_ = [];
        $file_->Recursive_File($nodes_files_, $parameter_->path, $filter);
        // ------------------------------------------------------------
        $len = strlen($parameter_->path);
        if($len != 0 && $parameter_->path[$len - 1] != '\\')
        {
            $path_ = str_replace("\\", "/", $parameter_->path . "\\");
        }
        else
        {
            $path_ = str_replace("\\", "/", $parameter_->path);
        }
        // ------------------------------------------------------------
        foreach($nodes_files_ as $key => &$dir_)
        {
            $node_ = str_replace("\\", "/", $dir_);
            $dir_ = str_replace($path_, "", $node_);
        }
        // ------------------------------------------------------------
        // 樹狀
        $nodes = [];
        $this->tree($nodes, $nodes_files_);
        //
        $nodes_deal = [];
        $this->tree_deal($nodes_deal, $nodes_files_);



        // ------------------------------------------------------------
        $parameter_->nodes = &$nodes;
        $parameter_->nodes_deal = &$nodes_deal;
        // ------------------------------------------------------------

        return view('web.backend.tool.path_as_const_style');

    }


}
