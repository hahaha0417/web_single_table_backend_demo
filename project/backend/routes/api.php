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

// http://127.0.0.1:8700/backend/api/hahaha/tool/hahahalib/text_deal/command
Route::group(['middleware' => ['api'], 'prefix' => '', 'namespace' => 'API\Tool'], function() {
    // 依據我tool專案分類定API
    Route::post('/hahaha/tool/hahahalib/text_deal/command', 'TextDealController@command');   

});
