<?php

namespace hahaha;

/*
可以產生
css <style></style>
js <script></script>
php & html include用
php 做工能用

因為是腳本，所以街口不產生給自己
可以任意插入任何地方，所以要加tab & tab_count，以提供最大方便
有兼顧到php-fpm & swoole平行時，所以這樣寫沒錯

預設儲存本身位置$Static_Contents & $Dynamic_Contents
*/
class hahaha_generator_web_script_base
{
    const SCRIPT_START = "<script>";
    const SCRIPT_END = "</script>";
    const STYLE_START = "<style>";
    const STYLE_END = "</style>";

    // ----------------------------------
    // property
    // ----------------------------------
    // 產生靜態的檔案內容，統一放入這裡
    public $Static_Contents = [];
    // 產生動態的附加內容
    public $Dynamic_Contents = [];

    // ----------------------------------
    // 
    // ----------------------------------
    function __construct()
    {

    }

    // ----------------------------------
    // 入口
    // ----------------------------------
    /*
    入口
    */
    public function Generate(&$static_content, &$dynamic_content, &$tab = "", &$tab_count = 0)
    {
        $this->Generate_Static($static_content, $tab, $tab_count);
        $this->Generate_Dynamic($dynamic_content, $tab, $tab_count);

    }

    /*
    靜態入口
    */    
    public function Generate_Static(&$content, &$tab = "", &$tab_count = 0)
    {
        // 初始化
        $content = [];
        $this->Script($content, false, $tab, $tab_count);

    }

    /*
    動態入口
    */    
    public function Generate_Dynamic(&$content, &$tab = "", &$tab_count = 0)
    {
        // 初始化
        $content = [];
        $this->Script($content, true, $tab, $tab_count);

    }

    // ----------------------------------
    // 腳本區
    // ----------------------------------    
    public function Script(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {

    }
  
}
