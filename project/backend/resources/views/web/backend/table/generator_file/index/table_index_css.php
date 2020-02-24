<?php

namespace hahaha\backend;

use hahaha\hahaha_generator_web_script;
use hahahasublib\hahaha_instance_trait;

use hahaha\define\hahaha_define_table_class as class_;

/*
單表式後台generator，css腳本
*/
class table_index_css extends hahaha_generator_web_script
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
        \p_ha::Line($content, $tab_, '@charset "utf-8"');
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
        $this->Class_Index_Item_Panel_Add($content, $dynamic, $tab, $tab_count);   
        // ------------------------------------------------------------  


   
    }

    public function Class_Index_Item_Panel_Add(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        $use_ = &$parameter_->Use;
        // ------------------------------------------------------------ 
        \p_ha::Line($content, $tab, "/* ");
        \p_ha::Line($content, $tab, "新增面板 ");
        \p_ha::Line($content, $tab, "*/ ");
        // ------------------------------------------------------------              
        \p_ha::Line($content, $tab, ".index_content {$use_->Id_Panel_Add_Identify} { ");
        \p_ha::Tab($tab, ++$tab_count); 
        // ------------------------------------------------------------    
        \p_ha::Line($content, $tab, "background: rgba(190,255,190,0.8); ");
        \p_ha::Line($content, $tab, "position: fixed; ");
        \p_ha::Line($content, $tab, "z-index: 1000; ");
        \p_ha::Line($content, $tab, "width: 1000px; ");
        \p_ha::Line($content, $tab, "height: 400px; ");
        \p_ha::Line($content, $tab, "left: 0; ");
        \p_ha::Line($content, $tab, "top: 0; ");
        \p_ha::Line($content, $tab, "display: none; ");
        // ------------------------------------------------------------    
        \p_ha::Tab($tab, --$tab_count); 
        \p_ha::Line($content, $tab, "} ");    
        \p_ha::Line($content, $tab, " ");    
        // ------------------------------------------------------------      

        // ------------------------------------------------------------ 
        \p_ha::Line($content, $tab, ".index_content {$use_->Class_Panel_Add_Identify} {$use_->Class_Panel_Add_Identify}_content {");
        \p_ha::Tab($tab, ++$tab_count); 
        // ------------------------------------------------------------    
        \p_ha::Line($content, $tab, "background: rgba(190,255,190,0.8); ");
        \p_ha::Line($content, $tab, "padding: 25px 25px; ");
        \p_ha::Line($content, $tab, "float: left; ");
        \p_ha::Line($content, $tab, "position: relative; ");
        \p_ha::Line($content, $tab, "width: 100%; ");
        \p_ha::Line($content, $tab, "height: 100%; ");
        // ------------------------------------------------------------    
        \p_ha::Tab($tab, --$tab_count); 
        \p_ha::Line($content, $tab, "} ");    
        \p_ha::Line($content, $tab, " ");    
        // ------------------------------------------------------------      
        
        // ------------------------------------------------------------ 
        \p_ha::Line($content, $tab, ".index_content {$use_->Class_Panel_Add_Identify} {$use_->Class_Panel_Add_Identify}_content {$use_->Class_Panel_Add_Identify}_comment {");
        \p_ha::Tab($tab, ++$tab_count); 
        // ------------------------------------------------------------    
        \p_ha::Line($content, $tab, "resize: none; ");
        // ------------------------------------------------------------    
        \p_ha::Tab($tab, --$tab_count); 
        \p_ha::Line($content, $tab, "} ");    
        \p_ha::Line($content, $tab, " ");    
        // ------------------------------------------------------------  
        
        // ------------------------------------------------------------ 
        \p_ha::Line($content, $tab, ".index_content {$use_->Class_Panel_Add_Identify} {$use_->Class_Panel_Add_Identify}_content label" . "." . class_::REQUIRED . "::before {");
        \p_ha::Tab($tab, ++$tab_count); 
        // ------------------------------------------------------------    
        \p_ha::Line($content, $tab, "content: \" *\"; ");
        \p_ha::Line($content, $tab, "color: red; ");        
        // ------------------------------------------------------------    
        \p_ha::Tab($tab, --$tab_count); 
        \p_ha::Line($content, $tab, "} ");    
        \p_ha::Line($content, $tab, " ");    
        // ------------------------------------------------------------  

        // ------------------------------------------------------------ 
        \p_ha::Line($content, $tab, ".index_content {$use_->Class_Panel_Add_Identify} " . "." . class_::EXIST_CHECK_SUCCESS . " {");
        \p_ha::Tab($tab, ++$tab_count); 
        // ------------------------------------------------------------    
        \p_ha::Line($content, $tab, "display: none; ");
        // ------------------------------------------------------------    
        \p_ha::Tab($tab, --$tab_count); 
        \p_ha::Line($content, $tab, "} ");    
        \p_ha::Line($content, $tab, " ");    
        // ------------------------------------------------------------    

        // ------------------------------------------------------------ 
        \p_ha::Line($content, $tab, ".index_content {$use_->Class_Panel_Add_Identify} " . "." . class_::EXIST_CHECK_ERROR . " {");
        \p_ha::Tab($tab, ++$tab_count); 
        // ------------------------------------------------------------    
        \p_ha::Line($content, $tab, "display: none; ");
        // ------------------------------------------------------------    
        \p_ha::Tab($tab, --$tab_count); 
        \p_ha::Line($content, $tab, "} ");    
        \p_ha::Line($content, $tab, " ");    
        // ------------------------------------------------------------  

    }

}
