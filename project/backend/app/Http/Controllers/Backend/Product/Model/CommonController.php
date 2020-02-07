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
namespace App\Http\Controllers\Backend\Product\Model;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//
use App\Http\Controllers\Backend\Product\Common\Common\IndexTrait;
use App\Http\Controllers\Backend\Product\Common\Common\AddTrait;
use App\Http\Controllers\Backend\Product\Common\Common\StoreTrait;
use App\Http\Controllers\Backend\Product\Common\Common\ShowTrait;
use App\Http\Controllers\Backend\Product\Common\Common\EditTrait;
use App\Http\Controllers\Backend\Product\Common\Common\UpdateTrait;
use App\Http\Controllers\Backend\Product\Common\Common\DeleteTrait;
use App\Http\Controllers\Backend\Product\Common\Common\DealTrait;
//


class CommonController extends Controller
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


