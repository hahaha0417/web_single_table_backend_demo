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

trait ShowTrait
{
    //


    public function show($dir, $page, $id){
        return 0;
    }
    // 沒用
    public function show_($page, $id){
        $dir = Array();
        return $this->show($dir, $page, $id);
    }
    
    public function show_class($class, $page, $id){
        $dir = Array($class);
        return $this->show($dir, $page, $id);
    }
    //
    public function show_class_model($class, $model, $page, $id){
        $dir = Array($class, $model);
        return $this->show($dir, $page, $id);
    }

    
}