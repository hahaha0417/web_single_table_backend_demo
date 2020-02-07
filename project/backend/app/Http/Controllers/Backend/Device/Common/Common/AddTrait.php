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

trait AddTrait
{
    //
    public function add($dir){
        return 0;
    }

    public function add_dir0(){
        $dir = Array();
        return $this->add($dir);
    }
    
    public function add_dir1($dir1){
        $dir = Array($dir1);
        return $this->add($dir);
    }

    public function add_dir2($dir1, $dir2){
        $dir = Array($dir1, $dir2);
        return $this->add($dir);
    }

    public function add_dir3($dir1, $dir2, $dir3){
        $dir = Array($dir1, $dir2, $dir3);
        return $this->add($dir);
    }

    public function add_dir4($dir1, $dir2, $dir3, $dir4){
        $dir = Array($dir1, $dir2, $dir3, $dir4);
        return $this->add($dir);
    }
    
    public function add_dir5($dir1, $dir2, $dir3, $dir4, $dir5){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5);
        return $this->add($dir);
    }

    public function add_dir6($dir1, $dir2, $dir3, $dir4, $dir5, $dir6){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6);
        return $this->add($dir);
    }

    public function add_dir7($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7);
        return $this->add($dir);
    }

    public function add_dir8($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $dir8){
        $dir = Array($dir1, $dir2, $dir3, $dir4, $dir5, $dir6, $dir7, $dir8);
        return $this->add($dir);
    }
}