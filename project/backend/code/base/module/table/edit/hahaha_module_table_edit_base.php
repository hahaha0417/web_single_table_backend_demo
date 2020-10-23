<?php

namespace hahaha;

use hahaha\define\hahaha_define_table_key as key;

/*
edit 模組

安裝柄
*/
class hahaha_module_table_edit_base
{
    public $Handles_ = [];

    /*
    初始化，直接使用物件

    用method_exists檢查是否執行
    速度太慢再加array決定是否要執行method
    */
    public function Initial()
    {
        $handles_ = [
            key::TABEL => "\\hahaha\\hahaha_module_table_edit_table_base",
            key::CONTROLLER => "\\hahaha\\hahaha_module_table_edit_controller_base",
            key::_USE => "\\hahaha\\hahaha_module_table_edit_use_base",
            key::GENERATOR => "\\hahaha\\hahaha_module_table_edit_generator_base",
            key::VIEW => "\\hahaha\\hahaha_module_table_edit_view_base",
        ];

        $this->Handles_ = [];
        foreach($handles_ as $key => &$handle)
        {
            $this->Handles_[$key] = $handle::Instance()->Initail();    
        }

    }    

 
 

}
