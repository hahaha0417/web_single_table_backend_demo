<?php

namespace hahaha;

/*
menu 用來記錄其他資訊


*/
class hahaha_menu
{	
	use \hahahasublib\hahaha_instance_trait;

	function __construct()
	{
		$this->Initial();
	}
	
	public function Initial()
	{
		$this->Initial_Ha($this);
	}

	public function Initial_Ha($menu)
	{
		// 因為這裡沒有php-fpm or swoole，所以Instance都是新流程的
		// $menu->Parameter = \hahaha\hahaha_parameter::Instance();
	}

	
}


