<?php

namespace hahaha;

class hahaha_bootstrap_base
{
	public $Boot_List_ = [];
	
	function __construct()
	{

	}
	
	/*
	初始化
	*/
	public function Initial()
	{
		return $this;
	}
	
	/*
	啟動程序
	*/
	public function Run()
	{
		// 開始
		if(method_exists($this, "Run_Begin"))
		{
			$this->Run_Begin();
		}
		foreach($this->Boot_List_ as $key => $bootstrap)
		{
			if(method_exists($bootstrap, "Run_Begin"))
			{
				$bootstrap->Run_Begin();
			}
		}
	
		// 主要
		if(method_exists($this, "Run_Design"))
		{
			$this->Run_Design();
		}
		foreach($this->Boot_List_ as $key => $bootstrap)
		{
			if(method_exists($bootstrap, "Run_Design"))
			{
				$bootstrap->Run_Design();
			}
		}
		
		// 結束
		if(method_exists($this, "Run_End"))
		{
			$this->Run_End();
		}
		foreach($this->Boot_List_ as $key => $bootstrap)
		{
			if(method_exists($bootstrap, "Run_End"))
			{
				$bootstrap->Run_End();
			}
		}
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
}
