<?php

namespace hahaha;

/*
路由設定
*/
class hahaha_asset extends hahaha_asset_base
{
	use \hahahalib\hahaha_instance_trait;
	
	// --------------------------------------------------------------------------
	// Property
	// --------------------------------------------------------------------------
	// Class
	public $Class = 'normal';
	// 命名空間
	public $Namespace = '\\hahaha\\asset';
	// 實際上串起來會變成"\hahaha\asset\normal\hahaha_asset"
		
	// --------------------------------------------------------------------------
	// 繼承修改部分
	// --------------------------------------------------------------------------
	/*
	有空再寫客製化初始化
	*/
	public function Initial()
	{
		// 自己決定處理方式，因為是Asset分類，且我依照不同分類拆分，且我用namespace區分(namespace hahaha\asset\normal)，因此我預設這樣做
		$this->Asset_List_ = [
			// 對應列表，要用時再Instance，使用
			'default' => 'hahaha_asset',
		];

		return $this;
	}
	

	// --------------------------------------------------------------------------
	// 
	// --------------------------------------------------------------------------
	
}
