<?php

namespace hahaha;

/*
路由設定
*/
class hahaha_language extends hahaha_language_base
{
	use \hahahalib\hahaha_instance_trait;
	
	// --------------------------------------------------------------------------
	// Property
	// --------------------------------------------------------------------------
	// 語言
	public $Locale = 'en';
	// 命名空間
	public $Namespace = '\\hahaha\\language';
	// 實際上串起來會變成"\hahaha\language\en\hahaha_language"
		
	// --------------------------------------------------------------------------
	// 繼承修改部分
	// --------------------------------------------------------------------------
	/*
	有空再寫客製化初始化
	*/
	public function Initial()
	{
		// 自己決定處理方式，因為是多國語言，且我依照不同語言拆分，且我用namespace區分(namespace hahaha\language\tw)，因此我預設這樣做
		$this->Language_List_ = [
			// 對應列表，要用時再Instance，使用
			'default' => 'hahaha_language',
		];

		return $this;
	}
	

	// --------------------------------------------------------------------------
	// 
	// --------------------------------------------------------------------------
	
}
