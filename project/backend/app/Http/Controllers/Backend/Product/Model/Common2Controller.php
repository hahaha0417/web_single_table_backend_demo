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
use App\Http\Controllers\Backend\Product\Common\Common2\IndexTrait;
use App\Http\Controllers\Backend\Product\Common\Common2\AddTrait;
use App\Http\Controllers\Backend\Product\Common\Common2\StoreTrait;
use App\Http\Controllers\Backend\Product\Common\Common2\ShowTrait;
use App\Http\Controllers\Backend\Product\Common\Common2\EditTrait;
use App\Http\Controllers\Backend\Product\Common\Common2\UpdateTrait;
use App\Http\Controllers\Backend\Product\Common\Common2\DeleteTrait;
use App\Http\Controllers\Backend\Product\Common\Common2\DealTrait;
//


class Common2Controller extends Controller
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


