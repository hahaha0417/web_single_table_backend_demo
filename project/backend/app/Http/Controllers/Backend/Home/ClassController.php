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


class ClassController extends CommonController
{
    //
    public function __construct()
    {
        
    }

    public function all()
    {      
        return view('web.backend.home.class.all');
    }
    public function node()
    {
        return view('web.backend.home.class.node');
    }
    public function global()
    {
        return view('web.backend.home.class.global');
    }
}
