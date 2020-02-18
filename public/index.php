<?php

/*
請依據建置邏輯，選擇跳轉專案，由於節點正常來說沒有很多，因此簡單寫就好了

主目錄下的hahaha，則設計為切換模式
例如維護時導過去，或者提供全局功能

// 因為master是laravel，他本身很慢，所以不需要額外判斷，幫助request加速
// 我只須確保API在比較前面可以優先請求

// 如用我框架，在此分專案設計下，則可能設計為在API加header，分離API和網站

因為設計上，架站可以任意搭配，所以設定分別私自紀錄相同設定，因為採用集中表會使的，專案無法獨立運作
所以我會開一個資料夾，儲存共用變數，只需要改好複製到各專案(也可以用腳本複製)，通用設定採用class儲存，
用腳本複製完會順便執行composer autoload
*/

// 因為這是入口，直接require即可，有需要再包成檔案載入
require __DIR__.'/../libraries/hahahasublib/trait/hahaha_instance_trait.php';
require __DIR__.'/../config/system_setting/hahaha_system_setting.php';
require __DIR__.'/../config/option/hahaha_option.php';
require __DIR__.'/../config/global/hahaha_global.php';
//

$system_setting_ = \pub\hahaha_system_setting::Instance()->Initial("hahaha", 0);
$global_ = \pub\hahaha_global::Instance();

$url_token_ = explode("?", $_SERVER['REQUEST_URI']);

// 跳轉專案
$global_->Project->Jump = 1;
// 比對站點
if(strpos($url_token_[0], $system_setting_->Project->Hahaha->Node) === 0)
{
    // api(H) - 快速API
    $global_->Node->Name = "Hahaha";
    require $system_setting_->Project->Hahaha->Index;
}
else if(strpos($url_token_[0], $system_setting_->Project->Api->Node) === 0)
{
    // api - 提供API
    $global_->Node->Name = "Api";
    require $system_setting_->Project->Api->Index;
}
else if(strpos($url_token_[0], $system_setting_->Project->Backend->Node) === 0)
{
    // 後台 - 單表式後台
    $global_->Node->Name = "Backend";
    require $system_setting_->Project->Backend->Index;
}
else if(strpos($url_token_[0], $system_setting_->Project->Master->Node) === 0)
{
    // 主控台 - 系統操作及後門
    $global_->Node->Name = "Master";
    require $system_setting_->Project->Master->Index;
}
else
{
    // 前台 - 網站
    $global_->Node->Name = "Front";
    require $system_setting_->Project->Front->Index;
}
//
