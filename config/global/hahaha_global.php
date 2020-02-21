<?php

namespace pub;

/*
設計上，hahaha_global，規劃可以多重設定，例如我可以切換不同的server或是不同代理商
公表不需要這麼複雜，有需要再規劃default & local
*/
class hahaha_global
{
	use \hahahasublib\hahaha_instance_trait;

	function __construct()
	{
		$this->Initial();
	}
		
	public function Initial($global = 'hahaha')
	{
		// 不能用這個hahaha_env::Instance()，會無限迴圈
		if($global == 'hahaha' && method_exists($this, "Initial_Ha"))
		{
			$this->Initial_Ha($this);
		}	
		return $this;
	}
	
	/*
	初始化腳本
	*/
	public function Initial_Ha($global)
	{		
		$global->Stage = new \stdClass;
		$global->Stage->Name = "Public";	// 進入舞台

		$global->Node = new \stdClass;		
		$global->Node->Name = "Master";		// 運行節點

		$global->Project = new \stdClass;
		$global->Project->Jump = 0;
	}
}


