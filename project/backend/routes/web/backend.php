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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
|--------------------------------------------------------------------------
// Backend Web
|--------------------------------------------------------------------------
*/
// Route::get('/', function () {
//     return view('welcome');
// });

//------------------------------------------------------------------------------------------------------
// // Main
// // 前端一般都在根目錄
Route::group(['middleware' => ['web','backend.login'],'prefix'=>'backend','namespace'=>'Backend'], function() {
        Route::get('/', 'IndexController@index');
        
        // 頁面
    }
);
    
// //------------------------------------------------------------------------------------------------------
// // Root
// Route::group(['middleware' => ['web','backend.login'],'prefix'=>'backend','namespace'=>'Backend'],function(){
//     //-------------------------------------------------------------------------------------
//     // 如有要規劃，會在第一層展開
//     // Route::get('/free_tool', 'IndexController@free_tool');
//     // Route::get('/vedio', 'IndexController@vedio');
//     // Route::get('/api', 'IndexController@api');
//     // 重要唯一，所以第一層目錄
//     // 由於目前屬於小頁面，統一將小節點建在shortcut
//     Route::get('/shortcut', 'SortcutController@index'); 
//     Route::resource('/contact/aaa', 'Contact\aaaController');
//     //-------------------------------------------------------------------------------------
//     // 由於業務已經整併進Index，Initial有需要再啟用
//     // Route::get('/index/initial/', 'Index\InitialController@index');  
//     // Route::get('/index/initial/{page?}', 'Index\InitialController@index');      
//     // Route::post('/index/initial/', 'Index\InitialController@deal');    
//     //
//     // 基於resource形式，可能無法路徑參數化，因此多個同類資料庫必須採手動建立，不然應該不能走resource方式，而如果用$_GET，方式傳參，
//     // 會使得規劃變的畸形(例如我參數沒使用時全部藏起來，而為了加功能，會出現很多的$_GET，破壞路徑美感)
//     // 如要資料庫用參數自動切換，原則上不打算使用resource Controllder

//     {
//         Route::resource('/index/index', 'Index\IndexController');   
//         // 放後面才看的到      
//         Route::post('/index/index/deal', 'Index\IndexController@deal'); 
//     }
//     {
//         // parameters攜帶資料庫名稱
//         // Route::resource('/index/index_other', 'Index\IndexController');   
//         // // 放後面才看的到      
//         // Route::post('/index/index_other/deal', 'Index\IndexController@deal'); 
//     }    
// });


// // Home子頁 - index下資源
// Route::group(['middleware' => ['web','backend.login'],'prefix'=>'backend','namespace'=>'Backend\Home'],function(){
//     Route::resource('/overview', 'Overview\HomeController');
//     Route::resource('/overview', 'Overview\HomeController');
//     Route::resource('/feature', 'Feature\HomeController');
//     Route::resource('/feature', 'Feature\HomeController');
//     // 未建立頁面
//     // Route::get('/new', 'HomeController@new');
//     // Route::get('/future', 'HomeController@future');
//     // 頁面還是必須手動建路由，避免頁面有版本對應問題
// });

// //------------------------------------------------------------------------------------------------------
Route::group(['middleware' => ['web'],'prefix'=>'backend','namespace'=>'Backend'],function(){
    Route::any('/login', 'IndexController@login');
    Route::get('/logout', 'IndexController@logout');
    
    
});
//------------------------------------------------------------------------------------------------------
// 分類頁
Route::group(['middleware' => ['web','backend.login'],'prefix'=>'backend','namespace'=>'Backend\Home'],function(){
    // class
    Route::get('/class/all', 'ClassController@all');
    Route::get('/class/all/node', 'ClassController@node');
    Route::get('/class/all/global', 'ClassController@global');
    // 頁面還是必須手動建路由，避免頁面有版本對應問題
});

