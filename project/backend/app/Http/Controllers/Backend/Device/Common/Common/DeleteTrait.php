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

trait deleteTrait
{
    //
    public function delete($dir, $id){
        return 0;
    }

    public function delete_dir0($id){
        $dir = Array();
        return $this->delete($dir, $id);
    }
    
    public function delete_dir1($dir1, $id){
        $dir = Array($dir1);
        return $this->delete($dir, $id);
    }

    public function delete_dir2($dir1, $dir2, $id){
        $dir = Array($dir1, $dir2);
        return $this->delete($dir, $id);
    }

    public function delete_dir3($dir1, $dir2, $dir3, $id){
        $dir = Array($dir1, $dir2, $dir3);
        return $this->delete($dir, $id);
    }

    public function delete_dir4($dir1, $dir2, $dir3, $dir4, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4);
        return $this->delete($dir, $id);
    }
    
    public function delete_dir5($dir1, $dir2, $dir3, $dir4, $dir5, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5);
        return $this->delete($dir, $id);
    }

    public function delete_dir6($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6);
        return $this->delete($dir, $id);
    }

    public function delete_dir7($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7);
        return $this->delete($dir, $id);
    }

    public function delete_dir8($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $dir8, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $dir8, $id);
        return $this->delete($dir, $id);
    }
}