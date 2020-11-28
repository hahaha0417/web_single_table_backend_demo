<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// tool
// http://127.0.0.1:8700/backend/api/hahaha/tool/hahahalib/text_deal/command
Route::group(['middleware' => ['api'], 'prefix' => '', 'namespace' => 'API\Tool'], function() {
    // 依據我tool專案分類定API
    Route::post('/hahaha/tool/hahahalib/text_deal/command', 'TextDealController@command');

});

// generator
Route::group(['middleware' => ['api'], 'prefix' => '', 'namespace' => 'API\Generator\PHP'], function() {
    // 依據我tool專案分類定API
    Route::post('/hahaha/generator/php/command', 'PHPController@command');

});


// --------------------------------------------------
// --------------------------------------------------
// 附加
// --------------------------------------------------
// --------------------------------------------------
// 有需要再補
// --------------------------------------------------
$root_path = base_path();


// --------------------------------------------------
// base
// --------------------------------------------------
// 前端入口寫在front
// Include front routes
// require $root_path.'/routes/api/api.php';

// --------------------------------------------------
// custom
// --------------------------------------------------
// 前端入口寫在front
// Include front routes
// require $root_path.'/routes/api/api_custom.php';

