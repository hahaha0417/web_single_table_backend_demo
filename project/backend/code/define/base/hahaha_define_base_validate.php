<?php

namespace hahaha\define;

use hahahasublib\hahaha_instance_trait;

/*
use hahaha\define\hahaha_define_base_validate as validate;

use hahaha\define\hahaha_define_base_validate as base_validate;
*/

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表
*/
class hahaha_define_base_validate
{	
    use hahaha_instance_trait;

    /*
    注意 : 沒有要做完，有做到才補
    */

    // 如要其他類型，則這樣寫TEXT_HA
    // 因為有類型衝突，有衝突的加_，ex. INT
    // 這裡是標籤，不是實際設定，例如integer對應某項laravel的validate設定組

    // -------------------------------------- 
    // integer
    // -------------------------------------- 
    const INT = "integer";
    // -------------------------------------- 
    // float
    // -------------------------------------- 
    const FLOAT = "float";
    // -------------------------------------- 
    // double
    // -------------------------------------- 
    const DOUBLE = "double";
    // -------------------------------------- 
    // email
    // -------------------------------------- 
    const EMAIL = "email";
    // -------------------------------------- 
    // phone
    // -------------------------------------- 
    const PHONE = "phone";
    // -------------------------------------- 
    // password
    // -------------------------------------- 
    const PASSWORD = "password";
    const PASSWORD_CONFIRM = "password_comfirm";
    // -------------------------------------- 

	function __construct()
	{
		// $this->Initial();
	}
	
	public function Initial()
	{
       
	}


}


