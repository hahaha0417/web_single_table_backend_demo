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
namespace App\Http\Controllers\Backend\Device\Model;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//
use App\Http\Controllers\Backend\Device\Common\Common3\IndexTrait;
use App\Http\Controllers\Backend\Device\Common\Common3\AddTrait;
use App\Http\Controllers\Backend\Device\Common\Common3\StoreTrait;
use App\Http\Controllers\Backend\Device\Common\Common3\ShowTrait;
use App\Http\Controllers\Backend\Device\Common\Common3\EditTrait;
use App\Http\Controllers\Backend\Device\Common\Common3\UpdateTrait;
use App\Http\Controllers\Backend\Device\Common\Common3\DeleteTrait;
use App\Http\Controllers\Backend\Device\Common\Common3\DealTrait;
//


class Common3Controller extends Controller
{        
    // 由於php沒有多重繼承，因此用trait將code做整理
    use IndexTrait;
    use AddTrait;
    use StoreTrait;
    use ShowTrait;
    use EditTrait;
    use UpdateTrait;
    use DeleteTrait;
    use DealTrait;
    //
    public function __construct()
    {
        
    }

    
}

