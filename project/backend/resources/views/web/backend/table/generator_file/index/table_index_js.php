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
        $this->Class_Index_Item_Button_Add($content, $dynamic, $tab, $tab_count); 
        // ------------------------------------------------------------    
    }

    public function Class_Index_Item_Button_Add(&$content, $dynamic = false, &$tab = "", &$tab_count = 0)
    {
        $parameter_ = \hahaha\hahaha_parameter::Instance();
        $use_ = &$parameter_->Use;
        //
        // $target_table_ = &$parameter_->Target_Table;
        // $target_setting_table_ = &$parameter_->Target_Setting_Table;
        // // table class 名
        // $target_table_class_ = $target_setting_table_['table'];
        // ------------------------------------------------------------         
        $this->jQuery_Ready_Begin($content, $dynamic, $tab, $tab_count); 
        // ------------------------------------------------------------ 
        // 不要直接用物件取得const，假設物件刪除或其他，變成要重新改，不會比較省力
        // 取得table元件有兩種方法
        // dd($target_table_class_::IDENTIFY . "_" . $target_table_class_::B_TOP . "_" . $target_table_class_::BUTTON_ADD);
        // dd($target_table_->Index[$target_table_class_::B_TOP][0][key::ITEMS][$button_identify_][key::ID]);
        // 用第二種會查死
        // 基本上直接用上面那種，因為id & class是唯一，如果元件換位置，ID要跟著改，這裡代稱也要順便改，
        // 盡量不要直接寫字串(當然臨時是沒問題的)，因為改完後，要查到對應的字串進行正確的修改，
        // 很麻煩，你怎麼知道哪邊哪個欄位，對應哪個表的哪個欄位，哪個ID是由那些const組成，直接給const比較好對應，避免要查const
    
        // ------------------------------------------------------------ 
        // click
        // ------------------------------------------------------------ 
        \p_ha::Line($content, $tab, "$('$use_->Class_Button_Add_Identify').click(function() { ");
        // add_panel
        
        // ------------------------------------------------------------ 
        // 置中
    //    $("#index_item_add_panel").css("left", ($(window).width() - $("#index_item_add_panel").width()) / 2);
    //    $("#index_item_add_panel").css("top", ($(window).height() - $("#index_item_add_panel").height()) / 2);
//    dd($use_->Id_Add_Panel_Identify_); 
     //   $items_ = 
// dd($add_panel_);

        // \p_ha::Line($content, $tab, "alert(4); ");

        \p_ha::Line($content, $tab, "}); ");
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

}