// Route::group(['middleware' => ['web','backend.login'],'prefix'=>'backend','namespace'=>'Backend\Home'],function(){
//     // map
//     // node
//     Route::get('/map/node/root', 'MapController@node_root');
//     Route::get('/map/node/home', 'MapController@node_home');
//     Route::get('/map/node/product', 'MapController@node_product');
//     Route::get('/map/node/device', 'MapController@node_device');
//     // global
//     Route::get('/map/global/module', 'MapController@global_module');
//     Route::get('/map/global/global', 'MapController@global_global');
//     // 頁面還是必須手動建路由，避免頁面有版本對應問題
// });
// //------------------------------------------------------------------------------------------------------
// // Product
// function backend_product_rule($dir, $node, $controller, $method_suffix){
//     // dd('/product/'.$dir.$node.'/deal');
//     Route::get('/product/'.$dir.$node, $controller.'@index_'.$method_suffix);  
//     Route::get('/product/'.$dir.$node.'/add', $controller.'@add_'.$method_suffix);  
//     Route::post('/product/'.$dir.$node.'/store', $controller.'@store_'.$method_suffix);  
//     Route::get('/product/'.$dir.$node.'/show/{id}', $controller.'@show_'.$method_suffix);  
//     Route::get('/product/'.$dir.$node.'/edit/{id}', $controller.'@edit_'.$method_suffix);  
//     Route::post('/product/'.$dir.$node.'/update/{id}', $controller.'@update_'.$method_suffix);  
//     Route::post('/product/'.$dir.$node.'/delete/{id}', $controller.'@delete_'.$method_suffix);  
//     // 放後面才看的到          
//     Route::post('/product/'.$dir.$node.'/deal', $controller.'@deal_'.$method_suffix); 
// }

// Route::group(['middleware' => ['web','backend.login'],'prefix'=>'backend','namespace'=>'Backend\Product'],function(){
//     // root
//     backend_product_rule('', 'list', 'ListController', '');
//     backend_product_rule('', 'dir_product', 'Dir_ProductController', '');
//     // 由於list設定有all這選項，避免混淆，這邊不用路徑處理
//     // product_rule('{class}/', 'list', 'ListController', 'class');
//     // product_rule('{class}/', 'dir_product', 'Dir_ProductController', 'class');
//     // product_rule('{class}/{model}', 'list', 'ListController', 'class_model');
//     // product_rule('{class}/{model}', 'dir_product', 'Dir_ProductController', 'class_model'); 
//     // 頁面還是必須手動建路由，避免頁面有版本對應問題
// });

// Route::group(['middleware' => ['web','backend.login'],'prefix'=>'backend','namespace'=>'Backend\Product\Model'],function(){
//     // model
//     // 由於有吃參數，因此不能用Route::resource
//     // 走自訂rule
//     // product是index overview feature併一 
//     // ----------------------------------------------------
//     // 以下是沒有東西的，必須要有model才有站
//     // ----------------------------------------------------
//     // product_rule('', 'class', 'ClassController', '');
//     // product_rule('', 'model', 'ModelController', '');    
//     // product_rule('', 'product', 'ProductController', '');  
//     // product_rule('', 'content', 'ContentController', '');  
//     // product_rule('{class}/', 'class', 'ClassController', 'class');
//     // product_rule('{class}/', 'model', 'ModelController', 'class');    
//     // product_rule('{class}/', 'product', 'ProductController', 'class');  
//     // product_rule('{class}/', 'content', 'ContentController', 'class'); 
//     // ----------------------------------------------------
//     backend_product_rule('{class}/{model}/', 'class', 'ClassController', 'class_model');
//     backend_product_rule('{class}/{model}/', 'model', 'ModelController', 'class_model');    
//     backend_product_rule('{class}/{model}/', 'product', 'ProductController', 'class_model');   
//     // 內容入口頁面
//     Route::get('product/{class}/{model}/content', 'ContentController@index_enter');
//     // 
//     backend_product_rule('{class}/{model}/', 'content/{page}', 'ContentController', 'class_model');  
//     // 由於content有多種，如有需要，後面冠一個代表字，ex content_ha 
//     // 頁面還是必須手動建路由，避免頁面有版本對應問題
// });
// //------------------------------------------------------------------------------------------------------
// // Device
// function backend_device_rule_0($dir, $node, $controller, $method_suffix){
//     // dd('/device/'.$dir.$node);
//     Route::get('/device/'.$dir.$node, $controller.'@index_'.$method_suffix);  
//     Route::get('/device/'.$dir.$node.'/add', $controller.'@add_'.$method_suffix);  
//     Route::post('/device/'.$dir.$node.'/store', $controller.'@store_'.$method_suffix);  
//     Route::get('/device/'.$dir.$node.'/show/{id}', $controller.'@show_'.$method_suffix);  
//     Route::get('/device/'.$dir.$node.'/edit/{id}', $controller.'@edit_'.$method_suffix);  
//     Route::post('/device/'.$dir.$node.'/update/{id}', $controller.'@update_'.$method_suffix);  
//     Route::post('/device/'.$dir.$node.'/delete/{id}', $controller.'@delete_'.$method_suffix);  
//     // 放後面才看的到          
//     Route::post('/device/'.$dir.$node.'/deal', $controller.'@deal_'.$method_suffix); 
// }

