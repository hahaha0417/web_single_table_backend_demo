<?php

namespace hahaha;

/*
// --------------------------------------------------------------------------
Ha Arch.
// --------------------------------------------------------------------------
hahahalib 主要以namespace hahahalib
Application 主要以namespace hahaha為準
通訊用 主要以namespace haha為準
重要變數或函數 主要以namespace ha為準
// --------------------------------------------------------------------------
hahahalib hehehelib hihihilib hohoholib huhuhulib為主要library namespace 
hahaha hehehe hihihi hohoho huhuhu為主要application namespace 
haha hehe hihi hoho huhu為主要通訊namespace 
ha he hi ho hu為主要變數或函數namespace 
// --------------------------------------------------------------------------
hahahalib命名不採psr命名，沿用windows hahahalib命名法
// --------------------------------------------------------------------------
*/
/*
// 由於流程強調盡量少include，所以在進入客製化程式前，不要用\ha\XXX快捷用法，那不是給架構者用的
// 因為autoload可以多個，所以可以在initial or flow initial or begin，插入 -> 直接require or 精簡版autoload，這要用我的小程式做(目前我的小程式還沒有做到支援)
*/
class hahaha_application_base
{
	/*
	物件Handle
	*/
	public static $Instance_ = NULL;
	
	public $Root_ = NULL;

	function __construct($root)
	{
		$this->Root_ = $root; 
	}
	
	/*
	單例模式
	*/
	public static function Instance()
	{
		if(!self::$Instance_)
		{
			self::$Instance_ = new hahaha_application(
				realpath(__DIR__.'/../../../')
			);
		}
		
		return self::$Instance_;
	}
	
	/*
	啟動程序

	為了減少初始化動作，這裡只用system_setting(不可更改)
	假設要動態設定各動作
	請在各動作Run裡面使用option(不可更改) & global(可更改)
	*/
	public function Run()
	{
		try
		{
			// 系統參數，盡量少(其實有opcache，很多也沒關係)
			$system_setting_ = hahaha_system_setting::Instance()->Initial();

			// 初始化程序
			$this->Initial();
			
			// 重置
			$this->Reset();
			// 開始
			$this->Begin();
			
			// 流程
			if($system_setting_->Flow->Enabled)
			{
				// 流程開始
				$flow_ = hahaha_flow::Instance();
				if($system_setting_->Flow->Initial)
				{
					$flow_->Initial();
				}
			}
			if($system_setting_->Flow->Enabled)
			{
				$flow_->Begin();
			}
				
			// 啟動，有要靜態載入，加在這裡
			if($system_setting_->Bootstrap->Enabled)
			{
				$bootstrap_ = hahaha_bootstrap::Instance();
				if($system_setting_->Bootstrap->Initial)
				{
					$bootstrap_->Initial()->Run();
				}
			}
			
			// 開始
			$this->Design();
			if($system_setting_->Flow->Enabled)
			{
				// 流程設計
				$flow_->Design();
			}
			// 由於設計上，採用單例模式，因此需要時再用單例(Instance())初始化，所以流程上不須預先載入太多東西
			//
			if(\hahahalib\hahaha_function_cli::Is_Cli())
			{
				// Console
				if($system_setting_->Cli->Enabled)
				{
					// $cli_ = hahaha_cli::Instance();
					// if($system_setting_->Cli->Initial)
					// {
					// 	$cli_->Initial()->Run();
					// }
				}
			}
			else
			{
				// Web
				if($system_setting_->Route->Enabled)
				{
					$route_ = hahaha_route::Instance();
					if($system_setting_->Route->Initial)
					{
						$route_->Initial()->Run();
					}
				}
			}
			
			// 結束
			$this->End();
			if($system_setting_->Flow->Enabled)
			{
				// 流程結束
				$flow_->End();
			}	
		}	
		catch(\Exception $e)
		{		
			if(hahaha_system_setting::Instance()->Debug->Enabled)
			{
				echo "<pre>";
			}
			if(\hahahalib\hahaha_function_cli::Is_Cli())
			{
				echo "Exception : " . $e->getMessage() . PHP_EOL;	
			}
			else
			{
				// Web
				if(hahaha_global::Instance()->View->Render->Enabled)
				{
					// 有空要弄成頁面					
					echo "Exception : " . $e->getMessage() . PHP_EOL;				
				}
				else
				{
					echo "Exception : " . $e->getMessage() . PHP_EOL;		
				}
				

			}	
			if(hahaha_system_setting::Instance()->Debug->Enabled)
			{
				var_dump($e->getTrace());
			}
		}		
	}

	/*
	初始化			
	*/
	public function Initial()
	{		
		$system_setting_ = hahaha_system_setting::Instance();

		// 可以在任何地方動態選擇要載入的Autoload
		// 例如 : 
		// 1. 用我的php autoloaderclassmap.exe處理Autoload
		// 2. API只載入有用到的php
		// 3. 有極速要求的，則使用最小化的特殊載入，例如上線後，客戶覺得某功能很重要，則將該流程用到的，看是要用autoload or 直接清單式載入
		// 根據request的所有特徵，決定載入哪個Autoload

		//但請小心，避免載入錯誤
		if($system_setting_->Autoload->Default)
		{			
			// composer autoloader
			require __DIR__.'/../../../vendor/autoload.php';			
		}
		if($system_setting_->Autoload->Hahaha)
		{
			// hahaha autoloader - 用php_autoloader_classmap.exe產生
			require __DIR__.'/../../../autoload_.php';
		}
	}
	
	/*
	每次流程都必須重置的東西
	*/
	public function Reset()
	{
				
	}

	/*
	開始			
	*/
	public function Begin()
	{
		
	}

	/*
	主要			
	*/
	public function Design()
	{
		
	}

	/*
	結束			
	*/
	public function End()
	{
		
	}
	


}


