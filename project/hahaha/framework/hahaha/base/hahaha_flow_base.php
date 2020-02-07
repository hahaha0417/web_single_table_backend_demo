<?php

namespace hahaha;

class hahaha_flow_base
{
	public $Flow_List_ = [];
	
	function __construct()
	{

	}
	
	/*
	流程初始化
	*/
	public function Initial()
	{
		return $this;
	}

	/*
	流程開始
	*/
	public function Begin()
	{
		if(method_exists($this, "Run_Begin"))
		{
			$this->Run_Begin();
		}
		foreach($this->Flow_List_ as $key => $flow)
		{
			if(method_exists($flow, "Run_Begin"))
			{
				$flow->Run_Begin();
			}
		}
	}
		
	/*
	流程設計
	*/
	public function Design()
	{
		if(method_exists($this, "Run_Design"))
		{
			$this->Run_Design();
		}
		foreach($this->Flow_List_ as $key => $flow)
		{
			if(method_exists($flow, "Run_Design"))
			{
				$flow->Run_Design();
			}
		}
	}
	
	/*
	流程結束
	*/
	public function End()
	{
		if(method_exists($this, "Run_End"))
		{
			$this->Run_End();
		}
		foreach($this->Flow_List_ as $key => $flow)
		{
			if(method_exists($flow, "Run_End"))
			{
				$flow->Run_End();
			}
		}
	}
	
}
