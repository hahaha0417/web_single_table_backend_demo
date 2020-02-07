<?php

namespace hahaha\asset;

/*
因為不想走檔案，因此用建表的方式使用，
*/
class hahaha_asset_base
{
	// --------------------------------------------------------------------------
	// Property
	// --------------------------------------------------------------------------
	// 路徑
	public $Asset_Dir = '/assets';

	// --------------------------------------------------------------------------
	// Constrant
	// --------------------------------------------------------------------------
	// 插入前方位置
	const FRONT = 0;
	// 插入後方位置
	const BACK = 1;

	// --------------------------------------------------------------------------
	// 
	// --------------------------------------------------------------------------
	// Asset文件
	public $Asset_ = [];

	// 目標Node
	public $Target_Node_ = NULL;

	// --------------------------------------------------------------------------
	// 
	// --------------------------------------------------------------------------
	// 
	// --------------------------------------------------------------------------

	function __construct($initial = true)
	{		
		if($initial)
		{
			Initial();
		}
	}

	/*
	繼承出去改
	*/
	public function Initial()
	{		
		/*
		// 不能用這個hahaha_asset::Instance()，會無限迴圈
		if(method_exists($this, "Initial_Ha"))
		{
			$this->Initial_Ha($this);
        }
        // 基於所見即所得，任何情況的翻譯必須相同，因此沒有分狀況(default & local))，如不同需要要不同翻譯，請自己寫判斷式
        // 除非翻譯超級多，不然不要分檔案(一般情況下不可能)，以節省載入php檔案數

        if(method_exists(\hahaha\asset\set\hahaha_language_class::Instance(), "Initial_Ha"))
		{
			\hahaha\asset\set\hahaha_asset_class::Instance()->Initial_Ha($this);
		}
		if(method_exists(\hahaha\asset\set\hahaha_language_class2::Instance(), "Initial_Ha"))
		{
			\hahaha\asset\set\hahaha_asset_class2::Instance()->Initial_Ha($this);
        }
		*/
		
		return $this;
	}

	/*
	繼承出去改
	*/
	/*
	public function Initial_Ha($asset)
	{
		// 基於快速查找，Node式管理Asset
		// 可以多層
        $asset->Asset_ = array_merge($asset->Asset_, [
			'_Items' => [
			],
			'a' => [
			],		
		]);
	}
	*/

	/*
	注意 : 後面使用不是Initial，會重置
	這裡要refernce，不然會複製
	$node_ = &\hahaha\asset\normal\hahaha_asset::Instance()->Initial()->Find(['a', 'b']);
	$node_[222] = "123";
	var_dump(\hahaha\asset\normal\hahaha_asset::Instance()->Asset_);
	return array reference
	這個直接使用太危險，可能忘記reference，所以設為reference
	*/
	protected function &Find(&$node_names)
	{
		$node_ = &$this->Asset_;

		foreach($node_names as &$node_name)
		{
			if(empty($node_[$node_name]))
			{
				throw new \Exception('沒有找到Asset Node');
			}
			$node_ = &$node_[$node_name];
		}
			
		return $node_;
	}

	// --------------------------------------------------------------------------
	// 主功能
	// --------------------------------------------------------------------------
	public function Target($node_names)
	{
		$this->Target_Node_ = &$this->Find($node_names);
			
		return $this;
	}

	/*
	這裡不做縮寫t()翻譯，外面做一個\ha::t()的函式處理，因為引入(需要最簡引入)，因此沒辦法做成純function呼叫，
	但由於在controller以後，其實不一定要最簡引入，因此可以使用instance的方式順便引入require，使用前instance一下
	https://www.php.net/manual/zh/language.namespaces.importing.php
	ex : 
	$asset_->Asset('water_wheel_carousel', ['plugin', 'carousel'], $asseter_);
	$asset_->Asset('water_wheel_carousel', ['plugin', 'carousel'], $asseter_, \hahaha\asset\hahaha_asset_base::FRONT);
	*/
	public function Asset($asseter,
		$asset_phase = '',
		$item = NULL, 
		$node_names = [],	
		$position = self::BACK
	)
	{
		// 插入
		if(empty($asseter->Asset_List_[$asset_phase]))
		{
			$asseter->Asset_List_[$asset_phase] = [];
		}

		if($item === NULL)
		{
			return false;
		}

		if(empty($node_names))
		{
			if(empty($this->Target_Node_))
			{
				$this->Target_Node_ = &$this->Asset_;
			}
			$node_ = &$this->Target_Node_;
		}
		else
		{
			$node_ = &$this->Find($node_names);
		}

		$items_ = &$node_['_Items'];

		$item_ = &$items_[$item];

		// 先插入(因為只是插入reference)，等到Render時再判斷有無重複
		if($position == self::FRONT)
		{
			array_unshift($asseter->Asset_List_[$asset_phase], 
				[
					&$this->Asset_Dir,
					$item_
				]
			);
		}
		else if($position == self::BACK)
		{
			$asseter->Asset_List_[$asset_phase][]= [
				&$this->Asset_Dir,
				$item_
			];
		}
	}
	
}
