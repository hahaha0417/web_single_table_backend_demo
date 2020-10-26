<?php

namespace hahaha\define;

use hahahasublib\hahaha_instance_trait;

use hahaha\define\hahaha_define_base_key as key;

/*
use hahaha\define\hahaha_define_html_property as prop;

use hahaha\define\hahaha_define_html_property as html_prop;
*/

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表
*/
class hahaha_define_html_property
{	
    use hahaha_instance_trait;

    

    /*
    注意 : 沒有要做完，有做到才補
    */

    // -------------------------------------- 
    // 不使用
    // -------------------------------------- 
    const NO_USE = "ha[no_use]";
    // -------------------------------------- 
    // -------------------------------------- 
    // READONLY
    // -------------------------------------- 
    const READONLY = "readonly"; 
    // -------------------------------------- 
    // DISABLED
    // -------------------------------------- 
    const DISABLED = "disabled"; 
    // -------------------------------------- 
    // REQUIRED
    // -------------------------------------- 
    const REQUIRED = "required"; 
    // -------------------------------------- 
    // 屬性
    // -------------------------------------- 
    // -------------------------------------- 


	function __construct()
	{
		// $this->Initial();
	}
	
	public function Initial()
	{
       
	}


}


