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

trait IndexTrait
{
    //


    public function index($dir, $page){
        return 0;
    }
    // 沒用
    public function index_($page){
        $dir = Array();
        return $this->index($dir, $page);
    }
    
    public function index_class($class, $page){
        $dir = Array($class);
        return $this->index($dir, $page);
    }
    //
    public function index_class_model($class, $model, $page){
        $dir = Array($class, $model);
        return $this->index($dir, $page);
    }

    

    
}