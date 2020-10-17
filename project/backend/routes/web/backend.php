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
// 主要頁面
Route::group(['middleware' => ['web', 'backend.login'], 'prefix' => 'backend', 'namespace' => 'Backend'], function() {
    Route::get('/', 'IndexController@index');
    Route::get('/cover', 'IndexController@cover');
    Route::get('/note', 'IndexController@note');
    // 預設頁面路徑
    // http://127.0.0.1:8704/backend/page/backend_accounts_list，靜態頁面
    // edit
    // Route::get('/page/{name}/edit/{}', 'IndexController@page');   
    // index
    Route::get('/page/{name}', 'IndexController@page');   

});

// page
Route::group(['middleware' => ['web', 'backend.login'], 'prefix' => 'backend', 'namespace' => 'Backend'], function() {
    // table
    // http://127.0.0.1:8700/backend/page/table/backend_accounts_list
    // tool
    // http://127.0.0.1:8700/backend/page/tool/table_field
    Route::get('page/{class}/{name}', 'IndexController@page');   

});

// Tool
Route::group(['middleware' => ['web', 'backend.login'], 'prefix' => 'backend/tool', 'namespace' => 'Backend\Tool'], function() {
    // tool
    Route::get('/table_field', 'ToolController@table_field');
});
//------------------------------------------------------------------------------------------------------
// 資料表
$stages_ = [
    //'front',
    'backend'
];

foreach($stages_ as $key => &$stage)
{
    $setting_table_ = "\\hahaha\\$stage\\hahaha_setting_table";
    $settings_ = $setting_table_::Instance();		
    $routes_ = &$settings_->Routes[$settings_->Settings['default']['route']];
    $controllers_ = &$settings_->Controllers[$settings_->Settings['default']['controller']];
    $tables_ = &$settings_->Tables[$settings_->Settings['default']['table']];
    
    if(!empty($routes_['group'])) 
    {
        // 有設定，格式相同，所以使用group
        Route::group($routes_['group'], function() use($tables_, $controllers_) {
            // http://127.0.0.1:8704/backend/table/backend/accounts/list，內部頁面
            // ---------------------------------------------------------- 
            // 每個table為一個站，目前格式一樣/{stage}/{class}/{item}/(這樣是一個node)
            // 註冊動態路由
            // stage - 站 class - 資料表分類 item - 資料表名
            // node /{stage}/{class}/{item}
            //Route::get('/{stage}/{class}/{item}', 'IndexController@index');
            // 如果有不同格式的router，寫額外的router進行跳轉，一般情況下，資料庫table命名不會有很特殊的命名(例如accounts有多種，變成xxx_accounts)，導致要改路由
            foreach($controllers_ as $key_controller => $controller)
            {
                if($controller['method'] == 'get')
                {
                    Route::get("/{stage}/{class}/{item}{$controller['node']}", "{$controller['controller']}@{$controller['action']}");
                }
                else if($controller['method'] == 'post')
                {
                    Route::post("/{stage}/{class}/{item}{$controller['node']}", "{$controller['controller']}@{$controller['action']}");
                }
                else if($controller['method'] == 'put')
                {
                    Route::put("/{stage}/{class}/{item}{$controller['node']}", "{$controller['controller']}@{$controller['action']}");
                }
                else if($controller['method'] == 'delete')
                {
                    Route::delete("/{stage}/{class}/{item}{$controller['node']}", "{$controller['controller']}@{$controller['action']}");
                }
            }
     
        });
    }
    
    // 切掉關聯，避免迴圈時塞到null(可能assign null導致多一個null key)，這樣不會將原始data刪除    
    unset($routes_);
    unset($controllers_);
    unset($tables_);
    // dd($settings_->routes[$settings_->settings['default']['route']]);
}

//------------------------------------------------------------------------------------------------------
Route::group(['middleware' => ['web'], 'prefix'=>'backend', 'namespace'=>'Backend'],function(){
    Route::any('/login', 'IndexController@login');
    Route::get('/logout', 'IndexController@logout');
});
//------------------------------------------------------------------------------------------------------
