<?php

namespace hahaha;

class hahaha_language_base
{
	// 翻譯文件
	public $Language_List_ = [];

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
	public function Language($language)
	{
		if(empty($this->Language_List_[$language]))
		{
			throw new \Exception('語言列表沒有該項目');
		}
		$language_ = $this->Namespace . '\\' . $this->Locale . '\\' . $this->Language_List_[$language];

		return $language_::Instance();
	}

	
	
}
