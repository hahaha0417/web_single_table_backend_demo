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

trait EditTrait
{
    //


    public function edit($dir, $page, $id){
        return 0;
    }
    // 沒用
    public function edit_($page, $id){
        $dir = Array();
        return $this->edit($dir, $page, $id);
    }
    
    public function edit_class($class, $page, $id){
        $dir = Array($class);
        return $this->edit($dir, $page, $id);
    }
    //
    public function edit_class_model($class, $model, $page, $id){
        $dir = Array($class, $model);
        return $this->edit($dir, $page, $id);
    }

    
}