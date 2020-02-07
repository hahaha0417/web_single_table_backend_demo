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

trait showTrait
{
    //
    public function show($dir, $model, $page, $id){
        return 0;
    }

    public function show_dir0($model, $page, $id){
        $dir = Array();
        return $this->show($dir, $model, $page, $id);
    }
    
    public function show_dir1($dir1, $model, $page, $id){
        $dir = Array($dir1);
        return $this->show($dir, $model, $page, $id);
    }

    public function show_dir2($dir1, $dir2, $model, $page, $id){
        $dir = Array($dir1, $dir2);
        return $this->show($dir, $model, $page, $id);
    }

    public function show_dir3($dir1, $dir2, $dir3, $model, $page, $id){
        $dir = Array($dir1, $dir2, $dir3);
        return $this->show($dir, $model, $page, $id);
    }

    public function show_dir4($dir1, $dir2, $dir3, $dir4, $model, $page, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4);
        return $this->show($dir, $model, $page, $id);
    }
    
    public function show_dir5($dir1, $dir2, $dir3, $dir4, $dir5, $model, $page, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5);
        return $this->show($dir, $model, $page, $id);
    }

    public function show_dir6($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $model, $page, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6);
        return $this->show($dir, $model, $page, $id);
    }

    public function show_dir7($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $model, $page, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7);
        return $this->show($dir, $model, $page, $id);
    }

    public function show_dir8($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $dir8, $model, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $dir8);
        return $this->show($dir, $model, $id);
    }
}