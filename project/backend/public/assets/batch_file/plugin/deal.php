<?php

$root_ = realpath(dirname(__FILE__) . "/../../../../");

require $root_ . "/vendor/autoload.php";


// ----------------------------------------------------- 


 
use hahahalib\script\hahaha_file_deal as script;
use hahahalib\script\hahaha_file_deal_define_key as key;
use hahahalib\script\hahaha_file_deal_define_operator as op;

$src_ = realpath(dirname(__FILE__) . "/node_modules");
$dst_ = realpath($root_ . "/public/assets/plugin");

// echo $src_."\n".$dst_;
// return;

// -------------------------------------------- 
// 請參照hahaha_script_file_deal.php的正確寫法 
// -------------------------------------------- 

// -------------------------------------------- 
$list_ = [
	// -------------------------------------------- 
	"group1" => [
		// -------------------------------------------- 
		
		// -------------------------------------------- 
		// 刪除plugin
		// -------------------------------------------- 
		"item1" => [			
			op::DELETE_TREE => [
				key::DIR => $dst_ . "/" . "plugin",
			],
		],
		// -------------------------------------------- 
		// 新增plugin
		// -------------------------------------------- 
		"item2" => [			
			op::MKDIR => [
				key::DIR => $dst_ . "/" . "plugin",
				key::MODE => 0775,
			],
		],
		// -------------------------------------------- 
		// 處理插件位置
		// -------------------------------------------- 
		
		// ---------------------------------- 
		// base
		// ---------------------------------- 
		"jquery" => [			
			op::MOVE => [
				key::SRC => $src_ . "/" . "jquery",
				key::DST => $dst_ . "/plugin/" . "jquery",
			],
		],
		"bootstrap" => [			
			op::MOVE => [
				key::SRC => $src_ . "/" . "bootstrap",
				key::DST => $dst_ . "/plugin/" . "bootstrap",
			],
		],
		// ---------------------------------- 
		// jquery plugin
		// ---------------------------------- 
		"mkdir jquery_plugin" => [			
			op::MKDIR => [
				key::DIR => $dst_ . "/plugin/" . "jquery_plugin",
				key::MODE => 0775,
			],
		],
		"jquery-autocomplete" => [			
			op::MOVE => [
				key::SRC => $src_ . "/" . "jquery-autocomplete",
				key::DST => $dst_ . "/plugin/" . "jquery_plugin/jquery-autocomplete",
			],
		],
		"jquery-file-upload" => [			
			op::MOVE => [
				key::SRC => $src_ . "/" . "jquery-file-upload",
				key::DST => $dst_ . "/plugin/" . "jquery_plugin/jquery-file-upload",
			],
		],
		// ---------------------------------- 
		// ckeditor
		// ---------------------------------- 		
		"mkdir ckeditor" => [			
			op::MKDIR => [
				key::DIR => $dst_ . "/plugin/" . "ckeditor",
				key::MODE => 0775,
			],
		],
		"ckeditor4" => [			
			op::MOVE => [
				key::SRC => $src_ . "/" . "ckeditor4",
				key::DST => $dst_ . "/plugin/" . "ckeditor/ckeditor4",
			],
		],
		"ckeditor5" => [			
			op::MOVE => [
				key::SRC => $src_ . "/" . "ckeditor5",
				key::DST => $dst_ . "/plugin/" . "ckeditor/ckeditor5",
			],
		],
		// ---------------------------------- 
		// 
		// ---------------------------------- 
		"async" => [			
			op::MOVE => [
				key::SRC => $src_ . "/" . "async",
				key::DST => $dst_ . "/plugin/" . "async",
			],
		],
		"form" => [			
			op::MOVE => [
				key::SRC => $src_ . "/" . "form",
				key::DST => $dst_ . "/plugin/" . "form",
			],
		],
		"labelauty" => [			
			op::MOVE => [
				key::SRC => $src_ . "/" . "labelauty",
				key::DST => $dst_ . "/plugin/" . "labelauty",
			],
		],
		"layer" => [			
			op::MOVE => [
				key::SRC => $src_ . "/" . "layer",
				key::DST => $dst_ . "/plugin/" . "layer",
			],
		],
		"lazyload" => [			
			op::MOVE => [
				key::SRC => $src_ . "/" . "lazyload",
				key::DST => $dst_ . "/plugin/" . "lazyload",
			],
		],
		"owl.carousel" => [			
			op::MOVE => [
				key::SRC => $src_ . "/" . "owl.carousel",
				key::DST => $dst_ . "/plugin/" . "owl.carousel",
			],
		],
		"slider-pro" => [			
			op::MOVE => [
				key::SRC => $src_ . "/" . "slider-pro",
				key::DST => $dst_ . "/plugin/" . "slider-pro",
			],
		],
		"slim-scroll" => [			
			op::MOVE => [
				key::SRC => $src_ . "/" . "slim-scroll",
				key::DST => $dst_ . "/plugin/" . "slim-scroll",
			],
		],
		"validator" => [			
			op::MOVE => [
				key::SRC => $src_ . "/" . "validator",
				key::DST => $dst_ . "/plugin/" . "validator",
			],
		],
		// -------------------------------------------- 
		// 刪除node_modules
		// -------------------------------------------- 
		"item4" => [			
			op::DELETE_TREE => [
			 	key::DIR => $src_ ,
			],			
		],
		// -------------------------------------------- 
		// 
		// -------------------------------------------- 
		
		// -------------------------------------------- 
	],
	// -------------------------------------------- 
];

$script_ = script::Instance();
$script_->Script($list_);

// ------------------------------------------------------------------------ 
