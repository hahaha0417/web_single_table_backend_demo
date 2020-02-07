<?php
/*
{{-- 原始 : hahaha --}}
{{-- 維護 :  --}}
{{-- 指揮 :  --}}
{{-- ---------------------------------------------------------------------------------------------- --}}
{{-- 決定 : name --}}
{{-- 
    ----------------------------------------------------------------------------
    說明 : 
    ----------------------------------------------------------------------------   
    
    ----------------------------------------------------------------------------
--}}
{{-- ---------------------------------------------------------------------------------------------- --}}
*/
namespace App\Http\Controllers\Backend\Product\Common\Common2;

trait AddTrait
{
    //


    public function add($dir, $page){
        return 0;
    }
    // 沒用
    public function add_($page){
        $dir = Array();
        return $this->add($dir, $page);
    }
    
    public function add_class($class, $page){
        $dir = Array($class);
        return $this->add($dir, $page);
    }
    //
    public function add_class_model($class, $model, $page){
        $dir = Array($class, $model);
        return $this->add($dir, $page);
    }

    
}