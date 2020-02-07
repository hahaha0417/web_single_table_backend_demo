<?php

namespace hahaha;

/*
流程控制
*/
class hahaha_flow_time extends hahaha_flow_base
{
	use \hahahalib\hahaha_instance_trait;
	
	function __construct()
	{
	
	}

	/*
	流程初始化
	*/
	/*
	public function Initial()
	{
		// 初始化清單		
		//$this->Flow_List_ = [	
		//];	
		
		return $this;
	}
	*/

	/*
	流程開始
	*/
	
	public function Run_Begin()
	{
		// $this->Start_ = microtime(true);
	}
	
		
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
	
	public function Run_End()
	{
		// $this->End_ = microtime(true);

		// echo "計算時間" . ($this->End_ - $this->Start_) * 1000 . "ms";
	}
	
	


}