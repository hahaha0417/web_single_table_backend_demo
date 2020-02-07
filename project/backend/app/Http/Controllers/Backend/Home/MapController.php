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
namespace App\Http\Controllers\Backend\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\Http\Models\Backend\User;
use Illuminate\Support\ServiceProvider;
use Config;

class MapController extends CommonController
{
    //
    public function __construct()
    {
        
    }

    // 這裡大部分都是其他目錄的，所以不進行Controller分支，暫時統一這裡切換
    public function node_root()
    {      
        return view('web.backend.home.map.node.root');
    }
    public function node_home()
    {
        return view('web.backend.home.map.node.home');
    }
    public function node_product()
    {
        return view('web.backend.home.map.node.product');
    }
    public function node_device()
    {
        return view('web.backend.home.map.node.device');
    }

    public function global_module()
    {      
        return view('web.backend.home.map.global.module');
    }
    public function global_global()
    {
        return view('web.backend.home.map.global.global');
    }
}
