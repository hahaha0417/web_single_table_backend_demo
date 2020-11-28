<?php

$root_ = realpath(dirname(__FILE__) . "/../../../../");

require $root_ . "/vendor/autoload.php";


// -----------------------------------------------------



use hahahalib\script\hahaha_file_deal as script;
use hahahalib\script\hahaha_file_deal_define_key as key_;
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
				key_::DIR => $dst_ . "/" . "plugin",
			],
		],
		// --------------------------------------------
		// 新增plugin
		// --------------------------------------------
		"item2" => [
			op::MKDIR => [
				key_::DIR => $dst_ . "/" . "plugin",
				key_::MODE => 0775,
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
				key_::SRC => $src_ . "/" . "jquery",
				key_::DST => $dst_ . "/plugin/" . "jquery",
			],
		],
		"bootstrap" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "bootstrap",
				key_::DST => $dst_ . "/plugin/" . "bootstrap",
			],
		],
		"@fortawesome/fontawesome-free" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "@fortawesome/fontawesome-free",
				key_::DST => $dst_ . "/plugin/" . "fontawesome-free",
			],
		],
		// ----------------------------------
		// jquery plugin
		// ----------------------------------
		"mkdir jquery_plugin" => [
			op::MKDIR => [
				key_::DIR => $dst_ . "/plugin/" . "jquery_plugin",
				key_::MODE => 0775,
			],
		],
		"jquery-ui-dist" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "jquery-ui-dist",
				key_::DST => $dst_ . "/plugin/" . "jquery_plugin/jquery-ui-dist",
			],
		],
		"jquery-ui-themes" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "jquery-ui-themes",
				key_::DST => $dst_ . "/plugin/" . "jquery_plugin/jquery-ui-themes",
			],
		],
		"jquery-slimscroll" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "jquery-slimscroll",
				key_::DST => $dst_ . "/plugin/" . "jquery_plugin/jquery-slimscroll",
			],
        ],
        "jquery-popover" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "jquery-popover",
				key_::DST => $dst_ . "/plugin/" . "jquery_plugin/jquery-popover",
			],
        ],
        "jquery-tooltip" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "jquery-tooltip",
				key_::DST => $dst_ . "/plugin/" . "jquery_plugin/jquery-tooltip",
			],
		],
		"jquery-autocomplete" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "jquery-autocomplete",
				key_::DST => $dst_ . "/plugin/" . "jquery_plugin/jquery-autocomplete",
			],
		],
		"jquery-file-upload" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "jquery-file-upload",
				key_::DST => $dst_ . "/plugin/" . "jquery_plugin/jquery-file-upload",
			],
		],
		// ----------------------------------
		// ckeditor
		// ----------------------------------
		"mkdir ckeditor" => [
			op::MKDIR => [
				key_::DIR => $dst_ . "/plugin/" . "ckeditor",
				key_::MODE => 0775,
			],
		],
		"ckeditor4" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "ckeditor4",
				key_::DST => $dst_ . "/plugin/" . "ckeditor/ckeditor4",
			],
		],
		"ckeditor5" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "ckeditor5",
				key_::DST => $dst_ . "/plugin/" . "ckeditor/ckeditor5",
			],
		],
		// ----------------------------------
		//
		// ----------------------------------
		"async" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "async",
				key_::DST => $dst_ . "/plugin/" . "async",
			],
		],
		"form" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "form",
				key_::DST => $dst_ . "/plugin/" . "form",
			],
		],
		"labelauty" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "labelauty",
				key_::DST => $dst_ . "/plugin/" . "labelauty",
			],
		],
		"npm-modernizr" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "npm-modernizr",
				key_::DST => $dst_ . "/plugin/" . "npm-modernizr",
			],
		],
		"layerui" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "layerui",
				key_::DST => $dst_ . "/plugin/" . "layerui",
			],
		],
		"lazyload" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "lazyload",
				key_::DST => $dst_ . "/plugin/" . "lazyload",
			],
		],
		"owl.carousel" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "owl.carousel",
				key_::DST => $dst_ . "/plugin/" . "owl.carousel",
			],
		],
		"slider-pro" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "slider-pro",
				key_::DST => $dst_ . "/plugin/" . "slider-pro",
			],
		],
		"slim-scroll" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "slim-scroll",
				key_::DST => $dst_ . "/plugin/" . "slim-scroll",
			],
		],
		"validator" => [
			op::MOVE => [
				key_::SRC => $src_ . "/" . "validator",
				key_::DST => $dst_ . "/plugin/" . "validator",
			],
		],
		// --------------------------------------------
		// 刪除node_modules
		// --------------------------------------------
		"item4" => [
			op::DELETE_TREE => [
			 	key_::DIR => $src_ ,
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
