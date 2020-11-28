<?php

namespace App\Http\Controllers\API\Tool;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TextDealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function command()
    {
        $command_ = &$_POST['command'];
        $method_ = &$_POST['method'];
        $content_ = &$_POST['content'];

        $ip_ = &$_POST["ip"];
        $port_ = &$_POST["port"];


        $text_deal_main_ = \s_ulib\tool\text_deal\hahaha_script_main::Instance()->Initial_Setting($ip_, $port_);

        // 二次打包，收集在composite
        if($command_ == "send")
        {
            if($method_ == "origin")
            {
                $text_deal_main_->Send_Origin($content_);
            }
        }



    }


}
