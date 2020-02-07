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
namespace App\Http\Controllers\Backend\Device\Common\Common;

trait showTrait
{
    //
    public function show($dir, $id){
        return 0;
    }

    public function show_dir0($id){
        $dir = Array();
        return $this->show($dir, $id);
    }
    
    public function show_dir1($dir1, $id){
        $dir = Array($dir1);
        return $this->show($dir, $id);
    }

    public function show_dir2($dir1, $dir2, $id){
        $dir = Array($dir1, $dir2);
        return $this->show($dir, $id);
    }

    public function show_dir3($dir1, $dir2, $dir3, $id){
        $dir = Array($dir1, $dir2, $dir3);
        return $this->show($dir, $id);
    }

    public function show_dir4($dir1, $dir2, $dir3, $dir4, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4);
        return $this->show($dir, $id);
    }
    
    public function show_dir5($dir1, $dir2, $dir3, $dir4, $dir5, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5);
        return $this->show($dir, $id);
    }

    public function show_dir6($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6);
        return $this->show($dir, $id);
    }

    public function show_dir7($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7);
        return $this->show($dir, $id);
    }

    public function show_dir8($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $dir8, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $dir8);
        return $this->show($dir, $id);
    }
}