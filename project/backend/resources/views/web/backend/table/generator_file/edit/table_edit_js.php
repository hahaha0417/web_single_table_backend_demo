<?php

namespace hahaha\backend;

use hahaha\hahaha_generator_web_script;
use hahahasublib\hahaha_instance_trait;

// ------------------------------------------------------ 
// 不要用這個
// \backend\alias\hahaha_alias_table_define::Alias("\\");
// ------------------------------------------------------ 
// 用傳統的貼法，避免出現錯誤
// 解法 : 
// 1. php提供新include，可以insert代碼做整理 * 
// 2. 插件可以幫我parser class_alias()，例如提供方法指定 
/** 
 * 特例(2) : 
 * @Intelephense:analysis  \backend\alias\hahaha_alias_table_define::Alias("\\");
 * 上面function獨立並只做class_alias
 * 
 **/
// ------------------------------------------------------ 
use hahaha\define\hahaha_define_base_key as key;
use hahaha\define\hahaha_define_base_direction as direction;
use hahaha\define\hahaha_define_html_attribute as attr;
use hahaha\define\hahaha_define_html_class as class_;
use hahaha\define\hahaha_define_html_property as prop;
use hahaha\define\hahaha_define_base_node as node;
use hahaha\define\hahaha_define_base_validate as validate;
use hahaha\define\hahaha_define_html_style as style;
use hahaha\define\hahaha_define_html_tag as tag;
use hahaha\define\hahaha_define_table_action as action;
use hahaha\define\hahaha_define_table_group as group;
use hahaha\define\hahaha_define_table_setting as setting;
use hahaha\define\hahaha_define_table_target as target;
use hahaha\define\hahaha_define_table_type as type;
use hahaha\define\hahaha_define_table_use as use_;
use hahaha\define\hahaha_define_table_db_field_type as field_type;
use hahaha\define\hahaha_define_sql_operator as op;

// ------------------------------------------------------

/*
單表式後台generator，css腳本

注意 : 請直接看生產出來的檔案，如果要看Code的話，這裡不要求一定要排版，因為排版後其實也是看不懂(因為會串接變數)
*/
class table_edit_js extends hahaha_generator_web_script 
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
        $this->JS_Begin($content, $dynamic, $tab, $tab_count);
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
        

        // ----------------------------------------------------- 
        // Js                                 
        // ----------------------------------------------------- 
                                                                
        // ----------------------------------------------------- 

        // ------------------------------------------------------------ 
        $this->JS_End($content, $dynamic, $tab, $tab_count);   
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
        // Add Button & Add Panel
        // ------------------------------------------------------------   
        // $this->Class_Edit_Item_Button_Add($content, $dynamic, $tab, $tab_count); 

        // ------------------------------------------------------------
        // Table
        // ------------------------------------------------------------   

        // ------------------------------------------------------------   
        // Window
        // ------------------------------------------------------------  
        $this->Window_Resize($content, $dynamic, $tab, $tab_count); 
        
    }

    // ------------------------------------------------------------ 
    // click
    // ------------------------------------------------------------ 
    public function Class_Index_Item_Block_Main(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        $option_ = \pub\hahaha_option::Instance();
        $use_ = &$parameter_->Use;
        // $panel_add_width_ = str_replace('%', '', $option_->Project->Backend->Panel_Add->Width) / 100;
        // $panel_add_height_ = str_replace('%', '', $option_->Project->Backend->Panel_Add->Height) / 100;
        //
        // ------------------------------------------------------------         
        $this->jQuery_Ready_Begin($content, $dynamic, $tab, $tab_count); 
        // ------------------------------------------------------------ 
 
        // ------------------------------------------------------------ 
        // click
        // ------------------------------------------------------------ 
        // \p_ha::Line($content, $tab, "$('{$use_->Class_Button_Add_Identify}').click(function() { ");
        // \p_ha::Tab($tab, ++$tab_count); 
        // // ------------------------------------------------------------ 

        // \p_ha::Tab($tab, --$tab_count); 
        // \p_ha::Line($content, $tab, "}); ");
        // ------------------------------------------------------------ 
     
        // ------------------------------------------------------------ 
        $this->jQuery_Ready_End($content, $dynamic, $tab, $tab_count); 
        // ------------------------------------------------------------   

    }

    // ------------------------------------------------------------ 
    // ------------------------------------------------------------ 
    // Window
    // ------------------------------------------------------------ 
    // ------------------------------------------------------------ 

    // ------------------------------------------------------------ 
    // resize
    // ------------------------------------------------------------ 
    public function Window_Resize(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        $option_ = \pub\hahaha_option::Instance();
        $use_ = &$parameter_->Use;
        $panel_add_width_ = str_replace('%', '', $option_->Project->Backend->Panel_Add->Width) / 100;
        $panel_add_height_ = str_replace('%', '', $option_->Project->Backend->Panel_Add->Height) / 100;
        //
        // $panel_detail_width_ = str_replace('%', '', $option_->Project->Backend->Panel_Detail->Width) / 100;
        // $panel_detail_height_ = str_replace('%', '', $option_->Project->Backend->Panel_Detail->Height) / 100;
        //

        // ------------------------------------------------------------         
        $this->jQuery_Ready_Begin($content, $dynamic, $tab, $tab_count); 
        // ------------------------------------------------------------ 
        \p_ha::Line($content, $tab, "$(window).resize(function() { ");
        \p_ha::Tab($tab, ++$tab_count); 
        // 置中
        // \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Add_Identify}').css('width', $(window).width() * {$panel_add_width_}); ");
        // \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Add_Identify}').css('height', $(window).height() * {$panel_add_height_}); ");
        // \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Add_Identify}').css('left', ($(window).width() - $('{$use_->Id_Panel_Add_Identify}').width()) / 2); ");
        // \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Add_Identify}').css('top', ($(window).height() - $('{$use_->Id_Panel_Add_Identify}').height()) / 2); ");
        //
        // \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Detail_Identify}').css('width', $(window).width() * {$panel_detail_width_}); ");
        // \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Detail_Identify}').css('height', $(window).height() * {$panel_detail_height_}); ");
        // \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Detail_Identify}').css('left', ($(window).width() - $('{$use_->Id_Panel_Detail_Identify}').width()) / 2); ");
        // \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Detail_Identify}').css('top', ($(window).height() - $('{$use_->Id_Panel_Detail_Identify}').height()) / 2); ");
        //
        \p_ha::Tab($tab, --$tab_count); 
        \p_ha::Line($content, $tab, "}); ");
        // ------------------------------------------------------------ 
        $this->jQuery_Ready_End($content, $dynamic, $tab, $tab_count); 
        // ------------------------------------------------------------   

    }

}
