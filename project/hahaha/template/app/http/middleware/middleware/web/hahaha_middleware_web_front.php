<?php

namespace hahaha\middleware;

/*
路由設定
*/
class hahaha_middleware_web_front extends \hahaha\middleware\hahaha_middleware_base
{
	use \hahahalib\hahaha_instance_trait;
	
	// --------------------------------------------------------------------------
	// Property
	// --------------------------------------------------------------------------

	// --------------------------------------------------------------------------
	// 實作部分
	// --------------------------------------------------------------------------
	/*
	有空再寫客製化初始化
	*/
	public function Initial()
	{

		return $this;
	}
	
	/*
    處理
	*/
	public function Handle()
	{
		\ha\Session::Start();
		// 先取得，不然會以為是空的 
		\ha\Session::Get()->user;
		if(empty(\ha\Session::Get()->user))
		{
			\ha\Route::Redirect('/');
		}

		return $this;
	}
	
}
