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

trait EditTrait
{
    //


    public function edit($dir, $id){
        return 0;
    }
    // 沒用
    public function edit_($id){
        $dir = Array();
        return $this->edit($dir, $id);
    }
    
    public function edit_class($class, $id){
        $dir = Array($class);
        return $this->edit($dir, $id);
    }
    //
    public function edit_class_model($class, $model, $id){
        $dir = Array($class, $model);
        return $this->edit($dir, $id);
    }

    
}