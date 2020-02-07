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
namespace App\Http\Controllers\Backend\Device\Common\Common2;

trait updateTrait
{
    //
    public function update($dir, $model, $id){
        return 0;
    }

    public function update_dir0($model, $id){
        $dir = Array();
        return $this->update($dir, $model, $id);
    }
    
    public function update_dir1($dir1, $model, $id){
        $dir = Array($dir1);
        return $this->update($dir, $model, $id);
    }

    public function update_dir2($dir1, $dir2, $model, $id){
        $dir = Array($dir1, $dir2);
        return $this->update($dir, $model, $id);
    }

    public function update_dir3($dir1, $dir2, $dir3, $model, $id){
        $dir = Array($dir1, $dir2, $dir3);
        return $this->update($dir, $model, $id);
    }

    public function update_dir4($dir1, $dir2, $dir3, $dir4, $model, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4);
        return $this->update($dir, $model, $id);
    }
    
    public function update_dir5($dir1, $dir2, $dir3, $dir4, $dir5, $model, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5);
        return $this->update($dir, $model, $id);
    }

    public function update_dir6($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $model, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6);
        return $this->update($dir, $model, $id);
    }

    public function update_dir7($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $model, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7);
        return $this->update($dir, $model, $id);
    }

    public function update_dir8($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $dir8, $model, $id){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $dir8);
        return $this->update($dir, $model, $id);
    }
}