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

trait StoreTrait
{
    //


    public function store($dir){
        return 0;
    }
    // 沒用
    public function store_(){
        $dir = Array();
        return $this->store($dir);
    }
    
    public function store_class($class){
        $dir = Array($class);
        return $this->store($dir);
    }
    //
    public function store_class_model($class, $model){
        $dir = Array($class, $model);
        return $this->store($dir);
    }

    
}