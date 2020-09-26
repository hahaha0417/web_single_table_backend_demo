<?php

namespace hahaha;

class hahaha_option_local
{
	use \hahahalib\hahaha_instance_trait;

	function __construct()
	{

	}

	/*
	初始化腳本
	*/
	public function Initial_Ha($option)
	{
		$option->Line->Channel_Access_Token = 'x/eb6xIldWmwn38EPY8y2lhQJKln2QIrCrikJfUvdxjVnlsGEuFkfSey7V+a0ucKL+lhNUm9YwUwyLmzOJ2RNY7qmPMu5XEp8/SXvG03peOJ69PTF7ZZu0D6Lor5Z+nsc7l2oQ/iGYafjEbVIvuHqAdB04t89/1O/w1cDnyilFU=';
		$option->Line->Channel_Secret = '742e69bbc26d797d8cfdbe7be93a1862';

		// Doctrine
		$option->Doctrine = new \stdClass;
		$option->Doctrine->Develop = true;
		// Mysql
		$option->Mysql->User = 'root';
		$option->Mysql->Password = 'hahaha';
		$option->Mysql->Db_Name = 'test_oring';
	}
	
}
