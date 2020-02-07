<?php

namespace hahaha;

/*
設計上，global可以在runtime修改
*/
class hahaha_global
{	
	use \hahahalib\hahaha_instance_trait;

	function __construct()
	{
		$this->Initial();
	}
	
	/*
	重置，每次執行都必須要重置的項目，如不須重置，則不要在這邊處理，使的速度更快
	*/
	public function Reset()
	{
		// 不能用這個hahaha_global::Instance()，會無限迴圈
		if(method_exists($this, "Reset_Ha"))
		{
			$this->Reset_Ha($this);
		}
		if(method_exists(hahaha_global_default::Instance(), "Reset_Ha"))
		{
			hahaha_global_default::Instance()->Reset_Ha($this);
		}
		if(method_exists(hahaha_global_local::Instance(), "Reset_Ha"))
		{
			hahaha_global_local::Instance()->Reset_Ha($this);
		}
	}
	
	/*
	重置撰寫地方
	*/
	public function Reset_Ha($global)
	{
		// View
		$global->Debug->Enabled = true;
		// MVC
		$global->View->Render->Enabled = true;
		// Route
		$global->Route->Pass_Space = false;
		$global->Route->Default = true;
		// Bootstrap
		$global->Bootstrap->Enabled = true;
		// Flow
		$global->Flow->Enabled = true;
	}
	
	public function Initial()
	{
		// 不能用這個hahaha_global::Instance()，會無限迴圈
		if(method_exists($this, "Initial_Ha"))
		{
			$this->Initial_Ha($this);
		}
		if(hahaha_system_setting::Instance()->Develop->Default && method_exists(hahaha_global_default::Instance(), "Initial_Ha"))
		{
			hahaha_global_default::Instance()->Initial_Ha($this);
		}
		if(hahaha_system_setting::Instance()->Develop->Local && method_exists(hahaha_global_local::Instance(), "Initial_Ha"))
		{
			hahaha_global_local::Instance()->Initial_Ha($this);
		}
		return $this;
	}
	
	/*
	初始化腳本
	*/
	public function Initial_Ha($global)
	{
		$global->Debug = new \stdClass;
		$global->Debug->Enabled = true;
		// MVC
		$global->Model = new \stdClass;
		$global->View = new \stdClass;
		$global->View->Render = new \stdClass;
		$global->View->Render->Enabled = true;
		$global->Controller = new \stdClass;
		// Route
		$global->Route = new \stdClass;
		$global->Route->Pass_Space = false;
		$global->Route->Default = true;
		// Bootstrap
		$global->Bootstrap = new \stdClass;
		$global->Bootstrap->Enabled = true;
		// Flow
		$global->Flow = new \stdClass;
		$global->Flow->Enabled = true;

	}	
	
}


