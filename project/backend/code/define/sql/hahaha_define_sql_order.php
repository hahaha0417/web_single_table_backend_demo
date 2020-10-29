<?php

namespace hahaha\define;

use hahahasublib\hahaha_instance_trait;

/*

use hahaha\define\hahaha_define_sql_order as order;

use hahaha\define\hahaha_define_sql_order as sql_order;
*/

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表
*/
class hahaha_define_sql_order
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
    // order
    // --------------------------------------
    // --------------------------------------

    // --------------------------------------
    // asc
    // --------------------------------------
    const ASC = "asc";
    // --------------------------------------
    // desc
    // --------------------------------------
    const DESC = "desc";
    // --------------------------------------

	function __construct()
	{
		// $this->Initial();
	}

	public function Initial()
	{

	}


}


