<?php

namespace ha;

class Session
{
	use \hahahalib\hahaha_class_instance_handle_trait;

	public static $Class_Name_ = '\hahahalib\external\hahaha_external_variable_session';
	
	public static function Start()
	{
		\hahahalib\hahaha_function_session::Start();
	}

	public static function Destroy()
	{
		\hahahalib\hahaha_function_session::Destroy();
	}

}