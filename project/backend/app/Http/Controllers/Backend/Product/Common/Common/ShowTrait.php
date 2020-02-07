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

trait ShowTrait
{
    //


    public function show($dir, $id){
        return 0;
    }
    // 沒用
    public function show_($id){
        $dir = Array();
        return $this->show($dir, $id);
    }
    
    public function show_class($class, $id){
        $dir = Array($class);
        return $this->show($dir, $id);
    }
    //
    public function show_class_model($class, $mode, $id){
        $dir = Array($class, $model);
        return $this->show($dir, $id);
    }

    
}