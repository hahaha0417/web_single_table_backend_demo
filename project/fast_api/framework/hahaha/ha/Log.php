<?php

namespace ha;

/*
快捷Log
*/
class Log
{
	use \hahahalib\hahaha_class_instance_handle_trait;

	public static $Class_Name_ = '\\hahahalib\\hahaha_log';

	/*
	use \ha\Log;
	// 選擇設定檔
	Log::Get()->Initial_Base();
	// 使用
	Log::Error('aa',['4444']);
	*/
	public static function Error($message, $context = [])
	{
		$log_ = \hahahalib\hahaha_log::Instance();
		$log_->Error($message, $context);
	}

	/*
	其他的同error方法做
	*/

}