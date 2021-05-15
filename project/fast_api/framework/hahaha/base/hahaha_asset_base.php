<?php

namespace hahaha;

class hahaha_asset_base
{
	// 翻譯文件
	public $Asset_List_ = [];

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
	取得Asset物件
	要記得Initial
	*/
	public function Asset($asset)
	{
		if(empty($this->Asset_List_[$asset]))
		{
			throw new \Exception('Asset列表沒有該項目');
		}
		$asset_ = $this->Namespace . '\\' . $this->Class . '\\' . $this->Asset_List_[$asset];

		return $asset_::Instance();
	}

	
	
}
