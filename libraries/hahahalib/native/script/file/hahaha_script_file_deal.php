<?php

/*
// --------------------------------------------------------------------------
注意
// --------------------------------------------------------------------------

// --------------------------------------------------------------------------
*/

/*
// --------------------------------------------------------------------------

// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
*/

/*

*/

/*

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

namespace hahahalib\script;

use hahahalib\hahaha_file;
use hahahalib\script\hahaha_file_deal_define_key as key;
use hahahalib\script\hahaha_file_deal_define_operator as op;

/*
use hahahalib\script\hahaha_file_deal as script;
use hahahalib\script\hahaha_file_deal_define_key as key;
use hahahalib\script\hahaha_file_deal_define_operator as op;
//
use hahahalib\script\hahaha_file_deal as hahaha_script_file_deal;
use hahahalib\script\hahaha_file_deal_define_key as key_script_file_deal;
use hahahalib\script\hahaha_file_deal_define_operator as op_script_file_deal;
*/

/*
 -------------------------------------------- 
範例 
 -------------------------------------------- 
// https://www.php.net/manual/en/function.unlink.php
// php 7.3.0
// On Windows, it is now possible to unlink() files with handles in use, 
// while formerly that would fail. However, it is still not possible to re-create the unlinked file, 
// until all handles to it have been closed.
// 所以後面不能重建
// MOVE等同於刪除，也不能重建
 -------------------------------------------- 
// 因為刪除檔案的問題(unlink or move)，必須照下面這樣寫
// op::xxx放在同一個array，似乎資源會被咬住
// 這只能等後面版本是不是有解
 -------------------------------------------- 
 
use hahahalib\script\hahaha_file_deal as script;
use hahahalib\script\hahaha_file_deal_define_key as key;
use hahahalib\script\hahaha_file_deal_define_operator as op;

$find_ = [];
$data_ = [];
$list_ = [
	// -------------------------------------------- 
	"group1" => [
		// -------------------------------------------- 
		"item1" => [
			op::MKDIR => [
				key::DIR => "aaa",
				key::MODE => 0775,
			],
		],
		"item2" => [
			op::RMDIR => [
				key::DIR => "aaa",
				key::MODE => 0775,
			],	
		],
		"item3" => [			
			op::COPY => [
				key::SRC_FILE => "aaa.php",
				key::DST_FILE => "bbb.php",
			],
		],
		"item4" => [
			op::MOVE => [
				key::SRC => "bbb.php",
				key::DST => "ccc.php",
			],
		],
		"item5" => [
			op::DELETE => [
				key::FILE => "ccc.php",
			],
		],
		"item6" => [
			op::CHMOD => [
				key::FILE => "aaa.php",
				key::MODE => 0775,
			],
		],
		"item7" => [
			op::GLOB => [
				key::PATTERN => "*.php",
				// key::FLAG => 0,
				key::FIND => &$find_,
			],
		],
		"item8" => [
			op::TOUCH => [
				key::FILE => "ccc.php",
				key::TIME => time(),
				key::ACCESS_TIME => time(),
			],
		],
		"item9" => [
			// -------------------------------------------- 
			op::READ_FILE => [
				key::FILE => "aaa.php",
				key::DATA => &$data_,
				// key::FLAG => 0,
			],
		],
		"item10" => [
			op::WRITE_FILE => [
				key::FILE => "ddd.php",
				key::DATA => &$data_,
				// key::FLAG => 0,
			],
		],
		"item11" => [
			// -------------------------------------------- 
			op::WAIT_FILE_EXIST => [
				key::FILE => $src_ . "/" . "jquery",
				key::TIME => 100,	// us
			],
		],
		"item12" => [
			op::WAIT_DIR_EXIST => [
				key::DIR => $src_ . "/" . "jquery",
				key::TIME => 100,	// us
			],
		],
		"item13" => [
			op::WAIT_FILE_NOT_EXIST => [
				key::FILE => $src_ . "/" . "jquery",
				key::TIME => 100,	// us
			],
		],
		"item14" => [
			op::WAIT_DIR_NOT_EXIST => [
				key::DIR => $src_ . "/" . "jquery",
				key::TIME => 100,	// us
			],
		],
		"item15" => [
			// -------------------------------------------- 
			op::RECURSIVE_COPY => [
				key::SRC_DIR => "jquery",
				key::DST_DIR => "jquery_aaa",
			],
		],
		"item16" => [
			op::DELETE_TREE => [
				key::DIR => "jquery_aaa",
			],
		],
		"item17" => [
			// -------------------------------------------- 
			"hahaha" => [
			],
		],
		// -------------------------------------------- 
	],
	// -------------------------------------------- 
];

$script_ = script::Instance();
$script_->Script($list_);
// var_dump($list_);exit;
var_dump($find_);
var_dump($data_);
*/

