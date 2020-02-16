<?php

namespace hahaha\define;

use hahahasublib\hahaha_instance_trait;

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表
*/
class hahaha_define_table_type
{	
    use hahaha_instance_trait;

    /*
    注意 : 沒有要做完，有做到才補
    */

    // 如要其他類型，則這樣寫TEXT_HA

    // -------------------------------------- 
    // label
    // -------------------------------------- 
    const LABEL = "label";
    // -------------------------------------- 
    // text
    // -------------------------------------- 
    const TEXT = "text";
    // -------------------------------------- 
    // password
    // -------------------------------------- 
    const PASSWORD = "password";
    // -------------------------------------- 
    // combobox
    // -------------------------------------- 
    const COMBOBOX = "combobox";
    // -------------------------------------- 
    // checkbox
    // -------------------------------------- 
    const CHECKBOX = "checkbox";
    const CHECKBOX_SELECTED = "checkbox_selected";
    // -------------------------------------- 
    // rediobox
    // -------------------------------------- 
    const REDIOBOX = "rediobox";
    // -------------------------------------- 
    // image
    // -------------------------------------- 
    const IMAGE = "image";
    const IMAGE_UPLOAD = "image_upload";
    // -------------------------------------- 
    // time
    // -------------------------------------- 
    const TIME = "time";
    // -------------------------------------- 
    // textarea
    // -------------------------------------- 
    const TEXTAREA = "textarea";
    // -------------------------------------- 
    // editor
    // -------------------------------------- 
    const EDITOR = "editor";
    // -------------------------------------- 
    // panel
    // -------------------------------------- 
    const PANEL = "panel";
    // -------------------------------------- 
    // button
    // -------------------------------------- 
    const BUTTON = "button";
    // addition key : 
    // key::ICON    
    const BUTTON_ICON = "button_icon";
    // addition key : 
    // key::ICON    
    const BUTTON_ICON_TEXT = "button_icon_text";
    // -------------------------------------- 

	function __construct()
	{
		// $this->Initial();
	}
	
	public function Initial()
	{
        
	}


}


