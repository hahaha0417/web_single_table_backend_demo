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
namespace App\Http\Controllers\Backend;

use App\Http\Models\Backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

/*
使用laravel session處理login，有需要請自行換別種auth方式
目前知道可用的只有session & token & jwt auth
*/
class IndexController extends CommonController
{
    //
    public function __construct()
    {

    }

    public function index()
    {
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
            // 'Dashboard' => [
            //     'type' => 'item',
            //     // 'url' => '/',
            //     'target' => '_self',
            //     'icon' => "fa-desktop",
            //     'active' => 'false',
            //     'background' => 'rgba(190,155,255,0.5)',
            //     'mini' => 'Board',
            //     'menu' => array(

            //     ),
            // ],
            'ABC' => [
                'type' => 'box',
                // 'url' => '/',
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
                'icon' => "fa-sticky-note",
                'active' => 'false',
                'background' => 'rgba(90,255,150,0.5)',
                'mini' => 'Note',
                // 前端首頁
            ),
            // 'Index' => array(
            //     'type' => 'menu',
            //     'url' => '/backend/index',
            //     'target' => 'index_content_frame',
            //     'icon' => "fa-home",
            //     'active' => 'false',
            //     'background' => 'rgba(90,255,150,0.5)',
            //     'mini' => 'Index',
            //     'menu' => array(
            //         // 'Initial' => [
            //         //     'type' => 'item',
            //         //     'url' => 'backend/index/initial',
            //         //     'target' => 'index_content_frame',
            //         //     //'target' => '_blank',
            //         //     'background' => '',
            //         //     //'icon' => 'fa-angle-double-down',
            //         //     // dir
            //         // ],
            //         'Index' => [
            //             'type' => 'item',
            //             'url' => 'backend/index/index',
            //             'target' => 'index_content_frame',
            //             'background' => '',
            //             //'icon' => 'fa-angle-double-down',
            //             // dir
            //         ],
            //         // 可以插入快捷的索引頁，主要是說明

            //     ),
            // ),
            'Index' => [
                'type' => 'item',
                'url' => 'backend/index/index',
                'target' => 'index_content_frame',
                'background' => '',
                'icon' => "fa-info",
                'active' => 'false',
                'background' => 'rgba(90,255,150,0.5)',
                'mini' => 'Index',
            ],
            'Class' => [
                'type' => 'menu',
                'url' => null,
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
                    // '-- Node' => [
                    //     'type' => 'item',
                    //     'url' => 'backend/class/all/node',
                    //     'target' => 'index_content_frame',
                    //     'background' => '',
                    //     //'icon' => 'fa-angle-double-down',
                    //     // dir
                    // ],
                    // '-- Global' => [
                    //     'type' => 'item',
                    //     'url' => 'backend/class/all/global',
                    //     'target' => 'index_content_frame',
                    //     'background' => '',
                    //     //'icon' => 'fa-angle-double-down',
                    //     // dir
                    // ],
                    // 可以插入快捷的索引頁，主要是說明

                ),
            ],
            'Map' => [
                'type' => 'menu',
                'url' => null,
                'target' => '_self',
                'icon' => 'fa-envelope',
                'active' => 'false',
                'background' => 'rgba(255,255,0,0.5)',
                'mini' => 'Map',
                'menu' => array(
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
                            // 'Root' => [
                            //     'type' => 'item',
                            //     'url' => 'backend/map/node/root',
                            //     'target' => 'index_content_frame',
                            //     'background' => '',
                            //     //'icon' => 'fa-angle-double-down',
                            //     // dir
                            // ],
                            // 'Home' => [
                            //     'type' => 'item',
                            //     'url' => 'backend/map/node/home',
                            //     'target' => 'index_content_frame',
                            //     'background' => '',
                            //     //'icon' => 'fa-angle-double-down',
                            //     // page
                            // ],
                            'Product' => [
                                'type' => 'menu',
                                'url' => 'backend/map/node/product',
                                'target' => 'index_content_frame',
                                'background' => '',
                                //'icon' => 'fa-angle-double-down',
                                // node
                                'menu' => array(
                                    'List' => [
                                        'type' => 'item',
                                        'url' => 'backend/product/list',
                                        'target' => 'index_content_frame',
                                        'background' => '',
                                        //'icon' => 'fa-angle-double-down',
                                        // dir
                                    ],
                                    'Dir_Product' => [
                                        'type' => 'item',
                                        'url' => 'backend/product/dir_product',
                                        'target' => 'index_content_frame',
                                        'background' => '',
                                        //'icon' => 'fa-angle-double-down',
                                        // page
                                    ],
                                    // 'Class' => [
                                    //     'type' => 'item',
                                    //     'url' => 'backend/product/class',
                                    //     'target' => 'index_content_frame',
                                    //     'background' => '',
                                    //     //'icon' => 'fa-angle-double-down',
                                    //     // node
                                    // ],
                                    // 'Model' => [
                                    //     'type' => 'item',
                                    //     'url' => 'backend/product/model',
                                    //     'target' => 'index_content_frame',
                                    //     'background' => '',
                                    //     //'icon' => 'fa-angle-double-down',
                                    //     // node
                                    // ],
                                    // 'Product' => [
                                    //     'type' => 'item',
                                    //     'url' => 'backend/product/product',
                                    //     'target' => 'index_content_frame',
                                    //     'background' => '',
                                    //     //'icon' => 'fa-angle-double-down',
                                    //     // node
                                    // ],
                                ),
                            ],
                            'Device' => [
                                'type' => 'menu',
                                'url' => 'backend/map/node/device',
                                'target' => 'index_content_frame',
                                'background' => '',
                                //'icon' => 'fa-angle-double-down',
                                // node
                                'menu' => array(
                                    'List' => [
                                        'type' => 'item',
                                        'url' => 'backend/device/list',
                                        'target' => 'index_content_frame',
                                        'background' => '',
                                        //'icon' => 'fa-angle-double-down',
                                        // dir
                                    ],
                                    'dir_device' => [
                                        'type' => 'item',
                                        'url' => 'backend/device/dir_device',
                                        'target' => 'index_content_frame',
                                        'background' => '',
                                        //'icon' => 'fa-angle-double-down',
                                        // page
                                    ],
                                    // 'dir' => [
                                    //     'type' => 'item',
                                    //     'url' => 'backend/device/model/dir',
                                    //     'target' => 'index_content_frame',
                                    //     'background' => '',
                                    //     //'icon' => 'fa-angle-double-down',
                                    //     // node
                                    // ],
                                    // 'device' => [
                                    //     'type' => 'item',
                                    //     'url' => 'backend/device/model/device',
                                    //     'target' => 'index_content_frame',
                                    //     'background' => '',
                                    //     //'icon' => 'fa-angle-double-down',
                                    //     // node
                                    // ],
                                    // 'content' => [
                                    //     'type' => 'item',
                                    //     'url' => 'backend/device/model/content',
                                    //     'target' => 'index_content_frame',
                                    //     'background' => '',
                                    //     //'icon' => 'fa-angle-double-down',
                                    //     // node
                                    // ],
                                ),
                            ],
                        ),
                    ],
                    // 'Global' => [
                    //     'type' => 'menu',
                    //     'url' => '/',
                    //     'target' => '_self',
                    //     //'icon' => "fa-angle-double-down",
                    //     'menu' => array(
                    //         // other
                    //         'Module' => [
                    //             'type' => 'item',
                    //             'url' => '/map/global/module',
                    //             'target' => 'index_content_frame',
                    //             'background' => '',
                    //             //'icon' => 'fa-angle-double-down',
                    //             // dir
                    //             // 'menu' => array(
                    //             //     'Root' => [
                    //             //         'type' => 'item',
                    //             //         'url' => '#',
                    //             //         'target' => 'frame',
                    //             //         //'icon' => 'fa-angle-double-down',
                    //             //         // dir
                    //             //     ],
                    //             //     'Home' => [
                    //             //         'type' => 'item',
                    //             //         'url' => '#',
                    //             //         'target' => 'frame',
                    //             //         //'icon' => 'fa-angle-double-down',
                    //             //         // page
                    //             //     ],
                    //             //     'Product' => [
                    //             //         'type' => 'item',
                    //             //         'url' => '#',
                    //             //         'target' => 'frame',
                    //             //         //'icon' => "fa-angle-double-down",
                    //             //         // node
                    //             //     ],
                    //             //     'Device' => [
                    //             //         'type' => 'item',
                    //             //         'url' => '#',
                    //             //         'target' => 'frame',
                    //             //         //'icon' => 'fa-angle-double-down',
                    //             //         // node
                    //             //     ],
                    //             // ),
                    //         ],
                    //         'Global' => [
                    //             'type' => 'item',
                    //             'url' => '/map/global/global',
                    //             'target' => 'index_content_frame',
                    //             'background' => '',
                    //             //'icon' => 'fa-angle-double-down',
                    //             // page
                    //         ],
                    //     ),
                    // ],
                ),
            ],
            // 'Other' => array(
            //     'type' => 'label',
            //     // 'url' => '/',
            //     // 'target' => 'self',
            //     'background' => "rgba(255,0,190,0.5)",
            //     'active' => 'false',
            //     // 'icon' => "fa-angle-double-down",
            //     // 前端首頁
            // ),
            'Blog' => array(
                'type' => 'item',
                'url' => 'http://hahaha-cplusplus.blogspot.com/2016/08/hahaha-c.html',
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
        return view('web.backend.index', compact('nav', 'menu', 'tail'));

    }
    public function login()
    {
        $input_ = request()->all();
        $recaptcha_response_ = request()->get('recaptcha_response');
        if (request()->isMethod('post') && isset($recaptcha_response_) )
        {
            $verify_ = true;
            // Build POST request:
            $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptcha_secret = env('GOOGLE_RECAPTCHA_SECRET_KEY');
            $recaptcha_response = $recaptcha_response_;
        
            // Make and decode POST request:
            $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
            $recaptcha = json_decode($recaptcha);
     // exit;
            // Take action based on the score returned:
            if ($recaptcha->score >= 0.5) {
                // 成功
             //   $user = User::where('name', $input_['user_name'])->find(1);
                // $user->password = Crypt::encrypt("111");
                // $user->password = Crypt::encrypt("123456");
                // $user->save();

                //echo Crypt::decrypt($user->password);
                // return ;
              //  if ($user == null || $input_['user_name'] != $user->name || $input_['user_pass'] != Crypt::decrypt($user->password)) {
              //      return back()->with('msg','用戶名或密碼錯誤!');
              //  }

               // session(['backend_user' => $user->name]);
               session(['backend_user' => 'hahaha']);

                return redirect('backend');
            } 
            else
            {
                // 驗證失敗
                return back()->with('msg', '驗證失敗!');
            }
        } 
        else 
        {
            $value = session('backend_user');
            //session()->forget('backend_user');

            //session()->flush();
            if (!session()->has('backend_user')) 
            {
                return view('web.backend.login');
            } 
            else 
            {
                return redirect('backend');
            }

        }
    }
    public function logout()
    {
        session()->forget('backend_user');
        session()->flush();
        return view('web.backend.logout');

    }

    public function note()
    {
        return view('web.backend.note');

    }

}
