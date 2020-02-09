<?php

namespace hahaha;

/*
應用程式，有要修改再打開註解
*/
class hahaha_application extends hahaha_application_base
{
	/*
	function __construct($root)
	{
		parent::__construct($root);
	}
	*/
	
	/*
	單例模式
	*/
	/*
	public static function Instance()
	{
		return parent::Instance();
	}
	*/
	
	/*
	啟動程序
	*/
	/*
	public function Run()
	{
		parent::Run();	
	}
	*/
	
	/*
	初始化			
	*/
	public function Initial()
	{
		// 初始化 - 公用設定		
		$global_pub_ = \pub\hahaha_global::Instance();
		if($global_pub_->Project->Jump == 0)
		{
			// 不是跳轉專案
			$global_pub_->Node->Name = "Hahaha";
			$system_setting_ = \pub\hahaha_system_setting::Instance()->Initial();
		}
		//
		parent::Initial();
	}
	
	
	/*
	每次流程都必須重置的東西
	*/
	/*
	public function Reset()
	{
		//hahaha_global::Instance()->Reset();
	}
	*/
	

	/*
	開始			
	*/
	/*
	public function Begin()
	{
		parent::Begin();
	}
	*/
	
	/*
	主要			
	*/
	/*
	public function Design()
	{
		parent::Design();
	}
	*/

	/*
	結束			
	*/
	/*
	public function End()
	{
		parent::End();
	}
	*/

}


