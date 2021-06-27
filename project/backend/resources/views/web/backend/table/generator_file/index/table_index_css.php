<?php

namespace hahaha\backend;

use hahaha\hahaha_generator_web_script;
use hahahasublib\hahaha_instance_trait;
use hahaha\hahaha_generator_table_css_trait;

// ------------------------------------------------------
// 不要用這個
// \backend\alias\hahaha_alias_table_define::Alias("\\");
// ------------------------------------------------------
// 用傳統的貼法，避免出現錯誤
// 解法 :
// 1. php提供新include，可以insert代碼做整理 *
// 2. 插件可以幫我parser class_alias()，例如提供方法指定
/**
 * 特例(2) : ! Intelephense:analysis -- 這樣會導doctrine orm:generate-entities不能解析
 * ! Intelephense:analysis  \backend\alias\hahaha_alias_table_define::Alias("\\");
 * 上面function獨立並只做class_alias
 *
 **/
// ------------------------------------------------------
use hahaha\define\hahaha_define_base_key as key_;
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
class table_index_css extends hahaha_generator_web_script
{
    use hahaha_instance_trait;

    use hahaha_generator_table_css_trait;

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

        // -----------------------------------------------------
        // Css
        // -----------------------------------------------------

        // -----------------------------------------------------

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
        $this->Class_Index_Item_Panel_Detail($content, $dynamic, $tab, $tab_count);
        // ------------------------------------------------------------

    }

    public function Class_Index_Item_Panel_Add(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        $option_ = \pub\hahaha_option::Instance();

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
        \p_ha::Line($content, $tab, "width: {$option_->Project->Backend->Panel_Add->Width}; ");
        \p_ha::Line($content, $tab, "height: {$option_->Project->Backend->Panel_Add->Height}; ");
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
        \p_ha::Line($content, $tab, "overflow: auto; ");
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
        \p_ha::Line($content, $tab, ".index_content {$use_->Class_Panel_Add_Identify} {$use_->Class_Panel_Add_Identify}_content label" . "." . class_::REQUIRED . "::after {");
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

    public function Class_Index_Item_Panel_Detail(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        $option_ = \pub\hahaha_option::Instance();

        $use_ = &$parameter_->Use;
        // ------------------------------------------------------------
        \p_ha::Line($content, $tab, "/* ");
        \p_ha::Line($content, $tab, "新增面板 ");
        \p_ha::Line($content, $tab, "*/ ");
        // ------------------------------------------------------------
        \p_ha::Line($content, $tab, ".index_content {$use_->Class_Panel_Detail_Identify} { ");
        \p_ha::Tab($tab, ++$tab_count);
        // ------------------------------------------------------------
        \p_ha::Line($content, $tab, "background: rgba(190,255,190,0.8); ");
        \p_ha::Line($content, $tab, "position: fixed; ");
        \p_ha::Line($content, $tab, "z-index: 1000; ");
        \p_ha::Line($content, $tab, "width: {$option_->Project->Backend->Panel_Detail->Width}; ");
        \p_ha::Line($content, $tab, "height: {$option_->Project->Backend->Panel_Detail->Height}; ");
        \p_ha::Line($content, $tab, "left: {$option_->Project->Backend->Panel_Detail->Left}; ");
        \p_ha::Line($content, $tab, "top: 0px; ");
        \p_ha::Line($content, $tab, "display: none; ");
        // ------------------------------------------------------------
        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "} ");
        \p_ha::Line($content, $tab, " ");
        // ------------------------------------------------------------

        // ------------------------------------------------------------
        \p_ha::Line($content, $tab, ".index_content {$use_->Class_Panel_Detail_Identify} {$use_->Class_Panel_Detail_Identify}_content {");
        \p_ha::Tab($tab, ++$tab_count);
        // ------------------------------------------------------------
        \p_ha::Line($content, $tab, "background: rgba(190,255,190,0.8); ");
        \p_ha::Line($content, $tab, "padding: 25px 25px; ");
        \p_ha::Line($content, $tab, "float: left; ");
        \p_ha::Line($content, $tab, "position: relative; ");
        \p_ha::Line($content, $tab, "overflow: auto; ");
        \p_ha::Line($content, $tab, "width: 100%; ");
        \p_ha::Line($content, $tab, "height: 100%; ");
        // ------------------------------------------------------------
        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "} ");
        \p_ha::Line($content, $tab, " ");
        // ------------------------------------------------------------

        // ------------------------------------------------------------
        \p_ha::Line($content, $tab, ".index_content {$use_->Class_Panel_Detail_Identify} {$use_->Class_Panel_Detail_Identify}_content {$use_->Class_Panel_Detail_Identify}_comment {");
        \p_ha::Tab($tab, ++$tab_count);
        // ------------------------------------------------------------
        \p_ha::Line($content, $tab, "resize: none; ");
        // ------------------------------------------------------------
        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "} ");
        \p_ha::Line($content, $tab, " ");
        // ------------------------------------------------------------

        // ------------------------------------------------------------
        \p_ha::Line($content, $tab, ".index_content {$use_->Class_Panel_Detail_Identify} {$use_->Class_Panel_Detail_Identify}_content label" . "." . class_::REQUIRED . "::after{");
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
        \p_ha::Line($content, $tab, ".index_content {$use_->Class_Panel_Detail_Identify} " . "." . class_::EXIST_CHECK_SUCCESS . " {");
        \p_ha::Tab($tab, ++$tab_count);
        // ------------------------------------------------------------
        \p_ha::Line($content, $tab, "display: none; ");
        // ------------------------------------------------------------
        \p_ha::Tab($tab, --$tab_count);
        \p_ha::Line($content, $tab, "} ");
        \p_ha::Line($content, $tab, " ");
        // ------------------------------------------------------------

        // ------------------------------------------------------------
        \p_ha::Line($content, $tab, ".index_content {$use_->Class_Panel_Detail_Identify} " . "." . class_::EXIST_CHECK_ERROR . " {");
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
