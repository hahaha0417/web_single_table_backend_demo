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
        
        // 二次打包
        if($command_ == "send" && $method_ == "origin")
        {
            // 快速接口
            // 有空整入hahalib
            $upd_client_ = \hahahalib\hahaha_socket_udp_client::instance();
            $upd_client_->Create();
            $upd_client_->Connect($_POST['ip'], $_POST['port']);

            // --------------------------------- 
            $length_ = strlen($command_);            
            $upd_client_->Send($upd_client_->Socket_, $command_, $length_);
            // --------------------------------- 

            // --------------------------------- 
            $length_ = strlen($method_);            
            $upd_client_->Send($upd_client_->Socket_, $method_, $length_);
            // --------------------------------- 

            // --------------------------------- 
            $length_ = strlen($content_);            
            $upd_client_->Send($upd_client_->Socket_, $content_, $length_);
            // ---------------------------------             
            
            $upd_client_->Close();
            
        }
        
        
        
    }

  
}
