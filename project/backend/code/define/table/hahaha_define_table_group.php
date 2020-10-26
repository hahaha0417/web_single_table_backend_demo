<?php

namespace hahaha\define;

use hahahasublib\hahaha_instance_trait;

/*
use hahaha\define\hahaha_define_table_group as group;

use hahaha\define\hahaha_define_table_group as table_group;
*/

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表
*/
class hahaha_define_table_group
{	
    use hahaha_instance_trait;

    /*
    注意 : 沒有要做完，有做到才補
    */

    // 如要其他類型，則這樣寫TEXT_HA

    // -------------------------------------- 
    // INPUT_GROUP
    // -------------------------------------- 
    const INPUT_GROUP = "input_group";
    // -------------------------------------- 
    // SHORT_WRAP
    // -------------------------------------- 
    const SHORT_WRAP = "short_wrap";
    // -------------------------------------- 
    // FORM_GROUP_ROW
    // -------------------------------------- 
    const FORM_GROUP_ROW = "form_group_row";
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


