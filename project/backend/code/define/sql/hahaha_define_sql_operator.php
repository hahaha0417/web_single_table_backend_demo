<?php

namespace hahaha\define;

use hahahasublib\hahaha_instance_trait;

/*

use hahaha\define\hahaha_define_sql_operator as op;

use hahaha\define\hahaha_define_sql_operator as sql_op;
*/

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表
*/
class hahaha_define_sql_operator
{	
    use hahaha_instance_trait;

    /*
    注意 : 沒有要做完，有做到才補
    */

    // 如要其他類型，則這樣寫TEXT_HA
    // 因為有類型衝突，有衝突的加_，ex. INT_
    // 這裡是標籤，不是實際設定，例如integer對應某項laravel的validate設定組


    // https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/query-builder.html
    // 有空再列
    // -------------------------------------- 
    // -------------------------------------- 
    // operator
    // -------------------------------------- 

    // -------------------------------------- 
    // between
    // -------------------------------------- 
    const BETWEEN = "between";
    // -------------------------------------- 
    // in
    // -------------------------------------- 
    const IN = "in";
    const NOT_IN = "not in";
    // -------------------------------------- 
    // AND_X - 命令處理組合方式，非andx
    // -------------------------------------- 
    const AND_X = "and_x";
    // -------------------------------------- 
    // OR_X - 命令處理組合方式，非orx
    // -------------------------------------- 
    const OR_X = "or_x";
    // -------------------------------------- 

	function __construct()
	{
		// $this->Initial();
	}
	
	public function Initial()
	{
       
	}


}


