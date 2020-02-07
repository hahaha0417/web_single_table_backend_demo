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

trait DealTrait
{
    //


    public function deal($dir, $page){
        return 0;
    }
    // 沒用
    public function deal_($page){
        $dir = Array();
        return $this->deal($dir, $page);
    }
    
    public function deal_class($class, $page){
        $dir = Array($class);
        return $this->deal($dir, $page);
    }
    //
    public function deal_class_model($class, $model, $page){
        $dir = Array($class, $model);
        return $this->deal($dir, $page);
    }

    
}