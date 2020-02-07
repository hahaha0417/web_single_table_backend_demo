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
namespace App\Http\Controllers\Backend\Device\Common\Common3;

trait DealTrait
{
    //
    public function deal($dir, $model, $page){
        return 0;
    }

    public function deal_dir0($model, $page){
        $dir = Array();
        return $this->deal($dir, $model, $page);
    }
    
    public function deal_dir1($dir1, $model, $page){
        $dir = Array($dir1);
        return $this->deal($dir, $model, $page);
    }

    public function deal_dir2($dir1, $dir2, $model, $page){
        $dir = Array($dir1, $dir2);
        return $this->deal($dir, $model, $page);
    }

    public function deal_dir3($dir1, $dir2, $dir3, $model, $page){
        $dir = Array($dir1, $dir2, $dir3);
        return $this->deal($dir, $model, $page);
    }

    public function deal_dir4($dir1, $dir2, $dir3, $dir4, $model, $page){
        $dir = Array($dir1, $dir2, $dir3, $dir4);
        return $this->deal($dir, $model, $page);
    }
    
    public function deal_dir5($dir1, $dir2, $dir3, $dir4, $dir5, $model, $page){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5);
        return $this->deal($dir, $model, $page);
    }

    public function deal_dir6($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $model, $page){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6);
        return $this->deal($dir, $model, $page);
    }

    public function deal_dir7($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $model, $page){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7);
        return $this->deal($dir, $model, $page);
    }

    public function deal_dir8($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $dir8, $model, $page){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $dir8);
        return $this->deal($dir, $model, $page);
    }
}