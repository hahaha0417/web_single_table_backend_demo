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
// require $root_path.'/routes/web/front.php';
// Include backend routes
require $root_path.'/routes/web/backend.php';


// -------------------------------------------------- 
// custom
// -------------------------------------------------- 
// 前端入口寫在front
// Include front routes
// require $root_path.'/routes/web/front_custom.php';
// Include backend routes
// require $root_path.'/routes/web/backend_custom.php';