/*
 -------------------------------------------- 
失敗寫法 - 刪除檔案，似乎在同一層資源不會釋放，所以無法recreate file 
 -------------------------------------------- 
$list_ = [
	// -------------------------------------------- 
	"group1" => [
		// -------------------------------------------- 
		"item1" => [
			// -------------------------------------------- 
			// 刪除plugin
			// -------------------------------------------- 			
			// https://www.php.net/manual/en/function.unlink.php
			// php 7.3.0
			// On Windows, it is now possible to unlink() files with handles in use, 
			// while formerly that would fail. However, it is still not possible to re-create the unlinked file, 
			// until all handles to it have been closed.
			// 所以後面不能重建
			op::DELETE_TREE => [
				key::DIR => $dst_ . "/" . "plugin",
			],
			// MOVE等同於刪除，也不能重建	
			// -------------------------------------------- 
			// 新增plugin
			// -------------------------------------------- 
			op::MKDIR => [
				key::DIR => $dst_ . "/" . "plugin",
				key::MODE => 0775,
			],
			// -------------------------------------------- 
			// 處理插件位置
			// -------------------------------------------- 
			op::MOVE => [
				key::SRC => $src_ . "/" . "jquery",
				key::DST => $dst_ . "/plugin/" . "jquery",
			],
			// -------------------------------------------- 
			// 刪除node_modules
			// -------------------------------------------- 
			op::DELETE_TREE => [
			 	key::DIR => $src_ ,
			],
			// -------------------------------------------- 
			// 
			// -------------------------------------------- 
		],
		// -------------------------------------------- 
	],
	// -------------------------------------------- 
];

$script_ = script::Instance();
$script_->Script($list_);
*/
class hahaha_file_deal
{
	use \hahahalib\hahaha_instance_trait;

    public function Initial()
    {

    }
	
