<?php

namespace hahaha;

/*
設計上，hahaha_env，規劃可以多重設定，例如我可以切換不同的server或是不同代理商
*/
class hahaha_env
{
	use \hahahasublib\hahaha_instance_trait;

	function __construct()
	{
		$this->Initial();
	}
		
	public function Initial($env = 'hahaha')
	{
		// 不能用這個hahaha_env::Instance()，會無限迴圈
		if($env == 'hahaha' && method_exists($this, "Initial_Ha"))
		{
			$this->Initial_Ha($this);
		}	
		return $this;
	}
	
	/*
	初始化腳本
	*/
	public function Initial_Ha($env)
	{			
		$env->System = new \stdClass;
		if (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") {
			$env->System->Public = realpath(__DIR__ . "/../../../public/project/windows");
		} else {
			$env->System->Public = realpath(__DIR__ . "/../../../public/project/linux");
		}
		// 專案
		$env->Project = new \stdClass;
		// hahaha
		$env->Project->Master = new \stdClass;
		$env->Project->Master->Dir = realpath(__DIR__ . "/../../../hahaha");
		$env->Project->Master->Public = realpath(__DIR__ . "/../../../hahaha/public");
		// project/hahaha
		$env->Project->Hahaha = new \stdClass;
		$env->Project->Hahaha->Dir = realpath(__DIR__ . "/../../../project/hahaha");
		$env->Project->Hahaha->Public = realpath(__DIR__ . "/../../../project/hahaha/public");
		// project/front
		$env->Project->Front = new \stdClass;
		$env->Project->Front->Dir = realpath(__DIR__ . "/../../../project/front");
		$env->Project->Front->Public = realpath(__DIR__ . "/../../../project/front/public");
		// project/backend
		$env->Project->Backend = new \stdClass;
		$env->Project->Backend->Dir = realpath(__DIR__ . "/../../../project/backend");
		$env->Project->Backend->Public = realpath(__DIR__ . "/../../../project/backend/public");
		// project/api
		$env->Project->Api = new \stdClass;
		$env->Project->Api->Dir = realpath(__DIR__ . "/../../../project/api");
		$env->Project->Api->Public = realpath(__DIR__ . "/../../../project/api/public");


	}
}


