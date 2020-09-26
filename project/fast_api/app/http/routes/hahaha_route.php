<?php

namespace hahaha;

/*
路由設定
*/
class hahaha_route extends hahaha_route_base
{
	use \hahahalib\hahaha_instance_trait;
	
	function __construct()
	{

	}
		
	// --------------------------------------------------------------------------
	// 繼承修改部分
	// --------------------------------------------------------------------------
	/*
	有空再寫客製化初始化
	*/
	public function Initial()
	{
		// 如要嵌入其他router跳過我的部分，在這邊做設定
		// $global = \hahaha\hahaha_global::Instance();		
		// $global->Route->Default = false;
		return $this;
	}
	
	
	/*
	自定義路由
	*/
	public function Run_Custom()
	{
	}
	
	/*
	修改部分
	*/
	public function Route()
	{		
		$route_ = \hahahalib\hahaha_route::Instance(); 


		// 有需要把我的註解掉自己填 
		parent::Route();
		// $route_ = \hahahalib\hahaha_route::Instance(); 
		
	}

	/*
	修改部分
	*/
	public function Middleware(&$middlewares)
	{
		// 有需要把我的註解掉自己填 
		parent::Middleware($middlewares);
	}
	// --------------------------------------------------------------------------
	// 
	// --------------------------------------------------------------------------
	
}
