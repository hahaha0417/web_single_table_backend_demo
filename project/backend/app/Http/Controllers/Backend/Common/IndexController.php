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
namespace App\Http\Controllers\Backend\Common;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\Http\Models\Backend\User;
use Illuminate\Support\ServiceProvider;
use Config;


class IndexController extends CommonController
{
    //
    public function __construct()
    {
        
    }

    public function index()
    {        
        // 樣式，如要建立通用index節點請參考這個
        // 如怕打結請另立資料夾建立router

        // http://php.net/manual/en/language.types.object.php

        // 目前先用變數存，有空再用資料庫
        // 導航條
        $nav = array(  

        );
        // 選單
        // type 項目
        // -- label 標籤
        // -- item 項目
        // -- menu 清單
        // link 項目
        // -- web 直接連結
        // -- self 站內
        $menu = array(  
            'Main' => array( 
                'type' => 'label',
                // 'url' => '#',
                // 'target' => '_self',
                'background' => 'rgba(190,155,90,0.5)',
                'active' => 'true',
                
                // 'icon' => "fa-angle-double-down",
                // 前端首頁
            ),
            'Home' => array( 
                'type' => 'item',
                'url' => '/',
                'target' => '_self',
                'icon' => "fa-home",
                'active' => 'false',
                'background' => 'rgba(90,255,150,0.5)',
                'mini' => 'Home',
                // 前端首頁
            ),
            'Dashboard' => [
                'type' => 'item',
                'url' => '/',
                'target' => '_self',
                'icon' => "fa-desktop",
                'active' => 'false',
                'background' => 'rgba(190,155,255,0.5)',
                'mini' => 'Board',
                'menu' => array(   

                ),
            ],
            'ABC' => [
                'type' => 'box',
                'url' => '/',
                'target' => '_self',
                'icon' => "fa-list",
                'active' => 'false',
                'background' => 'rgba(2550,155,190,0.5)',
                'mini' => 'ABC',
                // 'icon' => "fa-angle-double-down",
                // 'icon' => "fa-angle-double-down",
                // 'icon' => "fa-angle-double-down",
                // 'icon' => "fa-angle-double-down",
                // 'icon' => "fa-angle-double-down",
                // 'icon' => "fa-angle-double-down",
                // 'menu' => array(   
                   
                // ),
                // 'menu2' => array(   
                   
                // ),
            ],
            // 其他設定頁面
            // 'Dashboard' => [
            //     'icon' => 'fa-angle-double-down',
            //     'menu' => array(   

            //     ),
            // ],
            //--------------------------------------------------------------
            // 這裡索引顯示在iframe，完整項目內容，點擊iframe項目即開新blank

            // 有很多註解再規劃到 /note 資料夾，目前是單頁
            'Note' => array( 
                'type' => 'item',
                'url' => '/backend/note',
                'target' => 'index_content_frame',
                'icon' => "fa-home",
                'active' => 'false',
                'background' => 'rgba(90,255,150,0.5)',
                'mini' => 'Home',
                // 前端首頁
            ),
            'Class' => [
                'type' => 'menu',
                'url' => '/',
                'target' => '_self',
                'icon' => 'fa-tags',
                'active' => 'false',
                'background' => 'rgba(150,255,255,0.5)',
                'mini' => 'Class',
                'menu' => array(   
                    'All' => [
                        'type' => 'item',
                        'url' => 'backend/class/all',
                        'target' => 'index_content_frame',
                        'background' => '',
                        //'icon' => 'fa-angle-double-down',
                        // dir
                    ],
                    '-- Node' => [
                        'type' => 'item',
                        'url' => 'backend/class/all/node',
                        'target' => 'index_content_frame',
                        'background' => '',
                        //'icon' => 'fa-angle-double-down',
                        // dir
                    ],
                    '-- Global' => [
                        'type' => 'item',
                        'url' => 'backend/class/all/global',
                        'target' => 'index_content_frame',
                        'background' => '',
                        //'icon' => 'fa-angle-double-down',
                        // dir
                    ],
                    // 可以插入快捷的索引頁，主要是說明

                ),
            ],
            'Map' => [
                'type' => 'menu',
                'url' => '/',
                'target' => '_self',
                'icon' => 'fa-envelope',
                'active' => 'false',
                'background' => 'rgba(255,255,0,0.5)',
                'mini' => 'Map',
                'menu' =>  array(  
                    // 一層清單
                    // Recent
                    // Short_Cut   
                    // New            
                    'Node' => [
                        'type' => 'menu',
                        'url' => '/',
                        'target' => '_self',
                        //'icon' => 'fa-angle-double-down',
                        'menu' => array(   
                            'Root' => [
                                'type' => 'item',
                                'url' => 'backend/map/node/root',
                                'target' => 'index_content_frame',
                                'background' => '',
                                //'icon' => 'fa-angle-double-down',
                                // dir
                            ],
                            'Home' => [
                                'type' => 'item',
                                'url' => 'backend/map/node/home',
                                'target' => 'index_content_frame',
                                'background' => '',
                                //'icon' => 'fa-angle-double-down',
                                // page
                            ],
                            'Product' => [
                                'type' => 'item',
                                'url' => 'backend/map/node/product',
                                'target' => 'index_content_frame',
                                'background' => '',
                                //'icon' => 'fa-angle-double-down',
                                // node
                            ],
                            'Device' => [
                                'type' => 'item',
                                'url' => 'backend/map/node/device',
                                'target' => 'index_content_frame',
                                'background' => '',
                                //'icon' => 'fa-angle-double-down',
                                // node
                            ],
                        ),
                    ],
                    'Global' => [
                        'type' => 'menu',
                        'url' => '/',
                        'target' => '_self',
                        //'icon' => "fa-angle-double-down",
                        'menu' => array(   
                            // other
                            'Module' => [
                                'type' => 'item',
                                'url' => '/map/global/module',
                                'target' => 'index_content_frame',
                                'background' => '',
                                //'icon' => 'fa-angle-double-down',
                                // dir
                                // 'menu' => array(   
                                //     'Root' => [
                                //         'type' => 'item',
                                //         'url' => '#',
                                //         'target' => 'frame',
                                //         //'icon' => 'fa-angle-double-down',
                                //         // dir
                                //     ],
                                //     'Home' => [
                                //         'type' => 'item',
                                //         'url' => '#',
                                //         'target' => 'frame',
                                //         //'icon' => 'fa-angle-double-down',
                                //         // page
                                //     ],
                                //     'Product' => [
                                //         'type' => 'item',
                                //         'url' => '#',
                                //         'target' => 'frame',
                                //         //'icon' => "fa-angle-double-down",
                                //         // node
                                //     ],
                                //     'Device' => [
                                //         'type' => 'item',
                                //         'url' => '#',
                                //         'target' => 'frame',
                                //         //'icon' => 'fa-angle-double-down',
                                //         // node
                                //     ],
                                // ),
                            ],
                            'Global' => [
                                'type' => 'item',
                                'url' => '/map/global/global',
                                'target' => 'index_content_frame',
                                'background' => '',
                                //'icon' => 'fa-angle-double-down',
                                // page
                            ],
                        ),
                    ],                    
                ),                
            ],       
            'Other' => array( 
                'type' => 'label',
                // 'url' => '/',
                // 'target' => 'self',
                'background' => "rgba(255,0,190,0.5)",
                'active' => 'false',
                // 'icon' => "fa-angle-double-down",
                // 前端首頁
            ),   
            'Blog' => array( 
                'type' => 'item',
                'url' => '/',
                'target' => 'self',
                'icon' => "fa-adjust",
                'active' => 'false',
                'background' => "rgba(40,255,190,0.5)",
                'mini' => 'Blog',
                // 前端首頁
            ),  
        );
        // 尾端
        $tail = array(  

        );
        //

        //
        return view('web.backend.common.home.index', compact('nav', 'menu', 'tail'));
        
    }
}
