<?php

namespace hahaha;

/*
流程控制
*/
class hahaha_flow extends hahaha_flow_base
{
	use \hahahalib\hahaha_instance_trait;
	
	function __construct()
	{
		
	}

	/*
	流程初始化
	*/
	
	public function Initial()
	{
		// 初始化清單		
		$this->Flow_List_ = [	
			hahaha_flow_time::Instance()
		];	
		
		return $this;
	}
	

	/*
	流程開始
	*/
	/*
	public function Run_Begin()
	{
		
	}
	*/
		
	/*
	流程設計
	*/
	/*
	public function Run_Design()
	{
		
	}
	*/
	
	/*
	流程結束
	*/
	/*
	public function Run_End()
	{
		
	}
	*/
	


}