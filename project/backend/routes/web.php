<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

$root_path = base_path(); 

// 入口
// Route::group(['middleware' => ['web'],'prefix'=>'','namespace'=>''],function(){
//     Route::get('/', 'IndexController@index');
// });

// 前端入口寫在front
// Include front routes
// require $root_path.'/routes/web/front.php';
// Include backend routes
require $root_path.'/routes/web/backend.php';