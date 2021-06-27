<?php

use hahahalib\script\hahaha_html_deal_define_action as action;
use hahahalib\script\hahaha_html_deal_define_attribute as attr;
use hahahalib\script\hahaha_html_deal_define_operator as op;

use PHPHtmlParser\Dom;

require __DIR__.'/../vendor/autoload.php';

$deal_ = \hahahalib\script\hahaha_file_deal::Instance()->Initial();

// var_dump($deal_);
$str_ = <<<EOT
<div id = "111" class="c1 vvv ccc" style="c1:111;c2:111;c3:111;">
	<div class="c2">
		<div class="c4">

		</div>
	</div>
	<div class="c3">

	</div>
</div>

<div class="c1">
	<div class="c2">
		<div class="c4">

		</div>
	</div>
	<div class="c3">

	</div>
</div>
EOT;




$list_ = [
	// -------------------------------------------- 
	"group1" => [
		// -------------------------------------------- 
		"item1" => [
			op::LOAD_STR => $str_,
			op::FIND => "div",
			op::ITEMS => [0],
			op::DEAL_ATTR => [
				attr::CLASS_ => [
					action::INSERT_2 => [
						"z1" ,
						"z2",
					],
					/*
					action::INSERT_AFTER => "",
					action::TEXT => "",
					action::REPLACE => [
						"aaa" => "",
						"bbb" => "",
					],
					*/
				],
			],			
		],
		"item2" => [
			// op::LOAD_STR => $str_,
			// op::FIND => "div",
			op::ITEMS => [0],
			op::DEAL_ATTR => [
				attr::CLASS_ => [
					action::DELETE => [
						"c1",
						"z1",
					],
					/*
					action::INSERT_AFTER => "",
					action::TEXT => "",
					action::REPLACE => [
						"aaa" => "",
						"bbb" => "",
					],
					*/
				],
			],			
		],
	],
];

$deal_->Script($list_);

$finds_ = $deal_->Finds_; 


var_dump($deal_->Dom_->outerHtml);
unset($deal_->Dom_);
unset($deal_->Finds_);
// paquettg/php-html-parser 似乎有奇怪的Bug，可能解除連線或清除記憶體，結束時必須強制exit;
// 不然會很久
exit;

// var_dump($finds_[0]->innerHtml);