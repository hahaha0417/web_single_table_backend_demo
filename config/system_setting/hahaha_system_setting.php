<?php

namespace pub;

/*
設計上，hahaha_system_setting，規劃可以多重設定，例如我可以切換不同的server或是不同代理商
公表不需要這麼複雜，有需要再規劃default & local
*/
class hahaha_system_setting
{
	use \hahahasublib\hahaha_instance_trait;

	function __construct()
	{
		// $this->Initial();
	}
		
	/*
	mode 0 project public路線 1 public路線
	*/
	public function Initial($system_setting = 'hahaha', $mode = 0)
	{
		// 不能用這個hahaha_env::Instance()，會無限迴圈
		if($system_setting == 'hahaha' && method_exists($this, "Initial_Ha"))
		{
			$this->Initial_Ha($this, $mode);
		}	
		return $this;
	}
	
	/*
	初始化腳本
	*/
	public function Initial_Ha($system_setting, $mode = 0)
	{		
		if(empty($_SERVER['REQUEST_SCHEME']))
		{
			return;
		}	

		$system_setting->System = new \stdClass;
		if (strtoupper(substr(PHP_OS, 0, 3)) === "WIN") {
			$system_setting->System->Public = realpath(__DIR__ . "/../../../public/project/windows");
		} 
		else 
		{
			$system_setting->System->Public = realpath(__DIR__ . "/../../../public/project/linux");
		}
		if(!empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == "http")
		{
			$system_setting->System->Port = "8700";
		}
		else if(!empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == "https")
		{
			$system_setting->System->Port = "8540";
		}
		// 專案
		$system_setting->Project = new \stdClass;

		$url = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'];
		// project/front (這必須最前，有相依)
		$system_setting->Project->Front = new \stdClass;
		if(!empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == "http")
		{
			$system_setting->Project->Front->Port = "8703";
		}
		else if(!empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == "https")
		{
			$system_setting->Project->Front->Port = "8543";
		}
		//
		$system_setting->Project->Front->Node = "/";
		$system_setting->Project->Front->Images = "images/";
		$system_setting->Project->Front->Videos = "videos/";
		$system_setting->Project->Front->Assets = "assets/";
		$system_setting->Project->Front->Uploads = "uploads/";
		//
		$system_setting->Project->Front->Index = __DIR__ . "/../../project/front/public/index.php";
		$system_setting->Project->Front->Root = realpath(__DIR__ . "/../../../project/front");
		$system_setting->Project->Front->Public = realpath(__DIR__ . "/../../../project/front/public");
		// 絕對路徑
		$system_setting->Project->Front->Url = empty($system_setting->Project->Front->Port) ? 
			$url . "/" : 
			$url . ":" . $system_setting->Project->Front->Port . "/";
		// 虛擬路徑
		if($mode == 0) 
		{
			// 走專案public路線
			$system_setting->Project->Front->Virtual_Url = empty($system_setting->Project->Front->Port) ? 
				$url . "/" : 
				$url . ":" . $system_setting->Project->Front->Port . "/";
		}
		else
		{
			// 走public路線
			$system_setting->Project->Front->Virtual_Url = empty($system_setting->System->Port) ? 
				$url . "/" : 
				$url . ":" . $system_setting->System->Port . $system_setting->Project->Front->Node; // 這不用"/"
		}	
		// hahaha
		$system_setting->Project->Master = new \stdClass;
		if(!empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == "http")
		{
			$system_setting->Project->Master->Port = "8701";
		}
		else if(!empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == "https")
		{
			$system_setting->Project->Master->Port = "8541";
		}		
		//
		$system_setting->Project->Master->Node = "/console";
		$system_setting->Project->Master->Images = "images/";
		$system_setting->Project->Master->Videos = "videos/";
		$system_setting->Project->Master->Assets = "assets/";
		$system_setting->Project->Master->Uploads = "uploads/";
		//
		$system_setting->Project->Master->Index = __DIR__ . "/../../hahaha/public/index.php";
		$system_setting->Project->Master->Root = realpath(__DIR__ . "/../../../hahaha");
		$system_setting->Project->Master->Public = realpath(__DIR__ . "/../../../hahaha/public");
		// 絕對路徑
		$system_setting->Project->Master->Url = empty($system_setting->Project->Master->Port) ? 
			$url . "/" : 
			$url . ":" . $system_setting->Project->Master->Port . "/";
		// 虛擬路徑
		if($mode == 0) 
		{
			// 走專案public路線
			$system_setting->Project->Master->Virtual_Url = empty($system_setting->Project->Master->Port) ? 
				$url . "/" : 
				$url . ":" . $system_setting->Project->Master->Port . "/";
		}
		else
		{
			// 走public路線
			$system_setting->Project->Master->Virtual_Url = empty($system_setting->System->Port) ? 
				$url . "/" : 
				$url . ":" . $system_setting->System->Port . $system_setting->Project->Master->Node . "/";
		}				
		// project/hahaha
		$system_setting->Project->Hahaha = new \stdClass;
		if(!empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == "http")
		{
			$system_setting->Project->Hahaha->Port = "8702";
		}
		else if(!empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == "https")
		{
			$system_setting->Project->Hahaha->Port = "8542";
		}	
		//
		$system_setting->Project->Hahaha->Node = "/api(H)";
		$system_setting->Project->Hahaha->Images = "images/";
		$system_setting->Project->Hahaha->Videos = "videos/";
		$system_setting->Project->Hahaha->Assets = "assets/";
		$system_setting->Project->Hahaha->Uploads = "uploads/";
		//
		$system_setting->Project->Hahaha->Index = __DIR__ . "/../../project/hahaha/public/index.php";
		$system_setting->Project->Hahaha->Root = realpath(__DIR__ . "/../../../project/hahaha");
		$system_setting->Project->Hahaha->Public = realpath(__DIR__ . "/../../../project/hahaha/public");
		// 絕對路徑
		$system_setting->Project->Hahaha->Url = empty($system_setting->Project->Hahaha->Port) ? 
			$url . "/" : 
			$url . ":" . $system_setting->Project->Hahaha->Port . "/";
		// 虛擬路徑
		if($mode == 0) 
		{
			// 走專案public路線
			$system_setting->Project->Hahaha->Virtual_Url = empty($system_setting->Project->Hahaha->Port) ? 
				$url . "/" : 
				$url . ":" . $system_setting->Project->Hahaha->Port . "/";
		}
		else
		{
			// 走public路線
			$system_setting->Project->Hahaha->Virtual_Url = empty($system_setting->System->Port) ? 
				$url . "/" : 
				$url . ":" . $system_setting->System->Port . $system_setting->Project->Hahaha->Node . "/";
		}	
		// project/backend
		$system_setting->Project->Backend = new \stdClass;
		if(!empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == "http")
		{
			$system_setting->Project->Backend->Port = "8704";
		}
		else if(!empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == "https")
		{
			$system_setting->Project->Backend->Port = "8544";
		}
		//
		$system_setting->Project->Backend->Node = "/backend";
		$system_setting->Project->Backend->Images = "images/";
		$system_setting->Project->Backend->Videos = "videos/";
		$system_setting->Project->Backend->Assets = "assets/";
		$system_setting->Project->Backend->Uploads = "uploads/";
		//
		$system_setting->Project->Backend->Index = __DIR__ . "/../../project/backend/public/index.php";
		$system_setting->Project->Backend->Root = realpath(__DIR__ . "/../../../project/backend");
		$system_setting->Project->Backend->Public = realpath(__DIR__ . "/../../../project/backend/public");
		// 絕對路徑
		$system_setting->Project->Backend->Url = empty($system_setting->Project->Backend->Port) ? 
			$url . "/" : 
			$url . ":" . $system_setting->Project->Backend->Port . "/";
		// 虛擬路徑
		if($mode == 0) 
		{
			// 走專案public路線
			$system_setting->Project->Backend->Virtual_Url = empty($system_setting->Project->Backend->Port) ? 
				$url . "/" : 
				$url . ":" . $system_setting->Project->Backend->Port . "/";
		}
		else
		{
			// 走public路線
			$system_setting->Project->Backend->Virtual_Url = empty($system_setting->System->Port) ? 
				$url . "/" : 
				$url . ":" . $system_setting->System->Port . $system_setting->Project->Backend->Node . "/";
		}	
		// project/api
		$system_setting->Project->Api = new \stdClass;
		if(!empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == "http")
		{
			$system_setting->Project->Api->Port = "8705";
		}
		else if(!empty($_SERVER['REQUEST_SCHEME']) && $_SERVER['REQUEST_SCHEME'] == "https")
		{
			$system_setting->Project->Api->Port = "8545";
		}
		//
		$system_setting->Project->Api->Node = "/api";
		$system_setting->Project->Api->Images = "images/";
		$system_setting->Project->Api->Videos = "videos/";
		$system_setting->Project->Api->Assets = "assets/";
		$system_setting->Project->Api->Uploads = "uploads/";
		//
		$system_setting->Project->Api->Index = __DIR__ . "/../../project/api/public/index.php";
		$system_setting->Project->Api->Root = realpath(__DIR__ . "/../../../project/api");
		$system_setting->Project->Api->Public = realpath(__DIR__ . "/../../../project/api/public");
		// 絕對路徑
		$system_setting->Project->Api->Url = empty($system_setting->Project->Api->Port) ? 
			$url . "/" : 
			$url . ":" . $system_setting->Project->Api->Port . "/";
		// 虛擬路徑
		if($mode == 0) 
		{
			// 走專案public路線
			$system_setting->Project->Api->Virtual_Url = empty($system_setting->Project->Api->Port) ? 
				$url . "/" : 
				$url . ":" . $system_setting->Project->Api->Port . "/";
		}
		else
		{
			// 走public路線
			$system_setting->Project->Api->Virtual_Url = empty($system_setting->System->Port) ? 
				$url . "/" : 
				$url . ":" . $system_setting->System->Port . $system_setting->Project->Api->Node . "/";
		}	
	}
}


