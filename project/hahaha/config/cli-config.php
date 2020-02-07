<?php

/*
// --------------------------------------------------------------------------
Hahaha - A PHP Framework
// --------------------------------------------------------------------------
@name       PHP Hahaha Framework
@package    Hahaha
@author     Hahaha(Chen Jie Qi) 
@email      hahaha0417@hotmail.com
@phone      0916353255
@date       2019 / 10 / 20
// --------------------------------------------------------------------------
*/

/*
// --------------------------------------------------------------------------
Application
// --------------------------------------------------------------------------
主流程
// --------------------------------------------------------------------------
*/
require __DIR__.'/../framework/hahaha/function/hahaha_function_application.php';
\ha\Application(
    // -- 根目錄 --
    realpath(__DIR__.'/..'),
    // -- 應用程式 --
    function(){
        // --------------------------------------------------------------------------
        // -- 入口 --
        // --------------------------------------------------------------------------
        \hahaha\hahaha_application::Instance()->Run();
        // Console();
        // --------------------------------------------------------------------------
    },
    // -- 設定 --
    [
        'application' => true,
        //'monitor' => true,
    ]
);
// --------------------------------------------------------------------------

// cli-config.php
//require_once "bootstrap.php";

$arg_ = \ha\Arg::Get();

$db_name_ = NULL;
$path_ = NULL;
$namespace_ = NULL;
// 初始化
$arg_->Arg;

foreach($arg_->Arg as $key => &$arg)
{
    $token_ = explode('=', $arg);
    if(count($token_) == 2)
    {
        if($token_[0] == '---db')
        {
            $db_name_ = $token_[1];
            // 避免doctrine吃錯參數，因為是reference $arg_->Arg，所以可以這樣unset掉Argv的Array Item
            unset($arg_->Arg[$key]);
        }
        else if($token_[0] == '---path')
        {
            $path_ = $token_[1];
            // 避免doctrine吃錯參數，因為是reference $arg_->Arg，所以可以這樣unset掉Argv的Array Item
            unset($arg_->Arg[$key]);
        }
    }
    
}

$entity_manager_ = \hahahalib\hahaha_orm_doctrine::Instance()->Initial_Config($db_name_, $path_);

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entity_manager_);

// 注意 : 要有config/cli-config.php

// 建立Models
// 注意資料庫欄位必須要能轉成變數，所以不能有"--" or "|--|"，並且每個表都要有主key
// ./vendor/bin/doctrine orm:convert-mapping -f --from-database annotation ./../app/mappings
// 因為有保留字的關係，所以要加namespace
// ./vendor/bin/doctrine orm:convert-mapping -f --from-database annotation ./../app/mappings --namespace="A\A_"
// 例如table為class，這樣會生出namespace A下的A_Class.php

// 建立資料庫
// ./vendor/bin/doctrine orm:schema-tool:create
// 這會根據$entity_manager_的config path，將所有的php(包括子資料夾)，建立對應的資料庫

// 替meta class，創建setXX & get XX，以使用Model，似乎會將$entity_manager_的config path，複製到dest path(這沒啥用)
// ./vendor/bin/doctrine orm:generate-entities ./../app/models/oring ---path=app/mappings/oring

// ex 
// 在根目錄
// -- 產生Model
// ./vendor/bin/doctrine orm:convert-mapping -f --from-database annotation app/models --namespace='oring\A_' ---db=test_oring
// ./vendor/bin/doctrine orm:convert-mapping -f --from-database annotation app/models --namespace='B\A_' ---db=test
// -- 建立資料庫
// ./vendor/bin/doctrine orm:schema-tool:create ---db=test_oring ---path=app/models/oring

// --------------------------------------------------------------------------
// 注意
// --------------------------------------------------------------------------
// mappings改為models，因為我的php class map目前還沒辦法設定略過資料夾，路徑會找錯
// 所以先用覆蓋的
// 其實最好方法為，doctrine將變數改為public，然後我繼承base，並在base處理get & set，如果不存在的變數，則拋出例外，代表打錯了
// --------------------------------------------------------------------------