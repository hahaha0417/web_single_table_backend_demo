<?php

namespace hahaha;

/*
設計上，option不能在runtime修改
*/
class hahaha_option
{
	use \hahahalib\hahaha_instance_trait;

	function __construct()
	{
		$this->Initial();
	}
		
	public function Initial()
	{
		// 不能用這個hahaha_system_setting::Instance()，會無限迴圈
		if(method_exists($this, "Initial_Ha"))
		{
			$this->Initial_Ha($this);
		}
		if(hahaha_system_setting::Instance()->Develop->Default && method_exists(hahaha_option_default::Instance(), "Initial_Ha"))
		{
			hahaha_option_default::Instance()->Initial_Ha($this);
		}
		if(hahaha_system_setting::Instance()->Develop->Local && method_exists(hahaha_option_local::Instance(), "Initial_Ha"))
		{
			hahaha_option_local::Instance()->Initial_Ha($this);
		}	
		return $this;
	}
	
	/*
	初始化腳本
	*/
	function Initial_Ha($option)
	{
		$app_ = \hahaha\hahaha_application::Instance();

		$option->Line = new \stdClass;
		$option->Line->Channel_Access_Token = "";
		$option->Line->Channel_Secret = "";
		// 暫時建這裡，應該要存在storage
		$option->Line->Bot = new \stdClass;
		$option->Line->Bot->Users = [
			// 使用者 密碼
			'hahaha' => 'hahaha', // 以後改MD5
		];
		
		$option->Language = new \stdClass;
		$option->Language->T = new \stdClass;
		$option->Language->T->Locale = 'en';
		$option->Language->T->Language = 'default';
		// Doctrine
		$option->Doctrine = new \stdClass;
		$option->Doctrine->Develop = false;
		// Mysql
		$option->Mysql = new \stdClass;
		$option->Mysql->Driver = 'pdo_mysql';
		$option->Mysql->Host = 'localhost';
		$option->Mysql->User = '';
		$option->Mysql->Password = '';
		$option->Mysql->Db_Name = '';
		$option->Mysql->Path = $app_->Root_ . '/app/models';
		$option->Mysql->Charset = 'UTF8';
		// Ftp
		$option->FTP = new \stdClass;
		// $option->FTP->Ip = "http://220.134.227.222";
		// $option->FTP->Port = 21;
		// $option->FTP->User = "hahaha_bot";
		// $option->FTP->Password = "hahaha";
		$option->FTP->Path = "D:/FTP/bot";
		$option->FTP->Setting = "setting.php";

	}
}


