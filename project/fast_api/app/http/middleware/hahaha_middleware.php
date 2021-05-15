<?php

namespace hahaha;

/*
路由設定
*/
class hahaha_middleware extends hahaha_middleware_base
{
	use \hahahalib\hahaha_instance_trait;
	
	// --------------------------------------------------------------------------
	// Property
	// --------------------------------------------------------------------------

	// 命名空間
	public $Namespace = '\\hahaha\\middleware';
	// 實際上串起來會變成"\hahaha\middleware\hahaha_middleware_web"
		
	// --------------------------------------------------------------------------
	// 繼承修改部分
	// --------------------------------------------------------------------------
	/*
	有空再寫客製化初始化
	*/
	public function Initial()
	{
		// 
		$this->Middleware_List_ = [
			// 對應列表，要用時再Instance，使用
			'web' => 'hahaha_middleware_web',
			'web.front' => 'hahaha_middleware_web_front',
			'web.backend' => 'hahaha_middleware_web_backend',
			'api' => 'hahaha_middleware_api',
		];

		return $this;
	}
	

	// --------------------------------------------------------------------------
	// 
	// --------------------------------------------------------------------------
	
}
