<?php

namespace hahaha\define;

use hahahasublib\hahaha_instance_trait;

/*
use hahaha\define\hahaha_define_table_node as node;
*/

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表
*/
class hahaha_define_table_node
{	
    use hahaha_instance_trait;

    /*
    注意 : 沒有要做完，有做到才補
    */

    // 如要其他類型，則這樣寫TEXT_HA
    // 因為有類型衝突，有衝突的加_，ex. INT_
    // 這裡是標籤，不是實際設定，例如integer對應某項laravel的validate設定組

    // -------------------------------------- 
    // 重要的 
    const NODE = "node";
    // 多層
    const NODE_1 = "node_1";
    const NODE_2 = "node_2";
    const NODE_3 = "node_3";
    const NODE_4 = "node_4";
    const NODE_5 = "node_5";
    // -------------------------------------- 
 

	function __construct()
	{
		// $this->Initial();
	}
	
	public function Initial()
	{
       
	}


}


