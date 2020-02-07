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

trait UpdateTrait
{
    //


    public function update($dir, $page, $id){
        return 0;
    }
    // 沒用
    public function update_($page, $id){
        $dir = Array();
        return $this->update($dir, $page, $id);
    }
    
    public function update_class($class, $page, $id){
        $dir = Array($class);
        return $this->update($dir, $page, $id);
    }
    //
    public function update_class_model($class, $model, $page, $id){
        $dir = Array($class, $model);
        return $this->update($dir, $page, $id);
    }

    
}