<?php

// --------------------------------------------------------------------------
// Web Front
// --------------------------------------------------------------------------

/*
// 可以這樣寫，但是會多一點消耗(多載入\ha\Route)，且會失去彈性
\ha\Route::Group(
    "/",
    [
        'prefix' => '',
        'middleware' => ['web'],
        'namespace' => '\\hahaha\\controller'
    ],
    function($route){
        // $route就是\hahahalib\hahaha_route::Instance()
        // 這樣也行
        \ha\Route::Get("/")->Controller("index_controller", "Index");	
        \ha\Route::Get("/layout")->Controller("index_controller", "Index_Layout");
        \ha\Route::Get("/test")->Controller("index_controller", "Index_Test");
    }							
);
*/

// --------------------------------------------------------------------------
// 最好這樣寫
$route_ = \hahahalib\hahaha_route::Instance(); 