// function backend_device_rule($dir, $node, $controller, $method_suffix){
//     // dd('/device/'.$dir.'model/'.$node.'/deal');
//     Route::get('/device/'.$dir.'model/{model}/'.$node, $controller.'@index_'.$method_suffix);  
//     Route::get('/device/'.$dir.'model/{model}/'.$node.'/add', $controller.'@add_'.$method_suffix);  
//     Route::post('/device/'.$dir.'model/{model}/'.$node.'/store', $controller.'@store_'.$method_suffix);  
//     Route::get('/device/'.$dir.'model/{model}/'.$node.'/show/{id}', $controller.'@show_'.$method_suffix);  
//     Route::get('/device/'.$dir.'model/{model}/'.$node.'/edit/{id}', $controller.'@edit_'.$method_suffix);  
//     Route::post('/device/'.$dir.'model/{model}/'.$node.'/update/{id}', $controller.'@update_'.$method_suffix);  
//     Route::post('/device/'.$dir.'model/{model}/'.$node.'/delete/{id}', $controller.'@delete_'.$method_suffix);  
//     // 放後面才看的到          
//     Route::post('/device/'.$dir.'model/{model}/'.$node.'/deal', $controller.'@deal_'.$method_suffix); 
// }


// Route::group(['middleware' => ['web','backend.login'],'prefix'=>'backend','namespace'=>'Backend\Device'],function(){
//     // root
//     $dir = Array(
//         '', 
//         '{dir1}/',
//         '{dir1}/{dir2}/',
//         '{dir1}/{dir2}/{dir3}/',
//         '{dir1}/{dir2}/{dir3}/{dir4}/',
//         '{dir1}/{dir2}/{dir3}/{dir4}/{dir5}/',
//         '{dir1}/{dir2}/{dir3}/{dir4}/{dir5}/{dir6}/',
//         '{dir1}/{dir2}/{dir3}/{dir4}/{dir5}/{dir6}/{dir7}/',
//         '{dir1}/{dir2}/{dir3}/{dir4}/{dir5}/{dir6}/{dir7}/{dir8}/',
//     );
//     foreach($dir as $key => $value){
//         if($key == 0){
//             backend_device_rule_0($value, 'list', 'ListController', 'dir'.$key);
//             backend_device_rule_0($value, 'dir_device', 'Dir_DeviceController', 'dir'.$key);
//         }
//         else{
//             // 由於list設定有all這選項，避免混淆，這邊不用路徑處理
//             // backend_device_rule($value, 'list', 'ListController', 'dir'.$key);
//             // backend_device_rule($value, 'dir_device', 'Dir_DeviceController', 'dir'.$key);
//         }        
//     }
//     // 頁面還是必須手動建路由，避免頁面有版本對應問題
// });


// Route::group(['middleware' => ['web','backend.login'],'prefix'=>'backend','namespace'=>'Backend\Device\Model'],function(){
//     // model    
//     // 由於有吃參數，因此不能用Route::resource
//     // 走自訂rule
//     $dir = Array(
//         '', 
//         '{dir1}/',
//         '{dir1}/{dir2}/',
//         '{dir1}/{dir2}/{dir3}/',
//         '{dir1}/{dir2}/{dir3}/{dir4}/',
//         '{dir1}/{dir2}/{dir3}/{dir4}/{dir5}/',
//         '{dir1}/{dir2}/{dir3}/{dir4}/{dir5}/{dir6}/',
//         '{dir1}/{dir2}/{dir3}/{dir4}/{dir5}/{dir6}/{dir7}/',
//         '{dir1}/{dir2}/{dir3}/{dir4}/{dir5}/{dir6}/{dir7}/{dir8}/',
//     );
//     foreach($dir as $key => $value){
//         backend_device_rule($value, 'content/{page}', 'ContentController', 'dir'.$key);
//         backend_device_rule($value, 'device', 'DeviceController', 'dir'.$key);
//         backend_device_rule($value, 'dir', 'DirController', 'dir'.$key);
        
//     }
//     // 頁面還是必須手動建路由，避免頁面有版本對應問題
// });
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------