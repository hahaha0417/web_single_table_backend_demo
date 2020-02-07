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

trait UpdateTrait
{
    //


    public function update($dir, $id){
        return 0;
    }
    // 沒用
    public function update_($id){
        $dir = Array();
        return $this->update($dir, $id);
    }
    
    public function update_class($class, $id){
        $dir = Array($class);
        return $this->update($dir, $id);
    }
    //
    public function update_class_model($class, $model, $id){
        $dir = Array($class, $model);
        return $this->update($dir, $id);
    }

    
}