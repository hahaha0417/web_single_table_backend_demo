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

trait IndexTrait
{
    //


    public function index($dir){
        return 0;
    }
    // 沒用
    public function index_(){
        $dir = Array();
        return $this->index($dir);
    }
    
    public function index_class($class){
        $dir = Array($class);
        return $this->index($dir);
    }
    //
    public function index_class_model($class, $model){
        $dir = Array($class, $model);
        return $this->index($dir);
    }

    

    
}