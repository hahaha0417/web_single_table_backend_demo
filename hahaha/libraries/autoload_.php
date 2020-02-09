<?php

namespace hahahalib;

class hahahalib_loader
{
	public static $hahahalib_dir = NULL;

	public static $loader = NULL;

	public static $hahahalib = [];

	public static $autoload_files = [];

	function __construct()
	{
	}

	public static function Class_Mapping()
	{
		self::$hahahalib = [
			"hahahalib" => [
				"external" => [
					"lite" => [
						"_Items" => [
							"hahaha_external_variable_server_lite" => 'hahahalib/native/external_variable/lite/hahaha_external_variable_server_lite.php',
						],
					],
					"_Items" => [
						"hahaha_external_variable_arg" => 'hahahalib/native/external_variable/hahaha_external_variable_arg.php',
						"hahaha_external_variable_cookie" => 'hahahalib/native/external_variable/hahaha_external_variable_cookie.php',
						"hahaha_external_variable_env" => 'hahahalib/native/external_variable/hahaha_external_variable_env.php',
						"hahaha_external_variable_files" => 'hahahalib/native/external_variable/hahaha_external_variable_files.php',
						"hahaha_external_variable_get" => 'hahahalib/native/external_variable/hahaha_external_variable_get.php',
						"hahaha_external_variable_globals" => 'hahahalib/native/external_variable/hahaha_external_variable_globals.php',
						"hahaha_external_variable_post" => 'hahahalib/native/external_variable/hahaha_external_variable_post.php',
						"hahaha_external_variable_request" => 'hahahalib/native/external_variable/hahaha_external_variable_request.php',
						"hahaha_external_variable_server" => 'hahahalib/native/external_variable/hahaha_external_variable_server.php',
						"hahaha_external_variable_session" => 'hahahalib/native/external_variable/hahaha_external_variable_session.php',
					],
				],
				"_Items" => [
					"facebook" => 'hahahalib/composite/facebook/facebook.php',
					"facebook_messenger" => 'hahahalib/composite/facebook/messenger/facebook_messenger.php',
					"linebot_broadcast" => 'hahahalib/composite/line/bot/function/linebot_broadcast.php',
					"linebot_multicast" => 'hahahalib/composite/line/bot/function/linebot_multicast.php',
					"linebot_push_message" => 'hahahalib/composite/line/bot/function/linebot_push_message.php',
					"linebot_reply_message" => 'hahahalib/composite/line/bot/function/linebot_reply_message.php',
					"linebot" => 'hahahalib/composite/line/bot/linebot.php',
					"hahaha_lock_mutex" => 'hahahalib/composite/lock/mutex/hahaha_lock_mutex.php',
					"hahaha_lock_redis" => 'hahahalib/composite/lock/redis/hahaha_lock_redis.php',
					"hahaha_log" => 'hahahalib/composite/log/hahaha_log.php',
					"hahaha_orm_doctrine_base" => 'hahahalib/composite/orm/doctrine/base/hahaha_orm_doctrine_base.php',
					"hahaha_orm_doctrine" => 'hahahalib/composite/orm/doctrine/hahaha_orm_doctrine.php',
					"hahaha_asset" => 'hahahalib/native/asset/hahaha_asset.php',
					"hahaha_function_cli" => 'hahahalib/native/function/hahaha_function_cli.php',
					"hahaha_function_session" => 'hahahalib/native/function/hahaha_function_session.php',
					"hahaha_language" => 'hahahalib/native/language/hahaha_language.php',
					"hahaha_parser_url" => 'hahahalib/native/parser/hahaha_parser_url.php',
					"hahaha_route" => 'hahahalib/native/route/hahaha_route.php',
					"hahaha_class_instance_handle_trait" => 'hahahalib/native/trait/hahaha_class_instance_handle_trait.php',
					"hahaha_class_instance_handle_trait_http" => 'hahahalib/native/trait/hahaha_class_instance_handle_trait_http.php',
					"hahaha_class_instance_handle_trait_lite" => 'hahahalib/native/trait/hahaha_class_instance_handle_trait_lite.php',
					"hahaha_instance_trait" => 'hahahalib/native/trait/hahaha_instance_trait.php',
					"hahaha_view" => 'hahahalib/native/view/hahaha_view.php',
				],
			],
			"_Items" => [
			],
		];
	}

	public static function Autoload_File_Mapping()
	{
		self::$autoload_files = [
		];
	}

	public static function Load_Class_Loader($class)
	{
		// 處理mapping
		if(empty(self::$hahahalib))
		{
			self::Class_Mapping();
		}

		$nodes_ = explode("\\" , $class);

		$find_ = &self::$hahahalib;

		$last_ = count($nodes_) - 1;
		$i = 0;
		foreach($nodes_ as &$node)
		{
			if($i == $last_)
			{
				$find_ = &$find_["_Items"];
				if(empty($temp_ = &$find_[$node]))
				{
					return false;
				}
				$filename_ = &$temp_;
				// 取消reference，避免$temp_ NULL時會加入'key' => NULL
				unset($temp_);

				require self::$hahahalib_dir . $filename_;
			}
			else
			{
				if(empty($temp_ = &$find_[$node]))
				{
					return false;
				}
				$find_ = &$temp_;
				// 取消reference，避免$temp_ NULL時會加入'key' => NULL
				unset($temp_);
				$i++;
			}
		}

	}

	public static function Autoload()
	{
		self::$hahahalib_dir = dirname(__FILE__) . '/';
		if (null !== self::$loader)
		{
			return self::$loader;
		}

		self::$loader = new \hahahalib\hahahalib_loader();
		spl_autoload_register(array('hahahalib\hahahalib_loader', 'Load_Class_Loader'), true, true);

		if(empty(self::$autoload_files))
		{
			self::Autoload_File_Mapping();
		}

		//load autoload files
		// 避免跟其他套件重複引用，這裡用require_once
		foreach (self::$autoload_files as $key => &$file)
		{
			if (empty($GLOBALS['__composer_autoload_files'][$key]))
			{
				require_once self::$hahahalib_dir . $file;
				
				$GLOBALS['__composer_autoload_files'][$key] = true;
			}
		}

		return self::$loader;
	}
}

return \hahahalib\hahahalib_loader::Autoload();