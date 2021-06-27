<?php

namespace hahaha\backend;

use hahaha\hahaha_generator_web_script;
use hahahasublib\hahaha_instance_trait;

// ----------------------------------
// property
// ----------------------------------  
/* 
// 因為generator要用，這裡準備參數
$parameter_ = \hahaha\hahaha_parameter::Instance();
// 輸入
$parameter_->Input = new \hahaha\hahaha_parameter;
// 輸出
$parameter_->Output = new \hahaha\hahaha_parameter;
// 暫記參數
$parameter_->Extra = new \hahaha\hahaha_parameter;
// property
$parameter_->Target_Setting_Table = &$target_setting_table;
$parameter_->Target_Table_Identiy = &$target_table_identiy;
$parameter_->Target_Table = &$target_table;
$parameter_->Data_List = &$data_list;
$parameter_->Data_Link = &$data_link;
$parameter_->Page = &$page;
//
*/

/*
單表式後台generator，css腳本
*/
class index_js extends hahaha_generator_web_script
{
    use hahaha_instance_trait;
    
    // ----------------------------------
    // 
    // ----------------------------------
    function __construct()
    { 

    }

    // ----------------------------------
    // ----------------------------------
    // 腳本區
    // ----------------------------------    
    // ----------------------------------
    public function Script(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        // ------------------------------------------------------------ 
        // ------------------------------------------------------------ 
        $this->CSS_Begin($content, $dynamic, $tab, $tab_count);
        // ------------------------------------------------------------ 
        $this->Header($content, $dynamic, $tab, $tab_count);  
        $this->License($content, $dynamic, $tab, $tab_count); 
        // ------------------------------------------------------------ 
        // ------------------------------------------------------------ 
        $this->Script_Custom($content, $dynamic, $tab, $tab_count);          
        // ------------------------------------------------------------ 
        // ------------------------------------------------------------ 
        $this->Footer($content, $dynamic, $tab, $tab_count); 
        // ------------------------------------------------------------ 
        $this->CSS_End($content, $dynamic, $tab, $tab_count);   
        // ------------------------------------------------------------ 
        // ------------------------------------------------------------    
        
    }

    // ----------------------------------
    // ----------------------------------
    // 腳本Custom區
    // ----------------------------------    
    // ----------------------------------
    public function Script_Custom(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        // ------------------------------------------------------------ 
       
        // ------------------------------------------------------------    
    }

}
