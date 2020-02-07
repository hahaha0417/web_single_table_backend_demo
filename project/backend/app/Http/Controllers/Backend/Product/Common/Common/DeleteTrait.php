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

trait DeleteTrait
{
    //


    public function delete($dir, $id){
        return 0;
    }
    // 沒用
    public function delete_($id){
        $dir = Array();
        return $this->delete($dir, $id);
    }
    
    public function delete_class($class, $id){
        $dir = Array($class);
        return $this->delete($dir, $id);
    }
    //
    public function delete_class_model($class, $model, $id){
        $dir = Array($class, $model);
        return $this->delete($dir, $id);
    }

    
}