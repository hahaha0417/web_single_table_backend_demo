<?php

namespace hahaha;

class hahaha_middleware_base
{
	// 翻譯文件
	public $Middleware_List_ = [];

	function __construct($initial = true)
	{		
		if($initial)
		{
			Initial();
		}
	}

	/*
	繼承出去改
	*/
	public function Initial()
	{		
		
		return $this;
	}

	/*
	取得翻譯物件
	要記得Initial
	*/
	public function Middleware($middleware)
	{
		if(empty($this->Middleware_List_[$middleware]))
		{
			throw new \Exception('中間層沒有該項目');
		}
		$middleware_ = $this->Namespace . '\\' . $this->Middleware_List_[$middleware];

		return $middleware_::Instance();
	}

	
	
}
