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

trait StoreTrait
{
    //


    public function store($dir, $page){
        return 0;
    }
    // 沒用
    public function store_($page){
        $dir = Array();
        return $this->store($dir, $page);
    }
    
    public function store_class($class, $page){
        $dir = Array($class);
        return $this->store($dir, $page);
    }
    //
    public function store_class_model($class, $model, $page){
        $dir = Array($class, $model);
        return $this->store($dir, $page);
    }

    
}