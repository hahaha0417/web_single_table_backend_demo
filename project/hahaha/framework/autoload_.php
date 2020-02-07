<?php

namespace framework;

class framework_loader
{
	public static $framework_dir = NULL;

	public static $loader = NULL;

	public static $framework = [];

	public static $autoload_files = [];

	function __construct()
	{
	}

	public static function Class_Mapping()
	{
		self::$framework = [
			"hahaha" => [
				"asset" => [
					"_Items" => [
						"hahaha_asset_base" => 'hahaha/base/asset/hahaha_asset_base.php',
					],
				],
				"language" => [
					"_Items" => [
						"hahaha_language_base" => 'hahaha/base/language/hahaha_language_base.php',
					],
				],
				"middleware" => [
					"_Items" => [
						"hahaha_middleware_base" => 'hahaha/base/middleware/hahaha_middleware_base.php',
					],
				],
				"_Items" => [
					"hahaha_application_base" => 'hahaha/base/hahaha_application_base.php',
					"hahaha_asset_base" => 'hahaha/base/hahaha_asset_base.php',
					"hahaha_bootstrap_base" => 'hahaha/base/hahaha_bootstrap_base.php',
					"hahaha_controller_base" => 'hahaha/base/hahaha_controller_base.php',
					"hahaha_flow_base" => 'hahaha/base/hahaha_flow_base.php',
					"hahaha_language_base" => 'hahaha/base/hahaha_language_base.php',
					"hahaha_middleware_base" => 'hahaha/base/hahaha_middleware_base.php',
					"hahaha_model_base" => 'hahaha/base/hahaha_model_base.php',
					"hahaha_route_base" => 'hahaha/base/hahaha_route_base.php',
					"hahaha_view_base" => 'hahaha/base/hahaha_view_base.php',
					"hahaha_instance_trait" => 'hahaha/trait/hahaha_instance_trait.php',
				],
			],
			"ha" => [
				"_Items" => [
					"Application" => 'hahaha/ha/Appication.php',
					"Asset" => 'hahaha/ha/Asset.php',
					"Bootstrap" => 'hahaha/ha/Bootstrap.php',
					"_Global" => 'hahaha/ha/config/Global.php',
					"Option" => 'hahaha/ha/config/Option.php',
					"System_Setting" => 'hahaha/ha/config/System_Setting.php',
					"Arg" => 'hahaha/ha/external/Arg.php',
					"Cookie" => 'hahaha/ha/external/Cookie.php',
					"Files" => 'hahaha/ha/external/Files.php',
					"Get" => 'hahaha/ha/external/Get.php',
					"Globals" => 'hahaha/ha/external/Globals.php',
					"Post" => 'hahaha/ha/external/Post.php',
					"Server" => 'hahaha/ha/external/Server.php',
					"Session" => 'hahaha/ha/external/Session.php',
					"Lang" => 'hahaha/ha/Lang.php',
					"Log" => 'hahaha/ha/Log.php',
					"Route" => 'hahaha/ha/Route.php',
					"Menu" => 'hahaha/ha/table/Menu.php',
					"Parameter" => 'hahaha/ha/table/Parameter.php',
				],
			],
			"_Items" => [
				"ha" => 'hahaha/ha/ha.php',
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
		if(empty(self::$framework))
		{
			self::Class_Mapping();
		}

		$nodes_ = explode("\\" , $class);

		$find_ = &self::$framework;

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

				require self::$framework_dir . $filename_;
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
		self::$framework_dir = dirname(__FILE__) . '/';
		if (null !== self::$loader)
		{
			return self::$loader;
		}

		self::$loader = new \framework\framework_loader();
		spl_autoload_register(array('framework\framework_loader', 'Load_Class_Loader'), true, true);

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
				require_once self::$framework_dir . $file;
				
				$GLOBALS['__composer_autoload_files'][$key] = true;
			}
		}

		return self::$loader;
	}
}

return \framework\framework_loader::Autoload();