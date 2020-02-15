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

    // 如要其他類型，則這樣寫TEXT_HA

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

	function __construct()
	{
		// $this->Initial();
	}
	
	public function Initial()
	{
        
	}


}


