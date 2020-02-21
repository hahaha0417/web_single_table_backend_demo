<?php

namespace hahaha\define;

use hahahasublib\hahaha_instance_trait;

/*
use hahaha\define\hahaha_define_table_key as key;
*/

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表
*/
class hahaha_define_table_key
{	
    use hahaha_instance_trait;

    /*
    注意 : 沒有要做完，有做到才補
    */

    // 如要其他類型，則這樣寫TEXT_HA
    // 因為有類型衝突，有衝突的加_，ex. INT_
    // 這裡是標籤，不是實際設定，例如integer對應某項laravel的validate設定組

    // -------------------------------------- 
    // type
    // -------------------------------------- 
    const TYPE = "type";
    // -------------------------------------- 
    // validate
    // -------------------------------------- 
    const VALIDATE = "validate";
    // -------------------------------------- 
    // actions
    // -------------------------------------- 
    const ACTIONS = "actions";
    // -------------------------------------- 
    // tags
    // --------------------------------------
    // 重要的 
    const CLASSES = "classes";
    // 多層
    const CLASSES_1 = "classes_1";
    const CLASSES_2 = "classes_2";
    const CLASSES_3 = "classes_3";
    const CLASSES_4 = "classes_4";
    const CLASSES_5 = "classes_5";
    // -------------------------------------- 
    // style
    // -------------------------------------- 
    // 重要的 
    const STYLES = "styles";
    // 多層
    const STYLES_1 = "styles_1";
    const STYLES_2 = "styles_2";
    const STYLES_3 = "styles_3";
    const STYLES_4 = "styles_4";
    const STYLES_5 = "styles_5";
    // -------------------------------------- 
    // icon
    // -------------------------------------- 
    const ICON = "icon";
    // -------------------------------------- 
    // id
    // -------------------------------------- 
    const ID = "id";
    // -------------------------------------- 
    // db field
    // -------------------------------------- 
    const DB_FIELD = "db_field";
    // -------------------------------------- 
    // is field
    // -------------------------------------- 
    const IS_FIELD = "is_field";
    // -------------------------------------- 
    // field
    // -------------------------------------- 
    const FIELD = "field";
    // -------------------------------------- 
    // name
    // -------------------------------------- 
    const NAME = "name";
    // -------------------------------------- 
    // title
    // -------------------------------------- 
    const TITLE = "title";
    // -------------------------------------- 
    // hint
    // -------------------------------------- 
    const HINT = "hint";
    // -------------------------------------- 
    // nodes
    // -------------------------------------- 
    const NODES = "nodes";
    // -------------------------------------- 
    // group
    // -------------------------------------- 
    const GROUP = "group";
    // -------------------------------------- 
    // items
    // -------------------------------------- 
    const ITEMS = "_items";
    // -------------------------------------- 
    // direction
    // -------------------------------------- 
    const DIRECTION = "direction";
    // --------------------------------------    

	function __construct()
	{
		// $this->Initial();
	}
	
	public function Initial()
	{
       
	}


}


