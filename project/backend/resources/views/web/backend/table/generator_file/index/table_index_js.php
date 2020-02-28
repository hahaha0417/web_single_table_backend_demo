<?php

namespace hahaha\backend;

use hahaha\hahaha_generator_web_script;
use hahahasublib\hahaha_instance_trait;

use hahaha\define\hahaha_define_table_key as key;

/*
單表式後台generator，css腳本
*/
class table_index_js extends hahaha_generator_web_script
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
        // Add Button & Add Panel
        // ------------------------------------------------------------   
        $this->Class_Index_Item_Button_Add($content, $dynamic, $tab, $tab_count); 
        $this->Class_Index_Item_Panel_Add_Button_Cancel($content, $dynamic, $tab, $tab_count); 
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
    public function Class_Index_Item_Button_Add(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        $option_ = \pub\hahaha_option::Instance();
        $use_ = &$parameter_->Use;
        $panel_add_width_ = str_replace('%', '', $option_->Project->Backend->Panel_Add->Width) / 100;
        $panel_add_height_ = str_replace('%', '', $option_->Project->Backend->Panel_Add->Height) / 100;
        //
        // ------------------------------------------------------------         
        $this->jQuery_Ready_Begin($content, $dynamic, $tab, $tab_count); 
        // ------------------------------------------------------------ 

        // ------------------------------------------------------------ 
        // click
        // ------------------------------------------------------------ 
        \p_ha::Line($content, $tab, "$('{$use_->Class_Button_Add_Identify}').click(function() { ");
        \p_ha::Tab($tab, ++$tab_count); 
        // ------------------------------------------------------------ 
        // 置中
        \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Add_Identify}').css('width', $(window).width() * {$panel_add_width_}); ");
        \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Add_Identify}').css('height', $(window).height() * {$panel_add_height_}); ");
        \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Add_Identify}').css('left', ($(window).width() - $('{$use_->Id_Panel_Add_Identify}').width()) / 2); ");
        \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Add_Identify}').css('top', ($(window).height() - $('{$use_->Id_Panel_Add_Identify}').height()) / 2); ");
        // 顯示    
        \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Add_Identify}').show(); ");
        \p_ha::Tab($tab, --$tab_count); 
        \p_ha::Line($content, $tab, "}); ");
        // ------------------------------------------------------------ 
     
        // ------------------------------------------------------------ 
        $this->jQuery_Ready_End($content, $dynamic, $tab, $tab_count); 
        // ------------------------------------------------------------   


        
        // 
        //     var index = $("#index_page_select").attr("index");
        //     var page = $("#index_page_select").find(":selected").attr("page");
        //     var page_name = $("#index_page_select").find(":selected").attr("name");
        //     var item = $("#index_item_select").find(":selected").attr("name");
    
        //     // alert($(window).width());
        //     // alert($(window).height());
        //     $("#index_item_add_panel").css("left", ($(window).width() - $("#index_item_add_panel").width()) / 2);
        //     $("#index_item_add_panel").css("top", ($(window).height() - $("#index_item_add_panel").height()) / 2);
    
        //     var id = "";
        //     if(page == "all"){
        //         $("#index_item_add_panel_page").val("");
        //     }
        //     else if(page == "index"){
        //         $("#index_item_add_panel_page").val(index);
        //         id += index;
        //     }
        //     else if(page == "page"){
        //         $("#index_item_add_panel_page").val(page_name);
        //         id += page_name;
        //     }
    
        //     if(item == "all"){
        //         $("#index_item_add_panel_item").val("");
        //     }
        //     else{
        //         $("#index_item_add_panel_item").val(item);
        //         if(id == ""){
        //             id += item;
        //         }
        //         else{
        //             id += "_" + item;
        //         }
        //     }
        //     if(id == ""){
        //         id = "識別項 : index_xxx_xxx";
        //         $("#index_item_add_panel_id").attr("placeholder", id);
        //     }
        //     else{
        //         id += "_";
        //         $("#index_item_add_panel_id").val(id);
        //         $("#index_item_add_panel_id").attr("placeholder", id);
        //     }
            
        //     $("#index_item_add_panel_title").val("");
        //     $("#index_item_add_panel_title_name").val("");
        //     $("#index_item_add_panel_url").val("");
    
        //     $(".index_item_add_panel_id_check").hide();
        //     $(".index_item_add_panel_id_error").hide();
    
        //     $("#index_item_add_index_panel").hide();
        //     $("#index_item_add_nav_panel").hide();
        //     $("#index_item_add_panel").toggle();
            
        //     // var page = $("#index_page_select").find(":selected").attr("name");
        //     // var item = $("#index_item_select").find(":selected").attr("name");
            
        //     // if(page == "all" && item == "all"){
        //     //     window.location = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/index/create";
        //     // }
        //     // else if(page != "all" && item == "all"){
        //     //     window.location = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/index/create?page=" + page;
        //     // }
        //     // else if(page == "all" && item != "all"){
        //     //     window.location = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/index/create?item=" + item;
        //     // }
        //     // else{
        //     //     window.location = window.location.protocol + "//" + $(location).attr('host') + "/backend/index/index/create?page=" + page + "&item=" + item;
        //     // } 
    
        // 
      
     
    }

    // ------------------------------------------------------------ 
    // panel add button cancel
    // ------------------------------------------------------------ 
    public function Class_Index_Item_Panel_Add_Button_Cancel(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        $use_ = &$parameter_->Use;
        //

        // ------------------------------------------------------------         
        $this->jQuery_Ready_Begin($content, $dynamic, $tab, $tab_count); 
        // ------------------------------------------------------------ 

        // ------------------------------------------------------------ 
        // click
        // ------------------------------------------------------------ 
        \p_ha::Line($content, $tab, "$('{$use_->Class_Panel_Add_Button_Cancel_Identify}').click(function() { ");
        \p_ha::Tab($tab, ++$tab_count); 
        // 隱藏
        \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Add_Identify}').hide(); ");
        \p_ha::Tab($tab, --$tab_count); 
        \p_ha::Line($content, $tab, "}); ");

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

        // ------------------------------------------------------------         
        $this->jQuery_Ready_Begin($content, $dynamic, $tab, $tab_count); 
        // ------------------------------------------------------------ 
        \p_ha::Line($content, $tab, "$(window).resize(function() { ");
        \p_ha::Tab($tab, ++$tab_count); 
        // 置中
        \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Add_Identify}').css('width', $(window).width() * {$panel_add_width_}); ");
        \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Add_Identify}').css('height', $(window).height() * {$panel_add_height_}); ");
        \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Add_Identify}').css('left', ($(window).width() - $('{$use_->Id_Panel_Add_Identify}').width()) / 2); ");
        \p_ha::Line($content, $tab, "$('{$use_->Id_Panel_Add_Identify}').css('top', ($(window).height() - $('{$use_->Id_Panel_Add_Identify}').height()) / 2); ");
        \p_ha::Tab($tab, --$tab_count); 
        \p_ha::Line($content, $tab, "}); ");
        // ------------------------------------------------------------ 
        $this->jQuery_Ready_End($content, $dynamic, $tab, $tab_count); 
        // ------------------------------------------------------------   

    }

}
