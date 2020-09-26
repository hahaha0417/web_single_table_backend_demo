<?php

/*
全域變數，一定要有Instance()
靜態用法，另外寫class用(3層式作法(1 static 2 public 3 kernel))
要附加，extends \ha::Log -> \he::Log， & \ha::ha_Log -> \he::he_Log自己設計
ex Log::Error("xxx");
*/
class ha
{
	use \hahahalib\hahaha_instance_trait;
	
	// 為求快，當找到時，reference instance存成變數，這樣下次可以直接使用，但是會有物件釋放問題，會指向null
	// 因此Instance Release後，請下Update();，將指向NULL的變數，移除
	// 如果到處Release Instance，管理怕亂則規定統一在一個地方Release Instance，全部Release後下Update
	
	// --------------------------------------------------------------------------
	// Property
	// --------------------------------------------------------------------------
	// url用
	public static $Http_Port = 8081;
	public static $Https_Port = 8443;
	//

	function __construct()
	{
		
	}	
	
	public static $Mapping_List_ = NULL;
	
	public function __get($name)
	{
		// 有用到才初始對應表
		if(!self::$Mapping_List_)
		{
			$this->Get_Mapping();
		}	
			
		if(empty($this->$name))
		{
			$class = &self::$Mapping_List_[$name];
			if(!empty($class))
			{
				$this->$name = $class::Instance();
			}
			else
			{
				throw new \Exception("沒有ha變數$" . $name);
			}
		}
		
		return $this->$name;
	}
	
	public function Get_Mapping()
	{
		// Mapping $_SERVER
		self::$Mapping_List_ = [
			'Server' => "\hahahalib\hahaha_external_variable_server"
		];	
	}	
	
	public function Update()
	{
		foreach(self::$Mapping_List_ as $key => &$class)
		{
			if($class::$Instance_ == NULL)
			{
				unset($this->$key);
			}
		}
	}

	// --------------------------------------------------------------------------
	// 快捷函數
	// --------------------------------------------------------------------------
	// 語言可以找地方這樣用，就可以直接使用了
	protected static $T_ = [];
	// 由於設計上的問題(Initail的問題)，這裡不方便動態換Language，且容易搞混
	// 無聊再自己設計管理模組，這裡簡易使用
	// 有需要再用Instance方式，做成function
	public static function t(
		$item, 
		$parameters = [], 
		$node_names = [], 
		$parameter_prefix = NULL,
		$parameter_postfix = NULL		
	)
	{
		if(is_array($item))
		{
			if(empty(self::$T_))
			{
				$option_ = \hahaha\hahaha_option::Instance();
				\ha\Lang::Get()->Initial();
				\ha\Lang::Locale($option_->Language->T->Locale);
				self::$T_ = \ha\Lang::Language($option_->Language->T->Language)->Initial();
			}

			self::$T_->Target($item);	
		}
		else
		{
			if(empty(self::$T_))
			{
				$option_ = \hahaha\hahaha_option::Instance();
				\ha\Lang::Get()->Initial();
				\ha\Lang::Locale($option_->Language->T->Locale);
				self::$T_ = \ha\Lang::Language($option_->Language->T->Language)->Initial();
			}
			
			return self::$T_->Translate($item, 
				$parameters, 
				$node_names, 
				$parameter_prefix,
				$parameter_postfix
			);
		}
		
	}

	/*
	切換url位址
	有空再改，先簡單處理，只能吃Root
	"/xxx"
	*/
	public static function url($url)
	{
		$server_ = \ha\Server::Get();

		if($server_->Is_Https() )
		{
			// https
			if($url[0] == '/')
			{
				return 'https://' . $server_->Server_Name . ':' . self::$Https_Port . $url;
			}
			else
			{
				return $url;
			}			
		}
		else
		{
			// http
			if($url[0] == '/')
			{
				return 'http://' . $server_->Server_Name . ':' . self::$Http_Port . $url;
			}
			else
			{
				return $url;
			}	
		}


	}
	// --------------------------------------------------------------------------
	// require
	// --------------------------------------------------------------------------
	// 如有需要， 在這邊使用require其他PHP做整理
	// --------------------------------------------------------------------------
}