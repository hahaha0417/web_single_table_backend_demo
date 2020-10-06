<?php

namespace hahaha\backend;

use hahaha\hahaha_generator_web_script;
use hahahasublib\hahaha_instance_trait;

use hahaha\define\hahaha_define_table_class as class_;

/*
單表式後台generator，css腳本

注意 : 請直接看生產出來的檔案，如果要看Code的話，這裡不要求一定要排版，因為排版後其實也是看不懂(因為會串接變數)
*/
class table_edit_css extends hahaha_generator_web_script
{
    use hahaha_instance_trait;

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
        \p_ha::Line($content, $tab_, '@charset "utf-8";');
        \p_ha::Line($content, $tab_, ' ');
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
        $this->Class_Edit_Item_Block_Main($content, $dynamic, $tab, $tab_count);   
        // ------------------------------------------------------------  

    }

    public function Class_Edit_Item_Block_Main(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        $option_ = \pub\hahaha_option::Instance();
        
        $use_ = &$parameter_->Use;
        // ------------------------------------------------------------ 
        \p_ha::Line($content, $tab, "/* ");
        \p_ha::Line($content, $tab, "主要區塊 ");
        \p_ha::Line($content, $tab, "*/ ");
        // ------------------------------------------------------------              
        // ------------------------------------------------------------ 
        \p_ha::Line($content, $tab, ".edit_content {$use_->Class_Block_Main_Identify} " . "." . class_::EXIST_CHECK_SUCCESS . " {");
        \p_ha::Tab($tab, ++$tab_count); 
        // ------------------------------------------------------------    
        \p_ha::Line($content, $tab, "display: none; ");
        // ------------------------------------------------------------    
        \p_ha::Tab($tab, --$tab_count); 
        \p_ha::Line($content, $tab, "} ");    
        \p_ha::Line($content, $tab, " ");    
        // ------------------------------------------------------------    

        // ------------------------------------------------------------ 
        \p_ha::Line($content, $tab, ".edit_content {$use_->Class_Block_Main_Identify} " . "." . class_::EXIST_CHECK_ERROR . " {");
        \p_ha::Tab($tab, ++$tab_count); 
        // ------------------------------------------------------------    
        \p_ha::Line($content, $tab, "display: none; ");
        // ------------------------------------------------------------    
        \p_ha::Tab($tab, --$tab_count); 
        \p_ha::Line($content, $tab, "} ");    
        \p_ha::Line($content, $tab, " ");    
        // ------------------------------------------------------------  
        // ------------------------------------------------------------    
         
        // ------------------------------------------------------------  

    }

  

}
