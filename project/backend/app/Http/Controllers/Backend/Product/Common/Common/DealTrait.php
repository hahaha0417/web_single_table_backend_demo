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

trait DealTrait
{
    //


    public function deal($dir){
        return 0;
    }
    // 沒用
    public function deal_(){
        $dir = Array();
        return $this->deal($dir);
    }
    
    public function deal_class($class){
        $dir = Array($class);
        return $this->deal($dir);
    }
    //
    public function deal_class_model($class, $model){
        $dir = Array($class, $model);
        return $this->deal($dir);
    }

    
}