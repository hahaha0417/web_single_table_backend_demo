<?php

namespace hahaha\define;

use hahahasublib\hahaha_instance_trait;

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表
*/
class hahaha_define_table_tag
{	
    use hahaha_instance_trait;

    // 如要其他類型，則這樣寫TEXT_HA
    // 因為有類型衝突，有衝突的加_，ex. INT_
    // 這裡是標籤，不是實際設定，例如integer對應某項laravel的validate設定組

    // -------------------------------------- 
    // visible 0 不加標籤 1 加標籤
    // -------------------------------------- 
    const VISIBLED = "visibled";
    // -------------------------------------- 
    // visible 0 不加標籤 1 加標籤
    // -------------------------------------- 
    const INVISIBLED = "invisibled";
    // -------------------------------------- 
    // enable 0 不加標籤 1 加標籤
    // -------------------------------------- 
    const ENABLED = "enabled";
    // -------------------------------------- 
    // disabled 0 不加標籤 1 加標籤
    // -------------------------------------- 
    const DISABLED = "disabled";
    // -------------------------------------- 
    // display_none false 不更新 true 自動更新
    // -------------------------------------- 
    const DISPLAY_NONE = "display_none";
    // -------------------------------------- 

	function __construct()
	{
		// $this->Initial();
	}
	
	public function Initial()
	{
       
	}


}


