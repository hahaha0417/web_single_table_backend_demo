<?php

namespace hahaha;

/*
啟動控制
*/
class hahaha_bootstrap extends hahaha_bootstrap_base
{
	use hahaha_instance_trait;
	
	function __construct()
	{
	}

	public function Initial()
	{
		// 初始化清單
		$this->Boot_List_ = [
			hahaha_bootstrap_abc::Instance()
		];	
		return $this;
	}

	/*
	執行開始階段
	*/
	/*
	public function Run_Begin()
	{
		
	}
	*/
	
	/*
	執行設計階段
	*/
	/*
	public function Run_Design()
	{
		
	}
	*/
	
	/*
	執行結束階段
	*/
	/*
	public function Run_End()
	{
		
	}
	*/
	/*
	有空再寫客製化初始化
	*/


}