	public function Script(&$list)
	{
		$file_ = hahaha_file::Instance();
		
		foreach($list as $key_group => &$group) 
		{
			foreach($group as $key_item => &$item) 
			{
				foreach($item as $key_op => &$op) 
				{
					// -------------------------------------------- 
					// 因為沒很多東西，所以目前這裡只留Custom繼承出去自定義
					// 如確定很多才做整理
					/*
					$deal_ = false;
					if($deal_)
					{
						$deal_ = $this->xxx();
					}
					if($deal_)
					{
						$deal_ = $this->yyy();
					}
					// 或另外弄到class 分類
					*/
					// -------------------------------------------- 
					if($key_op == op::MKDIR) 
					{
						if( !is_dir($op[key::DIR]) ) 
						{
							if(!empty($op[key::MODE]) )
							{
								@mkdir($op[key::DIR], $op[key::MODE], true);
							}
							else if(empty($op[key::MODE]) )
							{
								@mkdir($op[key::DIR], 0755, true);
							}							
						}	
					}
					else if($key_op == op::RMDIR) 
					{
						if( is_dir($op[key::DIR]) ) 
						{
							@rmdir($op[key::DIR]);
						}	
					}
					else if($key_op == op::COPY) 
					{
						if( file_exists ($op[key::SRC_FILE]) ) 
						{
							@copy($op[key::SRC_FILE], $op[key::DST_FILE]);
						}	
					}
					// https://www.php.net/manual/en/function.unlink.php
					// php 7.3.0
					// On Windows, it is now possible to unlink() files with handles in use, 
					// while formerly that would fail. However, it is still not possible to re-create the unlinked file, 
					// until all handles to it have been closed.
					// 所以後面不能重建
					// MOVE等同於刪除，也不能重建
					else if($key_op == op::MOVE) 
					{
						if( file_exists($op[key::SRC]) || is_dir($op[key::SRC]) )
						{
							@rename($op[key::SRC], $op[key::DST]);
						}	
					}
					// https://www.php.net/manual/en/function.unlink.php
					// php 7.3.0
					// On Windows, it is now possible to unlink() files with handles in use, 
					// while formerly that would fail. However, it is still not possible to re-create the unlinked file, 
					// until all handles to it have been closed.
					// 所以後面不能重建
					// MOVE等同於刪除，也不能重建
					else if($key_op == op::DELETE) 
					{
						if( file_exists($op[key::FILE]) )
						{
							@unlink($op[key::FILE]);
						}						
					}
					else if($key_op == op::CHMOD) 
					{
						if( file_exists($op[key::FILE]) )
						{
							@chmod($op[key::FILE], $op[key::MODE]);
						}	
					}
					else if($key_op == op::GLOB) 
					{
						if(!empty($op[key::FLAG]) )
						{
							$op[key::FIND] = @glob($op[key::PATTERN], $op[key::FLAG]);
						}
						else if(empty($op[key::FLAG]) )
						{
							$op[key::FIND] = @glob($op[key::PATTERN]);
						}
					}
					else if($key_op == op::TOUCH) 
					{
						if(!empty($op[key::TIME]) && !empty($op[key::ACCESS_TIME]) )
						{
							@touch($op[key::FILE], $op[key::TIME], $op[key::ACCESS_TIME]);
						}
						else if(empty($op[key::ACCESS_TIME]) )
						{
							@touch($op[key::FILE], $op[key::TIME]);
						}
						else if(empty($op[key::TIME]) && empty($op[key::ACCESS_TIME]) )
						{
							@touch($op[key::FILE]);
						}						
					}
					// -------------------------------------------- 
					else if($key_op == op::READ_FILE) 
					{
						if( file_exists($op[key::FILE]) )
						{
							$op[key::DATA] = @file_get_contents($op[key::FILE]);
						}	
					}
					else if($key_op == op::WRITE_FILE) 
					{
						if(!empty($op[key::FLAG]) )
						{
							@file_put_contents($op[key::FILE], $op[key::DATA], $op[key::FLAG]);
						}
						else if(empty($op[key::FLAG]) )
						{
							@file_put_contents($op[key::FILE], $op[key::DATA]);
						}		
					}
					// -------------------------------------------- 
					else if($key_op == op::RECURSIVE_COPY) 
					{
						$file_->Recursive_Copy($op[key::SRC_DIR], $op[key::DST_DIR]);
					}
					// https://www.php.net/manual/en/function.unlink.php
					// php 7.3.0
					// On Windows, it is now possible to unlink() files with handles in use, 
					// while formerly that would fail. However, it is still not possible to re-create the unlinked file, 
					// until all handles to it have been closed.
					// 所以後面不能重建
					// MOVE等同於刪除，也不能重建
					else if($key_op == op::DELETE_TREE) 
					{
						$file_->Delete_Tree($op[key::DIR]);
					}
					// -------------------------------------------- 
					else if($key_op == op::WAIT_FILE_EXIST) 
					{
						while(!file_exists($op[key::FILE]))
						{
							usleep($op[key::TIME]);
						}
					}
					else if($key_op == op::WAIT_DIR_EXIST) 
					{
						while(!is_dir($op[key::DIR]))
						{
							usleep($op[key::TIME]);
						}
					}
					else if($key_op == op::WAIT_FILE_NOT_EXIST) 
					{
						while(file_exists($op[key::FILE]))
						{
							usleep($op[key::TIME]);
						}
					}
					else if($key_op == op::WAIT_DIR_NOT_EXIST) 
					{
						while(is_dir($op[key::DIR]))
						{
							usleep($op[key::TIME]);
						}
					}
					// -------------------------------------------- 
					else
					{
						$this->Operator_Custom($key_op, $op);
					}
					// -------------------------------------------- 
				}
			}
		}
	}
	
	public function Operator_Custom(&$key_op, &$op)
	{
		// 在Script()內執行echo，所以會先顯示
		// echo $key_op;
	}
	
}