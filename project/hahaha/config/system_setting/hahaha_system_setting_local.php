<?php

namespace hahaha;

/*
設計上，system_setting必須載入
*/
class hahaha_system_setting_local
{
	use \hahahalib\hahaha_instance_trait;

	function __construct()
	{

	}
		
	/*
	初始化腳本
	*/
	public function Initial_Ha($system_setting)
	{
		$system_setting->Asset->Version = '?v=' .time();
	}
	
}

