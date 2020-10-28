<?php

namespace hahaha\define;

use hahahasublib\hahaha_instance_trait;

/*
use hahaha\define\hahaha_define_api_response as response;

use hahaha\define\hahaha_define_api_response as api_response;

use hahaha\define\hahaha_define_api_response as \ha\response;
*/

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表
*/
class hahaha_define_api_response
{	
    use hahaha_instance_trait;

    /*
    注意 : 沒有要做完，有做到才補
    */

    // 如要其他類型，則這樣寫TEXT_HA

    // -------------------------------------- 
    // status 
    // -------------------------------------- 
    
    const STATUS = "status";
    // -------------------------------------- 
    // message 
    // -------------------------------------- 
    const MESSAGE = "message";
    const MSG = "message";

    

    // -------------------------------------- 
    // 
    // -------------------------------------- 

	function __construct()
	{
		// $this->Initial();
	}
	
	public function Initial()
	{
        
	}


}


