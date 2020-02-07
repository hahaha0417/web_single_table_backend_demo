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

trait DeleteTrait
{
    //


    public function delete($dir, $page, $id){
        return 0;
    }
    // 沒用
    public function delete_($page, $id){
        $dir = Array();
        return $this->delete($dir, $page, $id);
    }
    
    public function delete_class($class, $page, $id){
        $dir = Array($class);
        return $this->delete($dir, $page, $id);
    }
    //
    public function delete_class_model($class, $model, $page, $id){
        $dir = Array($class, $model);
        return $this->delete($dir, $page, $id);
    }

    
}