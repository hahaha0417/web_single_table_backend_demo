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
namespace App\Http\Controllers\Backend\Product\Common\Common;

trait AddTrait
{
    //


    public function add($dir){
        return 0;
    }
    // 沒用
    public function add_(){
        $dir = Array();
        return $this->add($dir);
    }
    
    public function add_class($class){
        $dir = Array($class);
        return $this->add($dir);
    }
    //
    public function add_class_model($class, $model){
        $dir = Array($class, $model);
        return $this->add($dir);
    }

    
}