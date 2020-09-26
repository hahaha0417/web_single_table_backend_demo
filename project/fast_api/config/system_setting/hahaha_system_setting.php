<?php

namespace hahaha;

/*
設計上，system_setting必須載入
*/
class hahaha_system_setting
{
	use \hahahalib\hahaha_instance_trait;

	function __construct($initial = true)
	{		
		if($initial)
		{
			$this->Initial();
		}
	}
		
	public function Initial()
	{
		// 不能用這個hahaha_system_setting::Instance()，會無限迴圈
		if(method_exists($this, "Initial_Ha"))
		{
			$this->Initial_Ha($this);
		}
		if(hahaha_system_setting::Instance()->Develop->Default && method_exists(hahaha_system_setting_default::Instance(), "Initial_Ha"))
		{
			hahaha_system_setting_default::Instance()->Initial_Ha($this);
		}
		if(hahaha_system_setting::Instance()->Develop->Local && method_exists(hahaha_system_setting_local::Instance(), "Initial_Ha"))
		{
			hahaha_system_setting_local::Instance()->Initial_Ha($this);
		}
		return $this;
	}
	
	/*
	初始化腳本
	*/
	public function Initial_Ha($system_setting)
	{
		$system_setting->Debug = new \stdClass;
		$system_setting->Debug->Enabled = true;
		// --------------------------------------------------------------------------
		// 不可覆蓋
		// --------------------------------------------------------------------------
		// 因為我不想檢查檔案，所以檔案必須存在
		$system_setting->Develop = new \stdClass;
		$system_setting->Develop->Default = true;
		$system_setting->Develop->Local = true;
		// --------------------------------------------------------------------------
		// 可覆蓋
		// --------------------------------------------------------------------------
		$system_setting->Global = new \stdClass;
		// Autoload
		$system_setting->Autoload = new \stdClass;
		$system_setting->Autoload->Default = false;
		$system_setting->Autoload->Hahaha = true;
		// Bootstrap
		$system_setting->Bootstrap = new \stdClass;
		$system_setting->Bootstrap->Enabled = true;
		$system_setting->Bootstrap->Initial = true;
		// Flow
		$system_setting->Flow = new \stdClass;
		$system_setting->Flow->Enabled = true;
		$system_setting->Flow->Initial = true;
		// Route
		$system_setting->Route = new \stdClass;
		$system_setting->Route->Enabled = true;
		$system_setting->Route->Initial = true;
		// Cli
		$system_setting->Cli = new \stdClass;
		$system_setting->Cli->Enabled = true;
		$system_setting->Cli->Initial = true;
		// Asset
		$system_setting->Asset = new \stdClass;
		$system_setting->Asset->Version = '';
		
	}	
	
}

