<?php

namespace hahaha;

class hahaha_loader
{
	public static $hahaha_dir = NULL;

	public static $loader = NULL;

	public static $hahaha = [];

	public static $autoload_files = [];

	function __construct()
	{
	}

	public static function Class_Mapping()
	{
		self::$hahaha = [
			"hahaha" => [
				"api" => [
					"facebook" => [
						"bot" => [
							"_Items" => [
								"hahaha_controller" => self::$hahaha_dir . '/app/http/api/v1.0/facebook/bot/hahaha/hahaha_controller.php',
							],
						],
						"_Items" => [
						],
					],
					"line" => [
						"bot" => [
							"common" => [
								"_Items" => [
									"hahaha_controller" => self::$hahaha_dir . '/app/http/api/v1.0/line/bot/common/hahaha_controller.php',
								],
							],
							"hahaha" => [
								"_Items" => [
									"hahaha_controller" => self::$hahaha_dir . '/app/http/api/v1.0/line/bot/hahaha/hahaha_controller.php',
								],
							],
							"_Items" => [
							],
						],
						"_Items" => [
						],
					],
					"_Items" => [
					],
				],
				"controller" => [
					"backend" => [
						"_Items" => [
							"base_controller" => self::$hahaha_dir . '/app/http/controllers/base/base_controller_backend.php',
						],
					],
					"front" => [
						"_Items" => [
							"base_controller" => self::$hahaha_dir . '/app/http/controllers/base/base_controller_front.php',
							"index_controller" => self::$hahaha_dir . '/app/http/controllers/front/index_controller.php',
						],
					],
					"_Items" => [
					],
				],
				"middleware" => [
					"_Items" => [
						"hahaha_middleware_api" => self::$hahaha_dir . '/app/http/middleware/middleware/hahaha_middleware_api.php',
						"hahaha_middleware_web" => self::$hahaha_dir . '/app/http/middleware/middleware/hahaha_middleware_web.php',
						"hahaha_middleware_web_backend" => self::$hahaha_dir . '/app/http/middleware/middleware/web/hahaha_middleware_web_backend.php',
						"hahaha_middleware_web_front" => self::$hahaha_dir . '/app/http/middleware/middleware/web/hahaha_middleware_web_front.php',
						"hahaha_middleware_base" => self::$hahaha_dir . '/framework/hahaha/base/middleware/hahaha_middleware_base.php',
					],
				],
				"view" => [
					"front" => [
						"_Items" => [
							"index_view_sample" => self::$hahaha_dir . '/app/http/views/index_view_sample.php',
						],
					],
					"module" => [
						"front" => [
							"_Items" => [
								"common_home_main_home_view" => self::$hahaha_dir . '/app/http/views/module/front/common/home/main_home/main_home.php',
								"common_nav_main_nav_view" => self::$hahaha_dir . '/app/http/views/module/front/common/nav/main_nav.php',
								"common_tail_main_tail_view" => self::$hahaha_dir . '/app/http/views/module/front/common/tail/main_tail.php',
								"index_index_control" => self::$hahaha_dir . '/app/http/views/module/front/index/index_control.php',
							],
						],
						"integrate" => [
							"_Items" => [
								"control_main_control" => self::$hahaha_dir . '/app/http/views/module/integrate/control/main_control/main_control.php',
							],
						],
						"_Items" => [
						],
					],
					"web" => [
						"common" => [
							"_Items" => [
								"main_view" => self::$hahaha_dir . '/app/http/views/web/common/main_view.php',
								"sub_view" => self::$hahaha_dir . '/app/http/views/web/common/sub_view.php',
							],
						],
						"front" => [
							"_Items" => [
								"main_home_feature_view" => self::$hahaha_dir . '/app/http/views/web/front/common/home/main_home/main_home_feature.php',
								"main_home_overview_view" => self::$hahaha_dir . '/app/http/views/web/front/common/home/main_home/main_home_overview.php',
								"index_view" => self::$hahaha_dir . '/app/http/views/web/front/index_view.php',
							],
						],
						"_Items" => [
						],
					],
					"_Items" => [
					],
				],
				"asset" => [
					"normal" => [
						"set" => [
							"_Items" => [
								"hahaha_asset_class" => self::$hahaha_dir . '/resources/assets/normal/hahaha_asset/hahaha_asset_class.php',
								"hahaha_asset_class2" => self::$hahaha_dir . '/resources/assets/normal/hahaha_asset/hahaha_asset_class2.php',
							],
						],
						"_Items" => [
							"hahaha_asset" => self::$hahaha_dir . '/resources/assets/normal/hahaha_asset.php',
						],
					],
					"_Items" => [
						"hahaha_asset_base" => self::$hahaha_dir . '/framework/hahaha/base/asset/hahaha_asset_base.php',
					],
				],
				"language" => [
					"en" => [
						"_Items" => [
							"hahaha_language" => self::$hahaha_dir . '/resources/languages/en/hahaha_language.php',
						],
					],
					"tw" => [
						"set" => [
							"_Items" => [
								"hahaha_language_class" => self::$hahaha_dir . '/resources/languages/tw/hahaha_language/hahaha_language_class.php',
								"hahaha_language_class2" => self::$hahaha_dir . '/resources/languages/tw/hahaha_language/hahaha_language_class2.php',
							],
						],
						"_Items" => [
							"hahaha_language" => self::$hahaha_dir . '/resources/languages/tw/hahaha_language.php',
						],
					],
					"_Items" => [
						"hahaha_language_base" => self::$hahaha_dir . '/framework/hahaha/base/language/hahaha_language_base.php',
					],
				],
				"_Items" => [
					"hahaha_application" => self::$hahaha_dir . '/app/hahaha_application.php',
					"hahaha_monitor" => self::$hahaha_dir . '/app/hahaha_monitor.php',
					"hahaha_middleware" => self::$hahaha_dir . '/app/http/middleware/hahaha_middleware.php',
					"hahaha_route" => self::$hahaha_dir . '/app/http/routes/hahaha_route.php',
					"hahaha_asset" => self::$hahaha_dir . '/app/resources/assets/hahaha_asset.php',
					"hahaha_language" => self::$hahaha_dir . '/app/resources/languages/hahaha_language.php',
					"hahaha_loader" => self::$hahaha_dir . '/autoload_.php',
					"hahaha_bootstrap" => self::$hahaha_dir . '/bootstrap/hahaha_bootstrap.php',
					"hahaha_bootstrap_abc" => self::$hahaha_dir . '/bootstrap/hahaha_bootstrap_abc.php',
					"hahaha_global" => self::$hahaha_dir . '/config/global/hahaha_global.php',
					"hahaha_global_default" => self::$hahaha_dir . '/config/global/hahaha_global_default.php',
					"hahaha_global_local" => self::$hahaha_dir . '/config/global/hahaha_global_local.php',
					"hahaha_option" => self::$hahaha_dir . '/config/option/hahaha_option.php',
					"hahaha_option_default" => self::$hahaha_dir . '/config/option/hahaha_option_default.php',
					"hahaha_option_local" => self::$hahaha_dir . '/config/option/hahaha_option_local.php',
					"hahaha_system_setting" => self::$hahaha_dir . '/config/system_setting/hahaha_system_setting.php',
					"hahaha_system_setting_default" => self::$hahaha_dir . '/config/system_setting/hahaha_system_setting_default.php',
					"hahaha_system_setting_local" => self::$hahaha_dir . '/config/system_setting/hahaha_system_setting_local.php',
					"hahaha_flow" => self::$hahaha_dir . '/flow/hahaha_flow.php',
					"hahaha_flow_time" => self::$hahaha_dir . '/flow/hahaha_flow_time.php',
					"hahaha_application_base" => self::$hahaha_dir . '/framework/hahaha/base/hahaha_application_base.php',
					"hahaha_asset_base" => self::$hahaha_dir . '/framework/hahaha/base/hahaha_asset_base.php',
					"hahaha_bootstrap_base" => self::$hahaha_dir . '/framework/hahaha/base/hahaha_bootstrap_base.php',
					"hahaha_controller_base" => self::$hahaha_dir . '/framework/hahaha/base/hahaha_controller_base.php',
					"hahaha_flow_base" => self::$hahaha_dir . '/framework/hahaha/base/hahaha_flow_base.php',
					"hahaha_language_base" => self::$hahaha_dir . '/framework/hahaha/base/hahaha_language_base.php',
					"hahaha_middleware_base" => self::$hahaha_dir . '/framework/hahaha/base/hahaha_middleware_base.php',
					"hahaha_model_base" => self::$hahaha_dir . '/framework/hahaha/base/hahaha_model_base.php',
					"hahaha_route_base" => self::$hahaha_dir . '/framework/hahaha/base/hahaha_route_base.php',
					"hahaha_view_base" => self::$hahaha_dir . '/framework/hahaha/base/hahaha_view_base.php',
					"hahaha_instance_trait" => self::$hahaha_dir . '/framework/hahaha/trait/hahaha_instance_trait.php',
					"hahaha_menu" => self::$hahaha_dir . '/table/hahaha_menu.php',
					"hahaha_parameter" => self::$hahaha_dir . '/table/hahaha_parameter.php',
				],
			],
			"front" => [
				"index" => [
					"_Items" => [
						"A_Index" => self::$hahaha_dir . '/app/http/models/front/index/A_Index.php',
						"A_Item" => self::$hahaha_dir . '/app/http/models/front/index/A_Item.php',
						"A_Temp" => self::$hahaha_dir . '/app/http/models/front/index/A_Temp.php',
					],
				],
				"_Items" => [
				],
			],
			"framework" => [
				"_Items" => [
					"framework_loader" => self::$hahaha_dir . '/framework/autoload_.php',
				],
			],
			"ha" => [
				"_Items" => [
					"App" => self::$hahaha_dir . '/framework/hahaha/ha/App.php',
					"Application" => self::$hahaha_dir . '/framework/hahaha/ha/Appication.php',
					"Asset" => self::$hahaha_dir . '/framework/hahaha/ha/Asset.php',
					"Bootstrap" => self::$hahaha_dir . '/framework/hahaha/ha/Bootstrap.php',
					"Cache" => self::$hahaha_dir . '/framework/hahaha/ha/Cache.php',
					"_Global" => self::$hahaha_dir . '/framework/hahaha/ha/config/Global.php',
					"Option" => self::$hahaha_dir . '/framework/hahaha/ha/config/Option.php',
					"System_Setting" => self::$hahaha_dir . '/framework/hahaha/ha/config/System_Setting.php',
					"Email" => self::$hahaha_dir . '/framework/hahaha/ha/Email.php',
					"Arg" => self::$hahaha_dir . '/framework/hahaha/ha/external/Arg.php',
					"Cookie" => self::$hahaha_dir . '/framework/hahaha/ha/external/Cookie.php',
					"Files" => self::$hahaha_dir . '/framework/hahaha/ha/external/Files.php',
					"Get" => self::$hahaha_dir . '/framework/hahaha/ha/external/Get.php',
					"Globals" => self::$hahaha_dir . '/framework/hahaha/ha/external/Globals.php',
					"Post" => self::$hahaha_dir . '/framework/hahaha/ha/external/Post.php',
					"Server" => self::$hahaha_dir . '/framework/hahaha/ha/external/Server.php',
					"Session" => self::$hahaha_dir . '/framework/hahaha/ha/external/Session.php',
					"Lang" => self::$hahaha_dir . '/framework/hahaha/ha/Lang.php',
					"Log" => self::$hahaha_dir . '/framework/hahaha/ha/Log.php',
					"Route" => self::$hahaha_dir . '/framework/hahaha/ha/Route.php',
					"Menu" => self::$hahaha_dir . '/framework/hahaha/ha/table/Menu.php',
					"Parameter" => self::$hahaha_dir . '/framework/hahaha/ha/table/Parameter.php',
				],
			],
			"hahahalib" => [
				"cache" => [
					"_Items" => [
						"hahaha_cache_doctrine" => self::$hahaha_dir . '/libraries/hahahalib/composite/cache/doctrine/hahaha_cache_doctrine.php',
					],
				],
				"command" => [
					"_Items" => [
						"hahaha_command_christiaan" => self::$hahaha_dir . '/libraries/hahahalib/composite/command/christiaan/hahaha_command_christiaan.php',
						"hahaha_command_ravisorg" => self::$hahaha_dir . '/libraries/hahahalib/composite/command/ravisorg/hahaha_command_ravisorg.php',
						"hahaha_command_tivie" => self::$hahaha_dir . '/libraries/hahahalib/composite/command/tivie/hahaha_command_tivie.php',
					],
				],
				"css" => [
					"_Items" => [
						"hahaha_css_css_to_inline_styles" => self::$hahaha_dir . '/libraries/hahahalib/composite/css/css_to_illine_styles/hahaha_css_css_to_inline_styles.php',
					],
				],
				"email" => [
					"_Items" => [
						"hahaha_email_php_mailler" => self::$hahaha_dir . '/libraries/hahahalib/composite/email/php_mailler/hahaha_email_php_mailler.php',
						"hahaha_email_swift_mailler" => self::$hahaha_dir . '/libraries/hahahalib/composite/email/swift_maller/hahaha_email_swift_mailler.php',
						"hahaha_email_validator" => self::$hahaha_dir . '/libraries/hahahalib/composite/email/validator/hahaha_email_validator.php',
					],
				],
				"facebook" => [
					"_Items" => [
						"hahaha_facebook" => self::$hahaha_dir . '/libraries/hahahalib/composite/facebook/hahaha_facebook.php',
						"hahaha_facebook_messenger" => self::$hahaha_dir . '/libraries/hahahalib/composite/facebook/messenger/hahaha_facebook_messenger.php',
					],
				],
				"line" => [
					"_Items" => [
						"hahaha_linebot_broadcast" => self::$hahaha_dir . '/libraries/hahahalib/composite/line/bot/function/hahaha_linebot_broadcast.php',
						"hahaha_linebot_multicast" => self::$hahaha_dir . '/libraries/hahahalib/composite/line/bot/function/hahaha_linebot_multicast.php',
						"hahaha_linebot_push_message" => self::$hahaha_dir . '/libraries/hahahalib/composite/line/bot/function/hahaha_linebot_push_message.php',
						"hahaha_linebot_reply_message" => self::$hahaha_dir . '/libraries/hahahalib/composite/line/bot/function/hahaha_linebot_reply_message.php',
						"hahaha_linebot" => self::$hahaha_dir . '/libraries/hahahalib/composite/line/bot/hahaha_linebot.php',
					],
				],
				"Extend" => [
					"ExecParallel" => [
						"_Items" => [
							"Job" => self::$hahaha_dir . '/libraries/hahahalib/extend/command/ravisorg/Job.php',
						],
					],
					"_Items" => [
					],
				],
				"external" => [
					"lite" => [
						"_Items" => [
							"hahaha_external_variable_server_lite" => self::$hahaha_dir . '/libraries/hahahalib/native/external_variable/lite/hahaha_external_variable_server_lite.php',
						],
					],
					"_Items" => [
						"hahaha_external_variable_arg" => self::$hahaha_dir . '/libraries/hahahalib/native/external_variable/hahaha_external_variable_arg.php',
						"hahaha_external_variable_cookie" => self::$hahaha_dir . '/libraries/hahahalib/native/external_variable/hahaha_external_variable_cookie.php',
						"hahaha_external_variable_env" => self::$hahaha_dir . '/libraries/hahahalib/native/external_variable/hahaha_external_variable_env.php',
						"hahaha_external_variable_files" => self::$hahaha_dir . '/libraries/hahahalib/native/external_variable/hahaha_external_variable_files.php',
						"hahaha_external_variable_get" => self::$hahaha_dir . '/libraries/hahahalib/native/external_variable/hahaha_external_variable_get.php',
						"hahaha_external_variable_globals" => self::$hahaha_dir . '/libraries/hahahalib/native/external_variable/hahaha_external_variable_globals.php',
						"hahaha_external_variable_post" => self::$hahaha_dir . '/libraries/hahahalib/native/external_variable/hahaha_external_variable_post.php',
						"hahaha_external_variable_request" => self::$hahaha_dir . '/libraries/hahahalib/native/external_variable/hahaha_external_variable_request.php',
						"hahaha_external_variable_server" => self::$hahaha_dir . '/libraries/hahahalib/native/external_variable/hahaha_external_variable_server.php',
						"hahaha_external_variable_session" => self::$hahaha_dir . '/libraries/hahahalib/native/external_variable/hahaha_external_variable_session.php',
					],
				],
				"_Items" => [
					"hahahalib_loader" => self::$hahaha_dir . '/libraries/autoload_.php',
					"hahaha_lock_mutex" => self::$hahaha_dir . '/libraries/hahahalib/composite/lock/mutex/hahaha_lock_mutex.php',
					"hahaha_lock_redis" => self::$hahaha_dir . '/libraries/hahahalib/composite/lock/redis/hahaha_lock_redis.php',
					"hahaha_log" => self::$hahaha_dir . '/libraries/hahahalib/composite/log/hahaha_log.php',
					"hahaha_orm_doctrine_base" => self::$hahaha_dir . '/libraries/hahahalib/composite/orm/doctrine/base/hahaha_orm_doctrine_base.php',
					"hahaha_orm_doctrine" => self::$hahaha_dir . '/libraries/hahahalib/composite/orm/doctrine/hahaha_orm_doctrine.php',
					"hahaha_api_curl" => self::$hahaha_dir . '/libraries/hahahalib/native/api/curl/hahaha_api_curl.php',
					"hahaha_asset" => self::$hahaha_dir . '/libraries/hahahalib/native/asset/hahaha_asset.php',
					"hahaha_crypt_pro_crypt" => self::$hahaha_dir . '/libraries/hahahalib/native/crypt/hahaha_crypt_pro_crypt.php',
					"hahaha_db_mysql" => self::$hahaha_dir . '/libraries/hahahalib/native/db/mysql/hahaha_db_mysql.php',
					"hahaha_function_cli" => self::$hahaha_dir . '/libraries/hahahalib/native/function/hahaha_function_cli.php',
					"hahaha_function_session" => self::$hahaha_dir . '/libraries/hahahalib/native/function/hahaha_function_session.php',
					"hahaha_language" => self::$hahaha_dir . '/libraries/hahahalib/native/language/hahaha_language.php',
					"hahaha_parser_url" => self::$hahaha_dir . '/libraries/hahahalib/native/parser/hahaha_parser_url.php',
					"hahaha_route" => self::$hahaha_dir . '/libraries/hahahalib/native/route/hahaha_route.php',
					"hahaha_computer" => self::$hahaha_dir . '/libraries/hahahalib/native/thread/hahaha_computer.php',
					"hahha_time" => self::$hahaha_dir . '/libraries/hahahalib/native/time/hahaha_time.php',
					"hahaha_bind_trait" => self::$hahaha_dir . '/libraries/hahahalib/native/trait/hahaha_bind_trait.php',
					"hahaha_class_instance_handle_trait" => self::$hahaha_dir . '/libraries/hahahalib/native/trait/hahaha_class_instance_handle_trait.php',
					"hahaha_class_instance_handle_trait_http" => self::$hahaha_dir . '/libraries/hahahalib/native/trait/hahaha_class_instance_handle_trait_http.php',
					"hahaha_class_instance_handle_trait_lite" => self::$hahaha_dir . '/libraries/hahahalib/native/trait/hahaha_class_instance_handle_trait_lite.php',
					"hahaha_instance_trait" => self::$hahaha_dir . '/libraries/hahahalib/native/trait/hahaha_instance_trait.php',
					"hahaha_view" => self::$hahaha_dir . '/libraries/hahahalib/native/view/hahaha_view.php',
				],
			],
			"vendor" => [
				"_Items" => [
					"vendor_loader" => self::$hahaha_dir . '/vendor/autoload_.php',
				],
			],
			"BotMan" => [
				"BotMan" => [
					"Cache" => [
						"_Items" => [
							"ArrayCache" => self::$hahaha_dir . '/vendor/botman/botman/src/Cache/ArrayCache.php',
							"CodeIgniterCache" => self::$hahaha_dir . '/vendor/botman/botman/src/Cache/CodeIgniterCache.php',
							"DoctrineCache" => self::$hahaha_dir . '/vendor/botman/botman/src/Cache/DoctrineCache.php',
							"LaravelCache" => self::$hahaha_dir . '/vendor/botman/botman/src/Cache/LaravelCache.php',
							"Psr6Cache" => self::$hahaha_dir . '/vendor/botman/botman/src/Cache/Psr6Cache.php',
							"RedisCache" => self::$hahaha_dir . '/vendor/botman/botman/src/Cache/RedisCache.php',
							"SymfonyCache" => self::$hahaha_dir . '/vendor/botman/botman/src/Cache/SymfonyCache.php',
						],
					],
					"Commands" => [
						"_Items" => [
							"Command" => self::$hahaha_dir . '/vendor/botman/botman/src/Commands/Command.php',
							"ConversationManager" => self::$hahaha_dir . '/vendor/botman/botman/src/Commands/ConversationManager.php',
						],
					],
					"Container" => [
						"_Items" => [
							"LaravelContainer" => self::$hahaha_dir . '/vendor/botman/botman/src/Container/LaravelContainer.php',
						],
					],
					"Drivers" => [
						"Events" => [
							"_Items" => [
								"GenericEvent" => self::$hahaha_dir . '/vendor/botman/botman/src/Drivers/Events/GenericEvent.php',
							],
						],
						"_Items" => [
							"DriverManager" => self::$hahaha_dir . '/vendor/botman/botman/src/Drivers/DriverManager.php',
							"HttpDriver" => self::$hahaha_dir . '/vendor/botman/botman/src/Drivers/HttpDriver.php',
							"NullDriver" => self::$hahaha_dir . '/vendor/botman/botman/src/Drivers/NullDriver.php',
						],
					],
					"Exceptions" => [
						"Base" => [
							"_Items" => [
								"BotManException" => self::$hahaha_dir . '/vendor/botman/botman/src/Exceptions/Base/BotManException.php',
								"DriverAttachmentException" => self::$hahaha_dir . '/vendor/botman/botman/src/Exceptions/Base/DriverAttachmentException.php',
								"DriverException" => self::$hahaha_dir . '/vendor/botman/botman/src/Exceptions/Base/DriverException.php',
							],
						],
						"Core" => [
							"_Items" => [
								"BadMethodCallException" => self::$hahaha_dir . '/vendor/botman/botman/src/Exceptions/Core/BadMethodCallException.php',
								"UnexpectedValueException" => self::$hahaha_dir . '/vendor/botman/botman/src/Exceptions/Core/UnexpectedValueException.php',
							],
						],
						"_Items" => [
						],
					],
					"Facades" => [
						"_Items" => [
							"BotMan" => self::$hahaha_dir . '/vendor/botman/botman/src/Facades/BotMan.php',
						],
					],
					"Handlers" => [
						"_Items" => [
							"ExceptionHandler" => self::$hahaha_dir . '/vendor/botman/botman/src/Handlers/ExceptionHandler.php',
						],
					],
					"Http" => [
						"_Items" => [
							"Curl" => self::$hahaha_dir . '/vendor/botman/botman/src/Http/Curl.php',
						],
					],
					"Interfaces" => [
						"Middleware" => [
							"_Items" => [
								"Captured" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/Middleware/Captured.php',
								"Heard" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/Middleware/Heard.php',
								"Matching" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/Middleware/Matching.php',
								"Received" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/Middleware/Received.php',
								"Sending" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/Middleware/Sending.php',
							],
						],
						"_Items" => [
							"CacheInterface" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/CacheInterface.php',
							"DriverEventInterface" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/DriverEventInterface.php',
							"DriverInterface" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/DriverInterface.php',
							"ExceptionHandlerInterface" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/ExceptionHandlerInterface.php',
							"HttpInterface" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/HttpInterface.php',
							"MiddlewareInterface" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/MiddlewareInterface.php',
							"QuestionActionInterface" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/QuestionActionInterface.php',
							"ShouldQueue" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/ShouldQueue.php',
							"StorageInterface" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/StorageInterface.php',
							"UserInterface" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/UserInterface.php',
							"VerifiesService" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/VerifiesService.php',
							"WebAccess" => self::$hahaha_dir . '/vendor/botman/botman/src/Interfaces/WebAccess.php',
						],
					],
					"Messages" => [
						"Attachments" => [
							"_Items" => [
								"Attachment" => self::$hahaha_dir . '/vendor/botman/botman/src/Messages/Attachments/Attachment.php',
								"Audio" => self::$hahaha_dir . '/vendor/botman/botman/src/Messages/Attachments/Audio.php',
								"Contact" => self::$hahaha_dir . '/vendor/botman/botman/src/Messages/Attachments/Contact.php',
								"File" => self::$hahaha_dir . '/vendor/botman/botman/src/Messages/Attachments/File.php',
								"Image" => self::$hahaha_dir . '/vendor/botman/botman/src/Messages/Attachments/Image.php',
								"Location" => self::$hahaha_dir . '/vendor/botman/botman/src/Messages/Attachments/Location.php',
								"Video" => self::$hahaha_dir . '/vendor/botman/botman/src/Messages/Attachments/Video.php',
							],
						],
						"Conversations" => [
							"_Items" => [
								"Conversation" => self::$hahaha_dir . '/vendor/botman/botman/src/Messages/Conversations/Conversation.php',
								"InlineConversation" => self::$hahaha_dir . '/vendor/botman/botman/src/Messages/Conversations/InlineConversation.php',
							],
						],
						"Incoming" => [
							"_Items" => [
								"Answer" => self::$hahaha_dir . '/vendor/botman/botman/src/Messages/Incoming/Answer.php',
								"IncomingMessage" => self::$hahaha_dir . '/vendor/botman/botman/src/Messages/Incoming/IncomingMessage.php',
							],
						],
						"Matching" => [
							"_Items" => [
								"MatchingMessage" => self::$hahaha_dir . '/vendor/botman/botman/src/Messages/Matching/MatchingMessage.php',
							],
						],
						"Outgoing" => [
							"Actions" => [
								"_Items" => [
									"Button" => self::$hahaha_dir . '/vendor/botman/botman/src/Messages/Outgoing/Actions/Button.php',
								],
							],
							"_Items" => [
								"OutgoingMessage" => self::$hahaha_dir . '/vendor/botman/botman/src/Messages/Outgoing/OutgoingMessage.php',
								"Question" => self::$hahaha_dir . '/vendor/botman/botman/src/Messages/Outgoing/Question.php',
							],
						],
						"_Items" => [
							"Matcher" => self::$hahaha_dir . '/vendor/botman/botman/src/Messages/Matcher.php',
						],
					],
					"Middleware" => [
						"_Items" => [
							"ApiAi" => self::$hahaha_dir . '/vendor/botman/botman/src/Middleware/ApiAi.php',
							"Dialogflow" => self::$hahaha_dir . '/vendor/botman/botman/src/Middleware/Dialogflow.php',
							"MiddlewareManager" => self::$hahaha_dir . '/vendor/botman/botman/src/Middleware/MiddlewareManager.php',
							"Wit" => self::$hahaha_dir . '/vendor/botman/botman/src/Middleware/Wit.php',
						],
					],
					"Storages" => [
						"Drivers" => [
							"_Items" => [
								"FileStorage" => self::$hahaha_dir . '/vendor/botman/botman/src/Storages/Drivers/FileStorage.php',
								"RedisStorage" => self::$hahaha_dir . '/vendor/botman/botman/src/Storages/Drivers/RedisStorage.php',
							],
						],
						"_Items" => [
							"Storage" => self::$hahaha_dir . '/vendor/botman/botman/src/Storages/Storage.php',
						],
					],
					"Traits" => [
						"_Items" => [
							"HandlesConversations" => self::$hahaha_dir . '/vendor/botman/botman/src/Traits/HandlesConversations.php',
							"HandlesExceptions" => self::$hahaha_dir . '/vendor/botman/botman/src/Traits/HandlesExceptions.php',
							"ProvidesStorage" => self::$hahaha_dir . '/vendor/botman/botman/src/Traits/ProvidesStorage.php',
						],
					],
					"Users" => [
						"_Items" => [
							"User" => self::$hahaha_dir . '/vendor/botman/botman/src/Users/User.php',
						],
					],
					"_Items" => [
						"BotMan" => self::$hahaha_dir . '/vendor/botman/botman/src/BotMan.php',
						"BotManFactory" => self::$hahaha_dir . '/vendor/botman/botman/src/BotManFactory.php',
						"BotManServiceProvider" => self::$hahaha_dir . '/vendor/botman/botman/src/BotManServiceProvider.php',
					],
				],
				"Drivers" => [
					"Facebook" => [
						"Commands" => [
							"_Items" => [
								"AddGreetingText" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Commands/AddGreetingText.php',
								"AddPersistentMenu" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Commands/AddPersistentMenu.php',
								"AddStartButtonPayload" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Commands/AddStartButtonPayload.php',
								"Nlp" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Commands/Nlp.php',
								"WhitelistDomains" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Commands/WhitelistDomains.php',
							],
						],
						"Events" => [
							"_Items" => [
								"FacebookEvent" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Events/FacebookEvent.php',
								"MessagingAccountLinking" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Events/MessagingAccountLinking.php',
								"MessagingCheckoutUpdates" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Events/MessagingCheckoutUpdates.php',
								"MessagingDeliveries" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Events/MessagingDeliveries.php',
								"MessagingOptins" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Events/MessagingOptins.php',
								"MessagingPostbacks" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Events/MessagingPostbacks.php',
								"MessagingReads" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Events/MessagingReads.php',
								"MessagingReferrals" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Events/MessagingReferrals.php',
							],
						],
						"Exceptions" => [
							"_Items" => [
								"FacebookException" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Exceptions/FacebookException.php',
							],
						],
						"Extensions" => [
							"Airline" => [
								"_Items" => [
									"AbstractAirlineFlightInfo" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/Airline/AbstractAirlineFlightInfo.php',
									"AirlineAirport" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/Airline/AirlineAirport.php',
									"AirlineBoardingPass" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/Airline/AirlineBoardingPass.php',
									"AirlineExtendedFlightInfo" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/Airline/AirlineExtendedFlightInfo.php',
									"AirlineFlightInfo" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/Airline/AirlineFlightInfo.php',
									"AirlineFlightSchedule" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/Airline/AirlineFlightSchedule.php',
									"AirlinePassengerInfo" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/Airline/AirlinePassengerInfo.php',
									"AirlinePassengerSegmentInfo" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/Airline/AirlinePassengerSegmentInfo.php',
								],
							],
							"_Items" => [
								"AbstractAirlineTemplate" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/AbstractAirlineTemplate.php',
								"AirlineBoardingPassTemplate" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/AirlineBoardingPassTemplate.php',
								"AirlineCheckInTemplate" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/AirlineCheckInTemplate.php',
								"AirlineItineraryTemplate" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/AirlineItineraryTemplate.php',
								"AirlineUpdateTemplate" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/AirlineUpdateTemplate.php',
								"ButtonTemplate" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/ButtonTemplate.php',
								"Element" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/Element.php',
								"ElementButton" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/ElementButton.php',
								"GenericTemplate" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/GenericTemplate.php',
								"ListTemplate" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/ListTemplate.php',
								"MediaAttachmentElement" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/MediaAttachmentElement.php',
								"MediaTemplate" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/MediaTemplate.php',
								"MediaUrlElement" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/MediaUrlElement.php',
								"OpenGraphElement" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/OpenGraphElement.php',
								"OpenGraphTemplate" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/OpenGraphTemplate.php',
								"QuickReplyButton" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/QuickReplyButton.php',
								"ReceiptAddress" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/ReceiptAddress.php',
								"ReceiptAdjustment" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/ReceiptAdjustment.php',
								"ReceiptElement" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/ReceiptElement.php',
								"ReceiptSummary" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/ReceiptSummary.php',
								"ReceiptTemplate" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/ReceiptTemplate.php',
								"User" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Extensions/User.php',
							],
						],
						"Interfaces" => [
							"_Items" => [
								"Airline" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Interfaces/Airline.php',
							],
						],
						"Providers" => [
							"_Items" => [
								"FacebookServiceProvider" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/Providers/FacebookServiceProvider.php',
							],
						],
						"_Items" => [
							"FacebookAudioDriver" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/FacebookAudioDriver.php',
							"FacebookDriver" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/FacebookDriver.php',
							"FacebookFileDriver" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/FacebookFileDriver.php',
							"FacebookImageDriver" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/FacebookImageDriver.php',
							"FacebookLocationDriver" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/FacebookLocationDriver.php',
							"FacebookVideoDriver" => self::$hahaha_dir . '/vendor/botman/driver-facebook/src/FacebookVideoDriver.php',
						],
					],
					"_Items" => [
					],
				],
				"_Items" => [
				],
			],
			"Christiaan" => [
				"StreamProcess" => [
					"_Items" => [
						"Exception" => self::$hahaha_dir . '/vendor/christiaan/stream-process/src/Christiaan/StreamProcess/Exception.php',
						"StreamProcess" => self::$hahaha_dir . '/vendor/christiaan/stream-process/src/Christiaan/StreamProcess/StreamProcess.php',
					],
				],
				"_Items" => [
				],
			],
			"Composer" => [
				"Autoload" => [
					"_Items" => [
						"ComposerStaticInited52258c47506bb06cd8d32fdf88156a" => self::$hahaha_dir . '/vendor/composer/autoload_static.php',
						"ClassLoader" => self::$hahaha_dir . '/vendor/composer/ClassLoader.php',
					],
				],
				"_Items" => [
				],
			],
			"Doctrine" => [
				"Common" => [
					"Annotations" => [
						"Annotation" => [
							"_Items" => [
								"Attribute" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/Annotation/Attribute.php',
								"Attributes" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/Annotation/Attributes.php',
								"Enum" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/Annotation/Enum.php',
								"IgnoreAnnotation" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/Annotation/IgnoreAnnotation.php',
								"Required" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/Annotation/Required.php',
								"Target" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/Annotation/Target.php',
							],
						],
						"_Items" => [
							"Annotation" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/Annotation.php',
							"AnnotationException" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/AnnotationException.php',
							"AnnotationReader" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/AnnotationReader.php',
							"AnnotationRegistry" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/AnnotationRegistry.php',
							"CachedReader" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/CachedReader.php',
							"DocLexer" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/DocLexer.php',
							"DocParser" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/DocParser.php',
							"FileCacheReader" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/FileCacheReader.php',
							"IndexedReader" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/IndexedReader.php',
							"PhpParser" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/PhpParser.php',
							"Reader" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/Reader.php',
							"SimpleAnnotationReader" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/SimpleAnnotationReader.php',
							"TokenParser" => self::$hahaha_dir . '/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/TokenParser.php',
						],
					],
					"Cache" => [
						"_Items" => [
							"ApcCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/ApcCache.php',
							"ApcuCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/ApcuCache.php',
							"ArrayCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/ArrayCache.php',
							"Cache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/Cache.php',
							"CacheProvider" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/CacheProvider.php',
							"ChainCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/ChainCache.php',
							"ClearableCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/ClearableCache.php',
							"CouchbaseBucketCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/CouchbaseBucketCache.php',
							"CouchbaseCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/CouchbaseCache.php',
							"ExtMongoDBCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/ExtMongoDBCache.php',
							"FileCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/FileCache.php',
							"FilesystemCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/FilesystemCache.php',
							"FlushableCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/FlushableCache.php',
							"LegacyMongoDBCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/LegacyMongoDBCache.php',
							"MemcacheCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/MemcacheCache.php',
							"MemcachedCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/MemcachedCache.php',
							"MongoDBCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/MongoDBCache.php',
							"MultiDeleteCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/MultiDeleteCache.php',
							"MultiGetCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/MultiGetCache.php',
							"MultiOperationCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/MultiOperationCache.php',
							"MultiPutCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/MultiPutCache.php',
							"PhpFileCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/PhpFileCache.php',
							"PredisCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/PredisCache.php',
							"RedisCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/RedisCache.php',
							"RiakCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/RiakCache.php',
							"SQLite3Cache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/SQLite3Cache.php',
							"Version" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/Version.php',
							"VoidCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/VoidCache.php',
							"WinCacheCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/WinCacheCache.php',
							"XcacheCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/XcacheCache.php',
							"ZendDataCache" => self::$hahaha_dir . '/vendor/doctrine/cache/lib/Doctrine/Common/Cache/ZendDataCache.php',
						],
					],
					"Collections" => [
						"Expr" => [
							"_Items" => [
								"ClosureExpressionVisitor" => self::$hahaha_dir . '/vendor/doctrine/collections/lib/Doctrine/Common/Collections/Expr/ClosureExpressionVisitor.php',
								"Comparison" => self::$hahaha_dir . '/vendor/doctrine/collections/lib/Doctrine/Common/Collections/Expr/Comparison.php',
								"CompositeExpression" => self::$hahaha_dir . '/vendor/doctrine/collections/lib/Doctrine/Common/Collections/Expr/CompositeExpression.php',
								"Expression" => self::$hahaha_dir . '/vendor/doctrine/collections/lib/Doctrine/Common/Collections/Expr/Expression.php',
								"ExpressionVisitor" => self::$hahaha_dir . '/vendor/doctrine/collections/lib/Doctrine/Common/Collections/Expr/ExpressionVisitor.php',
								"Value" => self::$hahaha_dir . '/vendor/doctrine/collections/lib/Doctrine/Common/Collections/Expr/Value.php',
							],
						],
						"_Items" => [
							"AbstractLazyCollection" => self::$hahaha_dir . '/vendor/doctrine/collections/lib/Doctrine/Common/Collections/AbstractLazyCollection.php',
							"ArrayCollection" => self::$hahaha_dir . '/vendor/doctrine/collections/lib/Doctrine/Common/Collections/ArrayCollection.php',
							"Collection" => self::$hahaha_dir . '/vendor/doctrine/collections/lib/Doctrine/Common/Collections/Collection.php',
							"Criteria" => self::$hahaha_dir . '/vendor/doctrine/collections/lib/Doctrine/Common/Collections/Criteria.php',
							"ExpressionBuilder" => self::$hahaha_dir . '/vendor/doctrine/collections/lib/Doctrine/Common/Collections/ExpressionBuilder.php',
							"Selectable" => self::$hahaha_dir . '/vendor/doctrine/collections/lib/Doctrine/Common/Collections/Selectable.php',
						],
					],
					"Proxy" => [
						"Exception" => [
							"_Items" => [
								"InvalidArgumentException" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/Proxy/Exception/InvalidArgumentException.php',
								"OutOfBoundsException" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/Proxy/Exception/OutOfBoundsException.php',
								"ProxyException" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/Proxy/Exception/ProxyException.php',
								"UnexpectedValueException" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/Proxy/Exception/UnexpectedValueException.php',
							],
						],
						"_Items" => [
							"AbstractProxyFactory" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/Proxy/AbstractProxyFactory.php',
							"Autoloader" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/Proxy/Autoloader.php',
							"Proxy" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/Proxy/Proxy.php',
							"ProxyDefinition" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/Proxy/ProxyDefinition.php',
							"ProxyGenerator" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/Proxy/ProxyGenerator.php',
						],
					],
					"Util" => [
						"_Items" => [
							"ClassUtils" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/Util/ClassUtils.php',
							"Debug" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/Util/Debug.php',
							"Inflector" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/Util/Inflector.php',
						],
					],
					"Inflector" => [
						"_Items" => [
							"Inflector" => self::$hahaha_dir . '/vendor/doctrine/inflector/lib/Doctrine/Common/Inflector/Inflector.php',
						],
					],
					"Lexer" => [
						"_Items" => [
							"AbstractLexer" => self::$hahaha_dir . '/vendor/doctrine/lexer/lib/Doctrine/Common/Lexer/AbstractLexer.php',
						],
					],
					"Persistence" => [
						"Event" => [
							"_Items" => [
								"LifecycleEventArgs" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Event/LifecycleEventArgs.php',
								"LoadClassMetadataEventArgs" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Event/LoadClassMetadataEventArgs.php',
								"ManagerEventArgs" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Event/ManagerEventArgs.php',
								"OnClearEventArgs" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Event/OnClearEventArgs.php',
								"PreUpdateEventArgs" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Event/PreUpdateEventArgs.php',
							],
						],
						"Mapping" => [
							"Driver" => [
								"_Items" => [
									"AnnotationDriver" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/Driver/AnnotationDriver.php',
									"DefaultFileLocator" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/Driver/DefaultFileLocator.php',
									"FileDriver" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/Driver/FileDriver.php',
									"FileLocator" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/Driver/FileLocator.php',
									"MappingDriver" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/Driver/MappingDriver.php',
									"MappingDriverChain" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/Driver/MappingDriverChain.php',
									"PHPDriver" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/Driver/PHPDriver.php',
									"StaticPHPDriver" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/Driver/StaticPHPDriver.php',
									"SymfonyFileLocator" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/Driver/SymfonyFileLocator.php',
								],
							],
							"_Items" => [
								"AbstractClassMetadataFactory" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/AbstractClassMetadataFactory.php',
								"ClassMetadata" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/ClassMetadata.php',
								"ClassMetadataFactory" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/ClassMetadataFactory.php',
								"MappingException" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/MappingException.php',
								"ReflectionService" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/ReflectionService.php',
								"RuntimeReflectionService" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/RuntimeReflectionService.php',
								"StaticReflectionService" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Mapping/StaticReflectionService.php',
							],
						],
						"_Items" => [
							"AbstractManagerRegistry" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/AbstractManagerRegistry.php',
							"ConnectionRegistry" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/ConnectionRegistry.php',
							"ManagerRegistry" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/ManagerRegistry.php',
							"ObjectManager" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/ObjectManager.php',
							"ObjectManagerAware" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/ObjectManagerAware.php',
							"ObjectManagerDecorator" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/ObjectManagerDecorator.php',
							"ObjectRepository" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/ObjectRepository.php',
							"PersistentObject" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/PersistentObject.php',
							"Proxy" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/Persistence/Proxy.php',
						],
					],
					"Reflection" => [
						"_Items" => [
							"ClassFinderInterface" => self::$hahaha_dir . '/vendor/doctrine/reflection/lib/Doctrine/Common/Reflection/ClassFinderInterface.php',
							"Psr0FindFile" => self::$hahaha_dir . '/vendor/doctrine/reflection/lib/Doctrine/Common/Reflection/Psr0FindFile.php',
							"ReflectionProviderInterface" => self::$hahaha_dir . '/vendor/doctrine/reflection/lib/Doctrine/Common/Reflection/ReflectionProviderInterface.php',
							"RuntimePublicReflectionProperty" => self::$hahaha_dir . '/vendor/doctrine/reflection/lib/Doctrine/Common/Reflection/RuntimePublicReflectionProperty.php',
							"StaticReflectionClass" => self::$hahaha_dir . '/vendor/doctrine/reflection/lib/Doctrine/Common/Reflection/StaticReflectionClass.php',
							"StaticReflectionMethod" => self::$hahaha_dir . '/vendor/doctrine/reflection/lib/Doctrine/Common/Reflection/StaticReflectionMethod.php',
							"StaticReflectionParser" => self::$hahaha_dir . '/vendor/doctrine/reflection/lib/Doctrine/Common/Reflection/StaticReflectionParser.php',
							"StaticReflectionProperty" => self::$hahaha_dir . '/vendor/doctrine/reflection/lib/Doctrine/Common/Reflection/StaticReflectionProperty.php',
						],
					],
					"_Items" => [
						"ClassLoader" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/ClassLoader.php',
						"CommonException" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/CommonException.php',
						"Comparable" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/Comparable.php',
						"Lexer" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/Lexer.php',
						"Version" => self::$hahaha_dir . '/vendor/doctrine/common/lib/Doctrine/Common/Version.php',
						"EventArgs" => self::$hahaha_dir . '/vendor/doctrine/event-manager/lib/Doctrine/Common/EventArgs.php',
						"EventManager" => self::$hahaha_dir . '/vendor/doctrine/event-manager/lib/Doctrine/Common/EventManager.php',
						"EventSubscriber" => self::$hahaha_dir . '/vendor/doctrine/event-manager/lib/Doctrine/Common/EventSubscriber.php',
						"NotifyPropertyChanged" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/NotifyPropertyChanged.php',
						"PropertyChangedListener" => self::$hahaha_dir . '/vendor/doctrine/persistence/lib/Doctrine/Common/PropertyChangedListener.php',
					],
				],
				"DBAL" => [
					"Cache" => [
						"_Items" => [
							"ArrayStatement" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Cache/ArrayStatement.php',
							"CacheException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Cache/CacheException.php',
							"QueryCacheProfile" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Cache/QueryCacheProfile.php',
							"ResultCacheStatement" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Cache/ResultCacheStatement.php',
						],
					],
					"Connections" => [
						"_Items" => [
							"MasterSlaveConnection" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Connections/MasterSlaveConnection.php',
						],
					],
					"Driver" => [
						"AbstractOracleDriver" => [
							"_Items" => [
								"EasyConnectString" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/AbstractOracleDriver/EasyConnectString.php',
							],
						],
						"DrizzlePDOMySql" => [
							"_Items" => [
								"Connection" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/DrizzlePDOMySql/Connection.php',
								"Driver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/DrizzlePDOMySql/Driver.php',
							],
						],
						"IBMDB2" => [
							"_Items" => [
								"DB2Connection" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/IBMDB2/DB2Connection.php',
								"DB2Driver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/IBMDB2/DB2Driver.php',
								"DB2Exception" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/IBMDB2/DB2Exception.php',
								"DB2Statement" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/IBMDB2/DB2Statement.php',
							],
						],
						"Mysqli" => [
							"_Items" => [
								"Driver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/Mysqli/Driver.php',
								"MysqliConnection" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/Mysqli/MysqliConnection.php',
								"MysqliException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/Mysqli/MysqliException.php',
								"MysqliStatement" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/Mysqli/MysqliStatement.php',
							],
						],
						"OCI8" => [
							"_Items" => [
								"Driver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/OCI8/Driver.php',
								"OCI8Connection" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/OCI8/OCI8Connection.php',
								"OCI8Exception" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/OCI8/OCI8Exception.php',
								"OCI8Statement" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/OCI8/OCI8Statement.php',
							],
						],
						"PDOIbm" => [
							"_Items" => [
								"Driver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/PDOIbm/Driver.php',
							],
						],
						"PDOMySql" => [
							"_Items" => [
								"Driver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/PDOMySql/Driver.php',
							],
						],
						"PDOOracle" => [
							"_Items" => [
								"Driver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/PDOOracle/Driver.php',
							],
						],
						"PDOPgSql" => [
							"_Items" => [
								"Driver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/PDOPgSql/Driver.php',
							],
						],
						"PDOSqlite" => [
							"_Items" => [
								"Driver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/PDOSqlite/Driver.php',
							],
						],
						"PDOSqlsrv" => [
							"_Items" => [
								"Connection" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/PDOSqlsrv/Connection.php',
								"Driver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/PDOSqlsrv/Driver.php',
								"Statement" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/PDOSqlsrv/Statement.php',
							],
						],
						"SQLAnywhere" => [
							"_Items" => [
								"Driver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/SQLAnywhere/Driver.php',
								"SQLAnywhereConnection" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/SQLAnywhere/SQLAnywhereConnection.php',
								"SQLAnywhereException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/SQLAnywhere/SQLAnywhereException.php',
								"SQLAnywhereStatement" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/SQLAnywhere/SQLAnywhereStatement.php',
							],
						],
						"SQLSrv" => [
							"_Items" => [
								"Driver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/SQLSrv/Driver.php',
								"LastInsertId" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/SQLSrv/LastInsertId.php',
								"SQLSrvConnection" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/SQLSrv/SQLSrvConnection.php',
								"SQLSrvException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/SQLSrv/SQLSrvException.php',
								"SQLSrvStatement" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/SQLSrv/SQLSrvStatement.php',
							],
						],
						"_Items" => [
							"AbstractDB2Driver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/AbstractDB2Driver.php',
							"AbstractDriverException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/AbstractDriverException.php',
							"AbstractMySQLDriver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/AbstractMySQLDriver.php',
							"AbstractOracleDriver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/AbstractOracleDriver.php',
							"AbstractPostgreSQLDriver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/AbstractPostgreSQLDriver.php',
							"AbstractSQLAnywhereDriver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/AbstractSQLAnywhereDriver.php',
							"AbstractSQLiteDriver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/AbstractSQLiteDriver.php',
							"AbstractSQLServerDriver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/AbstractSQLServerDriver.php',
							"Connection" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/Connection.php',
							"DriverException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/DriverException.php',
							"ExceptionConverterDriver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/ExceptionConverterDriver.php',
							"PDOConnection" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/PDOConnection.php',
							"PDOException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/PDOException.php',
							"PDOStatement" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/PDOStatement.php',
							"PingableConnection" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/PingableConnection.php',
							"ResultStatement" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/ResultStatement.php',
							"ServerInfoAwareConnection" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/ServerInfoAwareConnection.php',
							"Statement" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/Statement.php',
							"StatementIterator" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver/StatementIterator.php',
						],
					],
					"Event" => [
						"Listeners" => [
							"_Items" => [
								"MysqlSessionInit" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Event/Listeners/MysqlSessionInit.php',
								"OracleSessionInit" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Event/Listeners/OracleSessionInit.php',
								"SQLSessionInit" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Event/Listeners/SQLSessionInit.php',
							],
						],
						"_Items" => [
							"ConnectionEventArgs" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Event/ConnectionEventArgs.php',
							"SchemaAlterTableAddColumnEventArgs" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Event/SchemaAlterTableAddColumnEventArgs.php',
							"SchemaAlterTableChangeColumnEventArgs" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Event/SchemaAlterTableChangeColumnEventArgs.php',
							"SchemaAlterTableEventArgs" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Event/SchemaAlterTableEventArgs.php',
							"SchemaAlterTableRemoveColumnEventArgs" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Event/SchemaAlterTableRemoveColumnEventArgs.php',
							"SchemaAlterTableRenameColumnEventArgs" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Event/SchemaAlterTableRenameColumnEventArgs.php',
							"SchemaColumnDefinitionEventArgs" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Event/SchemaColumnDefinitionEventArgs.php',
							"SchemaCreateTableColumnEventArgs" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Event/SchemaCreateTableColumnEventArgs.php',
							"SchemaCreateTableEventArgs" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Event/SchemaCreateTableEventArgs.php',
							"SchemaDropTableEventArgs" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Event/SchemaDropTableEventArgs.php',
							"SchemaEventArgs" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Event/SchemaEventArgs.php',
							"SchemaIndexDefinitionEventArgs" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Event/SchemaIndexDefinitionEventArgs.php',
						],
					],
					"Exception" => [
						"_Items" => [
							"ConnectionException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/ConnectionException.php',
							"ConstraintViolationException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/ConstraintViolationException.php',
							"DatabaseObjectExistsException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/DatabaseObjectExistsException.php',
							"DatabaseObjectNotFoundException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/DatabaseObjectNotFoundException.php',
							"DeadlockException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/DeadlockException.php',
							"DriverException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/DriverException.php',
							"ForeignKeyConstraintViolationException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/ForeignKeyConstraintViolationException.php',
							"InvalidArgumentException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/InvalidArgumentException.php',
							"InvalidFieldNameException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/InvalidFieldNameException.php',
							"LockWaitTimeoutException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/LockWaitTimeoutException.php',
							"NonUniqueFieldNameException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/NonUniqueFieldNameException.php',
							"NotNullConstraintViolationException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/NotNullConstraintViolationException.php',
							"ReadOnlyException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/ReadOnlyException.php',
							"RetryableException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/RetryableException.php',
							"ServerException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/ServerException.php',
							"SyntaxErrorException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/SyntaxErrorException.php',
							"TableExistsException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/TableExistsException.php',
							"TableNotFoundException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/TableNotFoundException.php',
							"UniqueConstraintViolationException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Exception/UniqueConstraintViolationException.php',
						],
					],
					"Id" => [
						"_Items" => [
							"TableGenerator" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Id/TableGenerator.php',
							"TableGeneratorSchemaVisitor" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Id/TableGeneratorSchemaVisitor.php',
						],
					],
					"Logging" => [
						"_Items" => [
							"DebugStack" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Logging/DebugStack.php',
							"EchoSQLLogger" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Logging/EchoSQLLogger.php',
							"LoggerChain" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Logging/LoggerChain.php',
							"SQLLogger" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Logging/SQLLogger.php',
						],
					],
					"Platforms" => [
						"Keywords" => [
							"_Items" => [
								"DB2Keywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/DB2Keywords.php',
								"DrizzleKeywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/DrizzleKeywords.php',
								"KeywordList" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/KeywordList.php',
								"MariaDb102Keywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/MariaDb102Keywords.php',
								"MsSQLKeywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/MsSQLKeywords.php',
								"MySQL57Keywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/MySQL57Keywords.php',
								"MySQL80Keywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/MySQL80Keywords.php',
								"MySQLKeywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/MySQLKeywords.php',
								"OracleKeywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/OracleKeywords.php',
								"PostgreSQL100Keywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/PostgreSQL100Keywords.php',
								"PostgreSQL91Keywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/PostgreSQL91Keywords.php',
								"PostgreSQL92Keywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/PostgreSQL92Keywords.php',
								"PostgreSQL94Keywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/PostgreSQL94Keywords.php',
								"PostgreSQLKeywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/PostgreSQLKeywords.php',
								"ReservedKeywordsValidator" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/ReservedKeywordsValidator.php',
								"SQLAnywhere11Keywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/SQLAnywhere11Keywords.php',
								"SQLAnywhere12Keywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/SQLAnywhere12Keywords.php',
								"SQLAnywhere16Keywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/SQLAnywhere16Keywords.php',
								"SQLAnywhereKeywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/SQLAnywhereKeywords.php',
								"SQLiteKeywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/SQLiteKeywords.php',
								"SQLServer2005Keywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/SQLServer2005Keywords.php',
								"SQLServer2008Keywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/SQLServer2008Keywords.php',
								"SQLServer2012Keywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/SQLServer2012Keywords.php',
								"SQLServerKeywords" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/Keywords/SQLServerKeywords.php',
							],
						],
						"_Items" => [
							"AbstractPlatform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/AbstractPlatform.php',
							"DateIntervalUnit" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/DateIntervalUnit.php',
							"DB2Platform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/DB2Platform.php',
							"DrizzlePlatform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/DrizzlePlatform.php',
							"MariaDb1027Platform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/MariaDb1027Platform.php',
							"MySQL57Platform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/MySQL57Platform.php',
							"MySQL80Platform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/MySQL80Platform.php',
							"MySqlPlatform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/MySqlPlatform.php',
							"OraclePlatform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/OraclePlatform.php',
							"PostgreSQL100Platform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/PostgreSQL100Platform.php',
							"PostgreSQL91Platform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/PostgreSQL91Platform.php',
							"PostgreSQL92Platform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/PostgreSQL92Platform.php',
							"PostgreSQL94Platform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/PostgreSQL94Platform.php',
							"PostgreSqlPlatform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/PostgreSqlPlatform.php',
							"SQLAnywhere11Platform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/SQLAnywhere11Platform.php',
							"SQLAnywhere12Platform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/SQLAnywhere12Platform.php',
							"SQLAnywhere16Platform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/SQLAnywhere16Platform.php',
							"SQLAnywherePlatform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/SQLAnywherePlatform.php',
							"SQLAzurePlatform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/SQLAzurePlatform.php',
							"SqlitePlatform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/SqlitePlatform.php',
							"SQLServer2005Platform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/SQLServer2005Platform.php',
							"SQLServer2008Platform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/SQLServer2008Platform.php',
							"SQLServer2012Platform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/SQLServer2012Platform.php',
							"SQLServerPlatform" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/SQLServerPlatform.php',
							"TrimMode" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Platforms/TrimMode.php',
						],
					],
					"Portability" => [
						"_Items" => [
							"Connection" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Portability/Connection.php',
							"Statement" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Portability/Statement.php',
						],
					],
					"Query" => [
						"Expression" => [
							"_Items" => [
								"CompositeExpression" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Query/Expression/CompositeExpression.php',
								"ExpressionBuilder" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Query/Expression/ExpressionBuilder.php',
							],
						],
						"_Items" => [
							"QueryBuilder" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Query/QueryBuilder.php',
							"QueryException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Query/QueryException.php',
						],
					],
					"Schema" => [
						"Synchronizer" => [
							"_Items" => [
								"AbstractSchemaSynchronizer" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Synchronizer/AbstractSchemaSynchronizer.php',
								"SchemaSynchronizer" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Synchronizer/SchemaSynchronizer.php',
								"SingleDatabaseSynchronizer" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Synchronizer/SingleDatabaseSynchronizer.php',
							],
						],
						"Visitor" => [
							"_Items" => [
								"AbstractVisitor" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Visitor/AbstractVisitor.php',
								"CreateSchemaSqlCollector" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Visitor/CreateSchemaSqlCollector.php',
								"DropSchemaSqlCollector" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Visitor/DropSchemaSqlCollector.php',
								"Graphviz" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Visitor/Graphviz.php',
								"NamespaceVisitor" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Visitor/NamespaceVisitor.php',
								"RemoveNamespacedAssets" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Visitor/RemoveNamespacedAssets.php',
								"SchemaDiffVisitor" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Visitor/SchemaDiffVisitor.php',
								"Visitor" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Visitor/Visitor.php',
							],
						],
						"_Items" => [
							"AbstractAsset" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/AbstractAsset.php',
							"AbstractSchemaManager" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/AbstractSchemaManager.php',
							"Column" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Column.php',
							"ColumnDiff" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/ColumnDiff.php',
							"Comparator" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Comparator.php',
							"Constraint" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Constraint.php',
							"DB2SchemaManager" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/DB2SchemaManager.php',
							"DrizzleSchemaManager" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/DrizzleSchemaManager.php',
							"ForeignKeyConstraint" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/ForeignKeyConstraint.php',
							"Identifier" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Identifier.php',
							"Index" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Index.php',
							"MySqlSchemaManager" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/MySqlSchemaManager.php',
							"OracleSchemaManager" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/OracleSchemaManager.php',
							"PostgreSqlSchemaManager" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/PostgreSqlSchemaManager.php',
							"Schema" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Schema.php',
							"SchemaConfig" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/SchemaConfig.php',
							"SchemaDiff" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/SchemaDiff.php',
							"SchemaException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/SchemaException.php',
							"Sequence" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Sequence.php',
							"SQLAnywhereSchemaManager" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/SQLAnywhereSchemaManager.php',
							"SqliteSchemaManager" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/SqliteSchemaManager.php',
							"SQLServerSchemaManager" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/SQLServerSchemaManager.php',
							"Table" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/Table.php',
							"TableDiff" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/TableDiff.php',
							"View" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Schema/View.php',
						],
					],
					"Sharding" => [
						"ShardChoser" => [
							"_Items" => [
								"MultiTenantShardChoser" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Sharding/ShardChoser/MultiTenantShardChoser.php',
								"ShardChoser" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Sharding/ShardChoser/ShardChoser.php',
							],
						],
						"SQLAzure" => [
							"Schema" => [
								"_Items" => [
									"MultiTenantVisitor" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Sharding/SQLAzure/Schema/MultiTenantVisitor.php',
								],
							],
							"_Items" => [
								"SQLAzureFederationsSynchronizer" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Sharding/SQLAzure/SQLAzureFederationsSynchronizer.php',
								"SQLAzureShardManager" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Sharding/SQLAzure/SQLAzureShardManager.php',
							],
						],
						"_Items" => [
							"PoolingShardConnection" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Sharding/PoolingShardConnection.php',
							"PoolingShardManager" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Sharding/PoolingShardManager.php',
							"ShardingException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Sharding/ShardingException.php',
							"ShardManager" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Sharding/ShardManager.php',
						],
					],
					"Tools" => [
						"Console" => [
							"Command" => [
								"_Items" => [
									"ImportCommand" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Tools/Console/Command/ImportCommand.php',
									"ReservedWordsCommand" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Tools/Console/Command/ReservedWordsCommand.php',
									"RunSqlCommand" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Tools/Console/Command/RunSqlCommand.php',
								],
							],
							"Helper" => [
								"_Items" => [
									"ConnectionHelper" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Tools/Console/Helper/ConnectionHelper.php',
								],
							],
							"_Items" => [
								"ConsoleRunner" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Tools/Console/ConsoleRunner.php',
							],
						],
						"_Items" => [
							"Dumper" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Tools/Dumper.php',
						],
					],
					"Types" => [
						"_Items" => [
							"ArrayType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/ArrayType.php',
							"BigIntType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/BigIntType.php',
							"BinaryType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/BinaryType.php',
							"BlobType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/BlobType.php',
							"BooleanType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/BooleanType.php',
							"ConversionException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/ConversionException.php',
							"DateImmutableType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/DateImmutableType.php',
							"DateIntervalType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/DateIntervalType.php',
							"DateTimeImmutableType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/DateTimeImmutableType.php',
							"DateTimeType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/DateTimeType.php',
							"DateTimeTzImmutableType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/DateTimeTzImmutableType.php',
							"DateTimeTzType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/DateTimeTzType.php',
							"DateType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/DateType.php',
							"DecimalType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/DecimalType.php',
							"FloatType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/FloatType.php',
							"GuidType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/GuidType.php',
							"IntegerType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/IntegerType.php',
							"JsonArrayType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/JsonArrayType.php',
							"JsonType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/JsonType.php',
							"ObjectType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/ObjectType.php',
							"PhpDateTimeMappingType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/PhpDateTimeMappingType.php',
							"PhpIntegerMappingType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/PhpIntegerMappingType.php',
							"SimpleArrayType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/SimpleArrayType.php',
							"SmallIntType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/SmallIntType.php',
							"StringType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/StringType.php',
							"TextType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/TextType.php',
							"TimeImmutableType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/TimeImmutableType.php',
							"TimeType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/TimeType.php',
							"Type" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/Type.php',
							"VarDateTimeImmutableType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/VarDateTimeImmutableType.php',
							"VarDateTimeType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Types/VarDateTimeType.php',
						],
					],
					"_Items" => [
						"ColumnCase" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/ColumnCase.php',
						"Configuration" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Configuration.php',
						"Connection" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Connection.php',
						"ConnectionException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/ConnectionException.php',
						"DBALException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/DBALException.php',
						"Driver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Driver.php',
						"DriverManager" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/DriverManager.php',
						"Events" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Events.php',
						"FetchMode" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/FetchMode.php',
						"LockMode" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/LockMode.php',
						"ParameterType" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/ParameterType.php',
						"SQLParserUtils" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/SQLParserUtils.php',
						"SQLParserUtilsException" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/SQLParserUtilsException.php',
						"Statement" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Statement.php',
						"TransactionIsolationLevel" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/TransactionIsolationLevel.php',
						"Version" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/Version.php',
						"VersionAwarePlatformDriver" => self::$hahaha_dir . '/vendor/doctrine/dbal/lib/Doctrine/DBAL/VersionAwarePlatformDriver.php',
					],
				],
				"Instantiator" => [
					"Exception" => [
						"_Items" => [
							"ExceptionInterface" => self::$hahaha_dir . '/vendor/doctrine/instantiator/src/Doctrine/Instantiator/Exception/ExceptionInterface.php',
							"InvalidArgumentException" => self::$hahaha_dir . '/vendor/doctrine/instantiator/src/Doctrine/Instantiator/Exception/InvalidArgumentException.php',
							"UnexpectedValueException" => self::$hahaha_dir . '/vendor/doctrine/instantiator/src/Doctrine/Instantiator/Exception/UnexpectedValueException.php',
						],
					],
					"_Items" => [
						"Instantiator" => self::$hahaha_dir . '/vendor/doctrine/instantiator/src/Doctrine/Instantiator/Instantiator.php',
						"InstantiatorInterface" => self::$hahaha_dir . '/vendor/doctrine/instantiator/src/Doctrine/Instantiator/InstantiatorInterface.php',
					],
				],
				"ORM" => [
					"Cache" => [
						"Logging" => [
							"_Items" => [
								"CacheLogger" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Logging/CacheLogger.php',
								"CacheLoggerChain" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Logging/CacheLoggerChain.php',
								"StatisticsCacheLogger" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Logging/StatisticsCacheLogger.php',
							],
						],
						"Persister" => [
							"Collection" => [
								"_Items" => [
									"AbstractCollectionPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Persister/Collection/AbstractCollectionPersister.php',
									"CachedCollectionPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Persister/Collection/CachedCollectionPersister.php',
									"NonStrictReadWriteCachedCollectionPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Persister/Collection/NonStrictReadWriteCachedCollectionPersister.php',
									"ReadOnlyCachedCollectionPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Persister/Collection/ReadOnlyCachedCollectionPersister.php',
									"ReadWriteCachedCollectionPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Persister/Collection/ReadWriteCachedCollectionPersister.php',
								],
							],
							"Entity" => [
								"_Items" => [
									"AbstractEntityPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Persister/Entity/AbstractEntityPersister.php',
									"CachedEntityPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Persister/Entity/CachedEntityPersister.php',
									"NonStrictReadWriteCachedEntityPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Persister/Entity/NonStrictReadWriteCachedEntityPersister.php',
									"ReadOnlyCachedEntityPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Persister/Entity/ReadOnlyCachedEntityPersister.php',
									"ReadWriteCachedEntityPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Persister/Entity/ReadWriteCachedEntityPersister.php',
								],
							],
							"_Items" => [
								"CachedPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Persister/CachedPersister.php',
							],
						],
						"Region" => [
							"_Items" => [
								"DefaultMultiGetRegion" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Region/DefaultMultiGetRegion.php',
								"DefaultRegion" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Region/DefaultRegion.php',
								"FileLockRegion" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Region/FileLockRegion.php',
								"UpdateTimestampCache" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Region/UpdateTimestampCache.php',
							],
						],
						"_Items" => [
							"AssociationCacheEntry" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/AssociationCacheEntry.php',
							"CacheConfiguration" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/CacheConfiguration.php',
							"CacheEntry" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/CacheEntry.php',
							"CacheException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/CacheException.php',
							"CacheFactory" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/CacheFactory.php',
							"CacheKey" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/CacheKey.php',
							"CollectionCacheEntry" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/CollectionCacheEntry.php',
							"CollectionCacheKey" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/CollectionCacheKey.php',
							"CollectionHydrator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/CollectionHydrator.php',
							"ConcurrentRegion" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/ConcurrentRegion.php',
							"DefaultCache" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/DefaultCache.php',
							"DefaultCacheFactory" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/DefaultCacheFactory.php',
							"DefaultCollectionHydrator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/DefaultCollectionHydrator.php',
							"DefaultEntityHydrator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/DefaultEntityHydrator.php',
							"DefaultQueryCache" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/DefaultQueryCache.php',
							"EntityCacheEntry" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/EntityCacheEntry.php',
							"EntityCacheKey" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/EntityCacheKey.php',
							"EntityHydrator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/EntityHydrator.php',
							"Lock" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Lock.php',
							"LockException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/LockException.php',
							"MultiGetRegion" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/MultiGetRegion.php',
							"QueryCache" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/QueryCache.php',
							"QueryCacheEntry" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/QueryCacheEntry.php',
							"QueryCacheKey" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/QueryCacheKey.php',
							"QueryCacheValidator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/QueryCacheValidator.php',
							"Region" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/Region.php',
							"RegionsConfiguration" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/RegionsConfiguration.php',
							"TimestampCacheEntry" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/TimestampCacheEntry.php',
							"TimestampCacheKey" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/TimestampCacheKey.php',
							"TimestampQueryCacheValidator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/TimestampQueryCacheValidator.php',
							"TimestampRegion" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache/TimestampRegion.php',
						],
					],
					"Decorator" => [
						"_Items" => [
							"EntityManagerDecorator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Decorator/EntityManagerDecorator.php',
						],
					],
					"Event" => [
						"_Items" => [
							"LifecycleEventArgs" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Event/LifecycleEventArgs.php',
							"ListenersInvoker" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Event/ListenersInvoker.php',
							"LoadClassMetadataEventArgs" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Event/LoadClassMetadataEventArgs.php',
							"OnClassMetadataNotFoundEventArgs" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Event/OnClassMetadataNotFoundEventArgs.php',
							"OnClearEventArgs" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Event/OnClearEventArgs.php',
							"OnFlushEventArgs" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Event/OnFlushEventArgs.php',
							"PostFlushEventArgs" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Event/PostFlushEventArgs.php',
							"PreFlushEventArgs" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Event/PreFlushEventArgs.php',
							"PreUpdateEventArgs" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Event/PreUpdateEventArgs.php',
						],
					],
					"Id" => [
						"_Items" => [
							"AbstractIdGenerator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Id/AbstractIdGenerator.php',
							"AssignedGenerator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Id/AssignedGenerator.php',
							"BigIntegerIdentityGenerator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Id/BigIntegerIdentityGenerator.php',
							"IdentityGenerator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Id/IdentityGenerator.php',
							"SequenceGenerator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Id/SequenceGenerator.php',
							"TableGenerator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Id/TableGenerator.php',
							"UuidGenerator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Id/UuidGenerator.php',
						],
					],
					"Internal" => [
						"Hydration" => [
							"_Items" => [
								"AbstractHydrator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Internal/Hydration/AbstractHydrator.php',
								"ArrayHydrator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Internal/Hydration/ArrayHydrator.php',
								"HydrationException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Internal/Hydration/HydrationException.php',
								"IterableResult" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Internal/Hydration/IterableResult.php',
								"ObjectHydrator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Internal/Hydration/ObjectHydrator.php',
								"ScalarHydrator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Internal/Hydration/ScalarHydrator.php',
								"SimpleObjectHydrator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Internal/Hydration/SimpleObjectHydrator.php',
								"SingleScalarHydrator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Internal/Hydration/SingleScalarHydrator.php',
							],
						],
						"_Items" => [
							"CommitOrderCalculator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Internal/CommitOrderCalculator.php',
							"HydrationCompleteHandler" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Internal/HydrationCompleteHandler.php',
						],
					],
					"Mapping" => [
						"Builder" => [
							"_Items" => [
								"AssociationBuilder" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Builder/AssociationBuilder.php',
								"ClassMetadataBuilder" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Builder/ClassMetadataBuilder.php',
								"EmbeddedBuilder" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Builder/EmbeddedBuilder.php',
								"EntityListenerBuilder" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Builder/EntityListenerBuilder.php',
								"FieldBuilder" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Builder/FieldBuilder.php',
								"ManyToManyAssociationBuilder" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Builder/ManyToManyAssociationBuilder.php',
								"OneToManyAssociationBuilder" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Builder/OneToManyAssociationBuilder.php',
							],
						],
						"Driver" => [
							"_Items" => [
								"AnnotationDriver" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/AnnotationDriver.php',
								"DatabaseDriver" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DatabaseDriver.php',
								"DriverChain" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DriverChain.php',
								"PHPDriver" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/PHPDriver.php',
								"SimplifiedXmlDriver" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/SimplifiedXmlDriver.php',
								"SimplifiedYamlDriver" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/SimplifiedYamlDriver.php',
								"StaticPHPDriver" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/StaticPHPDriver.php',
								"XmlDriver" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/XmlDriver.php',
								"YamlDriver" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/YamlDriver.php',
							],
						],
						"Reflection" => [
							"_Items" => [
								"ReflectionPropertiesGetter" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Reflection/ReflectionPropertiesGetter.php',
							],
						],
						"_Items" => [
							"Annotation" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Annotation.php',
							"AnsiQuoteStrategy" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/AnsiQuoteStrategy.php',
							"AssociationOverride" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/AssociationOverride.php',
							"AssociationOverrides" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/AssociationOverrides.php',
							"AttributeOverride" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/AttributeOverride.php',
							"AttributeOverrides" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/AttributeOverrides.php',
							"Cache" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Cache.php',
							"ChangeTrackingPolicy" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/ChangeTrackingPolicy.php',
							"ClassMetadata" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/ClassMetadata.php',
							"ClassMetadataFactory" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/ClassMetadataFactory.php',
							"ClassMetadataInfo" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/ClassMetadataInfo.php',
							"Column" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Column.php',
							"ColumnResult" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/ColumnResult.php',
							"CustomIdGenerator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/CustomIdGenerator.php',
							"DefaultEntityListenerResolver" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/DefaultEntityListenerResolver.php',
							"DefaultNamingStrategy" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/DefaultNamingStrategy.php',
							"DefaultQuoteStrategy" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/DefaultQuoteStrategy.php',
							"DiscriminatorColumn" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/DiscriminatorColumn.php',
							"DiscriminatorMap" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/DiscriminatorMap.php',
							"Embeddable" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Embeddable.php',
							"Embedded" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Embedded.php',
							"Entity" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Entity.php',
							"EntityListenerResolver" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/EntityListenerResolver.php',
							"EntityListeners" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/EntityListeners.php',
							"EntityResult" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/EntityResult.php',
							"FieldResult" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/FieldResult.php',
							"GeneratedValue" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/GeneratedValue.php',
							"HasLifecycleCallbacks" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/HasLifecycleCallbacks.php',
							"Id" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Id.php',
							"Index" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Index.php',
							"InheritanceType" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/InheritanceType.php',
							"JoinColumn" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/JoinColumn.php',
							"JoinColumns" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/JoinColumns.php',
							"JoinTable" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/JoinTable.php',
							"ManyToMany" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/ManyToMany.php',
							"ManyToOne" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/ManyToOne.php',
							"MappedSuperclass" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/MappedSuperclass.php',
							"MappingException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/MappingException.php',
							"NamedNativeQueries" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/NamedNativeQueries.php',
							"NamedNativeQuery" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/NamedNativeQuery.php',
							"NamedQueries" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/NamedQueries.php',
							"NamedQuery" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/NamedQuery.php',
							"NamingStrategy" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/NamingStrategy.php',
							"OneToMany" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/OneToMany.php',
							"OneToOne" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/OneToOne.php',
							"OrderBy" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/OrderBy.php',
							"PostLoad" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/PostLoad.php',
							"PostPersist" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/PostPersist.php',
							"PostRemove" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/PostRemove.php',
							"PostUpdate" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/PostUpdate.php',
							"PreFlush" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/PreFlush.php',
							"PrePersist" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/PrePersist.php',
							"PreRemove" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/PreRemove.php',
							"PreUpdate" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/PreUpdate.php',
							"QuoteStrategy" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/QuoteStrategy.php',
							"ReflectionEmbeddedProperty" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/ReflectionEmbeddedProperty.php',
							"SequenceGenerator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/SequenceGenerator.php',
							"SqlResultSetMapping" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/SqlResultSetMapping.php',
							"SqlResultSetMappings" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/SqlResultSetMappings.php',
							"Table" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Table.php',
							"UnderscoreNamingStrategy" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/UnderscoreNamingStrategy.php',
							"UniqueConstraint" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/UniqueConstraint.php',
							"Version" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Version.php',
						],
					],
					"Persisters" => [
						"Collection" => [
							"_Items" => [
								"AbstractCollectionPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/Collection/AbstractCollectionPersister.php',
								"CollectionPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/Collection/CollectionPersister.php',
								"ManyToManyPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/Collection/ManyToManyPersister.php',
								"OneToManyPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/Collection/OneToManyPersister.php',
							],
						],
						"Entity" => [
							"_Items" => [
								"AbstractEntityInheritancePersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/Entity/AbstractEntityInheritancePersister.php',
								"BasicEntityPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/Entity/BasicEntityPersister.php',
								"CachedPersisterContext" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/Entity/CachedPersisterContext.php',
								"EntityPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/Entity/EntityPersister.php',
								"JoinedSubclassPersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/Entity/JoinedSubclassPersister.php',
								"SingleTablePersister" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/Entity/SingleTablePersister.php',
							],
						],
						"_Items" => [
							"PersisterException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/PersisterException.php',
							"SqlExpressionVisitor" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/SqlExpressionVisitor.php',
							"SqlValueVisitor" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Persisters/SqlValueVisitor.php',
						],
					],
					"Proxy" => [
						"_Items" => [
							"Autoloader" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Proxy/Autoloader.php',
							"Proxy" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Proxy/Proxy.php',
							"ProxyFactory" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Proxy/ProxyFactory.php',
						],
					],
					"Query" => [
						"AST" => [
							"Functions" => [
								"_Items" => [
									"AbsFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/AbsFunction.php',
									"AvgFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/AvgFunction.php',
									"BitAndFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/BitAndFunction.php',
									"BitOrFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/BitOrFunction.php',
									"ConcatFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/ConcatFunction.php',
									"CountFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/CountFunction.php',
									"CurrentDateFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/CurrentDateFunction.php',
									"CurrentTimeFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/CurrentTimeFunction.php',
									"CurrentTimestampFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/CurrentTimestampFunction.php',
									"DateAddFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/DateAddFunction.php',
									"DateDiffFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/DateDiffFunction.php',
									"DateSubFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/DateSubFunction.php',
									"FunctionNode" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/FunctionNode.php',
									"IdentityFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/IdentityFunction.php',
									"LengthFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/LengthFunction.php',
									"LocateFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/LocateFunction.php',
									"LowerFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/LowerFunction.php',
									"MaxFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/MaxFunction.php',
									"MinFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/MinFunction.php',
									"ModFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/ModFunction.php',
									"SizeFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/SizeFunction.php',
									"SqrtFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/SqrtFunction.php',
									"SubstringFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/SubstringFunction.php',
									"SumFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/SumFunction.php',
									"TrimFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/TrimFunction.php',
									"UpperFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Functions/UpperFunction.php',
								],
							],
							"_Items" => [
								"AggregateExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/AggregateExpression.php',
								"ArithmeticExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/ArithmeticExpression.php',
								"ArithmeticFactor" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/ArithmeticFactor.php',
								"ArithmeticTerm" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/ArithmeticTerm.php',
								"ASTException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/ASTException.php',
								"BetweenExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/BetweenExpression.php',
								"CoalesceExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/CoalesceExpression.php',
								"CollectionMemberExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/CollectionMemberExpression.php',
								"ComparisonExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/ComparisonExpression.php',
								"ConditionalExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/ConditionalExpression.php',
								"ConditionalFactor" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/ConditionalFactor.php',
								"ConditionalPrimary" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/ConditionalPrimary.php',
								"ConditionalTerm" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/ConditionalTerm.php',
								"DeleteClause" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/DeleteClause.php',
								"DeleteStatement" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/DeleteStatement.php',
								"EmptyCollectionComparisonExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/EmptyCollectionComparisonExpression.php',
								"ExistsExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/ExistsExpression.php',
								"FromClause" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/FromClause.php',
								"GeneralCaseExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/GeneralCaseExpression.php',
								"GroupByClause" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/GroupByClause.php',
								"HavingClause" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/HavingClause.php',
								"IdentificationVariableDeclaration" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/IdentificationVariableDeclaration.php',
								"IndexBy" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/IndexBy.php',
								"InExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/InExpression.php',
								"InputParameter" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/InputParameter.php',
								"InstanceOfExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/InstanceOfExpression.php',
								"Join" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Join.php',
								"JoinAssociationDeclaration" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/JoinAssociationDeclaration.php',
								"JoinAssociationPathExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/JoinAssociationPathExpression.php',
								"JoinClassPathExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/JoinClassPathExpression.php',
								"JoinVariableDeclaration" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/JoinVariableDeclaration.php',
								"LikeExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/LikeExpression.php',
								"Literal" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Literal.php',
								"NewObjectExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/NewObjectExpression.php',
								"Node" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Node.php',
								"NullComparisonExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/NullComparisonExpression.php',
								"NullIfExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/NullIfExpression.php',
								"OrderByClause" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/OrderByClause.php',
								"OrderByItem" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/OrderByItem.php',
								"ParenthesisExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/ParenthesisExpression.php',
								"PartialObjectExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/PartialObjectExpression.php',
								"PathExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/PathExpression.php',
								"QuantifiedExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/QuantifiedExpression.php',
								"RangeVariableDeclaration" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/RangeVariableDeclaration.php',
								"SelectClause" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/SelectClause.php',
								"SelectExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/SelectExpression.php',
								"SelectStatement" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/SelectStatement.php',
								"SimpleArithmeticExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/SimpleArithmeticExpression.php',
								"SimpleCaseExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/SimpleCaseExpression.php',
								"SimpleSelectClause" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/SimpleSelectClause.php',
								"SimpleSelectExpression" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/SimpleSelectExpression.php',
								"SimpleWhenClause" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/SimpleWhenClause.php',
								"Subselect" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/Subselect.php',
								"SubselectFromClause" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/SubselectFromClause.php',
								"SubselectIdentificationVariableDeclaration" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/SubselectIdentificationVariableDeclaration.php',
								"UpdateClause" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/UpdateClause.php',
								"UpdateItem" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/UpdateItem.php',
								"UpdateStatement" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/UpdateStatement.php',
								"WhenClause" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/WhenClause.php',
								"WhereClause" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/AST/WhereClause.php',
							],
						],
						"Exec" => [
							"_Items" => [
								"AbstractSqlExecutor" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Exec/AbstractSqlExecutor.php',
								"MultiTableDeleteExecutor" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Exec/MultiTableDeleteExecutor.php',
								"MultiTableUpdateExecutor" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Exec/MultiTableUpdateExecutor.php',
								"SingleSelectExecutor" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Exec/SingleSelectExecutor.php',
								"SingleTableDeleteUpdateExecutor" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Exec/SingleTableDeleteUpdateExecutor.php',
							],
						],
						"Expr" => [
							"_Items" => [
								"Andx" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Expr/Andx.php',
								"Base" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Expr/Base.php',
								"Comparison" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Expr/Comparison.php',
								"Composite" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Expr/Composite.php',
								"From" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Expr/From.php',
								"Func" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Expr/Func.php',
								"GroupBy" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Expr/GroupBy.php',
								"Join" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Expr/Join.php',
								"Literal" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Expr/Literal.php',
								"Math" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Expr/Math.php',
								"OrderBy" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Expr/OrderBy.php',
								"Orx" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Expr/Orx.php',
								"Select" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Expr/Select.php',
							],
						],
						"Filter" => [
							"_Items" => [
								"SQLFilter" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Filter/SQLFilter.php',
							],
						],
						"_Items" => [
							"Expr" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Expr.php',
							"FilterCollection" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/FilterCollection.php',
							"Lexer" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Lexer.php',
							"Parameter" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Parameter.php',
							"ParameterTypeInferer" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/ParameterTypeInferer.php',
							"Parser" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Parser.php',
							"ParserResult" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/ParserResult.php',
							"Printer" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/Printer.php',
							"QueryException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/QueryException.php',
							"QueryExpressionVisitor" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/QueryExpressionVisitor.php',
							"ResultSetMapping" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/ResultSetMapping.php',
							"ResultSetMappingBuilder" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/ResultSetMappingBuilder.php',
							"SqlWalker" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/SqlWalker.php',
							"TreeWalker" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/TreeWalker.php',
							"TreeWalkerAdapter" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/TreeWalkerAdapter.php',
							"TreeWalkerChain" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/TreeWalkerChain.php',
							"TreeWalkerChainIterator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query/TreeWalkerChainIterator.php',
						],
					],
					"Repository" => [
						"_Items" => [
							"DefaultRepositoryFactory" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Repository/DefaultRepositoryFactory.php',
							"RepositoryFactory" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Repository/RepositoryFactory.php',
						],
					],
					"Tools" => [
						"Console" => [
							"Command" => [
								"ClearCache" => [
									"_Items" => [
										"CollectionRegionCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/ClearCache/CollectionRegionCommand.php',
										"EntityRegionCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/ClearCache/EntityRegionCommand.php',
										"MetadataCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/ClearCache/MetadataCommand.php',
										"QueryCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/ClearCache/QueryCommand.php',
										"QueryRegionCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/ClearCache/QueryRegionCommand.php',
										"ResultCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/ClearCache/ResultCommand.php',
									],
								],
								"SchemaTool" => [
									"_Items" => [
										"AbstractCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/SchemaTool/AbstractCommand.php',
										"CreateCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/SchemaTool/CreateCommand.php',
										"DropCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/SchemaTool/DropCommand.php',
										"UpdateCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/SchemaTool/UpdateCommand.php',
									],
								],
								"_Items" => [
									"ConvertDoctrine1SchemaCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/ConvertDoctrine1SchemaCommand.php',
									"ConvertMappingCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/ConvertMappingCommand.php',
									"EnsureProductionSettingsCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/EnsureProductionSettingsCommand.php',
									"GenerateEntitiesCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/GenerateEntitiesCommand.php',
									"GenerateProxiesCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/GenerateProxiesCommand.php',
									"GenerateRepositoriesCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/GenerateRepositoriesCommand.php',
									"InfoCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/InfoCommand.php',
									"MappingDescribeCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/MappingDescribeCommand.php',
									"RunDqlCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/RunDqlCommand.php',
									"ValidateSchemaCommand" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Command/ValidateSchemaCommand.php',
								],
							],
							"Helper" => [
								"_Items" => [
									"EntityManagerHelper" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/Helper/EntityManagerHelper.php',
								],
							],
							"_Items" => [
								"ConsoleRunner" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/ConsoleRunner.php',
								"MetadataFilter" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Console/MetadataFilter.php',
							],
						],
						"Event" => [
							"_Items" => [
								"GenerateSchemaEventArgs" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Event/GenerateSchemaEventArgs.php',
								"GenerateSchemaTableEventArgs" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Event/GenerateSchemaTableEventArgs.php',
							],
						],
						"Export" => [
							"Driver" => [
								"_Items" => [
									"AbstractExporter" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Export/Driver/AbstractExporter.php',
									"AnnotationExporter" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Export/Driver/AnnotationExporter.php',
									"PhpExporter" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Export/Driver/PhpExporter.php',
									"XmlExporter" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Export/Driver/XmlExporter.php',
									"YamlExporter" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Export/Driver/YamlExporter.php',
								],
							],
							"_Items" => [
								"ClassMetadataExporter" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Export/ClassMetadataExporter.php',
								"ExportException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Export/ExportException.php',
							],
						],
						"Pagination" => [
							"_Items" => [
								"CountOutputWalker" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Pagination/CountOutputWalker.php',
								"CountWalker" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Pagination/CountWalker.php',
								"LimitSubqueryOutputWalker" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Pagination/LimitSubqueryOutputWalker.php',
								"LimitSubqueryWalker" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Pagination/LimitSubqueryWalker.php',
								"Paginator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Pagination/Paginator.php',
								"RowNumberOverFunction" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Pagination/RowNumberOverFunction.php',
								"WhereInWalker" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Pagination/WhereInWalker.php',
							],
						],
						"_Items" => [
							"AttachEntityListenersListener" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/AttachEntityListenersListener.php',
							"ConvertDoctrine1Schema" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/ConvertDoctrine1Schema.php',
							"DebugUnitOfWorkListener" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/DebugUnitOfWorkListener.php',
							"DisconnectedClassMetadataFactory" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/DisconnectedClassMetadataFactory.php',
							"EntityGenerator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/EntityGenerator.php',
							"EntityRepositoryGenerator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/EntityRepositoryGenerator.php',
							"ResolveTargetEntityListener" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/ResolveTargetEntityListener.php',
							"SchemaTool" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/SchemaTool.php',
							"SchemaValidator" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/SchemaValidator.php',
							"Setup" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Setup.php',
							"ToolEvents" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/ToolEvents.php',
							"ToolsException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/ToolsException.php',
						],
					],
					"Utility" => [
						"_Items" => [
							"HierarchyDiscriminatorResolver" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Utility/HierarchyDiscriminatorResolver.php',
							"IdentifierFlattener" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Utility/IdentifierFlattener.php',
							"PersisterHelper" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Utility/PersisterHelper.php',
						],
					],
					"_Items" => [
						"AbstractQuery" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/AbstractQuery.php',
						"Cache" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Cache.php',
						"Configuration" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Configuration.php',
						"EntityManager" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php',
						"EntityManagerInterface" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php',
						"EntityNotFoundException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/EntityNotFoundException.php',
						"EntityRepository" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/EntityRepository.php',
						"Events" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Events.php',
						"LazyCriteriaCollection" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/LazyCriteriaCollection.php',
						"NativeQuery" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/NativeQuery.php',
						"NonUniqueResultException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/NonUniqueResultException.php',
						"NoResultException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/NoResultException.php',
						"OptimisticLockException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/OptimisticLockException.php',
						"ORMException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/ORMException.php',
						"ORMInvalidArgumentException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/ORMInvalidArgumentException.php',
						"PersistentCollection" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/PersistentCollection.php',
						"PessimisticLockException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/PessimisticLockException.php',
						"Query" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Query.php',
						"QueryBuilder" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/QueryBuilder.php',
						"TransactionRequiredException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/TransactionRequiredException.php',
						"UnexpectedResultException" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/UnexpectedResultException.php',
						"UnitOfWork" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/UnitOfWork.php',
						"Version" => self::$hahaha_dir . '/vendor/doctrine/orm/lib/Doctrine/ORM/Version.php',
					],
				],
				"_Items" => [
				],
			],
			"Egulias" => [
				"EmailValidator" => [
					"Exception" => [
						"_Items" => [
							"AtextAfterCFWS" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/AtextAfterCFWS.php',
							"CharNotAllowed" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/CharNotAllowed.php',
							"CommaInDomain" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/CommaInDomain.php',
							"ConsecutiveAt" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/ConsecutiveAt.php',
							"ConsecutiveDot" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/ConsecutiveDot.php',
							"CRLFAtTheEnd" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/CRLFAtTheEnd.php',
							"CRLFX2" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/CRLFX2.php',
							"CRNoLF" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/CRNoLF.php',
							"DomainHyphened" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/DomainHyphened.php',
							"DotAtEnd" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/DotAtEnd.php',
							"DotAtStart" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/DotAtStart.php',
							"ExpectingAT" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/ExpectingAT.php',
							"ExpectingATEXT" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/ExpectingATEXT.php',
							"ExpectingCTEXT" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/ExpectingCTEXT.php',
							"ExpectingDomainLiteralClose" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/ExpectingDomainLiteralClose.php',
							"ExpectingDTEXT" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/ExpectingDTEXT.php',
							"ExpectingQPair" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/ExpectingQPair.php',
							"InvalidEmail" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/InvalidEmail.php',
							"NoDNSRecord" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/NoDNSRecord.php',
							"NoDomainPart" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/NoDomainPart.php',
							"NoLocalPart" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/NoLocalPart.php',
							"UnclosedComment" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/UnclosedComment.php',
							"UnclosedQuotedString" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/UnclosedQuotedString.php',
							"UnopenedComment" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Exception/UnopenedComment.php',
						],
					],
					"Parser" => [
						"_Items" => [
							"DomainPart" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Parser/DomainPart.php',
							"LocalPart" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Parser/LocalPart.php',
							"Parser" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Parser/Parser.php',
						],
					],
					"Validation" => [
						"Error" => [
							"_Items" => [
								"RFCWarnings" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Validation/Error/RFCWarnings.php',
								"SpoofEmail" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Validation/Error/SpoofEmail.php',
							],
						],
						"Exception" => [
							"_Items" => [
								"EmptyValidationList" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Validation/Exception/EmptyValidationList.php',
							],
						],
						"_Items" => [
							"DNSCheckValidation" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Validation/DNSCheckValidation.php',
							"EmailValidation" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Validation/EmailValidation.php',
							"MultipleErrors" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Validation/MultipleErrors.php',
							"MultipleValidationWithAnd" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Validation/MultipleValidationWithAnd.php',
							"NoRFCWarningsValidation" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Validation/NoRFCWarningsValidation.php',
							"RFCValidation" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Validation/RFCValidation.php',
							"SpoofCheckValidation" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Validation/SpoofCheckValidation.php',
						],
					],
					"Warning" => [
						"_Items" => [
							"AddressLiteral" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/AddressLiteral.php',
							"CFWSNearAt" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/CFWSNearAt.php',
							"CFWSWithFWS" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/CFWSWithFWS.php',
							"Comment" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/Comment.php',
							"DeprecatedComment" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/DeprecatedComment.php',
							"DomainLiteral" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/DomainLiteral.php',
							"DomainTooLong" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/DomainTooLong.php',
							"EmailTooLong" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/EmailTooLong.php',
							"IPV6BadChar" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/IPV6BadChar.php',
							"IPV6ColonEnd" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/IPV6ColonEnd.php',
							"IPV6ColonStart" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/IPV6ColonStart.php',
							"IPV6Deprecated" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/IPV6Deprecated.php',
							"IPV6DoubleColon" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/IPV6DoubleColon.php',
							"IPV6GroupCount" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/IPV6GroupCount.php',
							"IPV6MaxGroups" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/IPV6MaxGroups.php',
							"LabelTooLong" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/LabelTooLong.php',
							"LocalTooLong" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/LocalTooLong.php',
							"NoDNSMXRecord" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/NoDNSMXRecord.php',
							"ObsoleteDTEXT" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/ObsoleteDTEXT.php',
							"QuotedPart" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/QuotedPart.php',
							"QuotedString" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/QuotedString.php',
							"TLD" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/TLD.php',
							"Warning" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/Warning/Warning.php',
						],
					],
					"_Items" => [
						"EmailLexer" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/EmailLexer.php',
						"EmailParser" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/EmailParser.php',
						"EmailValidator" => self::$hahaha_dir . '/vendor/egulias/email-validator/EmailValidator/EmailValidator.php',
					],
				],
				"_Items" => [
				],
			],
			"Evenement" => [
				"_Items" => [
					"EventEmitter" => self::$hahaha_dir . '/vendor/evenement/evenement/src/Evenement/EventEmitter.php',
					"EventEmitterInterface" => self::$hahaha_dir . '/vendor/evenement/evenement/src/Evenement/EventEmitterInterface.php',
					"EventEmitterTrait" => self::$hahaha_dir . '/vendor/evenement/evenement/src/Evenement/EventEmitterTrait.php',
				],
			],
			"LINE" => [
				"LINEBot" => [
					"EchoBot" => [
						"_Items" => [
							"Dependency" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/EchoBot/src/LINEBot/EchoBot/Dependency.php',
							"Route" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/EchoBot/src/LINEBot/EchoBot/Route.php',
							"Setting" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/EchoBot/src/LINEBot/EchoBot/Setting.php',
						],
					],
					"KitchenSink" => [
						"EventHandler" => [
							"MessageHandler" => [
								"Flex" => [
									"_Items" => [
										"FlexSampleRestaurant" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/MessageHandler/Flex/FlexSampleRestaurant.php',
										"FlexSampleShopping" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/MessageHandler/Flex/FlexSampleShopping.php',
									],
								],
								"Util" => [
									"_Items" => [
										"UrlBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/MessageHandler/Util/UrlBuilder.php',
									],
								],
								"_Items" => [
									"AudioMessageHandler" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/MessageHandler/AudioMessageHandler.php',
									"ImageMessageHandler" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/MessageHandler/ImageMessageHandler.php',
									"LocationMessageHandler" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/MessageHandler/LocationMessageHandler.php',
									"StickerMessageHandler" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/MessageHandler/StickerMessageHandler.php',
									"TextMessageHandler" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/MessageHandler/TextMessageHandler.php',
									"VideoMessageHandler" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/MessageHandler/VideoMessageHandler.php',
								],
							],
							"_Items" => [
								"BeaconEventHandler" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/BeaconEventHandler.php',
								"FollowEventHandler" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/FollowEventHandler.php',
								"JoinEventHandler" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/JoinEventHandler.php',
								"LeaveEventHandler" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/LeaveEventHandler.php',
								"PostbackEventHandler" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/PostbackEventHandler.php',
								"ThingsEventHandler" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/ThingsEventHandler.php',
								"UnfollowEventHandler" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/UnfollowEventHandler.php',
							],
						],
						"_Items" => [
							"Dependency" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/Dependency.php',
							"AccountLinkEventHandler" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler/AccountLinkEventHandler.php',
							"EventHandler" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/EventHandler.php',
							"Route" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/Route.php',
							"Setting" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/examples/KitchenSink/src/LINEBot/KitchenSink/Setting.php',
						],
					],
					"Constant" => [
						"Flex" => [
							"_Items" => [
								"BubleContainerSize" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/BubleContainerSize.php',
								"ComponentAlign" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentAlign.php',
								"ComponentBorderWidth" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentBorderWidth.php',
								"ComponentButtonHeight" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentButtonHeight.php',
								"ComponentButtonStyle" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentButtonStyle.php',
								"ComponentFontSize" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentFontSize.php',
								"ComponentFontWeight" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentFontWeight.php',
								"ComponentGravity" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentGravity.php',
								"ComponentIconAspectRatio" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentIconAspectRatio.php',
								"ComponentIconSize" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentIconSize.php',
								"ComponentImageAspectMode" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentImageAspectMode.php',
								"ComponentImageAspectRatio" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentImageAspectRatio.php',
								"ComponentImageSize" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentImageSize.php',
								"ComponentLayout" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentLayout.php',
								"ComponentMargin" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentMargin.php',
								"ComponentPosition" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentPosition.php',
								"ComponentSpaceSize" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentSpaceSize.php',
								"ComponentSpacing" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentSpacing.php',
								"ComponentTextDecoration" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentTextDecoration.php',
								"ComponentTextStyle" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentTextStyle.php',
								"ComponentType" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ComponentType.php',
								"ContainerDirection" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ContainerDirection.php',
								"ContainerType" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Flex/ContainerType.php',
							],
						],
						"_Items" => [
							"ActionType" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/ActionType.php',
							"EventSourceType" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/EventSourceType.php',
							"HTTPHeader" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/HTTPHeader.php',
							"MessageContentProviderType" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/MessageContentProviderType.php',
							"MessageType" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/MessageType.php',
							"Meta" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/Meta.php',
							"TemplateType" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Constant/TemplateType.php',
						],
					],
					"Event" => [
						"MessageEvent" => [
							"_Items" => [
								"AudioMessage" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/MessageEvent/AudioMessage.php',
								"ContentProvider" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/MessageEvent/ContentProvider.php',
								"FileMessage" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/MessageEvent/FileMessage.php',
								"ImageMessage" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/MessageEvent/ImageMessage.php',
								"LocationMessage" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/MessageEvent/LocationMessage.php',
								"StickerMessage" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/MessageEvent/StickerMessage.php',
								"TextMessage" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/MessageEvent/TextMessage.php',
								"UnknownMessage" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/MessageEvent/UnknownMessage.php',
								"VideoMessage" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/MessageEvent/VideoMessage.php',
							],
						],
						"Parser" => [
							"_Items" => [
								"EventRequestParser" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/Parser/EventRequestParser.php',
							],
						],
						"Things" => [
							"_Items" => [
								"ThingsResult" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/Things/ThingsResult.php',
								"ThingsResultAction" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/Things/ThingsResultAction.php',
							],
						],
						"_Items" => [
							"AccountLinkEvent" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/AccountLinkEvent.php',
							"BaseEvent" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/BaseEvent.php',
							"BeaconDetectionEvent" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/BeaconDetectionEvent.php',
							"FollowEvent" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/FollowEvent.php',
							"JoinEvent" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/JoinEvent.php',
							"LeaveEvent" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/LeaveEvent.php',
							"MemberJoinEvent" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/MemberJoinEvent.php',
							"MemberLeaveEvent" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/MemberLeaveEvent.php',
							"MessageEvent" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/MessageEvent.php',
							"PostbackEvent" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/PostbackEvent.php',
							"ThingsEvent" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/ThingsEvent.php',
							"UnfollowEvent" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/UnfollowEvent.php',
							"UnknownEvent" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Event/UnknownEvent.php',
						],
					],
					"Exception" => [
						"_Items" => [
							"CurlExecutionException" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Exception/CurlExecutionException.php',
							"InvalidEventRequestException" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Exception/InvalidEventRequestException.php',
							"InvalidEventSourceException" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Exception/InvalidEventSourceException.php',
							"InvalidSignatureException" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Exception/InvalidSignatureException.php',
						],
					],
					"HTTPClient" => [
						"_Items" => [
							"Curl" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/HTTPClient/Curl.php',
							"CurlHTTPClient" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/HTTPClient/CurlHTTPClient.php',
						],
					],
					"ImagemapActionBuilder" => [
						"_Items" => [
							"AreaBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/ImagemapActionBuilder/AreaBuilder.php',
							"ImagemapMessageActionBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/ImagemapActionBuilder/ImagemapMessageActionBuilder.php',
							"ImagemapUriActionBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/ImagemapActionBuilder/ImagemapUriActionBuilder.php',
						],
					],
					"MessageBuilder" => [
						"Flex" => [
							"ComponentBuilder" => [
								"_Items" => [
									"BoxComponentBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Flex/ComponentBuilder/BoxComponentBuilder.php',
									"ButtonComponentBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Flex/ComponentBuilder/ButtonComponentBuilder.php',
									"FillerComponentBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Flex/ComponentBuilder/FillerComponentBuilder.php',
									"IconComponentBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Flex/ComponentBuilder/IconComponentBuilder.php',
									"ImageComponentBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Flex/ComponentBuilder/ImageComponentBuilder.php',
									"SeparatorComponentBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Flex/ComponentBuilder/SeparatorComponentBuilder.php',
									"SpacerComponentBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Flex/ComponentBuilder/SpacerComponentBuilder.php',
									"SpanComponentBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Flex/ComponentBuilder/SpanComponentBuilder.php',
									"TextComponentBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Flex/ComponentBuilder/TextComponentBuilder.php',
								],
							],
							"ContainerBuilder" => [
								"_Items" => [
									"BubbleContainerBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Flex/ContainerBuilder/BubbleContainerBuilder.php',
									"CarouselContainerBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Flex/ContainerBuilder/CarouselContainerBuilder.php',
								],
							],
							"_Items" => [
								"BlockStyleBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Flex/BlockStyleBuilder.php',
								"BubbleStylesBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Flex/BubbleStylesBuilder.php',
								"ComponentBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Flex/ComponentBuilder.php',
								"ContainerBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Flex/ContainerBuilder.php',
							],
						],
						"Imagemap" => [
							"_Items" => [
								"BaseSizeBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Imagemap/BaseSizeBuilder.php',
								"ExternalLinkBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Imagemap/ExternalLinkBuilder.php',
								"VideoBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/Imagemap/VideoBuilder.php',
							],
						],
						"TemplateBuilder" => [
							"_Items" => [
								"ButtonTemplateBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/TemplateBuilder/ButtonTemplateBuilder.php',
								"CarouselColumnTemplateBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/TemplateBuilder/CarouselColumnTemplateBuilder.php',
								"CarouselTemplateBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/TemplateBuilder/CarouselTemplateBuilder.php',
								"ConfirmTemplateBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/TemplateBuilder/ConfirmTemplateBuilder.php',
								"ImageCarouselColumnTemplateBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/TemplateBuilder/ImageCarouselColumnTemplateBuilder.php',
								"ImageCarouselTemplateBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/TemplateBuilder/ImageCarouselTemplateBuilder.php',
							],
						],
						"_Items" => [
							"AudioMessageBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/AudioMessageBuilder.php',
							"FlexMessageBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/FlexMessageBuilder.php',
							"ImagemapMessageBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/ImagemapMessageBuilder.php',
							"ImageMessageBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/ImageMessageBuilder.php',
							"LocationMessageBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/LocationMessageBuilder.php',
							"MultiMessageBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/MultiMessageBuilder.php',
							"RawMessageBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/RawMessageBuilder.php',
							"StickerMessageBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/StickerMessageBuilder.php',
							"TemplateBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/TemplateBuilder.php',
							"TemplateMessageBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/TemplateMessageBuilder.php',
							"TextMessageBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/TextMessageBuilder.php',
							"VideoMessageBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder/VideoMessageBuilder.php',
						],
					],
					"QuickReplyBuilder" => [
						"ButtonBuilder" => [
							"_Items" => [
								"QuickReplyButtonBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/QuickReplyBuilder/ButtonBuilder/QuickReplyButtonBuilder.php',
							],
						],
						"_Items" => [
							"QuickReplyButtonBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/QuickReplyBuilder/QuickReplyButtonBuilder.php',
							"QuickReplyMessageBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/QuickReplyBuilder/QuickReplyMessageBuilder.php',
						],
					],
					"RichMenuBuilder" => [
						"_Items" => [
							"RichMenuAreaBoundsBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/RichMenuBuilder/RichMenuAreaBoundsBuilder.php',
							"RichMenuAreaBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/RichMenuBuilder/RichMenuAreaBuilder.php',
							"RichMenuSizeBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/RichMenuBuilder/RichMenuSizeBuilder.php',
						],
					],
					"TemplateActionBuilder" => [
						"Uri" => [
							"_Items" => [
								"AltUriBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/TemplateActionBuilder/Uri/AltUriBuilder.php',
							],
						],
						"_Items" => [
							"CameraRollTemplateActionBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/TemplateActionBuilder/CameraRollTemplateActionBuilder.php',
							"CameraTemplateActionBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/TemplateActionBuilder/CameraTemplateActionBuilder.php',
							"DatetimePickerTemplateActionBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/TemplateActionBuilder/DatetimePickerTemplateActionBuilder.php',
							"LocationTemplateActionBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/TemplateActionBuilder/LocationTemplateActionBuilder.php',
							"MessageTemplateActionBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/TemplateActionBuilder/MessageTemplateActionBuilder.php',
							"PostbackTemplateActionBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/TemplateActionBuilder/PostbackTemplateActionBuilder.php',
							"UriTemplateActionBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/TemplateActionBuilder/UriTemplateActionBuilder.php',
						],
					],
					"Util" => [
						"_Items" => [
							"BuildUtil" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Util/BuildUtil.php',
						],
					],
					"_Items" => [
						"HTTPClient" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/HTTPClient.php',
						"ImagemapActionBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/ImagemapActionBuilder.php',
						"MessageBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/MessageBuilder.php',
						"QuickReplyBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/QuickReplyBuilder.php',
						"Response" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/Response.php',
						"RichMenuBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/RichMenuBuilder.php',
						"SignatureValidator" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/SignatureValidator.php',
						"TemplateActionBuilder" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot/TemplateActionBuilder.php',
					],
				],
				"_Items" => [
					"LINEBot" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/src/LINEBot.php',
				],
			],
			"malkusch" => [
				"lock" => [
					"exception" => [
						"_Items" => [
							"DeadlineException" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/exception/DeadlineException.php',
							"ExecutionOutsideLockException" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/exception/ExecutionOutsideLockException.php',
							"LockAcquireException" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/exception/LockAcquireException.php',
							"LockReleaseException" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/exception/LockReleaseException.php',
							"MutexException" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/exception/MutexException.php',
							"TimeoutException" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/exception/TimeoutException.php',
						],
					],
					"mutex" => [
						"_Items" => [
							"CASMutex" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/mutex/CASMutex.php',
							"FlockMutex" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/mutex/FlockMutex.php',
							"LockMutex" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/mutex/LockMutex.php',
							"MemcachedMutex" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/mutex/MemcachedMutex.php',
							"Mutex" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/mutex/Mutex.php',
							"MySQLMutex" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/mutex/MySQLMutex.php',
							"NoMutex" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/mutex/NoMutex.php',
							"PgAdvisoryLockMutex" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/mutex/PgAdvisoryLockMutex.php',
							"PHPRedisMutex" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/mutex/PHPRedisMutex.php',
							"PredisMutex" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/mutex/PredisMutex.php',
							"RedisMutex" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/mutex/RedisMutex.php',
							"SemaphoreMutex" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/mutex/SemaphoreMutex.php',
							"SpinlockMutex" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/mutex/SpinlockMutex.php',
							"TransactionalMutex" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/mutex/TransactionalMutex.php',
						],
					],
					"util" => [
						"_Items" => [
							"DoubleCheckedLocking" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/util/DoubleCheckedLocking.php',
							"Loop" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/util/Loop.php',
							"PcntlTimeout" => self::$hahaha_dir . '/vendor/malkusch/lock/classes/util/PcntlTimeout.php',
						],
					],
					"_Items" => [
					],
				],
				"_Items" => [
				],
			],
			"Monolog" => [
				"Formatter" => [
					"_Items" => [
						"ChromePHPFormatter" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/ChromePHPFormatter.php',
						"ElasticaFormatter" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/ElasticaFormatter.php',
						"ElasticsearchFormatter" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/ElasticsearchFormatter.php',
						"FlowdockFormatter" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/FlowdockFormatter.php',
						"FluentdFormatter" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/FluentdFormatter.php',
						"FormatterInterface" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/FormatterInterface.php',
						"GelfMessageFormatter" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/GelfMessageFormatter.php',
						"HtmlFormatter" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/HtmlFormatter.php',
						"JsonFormatter" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/JsonFormatter.php',
						"LineFormatter" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/LineFormatter.php',
						"LogglyFormatter" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/LogglyFormatter.php',
						"LogmaticFormatter" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/LogmaticFormatter.php',
						"LogstashFormatter" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/LogstashFormatter.php',
						"MongoDBFormatter" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/MongoDBFormatter.php',
						"NormalizerFormatter" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/NormalizerFormatter.php',
						"ScalarFormatter" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/ScalarFormatter.php',
						"WildfireFormatter" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Formatter/WildfireFormatter.php',
					],
				],
				"Handler" => [
					"Curl" => [
						"_Items" => [
							"Util" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/Curl/Util.php',
						],
					],
					"FingersCrossed" => [
						"_Items" => [
							"ActivationStrategyInterface" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/FingersCrossed/ActivationStrategyInterface.php',
							"ChannelLevelActivationStrategy" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/FingersCrossed/ChannelLevelActivationStrategy.php',
							"ErrorLevelActivationStrategy" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/FingersCrossed/ErrorLevelActivationStrategy.php',
						],
					],
					"Slack" => [
						"_Items" => [
							"SlackRecord" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/Slack/SlackRecord.php',
						],
					],
					"SyslogUdp" => [
						"_Items" => [
							"UdpSocket" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/SyslogUdp/UdpSocket.php',
						],
					],
					"_Items" => [
						"AbstractHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/AbstractHandler.php',
						"AbstractProcessingHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/AbstractProcessingHandler.php',
						"AbstractSyslogHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/AbstractSyslogHandler.php',
						"AmqpHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/AmqpHandler.php',
						"BrowserConsoleHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/BrowserConsoleHandler.php',
						"BufferHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/BufferHandler.php',
						"ChromePHPHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/ChromePHPHandler.php',
						"CouchDBHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/CouchDBHandler.php',
						"CubeHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/CubeHandler.php',
						"DeduplicationHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/DeduplicationHandler.php',
						"DoctrineCouchDBHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/DoctrineCouchDBHandler.php',
						"DynamoDbHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/DynamoDbHandler.php',
						"ElasticaHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/ElasticaHandler.php',
						"ElasticsearchHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/ElasticsearchHandler.php',
						"ErrorLogHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/ErrorLogHandler.php',
						"FallbackGroupHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/FallbackGroupHandler.php',
						"FilterHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/FilterHandler.php',
						"FingersCrossedHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/FingersCrossedHandler.php',
						"FirePHPHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/FirePHPHandler.php',
						"FleepHookHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/FleepHookHandler.php',
						"FlowdockHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/FlowdockHandler.php',
						"FormattableHandlerInterface" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/FormattableHandlerInterface.php',
						"FormattableHandlerTrait" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/FormattableHandlerTrait.php',
						"GelfHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/GelfHandler.php',
						"GroupHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/GroupHandler.php',
						"Handler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/Handler.php',
						"HandlerInterface" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/HandlerInterface.php',
						"HandlerWrapper" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/HandlerWrapper.php',
						"IFTTTHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/IFTTTHandler.php',
						"InsightOpsHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/InsightOpsHandler.php',
						"LogEntriesHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/LogEntriesHandler.php',
						"LogglyHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/LogglyHandler.php',
						"LogmaticHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/LogmaticHandler.php',
						"MailHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/MailHandler.php',
						"MandrillHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/MandrillHandler.php',
						"MissingExtensionException" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/MissingExtensionException.php',
						"MongoDBHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/MongoDBHandler.php',
						"NativeMailerHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/NativeMailerHandler.php',
						"NewRelicHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/NewRelicHandler.php',
						"NoopHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/NoopHandler.php',
						"NullHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/NullHandler.php',
						"OverflowHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/OverflowHandler.php',
						"PHPConsoleHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/PHPConsoleHandler.php',
						"ProcessableHandlerInterface" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/ProcessableHandlerInterface.php',
						"ProcessableHandlerTrait" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/ProcessableHandlerTrait.php',
						"ProcessHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/ProcessHandler.php',
						"PsrHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/PsrHandler.php',
						"PushoverHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/PushoverHandler.php',
						"RedisHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/RedisHandler.php',
						"RollbarHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/RollbarHandler.php',
						"RotatingFileHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/RotatingFileHandler.php',
						"SamplingHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/SamplingHandler.php',
						"SendGridHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/SendGridHandler.php',
						"SlackHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/SlackHandler.php',
						"SlackWebhookHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/SlackWebhookHandler.php',
						"SocketHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/SocketHandler.php',
						"SqsHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/SqsHandler.php',
						"StreamHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/StreamHandler.php',
						"SwiftMailerHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/SwiftMailerHandler.php',
						"SyslogHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/SyslogHandler.php',
						"SyslogUdpHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/SyslogUdpHandler.php',
						"TelegramBotHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/TelegramBotHandler.php',
						"TestHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/TestHandler.php',
						"WebRequestRecognizerTrait" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/WebRequestRecognizerTrait.php',
						"WhatFailureGroupHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/WhatFailureGroupHandler.php',
						"ZendMonitorHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Handler/ZendMonitorHandler.php',
					],
				],
				"Processor" => [
					"_Items" => [
						"GitProcessor" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Processor/GitProcessor.php',
						"HostnameProcessor" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Processor/HostnameProcessor.php',
						"IntrospectionProcessor" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Processor/IntrospectionProcessor.php',
						"MemoryPeakUsageProcessor" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Processor/MemoryPeakUsageProcessor.php',
						"MemoryProcessor" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Processor/MemoryProcessor.php',
						"MemoryUsageProcessor" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Processor/MemoryUsageProcessor.php',
						"MercurialProcessor" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Processor/MercurialProcessor.php',
						"ProcessIdProcessor" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Processor/ProcessIdProcessor.php',
						"ProcessorInterface" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Processor/ProcessorInterface.php',
						"PsrLogMessageProcessor" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Processor/PsrLogMessageProcessor.php',
						"TagProcessor" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Processor/TagProcessor.php',
						"UidProcessor" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Processor/UidProcessor.php',
						"WebProcessor" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Processor/WebProcessor.php',
					],
				],
				"_Items" => [
					"DateTimeImmutable" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/DateTimeImmutable.php',
					"ErrorHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/ErrorHandler.php',
					"Logger" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Logger.php',
					"Registry" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Registry.php',
					"ResettableInterface" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/ResettableInterface.php',
					"SignalHandler" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/SignalHandler.php',
					"Utils" => self::$hahaha_dir . '/vendor/monolog/monolog/src/Monolog/Utils.php',
				],
			],
			"Mpociot" => [
				"Pipeline" => [
					"_Items" => [
						"Pipeline" => self::$hahaha_dir . '/vendor/mpociot/pipeline/src/Pipeline.php',
					],
				],
				"_Items" => [
				],
			],
			"Opis" => [
				"Closure" => [
					"_Items" => [
						"Analyzer" => self::$hahaha_dir . '/vendor/opis/closure/src/Analyzer.php',
						"ClosureContext" => self::$hahaha_dir . '/vendor/opis/closure/src/ClosureContext.php',
						"ClosureScope" => self::$hahaha_dir . '/vendor/opis/closure/src/ClosureScope.php',
						"ClosureStream" => self::$hahaha_dir . '/vendor/opis/closure/src/ClosureStream.php',
						"ISecurityProvider" => self::$hahaha_dir . '/vendor/opis/closure/src/ISecurityProvider.php',
						"ReflectionClosure" => self::$hahaha_dir . '/vendor/opis/closure/src/ReflectionClosure.php',
						"SecurityException" => self::$hahaha_dir . '/vendor/opis/closure/src/SecurityException.php',
						"SecurityProvider" => self::$hahaha_dir . '/vendor/opis/closure/src/SecurityProvider.php',
						"SelfReference" => self::$hahaha_dir . '/vendor/opis/closure/src/SelfReference.php',
						"SerializableClosure" => self::$hahaha_dir . '/vendor/opis/closure/src/SerializableClosure.php',
					],
				],
				"_Items" => [
				],
			],
			"PHPHtmlParser" => [
				"Dom" => [
					"_Items" => [
						"AbstractNode" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Dom/AbstractNode.php',
						"ArrayNode" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Dom/ArrayNode.php',
						"Collection" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Dom/Collection.php',
						"HtmlNode" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Dom/HtmlNode.php',
						"InnerNode" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Dom/InnerNode.php',
						"LeafNode" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Dom/LeafNode.php',
						"Tag" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Dom/Tag.php',
						"TextNode" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Dom/TextNode.php',
					],
				],
				"Exceptions" => [
					"_Items" => [
						"ChildNotFoundException" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Exceptions/ChildNotFoundException.php',
						"CircularException" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Exceptions/CircularException.php',
						"CurlException" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Exceptions/CurlException.php',
						"EmptyCollectionException" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Exceptions/EmptyCollectionException.php',
						"NotLoadedException" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Exceptions/NotLoadedException.php',
						"ParentNotFoundException" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Exceptions/ParentNotFoundException.php',
						"StrictException" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Exceptions/StrictException.php',
						"UnknownChildTypeException" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Exceptions/UnknownChildTypeException.php',
					],
				],
				"Selector" => [
					"_Items" => [
						"Parser" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Selector/Parser.php',
						"ParserInterface" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Selector/ParserInterface.php',
						"Selector" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Selector/Selector.php',
					],
				],
				"_Items" => [
					"Content" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Content.php',
					"Curl" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Curl.php',
					"CurlInterface" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/CurlInterface.php',
					"Dom" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Dom.php',
					"Finder" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Finder.php',
					"Options" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/Options.php',
					"StaticDom" => self::$hahaha_dir . '/vendor/paquettg/php-html-parser/src/PHPHtmlParser/StaticDom.php',
				],
			],
			"stringEncode" => [
				"_Items" => [
					"Encode" => self::$hahaha_dir . '/vendor/paquettg/string-encode/src/stringEncode/Encode.php',
					"Exception" => self::$hahaha_dir . '/vendor/paquettg/string-encode/src/stringEncode/Exception.php',
				],
			],
			"PHPMailer" => [
				"PHPMailer" => [
					"_Items" => [
						"Exception" => self::$hahaha_dir . '/vendor/phpmailer/phpmailer/src/Exception.php',
						"OAuth" => self::$hahaha_dir . '/vendor/phpmailer/phpmailer/src/OAuth.php',
						"PHPMailer" => self::$hahaha_dir . '/vendor/phpmailer/phpmailer/src/PHPMailer.php',
						"POP3" => self::$hahaha_dir . '/vendor/phpmailer/phpmailer/src/POP3.php',
						"SMTP" => self::$hahaha_dir . '/vendor/phpmailer/phpmailer/src/SMTP.php',
					],
				],
				"_Items" => [
				],
			],
			"Psr" => [
				"Container" => [
					"_Items" => [
						"ContainerExceptionInterface" => self::$hahaha_dir . '/vendor/psr/container/src/ContainerExceptionInterface.php',
						"ContainerInterface" => self::$hahaha_dir . '/vendor/psr/container/src/ContainerInterface.php',
						"NotFoundExceptionInterface" => self::$hahaha_dir . '/vendor/psr/container/src/NotFoundExceptionInterface.php',
					],
				],
				"Log" => [
					"_Items" => [
						"AbstractLogger" => self::$hahaha_dir . '/vendor/psr/log/Psr/Log/AbstractLogger.php',
						"InvalidArgumentException" => self::$hahaha_dir . '/vendor/psr/log/Psr/Log/InvalidArgumentException.php',
						"LoggerAwareInterface" => self::$hahaha_dir . '/vendor/psr/log/Psr/Log/LoggerAwareInterface.php',
						"LoggerAwareTrait" => self::$hahaha_dir . '/vendor/psr/log/Psr/Log/LoggerAwareTrait.php',
						"LoggerInterface" => self::$hahaha_dir . '/vendor/psr/log/Psr/Log/LoggerInterface.php',
						"LoggerTrait" => self::$hahaha_dir . '/vendor/psr/log/Psr/Log/LoggerTrait.php',
						"LogLevel" => self::$hahaha_dir . '/vendor/psr/log/Psr/Log/LogLevel.php',
						"NullLogger" => self::$hahaha_dir . '/vendor/psr/log/Psr/Log/NullLogger.php',
					],
				],
				"_Items" => [
				],
			],
			"ExecParallel" => [
				"_Items" => [
					"Controller" => self::$hahaha_dir . '/vendor/ravisorg/exec-parallel/src/Controller.php',
					"Job" => self::$hahaha_dir . '/vendor/ravisorg/exec-parallel/src/Job.php',
				],
			],
			"React" => [
				"Cache" => [
					"_Items" => [
						"ArrayCache" => self::$hahaha_dir . '/vendor/react/cache/src/ArrayCache.php',
						"CacheInterface" => self::$hahaha_dir . '/vendor/react/cache/src/CacheInterface.php',
					],
				],
				"Dns" => [
					"Config" => [
						"_Items" => [
							"Config" => self::$hahaha_dir . '/vendor/react/dns/src/Config/Config.php',
							"HostsFile" => self::$hahaha_dir . '/vendor/react/dns/src/Config/HostsFile.php',
						],
					],
					"Model" => [
						"_Items" => [
							"Message" => self::$hahaha_dir . '/vendor/react/dns/src/Model/Message.php',
							"Record" => self::$hahaha_dir . '/vendor/react/dns/src/Model/Record.php',
						],
					],
					"Protocol" => [
						"_Items" => [
							"BinaryDumper" => self::$hahaha_dir . '/vendor/react/dns/src/Protocol/BinaryDumper.php',
							"Parser" => self::$hahaha_dir . '/vendor/react/dns/src/Protocol/Parser.php',
						],
					],
					"Query" => [
						"_Items" => [
							"CachingExecutor" => self::$hahaha_dir . '/vendor/react/dns/src/Query/CachingExecutor.php',
							"CancellationException" => self::$hahaha_dir . '/vendor/react/dns/src/Query/CancellationException.php',
							"CoopExecutor" => self::$hahaha_dir . '/vendor/react/dns/src/Query/CoopExecutor.php',
							"ExecutorInterface" => self::$hahaha_dir . '/vendor/react/dns/src/Query/ExecutorInterface.php',
							"HostsFileExecutor" => self::$hahaha_dir . '/vendor/react/dns/src/Query/HostsFileExecutor.php',
							"Query" => self::$hahaha_dir . '/vendor/react/dns/src/Query/Query.php',
							"RetryExecutor" => self::$hahaha_dir . '/vendor/react/dns/src/Query/RetryExecutor.php',
							"SelectiveTransportExecutor" => self::$hahaha_dir . '/vendor/react/dns/src/Query/SelectiveTransportExecutor.php',
							"TcpTransportExecutor" => self::$hahaha_dir . '/vendor/react/dns/src/Query/TcpTransportExecutor.php',
							"TimeoutException" => self::$hahaha_dir . '/vendor/react/dns/src/Query/TimeoutException.php',
							"TimeoutExecutor" => self::$hahaha_dir . '/vendor/react/dns/src/Query/TimeoutExecutor.php',
							"UdpTransportExecutor" => self::$hahaha_dir . '/vendor/react/dns/src/Query/UdpTransportExecutor.php',
						],
					],
					"Resolver" => [
						"_Items" => [
							"Factory" => self::$hahaha_dir . '/vendor/react/dns/src/Resolver/Factory.php',
							"Resolver" => self::$hahaha_dir . '/vendor/react/dns/src/Resolver/Resolver.php',
							"ResolverInterface" => self::$hahaha_dir . '/vendor/react/dns/src/Resolver/ResolverInterface.php',
						],
					],
					"_Items" => [
						"BadServerException" => self::$hahaha_dir . '/vendor/react/dns/src/BadServerException.php',
						"RecordNotFoundException" => self::$hahaha_dir . '/vendor/react/dns/src/RecordNotFoundException.php',
					],
				],
				"EventLoop" => [
					"Tick" => [
						"_Items" => [
							"FutureTickQueue" => self::$hahaha_dir . '/vendor/react/event-loop/src/Tick/FutureTickQueue.php',
						],
					],
					"Timer" => [
						"_Items" => [
							"Timer" => self::$hahaha_dir . '/vendor/react/event-loop/src/Timer/Timer.php',
							"Timers" => self::$hahaha_dir . '/vendor/react/event-loop/src/Timer/Timers.php',
						],
					],
					"_Items" => [
						"ExtEventLoop" => self::$hahaha_dir . '/vendor/react/event-loop/src/ExtEventLoop.php',
						"ExtEvLoop" => self::$hahaha_dir . '/vendor/react/event-loop/src/ExtEvLoop.php',
						"ExtLibeventLoop" => self::$hahaha_dir . '/vendor/react/event-loop/src/ExtLibeventLoop.php',
						"ExtLibevLoop" => self::$hahaha_dir . '/vendor/react/event-loop/src/ExtLibevLoop.php',
						"ExtUvLoop" => self::$hahaha_dir . '/vendor/react/event-loop/src/ExtUvLoop.php',
						"Factory" => self::$hahaha_dir . '/vendor/react/event-loop/src/Factory.php',
						"LoopInterface" => self::$hahaha_dir . '/vendor/react/event-loop/src/LoopInterface.php',
						"SignalsHandler" => self::$hahaha_dir . '/vendor/react/event-loop/src/SignalsHandler.php',
						"StreamSelectLoop" => self::$hahaha_dir . '/vendor/react/event-loop/src/StreamSelectLoop.php',
						"TimerInterface" => self::$hahaha_dir . '/vendor/react/event-loop/src/TimerInterface.php',
					],
				],
				"Promise" => [
					"Exception" => [
						"_Items" => [
							"LengthException" => self::$hahaha_dir . '/vendor/react/promise/src/Exception/LengthException.php',
						],
					],
					"Timer" => [
						"_Items" => [
							"TimeoutException" => self::$hahaha_dir . '/vendor/react/promise-timer/src/TimeoutException.php',
						],
					],
					"_Items" => [
						"CancellablePromiseInterface" => self::$hahaha_dir . '/vendor/react/promise/src/CancellablePromiseInterface.php',
						"CancellationQueue" => self::$hahaha_dir . '/vendor/react/promise/src/CancellationQueue.php',
						"Deferred" => self::$hahaha_dir . '/vendor/react/promise/src/Deferred.php',
						"ExtendedPromiseInterface" => self::$hahaha_dir . '/vendor/react/promise/src/ExtendedPromiseInterface.php',
						"FulfilledPromise" => self::$hahaha_dir . '/vendor/react/promise/src/FulfilledPromise.php',
						"LazyPromise" => self::$hahaha_dir . '/vendor/react/promise/src/LazyPromise.php',
						"Promise" => self::$hahaha_dir . '/vendor/react/promise/src/Promise.php',
						"PromiseInterface" => self::$hahaha_dir . '/vendor/react/promise/src/PromiseInterface.php',
						"PromisorInterface" => self::$hahaha_dir . '/vendor/react/promise/src/PromisorInterface.php',
						"RejectedPromise" => self::$hahaha_dir . '/vendor/react/promise/src/RejectedPromise.php',
						"UnhandledRejectionException" => self::$hahaha_dir . '/vendor/react/promise/src/UnhandledRejectionException.php',
					],
				],
				"Socket" => [
					"_Items" => [
						"Connection" => self::$hahaha_dir . '/vendor/react/socket/src/Connection.php',
						"ConnectionInterface" => self::$hahaha_dir . '/vendor/react/socket/src/ConnectionInterface.php',
						"Connector" => self::$hahaha_dir . '/vendor/react/socket/src/Connector.php',
						"ConnectorInterface" => self::$hahaha_dir . '/vendor/react/socket/src/ConnectorInterface.php',
						"DnsConnector" => self::$hahaha_dir . '/vendor/react/socket/src/DnsConnector.php',
						"FixedUriConnector" => self::$hahaha_dir . '/vendor/react/socket/src/FixedUriConnector.php',
						"LimitingServer" => self::$hahaha_dir . '/vendor/react/socket/src/LimitingServer.php',
						"SecureConnector" => self::$hahaha_dir . '/vendor/react/socket/src/SecureConnector.php',
						"SecureServer" => self::$hahaha_dir . '/vendor/react/socket/src/SecureServer.php',
						"Server" => self::$hahaha_dir . '/vendor/react/socket/src/Server.php',
						"ServerInterface" => self::$hahaha_dir . '/vendor/react/socket/src/ServerInterface.php',
						"StreamEncryption" => self::$hahaha_dir . '/vendor/react/socket/src/StreamEncryption.php',
						"TcpConnector" => self::$hahaha_dir . '/vendor/react/socket/src/TcpConnector.php',
						"TcpServer" => self::$hahaha_dir . '/vendor/react/socket/src/TcpServer.php',
						"TimeoutConnector" => self::$hahaha_dir . '/vendor/react/socket/src/TimeoutConnector.php',
						"UnixConnector" => self::$hahaha_dir . '/vendor/react/socket/src/UnixConnector.php',
						"UnixServer" => self::$hahaha_dir . '/vendor/react/socket/src/UnixServer.php',
					],
				],
				"Stream" => [
					"_Items" => [
						"CompositeStream" => self::$hahaha_dir . '/vendor/react/stream/src/CompositeStream.php',
						"DuplexResourceStream" => self::$hahaha_dir . '/vendor/react/stream/src/DuplexResourceStream.php',
						"DuplexStreamInterface" => self::$hahaha_dir . '/vendor/react/stream/src/DuplexStreamInterface.php',
						"ReadableResourceStream" => self::$hahaha_dir . '/vendor/react/stream/src/ReadableResourceStream.php',
						"ReadableStreamInterface" => self::$hahaha_dir . '/vendor/react/stream/src/ReadableStreamInterface.php',
						"ThroughStream" => self::$hahaha_dir . '/vendor/react/stream/src/ThroughStream.php',
						"Util" => self::$hahaha_dir . '/vendor/react/stream/src/Util.php',
						"WritableResourceStream" => self::$hahaha_dir . '/vendor/react/stream/src/WritableResourceStream.php',
						"WritableStreamInterface" => self::$hahaha_dir . '/vendor/react/stream/src/WritableStreamInterface.php',
					],
				],
				"_Items" => [
				],
			],
			"RedLock" => [
				"_Items" => [
					"RedLock" => self::$hahaha_dir . '/vendor/signe/redlock-php/src/RedLock.php',
				],
			],
			"Spatie" => [
				"Macroable" => [
					"_Items" => [
						"Macroable" => self::$hahaha_dir . '/vendor/spatie/macroable/src/Macroable.php',
					],
				],
				"_Items" => [
				],
			],
			"Symfony" => [
				"Component" => [
					"Console" => [
						"Command" => [
							"_Items" => [
								"Command" => self::$hahaha_dir . '/vendor/symfony/console/Command/Command.php',
								"HelpCommand" => self::$hahaha_dir . '/vendor/symfony/console/Command/HelpCommand.php',
								"ListCommand" => self::$hahaha_dir . '/vendor/symfony/console/Command/ListCommand.php',
								"LockableTrait" => self::$hahaha_dir . '/vendor/symfony/console/Command/LockableTrait.php',
							],
						],
						"CommandLoader" => [
							"_Items" => [
								"CommandLoaderInterface" => self::$hahaha_dir . '/vendor/symfony/console/CommandLoader/CommandLoaderInterface.php',
								"ContainerCommandLoader" => self::$hahaha_dir . '/vendor/symfony/console/CommandLoader/ContainerCommandLoader.php',
								"FactoryCommandLoader" => self::$hahaha_dir . '/vendor/symfony/console/CommandLoader/FactoryCommandLoader.php',
							],
						],
						"DependencyInjection" => [
							"_Items" => [
								"AddConsoleCommandPass" => self::$hahaha_dir . '/vendor/symfony/console/DependencyInjection/AddConsoleCommandPass.php',
							],
						],
						"Descriptor" => [
							"_Items" => [
								"ApplicationDescription" => self::$hahaha_dir . '/vendor/symfony/console/Descriptor/ApplicationDescription.php',
								"Descriptor" => self::$hahaha_dir . '/vendor/symfony/console/Descriptor/Descriptor.php',
								"DescriptorInterface" => self::$hahaha_dir . '/vendor/symfony/console/Descriptor/DescriptorInterface.php',
								"JsonDescriptor" => self::$hahaha_dir . '/vendor/symfony/console/Descriptor/JsonDescriptor.php',
								"MarkdownDescriptor" => self::$hahaha_dir . '/vendor/symfony/console/Descriptor/MarkdownDescriptor.php',
								"TextDescriptor" => self::$hahaha_dir . '/vendor/symfony/console/Descriptor/TextDescriptor.php',
								"XmlDescriptor" => self::$hahaha_dir . '/vendor/symfony/console/Descriptor/XmlDescriptor.php',
							],
						],
						"Event" => [
							"_Items" => [
								"ConsoleCommandEvent" => self::$hahaha_dir . '/vendor/symfony/console/Event/ConsoleCommandEvent.php',
								"ConsoleErrorEvent" => self::$hahaha_dir . '/vendor/symfony/console/Event/ConsoleErrorEvent.php',
								"ConsoleEvent" => self::$hahaha_dir . '/vendor/symfony/console/Event/ConsoleEvent.php',
								"ConsoleTerminateEvent" => self::$hahaha_dir . '/vendor/symfony/console/Event/ConsoleTerminateEvent.php',
							],
						],
						"EventListener" => [
							"_Items" => [
								"ErrorListener" => self::$hahaha_dir . '/vendor/symfony/console/EventListener/ErrorListener.php',
							],
						],
						"Exception" => [
							"_Items" => [
								"CommandNotFoundException" => self::$hahaha_dir . '/vendor/symfony/console/Exception/CommandNotFoundException.php',
								"ExceptionInterface" => self::$hahaha_dir . '/vendor/symfony/console/Exception/ExceptionInterface.php',
								"InvalidArgumentException" => self::$hahaha_dir . '/vendor/symfony/console/Exception/InvalidArgumentException.php',
								"InvalidOptionException" => self::$hahaha_dir . '/vendor/symfony/console/Exception/InvalidOptionException.php',
								"LogicException" => self::$hahaha_dir . '/vendor/symfony/console/Exception/LogicException.php',
								"NamespaceNotFoundException" => self::$hahaha_dir . '/vendor/symfony/console/Exception/NamespaceNotFoundException.php',
								"RuntimeException" => self::$hahaha_dir . '/vendor/symfony/console/Exception/RuntimeException.php',
							],
						],
						"Formatter" => [
							"_Items" => [
								"OutputFormatter" => self::$hahaha_dir . '/vendor/symfony/console/Formatter/OutputFormatter.php',
								"OutputFormatterInterface" => self::$hahaha_dir . '/vendor/symfony/console/Formatter/OutputFormatterInterface.php',
								"OutputFormatterStyle" => self::$hahaha_dir . '/vendor/symfony/console/Formatter/OutputFormatterStyle.php',
								"OutputFormatterStyleInterface" => self::$hahaha_dir . '/vendor/symfony/console/Formatter/OutputFormatterStyleInterface.php',
								"OutputFormatterStyleStack" => self::$hahaha_dir . '/vendor/symfony/console/Formatter/OutputFormatterStyleStack.php',
								"WrappableOutputFormatterInterface" => self::$hahaha_dir . '/vendor/symfony/console/Formatter/WrappableOutputFormatterInterface.php',
							],
						],
						"Helper" => [
							"_Items" => [
								"DebugFormatterHelper" => self::$hahaha_dir . '/vendor/symfony/console/Helper/DebugFormatterHelper.php',
								"DescriptorHelper" => self::$hahaha_dir . '/vendor/symfony/console/Helper/DescriptorHelper.php',
								"Dumper" => self::$hahaha_dir . '/vendor/symfony/console/Helper/Dumper.php',
								"FormatterHelper" => self::$hahaha_dir . '/vendor/symfony/console/Helper/FormatterHelper.php',
								"Helper" => self::$hahaha_dir . '/vendor/symfony/console/Helper/Helper.php',
								"HelperInterface" => self::$hahaha_dir . '/vendor/symfony/console/Helper/HelperInterface.php',
								"HelperSet" => self::$hahaha_dir . '/vendor/symfony/console/Helper/HelperSet.php',
								"InputAwareHelper" => self::$hahaha_dir . '/vendor/symfony/console/Helper/InputAwareHelper.php',
								"ProcessHelper" => self::$hahaha_dir . '/vendor/symfony/console/Helper/ProcessHelper.php',
								"ProgressBar" => self::$hahaha_dir . '/vendor/symfony/console/Helper/ProgressBar.php',
								"ProgressIndicator" => self::$hahaha_dir . '/vendor/symfony/console/Helper/ProgressIndicator.php',
								"QuestionHelper" => self::$hahaha_dir . '/vendor/symfony/console/Helper/QuestionHelper.php',
								"SymfonyQuestionHelper" => self::$hahaha_dir . '/vendor/symfony/console/Helper/SymfonyQuestionHelper.php',
								"Table" => self::$hahaha_dir . '/vendor/symfony/console/Helper/Table.php',
								"TableCell" => self::$hahaha_dir . '/vendor/symfony/console/Helper/TableCell.php',
								"TableRows" => self::$hahaha_dir . '/vendor/symfony/console/Helper/TableRows.php',
								"TableSeparator" => self::$hahaha_dir . '/vendor/symfony/console/Helper/TableSeparator.php',
								"TableStyle" => self::$hahaha_dir . '/vendor/symfony/console/Helper/TableStyle.php',
							],
						],
						"Input" => [
							"_Items" => [
								"ArgvInput" => self::$hahaha_dir . '/vendor/symfony/console/Input/ArgvInput.php',
								"ArrayInput" => self::$hahaha_dir . '/vendor/symfony/console/Input/ArrayInput.php',
								"Input" => self::$hahaha_dir . '/vendor/symfony/console/Input/Input.php',
								"InputArgument" => self::$hahaha_dir . '/vendor/symfony/console/Input/InputArgument.php',
								"InputAwareInterface" => self::$hahaha_dir . '/vendor/symfony/console/Input/InputAwareInterface.php',
								"InputDefinition" => self::$hahaha_dir . '/vendor/symfony/console/Input/InputDefinition.php',
								"InputInterface" => self::$hahaha_dir . '/vendor/symfony/console/Input/InputInterface.php',
								"InputOption" => self::$hahaha_dir . '/vendor/symfony/console/Input/InputOption.php',
								"StreamableInputInterface" => self::$hahaha_dir . '/vendor/symfony/console/Input/StreamableInputInterface.php',
								"StringInput" => self::$hahaha_dir . '/vendor/symfony/console/Input/StringInput.php',
							],
						],
						"Logger" => [
							"_Items" => [
								"ConsoleLogger" => self::$hahaha_dir . '/vendor/symfony/console/Logger/ConsoleLogger.php',
							],
						],
						"Output" => [
							"_Items" => [
								"BufferedOutput" => self::$hahaha_dir . '/vendor/symfony/console/Output/BufferedOutput.php',
								"ConsoleOutput" => self::$hahaha_dir . '/vendor/symfony/console/Output/ConsoleOutput.php',
								"ConsoleOutputInterface" => self::$hahaha_dir . '/vendor/symfony/console/Output/ConsoleOutputInterface.php',
								"ConsoleSectionOutput" => self::$hahaha_dir . '/vendor/symfony/console/Output/ConsoleSectionOutput.php',
								"NullOutput" => self::$hahaha_dir . '/vendor/symfony/console/Output/NullOutput.php',
								"Output" => self::$hahaha_dir . '/vendor/symfony/console/Output/Output.php',
								"OutputInterface" => self::$hahaha_dir . '/vendor/symfony/console/Output/OutputInterface.php',
								"StreamOutput" => self::$hahaha_dir . '/vendor/symfony/console/Output/StreamOutput.php',
							],
						],
						"Question" => [
							"_Items" => [
								"ChoiceQuestion" => self::$hahaha_dir . '/vendor/symfony/console/Question/ChoiceQuestion.php',
								"ConfirmationQuestion" => self::$hahaha_dir . '/vendor/symfony/console/Question/ConfirmationQuestion.php',
								"Question" => self::$hahaha_dir . '/vendor/symfony/console/Question/Question.php',
							],
						],
						"Style" => [
							"_Items" => [
								"OutputStyle" => self::$hahaha_dir . '/vendor/symfony/console/Style/OutputStyle.php',
								"StyleInterface" => self::$hahaha_dir . '/vendor/symfony/console/Style/StyleInterface.php',
								"SymfonyStyle" => self::$hahaha_dir . '/vendor/symfony/console/Style/SymfonyStyle.php',
							],
						],
						"Tester" => [
							"_Items" => [
								"ApplicationTester" => self::$hahaha_dir . '/vendor/symfony/console/Tester/ApplicationTester.php',
								"CommandTester" => self::$hahaha_dir . '/vendor/symfony/console/Tester/CommandTester.php',
								"TesterTrait" => self::$hahaha_dir . '/vendor/symfony/console/Tester/TesterTrait.php',
							],
						],
						"_Items" => [
							"Application" => self::$hahaha_dir . '/vendor/symfony/console/Application.php',
							"ConsoleEvents" => self::$hahaha_dir . '/vendor/symfony/console/ConsoleEvents.php',
							"Terminal" => self::$hahaha_dir . '/vendor/symfony/console/Terminal.php',
						],
					],
					"CssSelector" => [
						"Exception" => [
							"_Items" => [
								"ExceptionInterface" => self::$hahaha_dir . '/vendor/symfony/css-selector/Exception/ExceptionInterface.php',
								"ExpressionErrorException" => self::$hahaha_dir . '/vendor/symfony/css-selector/Exception/ExpressionErrorException.php',
								"InternalErrorException" => self::$hahaha_dir . '/vendor/symfony/css-selector/Exception/InternalErrorException.php',
								"ParseException" => self::$hahaha_dir . '/vendor/symfony/css-selector/Exception/ParseException.php',
								"SyntaxErrorException" => self::$hahaha_dir . '/vendor/symfony/css-selector/Exception/SyntaxErrorException.php',
							],
						],
						"Node" => [
							"_Items" => [
								"AbstractNode" => self::$hahaha_dir . '/vendor/symfony/css-selector/Node/AbstractNode.php',
								"AttributeNode" => self::$hahaha_dir . '/vendor/symfony/css-selector/Node/AttributeNode.php',
								"ClassNode" => self::$hahaha_dir . '/vendor/symfony/css-selector/Node/ClassNode.php',
								"CombinedSelectorNode" => self::$hahaha_dir . '/vendor/symfony/css-selector/Node/CombinedSelectorNode.php',
								"ElementNode" => self::$hahaha_dir . '/vendor/symfony/css-selector/Node/ElementNode.php',
								"FunctionNode" => self::$hahaha_dir . '/vendor/symfony/css-selector/Node/FunctionNode.php',
								"HashNode" => self::$hahaha_dir . '/vendor/symfony/css-selector/Node/HashNode.php',
								"NegationNode" => self::$hahaha_dir . '/vendor/symfony/css-selector/Node/NegationNode.php',
								"NodeInterface" => self::$hahaha_dir . '/vendor/symfony/css-selector/Node/NodeInterface.php',
								"PseudoNode" => self::$hahaha_dir . '/vendor/symfony/css-selector/Node/PseudoNode.php',
								"SelectorNode" => self::$hahaha_dir . '/vendor/symfony/css-selector/Node/SelectorNode.php',
								"Specificity" => self::$hahaha_dir . '/vendor/symfony/css-selector/Node/Specificity.php',
							],
						],
						"Parser" => [
							"Handler" => [
								"_Items" => [
									"CommentHandler" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Handler/CommentHandler.php',
									"HandlerInterface" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Handler/HandlerInterface.php',
									"HashHandler" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Handler/HashHandler.php',
									"IdentifierHandler" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Handler/IdentifierHandler.php',
									"NumberHandler" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Handler/NumberHandler.php',
									"StringHandler" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Handler/StringHandler.php',
									"WhitespaceHandler" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Handler/WhitespaceHandler.php',
								],
							],
							"Shortcut" => [
								"_Items" => [
									"ClassParser" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Shortcut/ClassParser.php',
									"ElementParser" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Shortcut/ElementParser.php',
									"EmptyStringParser" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Shortcut/EmptyStringParser.php',
									"HashParser" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Shortcut/HashParser.php',
								],
							],
							"Tokenizer" => [
								"_Items" => [
									"Tokenizer" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Tokenizer/Tokenizer.php',
									"TokenizerEscaping" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Tokenizer/TokenizerEscaping.php',
									"TokenizerPatterns" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Tokenizer/TokenizerPatterns.php',
								],
							],
							"_Items" => [
								"Parser" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Parser.php',
								"ParserInterface" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/ParserInterface.php',
								"Reader" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Reader.php',
								"Token" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/Token.php',
								"TokenStream" => self::$hahaha_dir . '/vendor/symfony/css-selector/Parser/TokenStream.php',
							],
						],
						"XPath" => [
							"Extension" => [
								"_Items" => [
									"AbstractExtension" => self::$hahaha_dir . '/vendor/symfony/css-selector/XPath/Extension/AbstractExtension.php',
									"AttributeMatchingExtension" => self::$hahaha_dir . '/vendor/symfony/css-selector/XPath/Extension/AttributeMatchingExtension.php',
									"CombinationExtension" => self::$hahaha_dir . '/vendor/symfony/css-selector/XPath/Extension/CombinationExtension.php',
									"ExtensionInterface" => self::$hahaha_dir . '/vendor/symfony/css-selector/XPath/Extension/ExtensionInterface.php',
									"FunctionExtension" => self::$hahaha_dir . '/vendor/symfony/css-selector/XPath/Extension/FunctionExtension.php',
									"HtmlExtension" => self::$hahaha_dir . '/vendor/symfony/css-selector/XPath/Extension/HtmlExtension.php',
									"NodeExtension" => self::$hahaha_dir . '/vendor/symfony/css-selector/XPath/Extension/NodeExtension.php',
									"PseudoClassExtension" => self::$hahaha_dir . '/vendor/symfony/css-selector/XPath/Extension/PseudoClassExtension.php',
								],
							],
							"_Items" => [
								"Translator" => self::$hahaha_dir . '/vendor/symfony/css-selector/XPath/Translator.php',
								"TranslatorInterface" => self::$hahaha_dir . '/vendor/symfony/css-selector/XPath/TranslatorInterface.php',
								"XPathExpr" => self::$hahaha_dir . '/vendor/symfony/css-selector/XPath/XPathExpr.php',
							],
						],
						"_Items" => [
							"CssSelectorConverter" => self::$hahaha_dir . '/vendor/symfony/css-selector/CssSelectorConverter.php',
						],
					],
					"HttpFoundation" => [
						"Exception" => [
							"_Items" => [
								"ConflictingHeadersException" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Exception/ConflictingHeadersException.php',
								"RequestExceptionInterface" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Exception/RequestExceptionInterface.php',
								"SuspiciousOperationException" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Exception/SuspiciousOperationException.php',
							],
						],
						"File" => [
							"Exception" => [
								"_Items" => [
									"AccessDeniedException" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/Exception/AccessDeniedException.php',
									"CannotWriteFileException" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/Exception/CannotWriteFileException.php',
									"ExtensionFileException" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/Exception/ExtensionFileException.php',
									"FileException" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/Exception/FileException.php',
									"FileNotFoundException" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/Exception/FileNotFoundException.php',
									"FormSizeFileException" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/Exception/FormSizeFileException.php',
									"IniSizeFileException" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/Exception/IniSizeFileException.php',
									"NoFileException" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/Exception/NoFileException.php',
									"NoTmpDirFileException" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/Exception/NoTmpDirFileException.php',
									"PartialFileException" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/Exception/PartialFileException.php',
									"UnexpectedTypeException" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/Exception/UnexpectedTypeException.php',
									"UploadException" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/Exception/UploadException.php',
								],
							],
							"MimeType" => [
								"_Items" => [
									"ExtensionGuesser" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/MimeType/ExtensionGuesser.php',
									"ExtensionGuesserInterface" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/MimeType/ExtensionGuesserInterface.php',
									"FileBinaryMimeTypeGuesser" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/MimeType/FileBinaryMimeTypeGuesser.php',
									"FileinfoMimeTypeGuesser" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/MimeType/FileinfoMimeTypeGuesser.php',
									"MimeTypeExtensionGuesser" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/MimeType/MimeTypeExtensionGuesser.php',
									"MimeTypeGuesser" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/MimeType/MimeTypeGuesser.php',
									"MimeTypeGuesserInterface" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/MimeType/MimeTypeGuesserInterface.php',
								],
							],
							"_Items" => [
								"File" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/File.php',
								"Stream" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/Stream.php',
								"UploadedFile" => self::$hahaha_dir . '/vendor/symfony/http-foundation/File/UploadedFile.php',
							],
						],
						"Session" => [
							"Attribute" => [
								"_Items" => [
									"AttributeBag" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Attribute/AttributeBag.php',
									"AttributeBagInterface" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Attribute/AttributeBagInterface.php',
									"NamespacedAttributeBag" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Attribute/NamespacedAttributeBag.php',
								],
							],
							"Flash" => [
								"_Items" => [
									"AutoExpireFlashBag" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Flash/AutoExpireFlashBag.php',
									"FlashBag" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Flash/FlashBag.php',
									"FlashBagInterface" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Flash/FlashBagInterface.php',
								],
							],
							"Storage" => [
								"Handler" => [
									"_Items" => [
										"AbstractSessionHandler" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/Handler/AbstractSessionHandler.php',
										"MemcachedSessionHandler" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/Handler/MemcachedSessionHandler.php',
										"MigratingSessionHandler" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/Handler/MigratingSessionHandler.php',
										"MongoDbSessionHandler" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/Handler/MongoDbSessionHandler.php',
										"NativeFileSessionHandler" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/Handler/NativeFileSessionHandler.php',
										"NullSessionHandler" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/Handler/NullSessionHandler.php',
										"PdoSessionHandler" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/Handler/PdoSessionHandler.php',
										"RedisSessionHandler" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/Handler/RedisSessionHandler.php',
										"StrictSessionHandler" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/Handler/StrictSessionHandler.php',
									],
								],
								"Proxy" => [
									"_Items" => [
										"AbstractProxy" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/Proxy/AbstractProxy.php',
										"SessionHandlerProxy" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/Proxy/SessionHandlerProxy.php',
									],
								],
								"_Items" => [
									"MetadataBag" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/MetadataBag.php',
									"MockArraySessionStorage" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/MockArraySessionStorage.php',
									"MockFileSessionStorage" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/MockFileSessionStorage.php',
									"NativeSessionStorage" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/NativeSessionStorage.php',
									"PhpBridgeSessionStorage" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/PhpBridgeSessionStorage.php',
									"SessionStorageInterface" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Storage/SessionStorageInterface.php',
								],
							],
							"_Items" => [
								"Session" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/Session.php',
								"SessionBagInterface" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/SessionBagInterface.php',
								"SessionBagProxy" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/SessionBagProxy.php',
								"SessionInterface" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/SessionInterface.php',
								"SessionUtils" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Session/SessionUtils.php',
							],
						],
						"_Items" => [
							"AcceptHeader" => self::$hahaha_dir . '/vendor/symfony/http-foundation/AcceptHeader.php',
							"AcceptHeaderItem" => self::$hahaha_dir . '/vendor/symfony/http-foundation/AcceptHeaderItem.php',
							"ApacheRequest" => self::$hahaha_dir . '/vendor/symfony/http-foundation/ApacheRequest.php',
							"BinaryFileResponse" => self::$hahaha_dir . '/vendor/symfony/http-foundation/BinaryFileResponse.php',
							"Cookie" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Cookie.php',
							"ExpressionRequestMatcher" => self::$hahaha_dir . '/vendor/symfony/http-foundation/ExpressionRequestMatcher.php',
							"FileBag" => self::$hahaha_dir . '/vendor/symfony/http-foundation/FileBag.php',
							"HeaderBag" => self::$hahaha_dir . '/vendor/symfony/http-foundation/HeaderBag.php',
							"HeaderUtils" => self::$hahaha_dir . '/vendor/symfony/http-foundation/HeaderUtils.php',
							"IpUtils" => self::$hahaha_dir . '/vendor/symfony/http-foundation/IpUtils.php',
							"JsonResponse" => self::$hahaha_dir . '/vendor/symfony/http-foundation/JsonResponse.php',
							"ParameterBag" => self::$hahaha_dir . '/vendor/symfony/http-foundation/ParameterBag.php',
							"RedirectResponse" => self::$hahaha_dir . '/vendor/symfony/http-foundation/RedirectResponse.php',
							"Request" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Request.php',
							"RequestMatcher" => self::$hahaha_dir . '/vendor/symfony/http-foundation/RequestMatcher.php',
							"RequestMatcherInterface" => self::$hahaha_dir . '/vendor/symfony/http-foundation/RequestMatcherInterface.php',
							"RequestStack" => self::$hahaha_dir . '/vendor/symfony/http-foundation/RequestStack.php',
							"Response" => self::$hahaha_dir . '/vendor/symfony/http-foundation/Response.php',
							"ResponseHeaderBag" => self::$hahaha_dir . '/vendor/symfony/http-foundation/ResponseHeaderBag.php',
							"ServerBag" => self::$hahaha_dir . '/vendor/symfony/http-foundation/ServerBag.php',
							"StreamedResponse" => self::$hahaha_dir . '/vendor/symfony/http-foundation/StreamedResponse.php',
							"UrlHelper" => self::$hahaha_dir . '/vendor/symfony/http-foundation/UrlHelper.php',
						],
					],
					"Mime" => [
						"DependencyInjection" => [
							"_Items" => [
								"AddMimeTypeGuesserPass" => self::$hahaha_dir . '/vendor/symfony/mime/DependencyInjection/AddMimeTypeGuesserPass.php',
							],
						],
						"Encoder" => [
							"_Items" => [
								"AddressEncoderInterface" => self::$hahaha_dir . '/vendor/symfony/mime/Encoder/AddressEncoderInterface.php',
								"Base64ContentEncoder" => self::$hahaha_dir . '/vendor/symfony/mime/Encoder/Base64ContentEncoder.php',
								"Base64Encoder" => self::$hahaha_dir . '/vendor/symfony/mime/Encoder/Base64Encoder.php',
								"Base64MimeHeaderEncoder" => self::$hahaha_dir . '/vendor/symfony/mime/Encoder/Base64MimeHeaderEncoder.php',
								"ContentEncoderInterface" => self::$hahaha_dir . '/vendor/symfony/mime/Encoder/ContentEncoderInterface.php',
								"EightBitContentEncoder" => self::$hahaha_dir . '/vendor/symfony/mime/Encoder/EightBitContentEncoder.php',
								"EncoderInterface" => self::$hahaha_dir . '/vendor/symfony/mime/Encoder/EncoderInterface.php',
								"IdnAddressEncoder" => self::$hahaha_dir . '/vendor/symfony/mime/Encoder/IdnAddressEncoder.php',
								"MimeHeaderEncoderInterface" => self::$hahaha_dir . '/vendor/symfony/mime/Encoder/MimeHeaderEncoderInterface.php',
								"QpContentEncoder" => self::$hahaha_dir . '/vendor/symfony/mime/Encoder/QpContentEncoder.php',
								"QpEncoder" => self::$hahaha_dir . '/vendor/symfony/mime/Encoder/QpEncoder.php',
								"QpMimeHeaderEncoder" => self::$hahaha_dir . '/vendor/symfony/mime/Encoder/QpMimeHeaderEncoder.php',
								"Rfc2231Encoder" => self::$hahaha_dir . '/vendor/symfony/mime/Encoder/Rfc2231Encoder.php',
							],
						],
						"Exception" => [
							"_Items" => [
								"AddressEncoderException" => self::$hahaha_dir . '/vendor/symfony/mime/Exception/AddressEncoderException.php',
								"ExceptionInterface" => self::$hahaha_dir . '/vendor/symfony/mime/Exception/ExceptionInterface.php',
								"InvalidArgumentException" => self::$hahaha_dir . '/vendor/symfony/mime/Exception/InvalidArgumentException.php',
								"LogicException" => self::$hahaha_dir . '/vendor/symfony/mime/Exception/LogicException.php',
								"RfcComplianceException" => self::$hahaha_dir . '/vendor/symfony/mime/Exception/RfcComplianceException.php',
								"RuntimeException" => self::$hahaha_dir . '/vendor/symfony/mime/Exception/RuntimeException.php',
							],
						],
						"Header" => [
							"_Items" => [
								"AbstractHeader" => self::$hahaha_dir . '/vendor/symfony/mime/Header/AbstractHeader.php',
								"DateHeader" => self::$hahaha_dir . '/vendor/symfony/mime/Header/DateHeader.php',
								"HeaderInterface" => self::$hahaha_dir . '/vendor/symfony/mime/Header/HeaderInterface.php',
								"Headers" => self::$hahaha_dir . '/vendor/symfony/mime/Header/Headers.php',
								"IdentificationHeader" => self::$hahaha_dir . '/vendor/symfony/mime/Header/IdentificationHeader.php',
								"MailboxHeader" => self::$hahaha_dir . '/vendor/symfony/mime/Header/MailboxHeader.php',
								"MailboxListHeader" => self::$hahaha_dir . '/vendor/symfony/mime/Header/MailboxListHeader.php',
								"ParameterizedHeader" => self::$hahaha_dir . '/vendor/symfony/mime/Header/ParameterizedHeader.php',
								"PathHeader" => self::$hahaha_dir . '/vendor/symfony/mime/Header/PathHeader.php',
								"UnstructuredHeader" => self::$hahaha_dir . '/vendor/symfony/mime/Header/UnstructuredHeader.php',
							],
						],
						"Part" => [
							"Multipart" => [
								"_Items" => [
									"AlternativePart" => self::$hahaha_dir . '/vendor/symfony/mime/Part/Multipart/AlternativePart.php',
									"DigestPart" => self::$hahaha_dir . '/vendor/symfony/mime/Part/Multipart/DigestPart.php',
									"FormDataPart" => self::$hahaha_dir . '/vendor/symfony/mime/Part/Multipart/FormDataPart.php',
									"MixedPart" => self::$hahaha_dir . '/vendor/symfony/mime/Part/Multipart/MixedPart.php',
									"RelatedPart" => self::$hahaha_dir . '/vendor/symfony/mime/Part/Multipart/RelatedPart.php',
								],
							],
							"_Items" => [
								"AbstractMultipartPart" => self::$hahaha_dir . '/vendor/symfony/mime/Part/AbstractMultipartPart.php',
								"AbstractPart" => self::$hahaha_dir . '/vendor/symfony/mime/Part/AbstractPart.php',
								"DataPart" => self::$hahaha_dir . '/vendor/symfony/mime/Part/DataPart.php',
								"MessagePart" => self::$hahaha_dir . '/vendor/symfony/mime/Part/MessagePart.php',
								"TextPart" => self::$hahaha_dir . '/vendor/symfony/mime/Part/TextPart.php',
							],
						],
						"_Items" => [
							"Address" => self::$hahaha_dir . '/vendor/symfony/mime/Address.php',
							"BodyRendererInterface" => self::$hahaha_dir . '/vendor/symfony/mime/BodyRendererInterface.php',
							"CharacterStream" => self::$hahaha_dir . '/vendor/symfony/mime/CharacterStream.php',
							"Email" => self::$hahaha_dir . '/vendor/symfony/mime/Email.php',
							"FileBinaryMimeTypeGuesser" => self::$hahaha_dir . '/vendor/symfony/mime/FileBinaryMimeTypeGuesser.php',
							"FileinfoMimeTypeGuesser" => self::$hahaha_dir . '/vendor/symfony/mime/FileinfoMimeTypeGuesser.php',
							"Message" => self::$hahaha_dir . '/vendor/symfony/mime/Message.php',
							"MessageConverter" => self::$hahaha_dir . '/vendor/symfony/mime/MessageConverter.php',
							"MimeTypeGuesserInterface" => self::$hahaha_dir . '/vendor/symfony/mime/MimeTypeGuesserInterface.php',
							"MimeTypes" => self::$hahaha_dir . '/vendor/symfony/mime/MimeTypes.php',
							"MimeTypesInterface" => self::$hahaha_dir . '/vendor/symfony/mime/MimeTypesInterface.php',
							"NamedAddress" => self::$hahaha_dir . '/vendor/symfony/mime/NamedAddress.php',
							"RawMessage" => self::$hahaha_dir . '/vendor/symfony/mime/RawMessage.php',
						],
					],
					"VarDumper" => [
						"Caster" => [
							"_Items" => [
								"AmqpCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/AmqpCaster.php',
								"ArgsStub" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/ArgsStub.php',
								"Caster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/Caster.php',
								"ClassStub" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/ClassStub.php',
								"ConstStub" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/ConstStub.php',
								"CutArrayStub" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/CutArrayStub.php',
								"CutStub" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/CutStub.php',
								"DateCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/DateCaster.php',
								"DoctrineCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/DoctrineCaster.php',
								"DOMCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/DOMCaster.php',
								"DsCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/DsCaster.php',
								"DsPairStub" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/DsPairStub.php',
								"EnumStub" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/EnumStub.php',
								"ExceptionCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/ExceptionCaster.php',
								"FrameStub" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/FrameStub.php',
								"GmpCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/GmpCaster.php',
								"IntlCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/IntlCaster.php',
								"LinkStub" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/LinkStub.php',
								"MemcachedCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/MemcachedCaster.php',
								"PdoCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/PdoCaster.php',
								"PgSqlCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/PgSqlCaster.php',
								"ProxyManagerCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/ProxyManagerCaster.php',
								"RedisCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/RedisCaster.php',
								"ReflectionCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/ReflectionCaster.php',
								"ResourceCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/ResourceCaster.php',
								"SplCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/SplCaster.php',
								"StubCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/StubCaster.php',
								"SymfonyCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/SymfonyCaster.php',
								"TraceStub" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/TraceStub.php',
								"XmlReaderCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/XmlReaderCaster.php',
								"XmlResourceCaster" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Caster/XmlResourceCaster.php',
							],
						],
						"Cloner" => [
							"_Items" => [
								"AbstractCloner" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Cloner/AbstractCloner.php',
								"ClonerInterface" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Cloner/ClonerInterface.php',
								"Cursor" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Cloner/Cursor.php',
								"Data" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Cloner/Data.php',
								"DumperInterface" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Cloner/DumperInterface.php',
								"Stub" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Cloner/Stub.php',
								"VarCloner" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Cloner/VarCloner.php',
							],
						],
						"Command" => [
							"Descriptor" => [
								"_Items" => [
									"CliDescriptor" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Command/Descriptor/CliDescriptor.php',
									"DumpDescriptorInterface" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Command/Descriptor/DumpDescriptorInterface.php',
									"HtmlDescriptor" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Command/Descriptor/HtmlDescriptor.php',
								],
							],
							"_Items" => [
								"ServerDumpCommand" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Command/ServerDumpCommand.php',
							],
						],
						"Dumper" => [
							"ContextProvider" => [
								"_Items" => [
									"CliContextProvider" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Dumper/ContextProvider/CliContextProvider.php',
									"ContextProviderInterface" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Dumper/ContextProvider/ContextProviderInterface.php',
									"RequestContextProvider" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Dumper/ContextProvider/RequestContextProvider.php',
									"SourceContextProvider" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Dumper/ContextProvider/SourceContextProvider.php',
								],
							],
							"_Items" => [
								"AbstractDumper" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Dumper/AbstractDumper.php',
								"CliDumper" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Dumper/CliDumper.php',
								"DataDumperInterface" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Dumper/DataDumperInterface.php',
								"HtmlDumper" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Dumper/HtmlDumper.php',
								"ServerDumper" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Dumper/ServerDumper.php',
							],
						],
						"Exception" => [
							"_Items" => [
								"ThrowingCasterException" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Exception/ThrowingCasterException.php',
							],
						],
						"Server" => [
							"_Items" => [
								"Connection" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Server/Connection.php',
								"DumpServer" => self::$hahaha_dir . '/vendor/symfony/var-dumper/Server/DumpServer.php',
							],
						],
						"_Items" => [
							"VarDumper" => self::$hahaha_dir . '/vendor/symfony/var-dumper/VarDumper.php',
						],
					],
					"Yaml" => [
						"Exception" => [
							"_Items" => [
								"DumpException" => self::$hahaha_dir . '/vendor/symfony/yaml/Exception/DumpException.php',
								"ExceptionInterface" => self::$hahaha_dir . '/vendor/symfony/yaml/Exception/ExceptionInterface.php',
								"ParseException" => self::$hahaha_dir . '/vendor/symfony/yaml/Exception/ParseException.php',
								"RuntimeException" => self::$hahaha_dir . '/vendor/symfony/yaml/Exception/RuntimeException.php',
							],
						],
						"_Items" => [
							"Dumper" => self::$hahaha_dir . '/vendor/symfony/yaml/Dumper.php',
							"Escaper" => self::$hahaha_dir . '/vendor/symfony/yaml/Escaper.php',
							"Inline" => self::$hahaha_dir . '/vendor/symfony/yaml/Inline.php',
							"Parser" => self::$hahaha_dir . '/vendor/symfony/yaml/Parser.php',
							"Unescaper" => self::$hahaha_dir . '/vendor/symfony/yaml/Unescaper.php',
							"Yaml" => self::$hahaha_dir . '/vendor/symfony/yaml/Yaml.php',
						],
					],
					"_Items" => [
					],
				],
				"Polyfill" => [
					"Ctype" => [
						"_Items" => [
							"Ctype" => self::$hahaha_dir . '/vendor/symfony/polyfill-ctype/Ctype.php',
						],
					],
					"Intl" => [
						"Idn" => [
							"_Items" => [
								"Idn" => self::$hahaha_dir . '/vendor/symfony/polyfill-intl-idn/Idn.php',
							],
						],
						"_Items" => [
						],
					],
					"Mbstring" => [
						"_Items" => [
							"Mbstring" => self::$hahaha_dir . '/vendor/symfony/polyfill-mbstring/Mbstring.php',
						],
					],
					"Php72" => [
						"_Items" => [
							"Php72" => self::$hahaha_dir . '/vendor/symfony/polyfill-php72/Php72.php',
						],
					],
					"Php73" => [
						"_Items" => [
							"Php73" => self::$hahaha_dir . '/vendor/symfony/polyfill-php73/Php73.php',
						],
					],
					"_Items" => [
					],
				],
				"Contracts" => [
					"Service" => [
						"_Items" => [
							"ResetInterface" => self::$hahaha_dir . '/vendor/symfony/service-contracts/ResetInterface.php',
							"ServiceLocatorTrait" => self::$hahaha_dir . '/vendor/symfony/service-contracts/ServiceLocatorTrait.php',
							"ServiceProviderInterface" => self::$hahaha_dir . '/vendor/symfony/service-contracts/ServiceProviderInterface.php',
							"ServiceSubscriberInterface" => self::$hahaha_dir . '/vendor/symfony/service-contracts/ServiceSubscriberInterface.php',
							"ServiceSubscriberTrait" => self::$hahaha_dir . '/vendor/symfony/service-contracts/ServiceSubscriberTrait.php',
						],
					],
					"_Items" => [
					],
				],
				"_Items" => [
				],
			],
			"Tightenco" => [
				"Collect" => [
					"Contracts" => [
						"Support" => [
							"_Items" => [
								"Arrayable" => self::$hahaha_dir . '/vendor/tightenco/collect/src/Collect/Contracts/Support/Arrayable.php',
								"Htmlable" => self::$hahaha_dir . '/vendor/tightenco/collect/src/Collect/Contracts/Support/Htmlable.php',
								"Jsonable" => self::$hahaha_dir . '/vendor/tightenco/collect/src/Collect/Contracts/Support/Jsonable.php',
							],
						],
						"_Items" => [
						],
					],
					"Support" => [
						"Traits" => [
							"_Items" => [
								"Macroable" => self::$hahaha_dir . '/vendor/tightenco/collect/src/Collect/Support/Traits/Macroable.php',
							],
						],
						"_Items" => [
							"Arr" => self::$hahaha_dir . '/vendor/tightenco/collect/src/Collect/Support/Arr.php',
							"Collection" => self::$hahaha_dir . '/vendor/tightenco/collect/src/Collect/Support/Collection.php',
							"HigherOrderCollectionProxy" => self::$hahaha_dir . '/vendor/tightenco/collect/src/Collect/Support/HigherOrderCollectionProxy.php',
							"HtmlString" => self::$hahaha_dir . '/vendor/tightenco/collect/src/Collect/Support/HtmlString.php',
						],
					],
					"_Items" => [
					],
				],
				"_Items" => [
				],
			],
			"TijsVerkoyen" => [
				"CssToInlineStyles" => [
					"Css" => [
						"Property" => [
							"_Items" => [
								"Processor" => self::$hahaha_dir . '/vendor/tijsverkoyen/css-to-inline-styles/src/Css/Property/Processor.php',
								"Property" => self::$hahaha_dir . '/vendor/tijsverkoyen/css-to-inline-styles/src/Css/Property/Property.php',
							],
						],
						"Rule" => [
							"_Items" => [
								"Processor" => self::$hahaha_dir . '/vendor/tijsverkoyen/css-to-inline-styles/src/Css/Rule/Processor.php',
								"Rule" => self::$hahaha_dir . '/vendor/tijsverkoyen/css-to-inline-styles/src/Css/Rule/Rule.php',
							],
						],
						"_Items" => [
							"Processor" => self::$hahaha_dir . '/vendor/tijsverkoyen/css-to-inline-styles/src/Css/Processor.php',
						],
					],
					"_Items" => [
						"CssToInlineStyles" => self::$hahaha_dir . '/vendor/tijsverkoyen/css-to-inline-styles/src/CssToInlineStyles.php',
					],
				],
				"_Items" => [
				],
			],
			"Tivie" => [
				"Command" => [
					"Exception" => [
						"_Items" => [
							"DomainException" => self::$hahaha_dir . '/vendor/tivie/command/src/Exception/DomainException.php',
							"Exception" => self::$hahaha_dir . '/vendor/tivie/command/src/Exception/Exception.php',
							"InvalidArgumentException" => self::$hahaha_dir . '/vendor/tivie/command/src/Exception/InvalidArgumentException.php',
						],
					],
					"_Items" => [
						"Argument" => self::$hahaha_dir . '/vendor/tivie/command/src/Argument.php',
						"Chain" => self::$hahaha_dir . '/vendor/tivie/command/src/Chain.php',
						"Command" => self::$hahaha_dir . '/vendor/tivie/command/src/Command.php',
						"Result" => self::$hahaha_dir . '/vendor/tivie/command/src/Result.php',
					],
				],
				"OS" => [
					"_Items" => [
						"Detector" => self::$hahaha_dir . '/vendor/tivie/php-os-detector/src/Detector.php',
						"DetectorInterface" => self::$hahaha_dir . '/vendor/tivie/php-os-detector/src/DetectorInterface.php',
					],
				],
				"_Items" => [
				],
			],
			"_Items" => [
				"ha" => self::$hahaha_dir . '/framework/hahaha/ha/ha.php',
				"ComposerAutoloaderInited52258c47506bb06cd8d32fdf88156a" => self::$hahaha_dir . '/vendor/composer/autoload_real.php',
				"LINEBotTiny" => self::$hahaha_dir . '/vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php',
				"Swift_Attachment" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Attachment.php',
				"Swift_ByteStream_AbstractFilterableInputStream" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/ByteStream/AbstractFilterableInputStream.php',
				"Swift_ByteStream_ArrayByteStream" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/ByteStream/ArrayByteStream.php',
				"Swift_ByteStream_FileByteStream" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/ByteStream/FileByteStream.php',
				"Swift_ByteStream_TemporaryFileByteStream" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/ByteStream/TemporaryFileByteStream.php',
				"Swift_CharacterReader_GenericFixedWidthReader" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/CharacterReader/GenericFixedWidthReader.php',
				"Swift_CharacterReader_UsAsciiReader" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/CharacterReader/UsAsciiReader.php',
				"Swift_CharacterReader_Utf8Reader" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/CharacterReader/Utf8Reader.php',
				"Swift_CharacterReader" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/CharacterReader.php',
				"Swift_CharacterReaderFactory_SimpleCharacterReaderFactory" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/CharacterReaderFactory/SimpleCharacterReaderFactory.php',
				"Swift_CharacterReaderFactory" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/CharacterReaderFactory.php',
				"Swift_CharacterStream_ArrayCharacterStream" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/CharacterStream/ArrayCharacterStream.php',
				"Swift_CharacterStream_NgCharacterStream" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/CharacterStream/NgCharacterStream.php',
				"Swift_CharacterStream" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/CharacterStream.php',
				"Swift_ConfigurableSpool" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/ConfigurableSpool.php',
				"Swift_DependencyContainer" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/DependencyContainer.php',
				"Swift_DependencyException" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/DependencyException.php',
				"Swift_EmbeddedFile" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/EmbeddedFile.php',
				"Swift_Encoder_Base64Encoder" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Encoder/Base64Encoder.php',
				"Swift_Encoder_QpEncoder" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Encoder/QpEncoder.php',
				"Swift_Encoder_Rfc2231Encoder" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Encoder/Rfc2231Encoder.php',
				"Swift_Encoder" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Encoder.php',
				"Swift_Events_CommandEvent" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Events/CommandEvent.php',
				"Swift_Events_CommandListener" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Events/CommandListener.php',
				"Swift_Events_Event" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Events/Event.php',
				"Swift_Events_EventDispatcher" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Events/EventDispatcher.php',
				"Swift_Events_EventListener" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Events/EventListener.php',
				"Swift_Events_EventObject" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Events/EventObject.php',
				"Swift_Events_ResponseEvent" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Events/ResponseEvent.php',
				"Swift_Events_ResponseListener" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Events/ResponseListener.php',
				"Swift_Events_SendEvent" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Events/SendEvent.php',
				"Swift_Events_SendListener" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Events/SendListener.php',
				"Swift_Events_SimpleEventDispatcher" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Events/SimpleEventDispatcher.php',
				"Swift_Events_TransportChangeEvent" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Events/TransportChangeEvent.php',
				"Swift_Events_TransportChangeListener" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Events/TransportChangeListener.php',
				"Swift_Events_TransportExceptionEvent" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Events/TransportExceptionEvent.php',
				"Swift_Events_TransportExceptionListener" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Events/TransportExceptionListener.php',
				"Swift_FailoverTransport" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/FailoverTransport.php',
				"Swift_FileSpool" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/FileSpool.php',
				"Swift_FileStream" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/FileStream.php',
				"Swift_Filterable" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Filterable.php',
				"Swift_IdGenerator" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/IdGenerator.php',
				"Swift_Image" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Image.php',
				"Swift_InputByteStream" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/InputByteStream.php',
				"Swift_IoException" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/IoException.php',
				"Swift_KeyCache_ArrayKeyCache" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/KeyCache/ArrayKeyCache.php',
				"Swift_KeyCache_DiskKeyCache" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/KeyCache/DiskKeyCache.php',
				"Swift_KeyCache_KeyCacheInputStream" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/KeyCache/KeyCacheInputStream.php',
				"Swift_KeyCache_NullKeyCache" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/KeyCache/NullKeyCache.php',
				"Swift_KeyCache_SimpleKeyCacheInputStream" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/KeyCache/SimpleKeyCacheInputStream.php',
				"Swift_KeyCache" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/KeyCache.php',
				"Swift_LoadBalancedTransport" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/LoadBalancedTransport.php',
				"Swift_Mailer_ArrayRecipientIterator" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mailer/ArrayRecipientIterator.php',
				"Swift_Mailer_RecipientIterator" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mailer/RecipientIterator.php',
				"Swift_Mailer" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mailer.php',
				"Swift_MemorySpool" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/MemorySpool.php',
				"Swift_Message" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Message.php',
				"Swift_Mime_Attachment" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/Attachment.php',
				"Swift_Mime_CharsetObserver" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/CharsetObserver.php',
				"Swift_Mime_ContentEncoder_Base64ContentEncoder" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/ContentEncoder/Base64ContentEncoder.php',
				"Swift_Mime_ContentEncoder_NativeQpContentEncoder" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/ContentEncoder/NativeQpContentEncoder.php',
				"Swift_Mime_ContentEncoder_PlainContentEncoder" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/ContentEncoder/PlainContentEncoder.php',
				"Swift_Mime_ContentEncoder_QpContentEncoder" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/ContentEncoder/QpContentEncoder.php',
				"Swift_Mime_ContentEncoder_QpContentEncoderProxy" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/ContentEncoder/QpContentEncoderProxy.php',
				"Swift_Mime_ContentEncoder_RawContentEncoder" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/ContentEncoder/RawContentEncoder.php',
				"Swift_Mime_ContentEncoder" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/ContentEncoder.php',
				"Swift_Mime_EmbeddedFile" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/EmbeddedFile.php',
				"Swift_Mime_EncodingObserver" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/EncodingObserver.php',
				"Swift_Mime_Header" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/Header.php',
				"Swift_Mime_HeaderEncoder_Base64HeaderEncoder" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/HeaderEncoder/Base64HeaderEncoder.php',
				"Swift_Mime_HeaderEncoder_QpHeaderEncoder" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/HeaderEncoder/QpHeaderEncoder.php',
				"Swift_Mime_HeaderEncoder" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/HeaderEncoder.php',
				"Swift_Mime_Headers_AbstractHeader" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/Headers/AbstractHeader.php',
				"Swift_Mime_Headers_DateHeader" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/Headers/DateHeader.php',
				"Swift_Mime_Headers_IdentificationHeader" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/Headers/IdentificationHeader.php',
				"Swift_Mime_Headers_MailboxHeader" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/Headers/MailboxHeader.php',
				"Swift_Mime_Headers_OpenDKIMHeader" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/Headers/OpenDKIMHeader.php',
				"Swift_Mime_Headers_ParameterizedHeader" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/Headers/ParameterizedHeader.php',
				"Swift_Mime_Headers_PathHeader" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/Headers/PathHeader.php',
				"Swift_Mime_Headers_UnstructuredHeader" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/Headers/UnstructuredHeader.php',
				"Swift_Mime_IdGenerator" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/IdGenerator.php',
				"Swift_Mime_MimePart" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/MimePart.php',
				"Swift_Mime_SimpleHeaderFactory" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/SimpleHeaderFactory.php',
				"Swift_Mime_SimpleHeaderSet" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/SimpleHeaderSet.php',
				"Swift_Mime_SimpleMessage" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/SimpleMessage.php',
				"Swift_Mime_SimpleMimeEntity" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Mime/SimpleMimeEntity.php',
				"Swift_MimePart" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/MimePart.php',
				"Swift_NullTransport" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/NullTransport.php',
				"Swift_OutputByteStream" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/OutputByteStream.php',
				"Swift_Plugins_AntiFloodPlugin" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/AntiFloodPlugin.php',
				"Swift_Plugins_BandwidthMonitorPlugin" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/BandwidthMonitorPlugin.php',
				"Swift_Plugins_Decorator_Replacements" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/Decorator/Replacements.php',
				"Swift_Plugins_DecoratorPlugin" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/DecoratorPlugin.php',
				"Swift_Plugins_ImpersonatePlugin" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/ImpersonatePlugin.php',
				"Swift_Plugins_Logger" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/Logger.php',
				"Swift_Plugins_LoggerPlugin" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/LoggerPlugin.php',
				"Swift_Plugins_Loggers_ArrayLogger" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/Loggers/ArrayLogger.php',
				"Swift_Plugins_Loggers_EchoLogger" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/Loggers/EchoLogger.php',
				"Swift_Plugins_MessageLogger" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/MessageLogger.php',
				"Swift_Plugins_Pop_Pop3Connection" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/Pop/Pop3Connection.php',
				"Swift_Plugins_Pop_Pop3Exception" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/Pop/Pop3Exception.php',
				"Swift_Plugins_PopBeforeSmtpPlugin" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/PopBeforeSmtpPlugin.php',
				"Swift_Plugins_RedirectingPlugin" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/RedirectingPlugin.php',
				"Swift_Plugins_Reporter" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/Reporter.php',
				"Swift_Plugins_ReporterPlugin" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/ReporterPlugin.php',
				"Swift_Plugins_Reporters_HitReporter" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/Reporters/HitReporter.php',
				"Swift_Plugins_Reporters_HtmlReporter" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/Reporters/HtmlReporter.php',
				"Swift_Plugins_Sleeper" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/Sleeper.php',
				"Swift_Plugins_ThrottlerPlugin" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/ThrottlerPlugin.php',
				"Swift_Plugins_Timer" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Plugins/Timer.php',
				"Swift_Preferences" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Preferences.php',
				"Swift_ReplacementFilterFactory" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/ReplacementFilterFactory.php',
				"Swift_RfcComplianceException" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/RfcComplianceException.php',
				"Swift_SendmailTransport" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/SendmailTransport.php',
				"Swift_Signer" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Signer.php',
				"Swift_Signers_BodySigner" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Signers/BodySigner.php',
				"Swift_Signers_DKIMSigner" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Signers/DKIMSigner.php',
				"Swift_Signers_DomainKeySigner" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Signers/DomainKeySigner.php',
				"Swift_Signers_HeaderSigner" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Signers/HeaderSigner.php',
				"Swift_Signers_OpenDKIMSigner" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Signers/OpenDKIMSigner.php',
				"Swift_Signers_SMimeSigner" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Signers/SMimeSigner.php',
				"Swift_SmtpTransport" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/SmtpTransport.php',
				"Swift_Spool" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Spool.php',
				"Swift_SpoolTransport" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/SpoolTransport.php',
				"Swift_StreamFilter" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/StreamFilter.php',
				"Swift_StreamFilters_ByteArrayReplacementFilter" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/StreamFilters/ByteArrayReplacementFilter.php',
				"Swift_StreamFilters_StringReplacementFilter" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/StreamFilters/StringReplacementFilter.php',
				"Swift_StreamFilters_StringReplacementFilterFactory" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/StreamFilters/StringReplacementFilterFactory.php',
				"Swift_SwiftException" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/SwiftException.php',
				"Swift_Transport_AbstractSmtpTransport" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/AbstractSmtpTransport.php',
				"Swift_Transport_Esmtp_Auth_CramMd5Authenticator" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/Esmtp/Auth/CramMd5Authenticator.php',
				"Swift_Transport_Esmtp_Auth_LoginAuthenticator" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/Esmtp/Auth/LoginAuthenticator.php',
				"Swift_Transport_Esmtp_Auth_NTLMAuthenticator" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/Esmtp/Auth/NTLMAuthenticator.php',
				"Swift_Transport_Esmtp_Auth_PlainAuthenticator" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/Esmtp/Auth/PlainAuthenticator.php',
				"Swift_Transport_Esmtp_Auth_XOAuth2Authenticator" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/Esmtp/Auth/XOAuth2Authenticator.php',
				"Swift_Transport_Esmtp_Authenticator" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/Esmtp/Authenticator.php',
				"Swift_Transport_Esmtp_AuthHandler" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/Esmtp/AuthHandler.php',
				"Swift_Transport_EsmtpHandler" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/EsmtpHandler.php',
				"Swift_Transport_EsmtpTransport" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/EsmtpTransport.php',
				"Swift_Transport_FailoverTransport" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/FailoverTransport.php',
				"Swift_Transport_IoBuffer" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/IoBuffer.php',
				"Swift_Transport_LoadBalancedTransport" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/LoadBalancedTransport.php',
				"Swift_Transport_NullTransport" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/NullTransport.php',
				"Swift_Transport_SendmailTransport" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/SendmailTransport.php',
				"Swift_Transport_SmtpAgent" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/SmtpAgent.php',
				"Swift_Transport_SpoolTransport" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/SpoolTransport.php',
				"Swift_Transport_StreamBuffer" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport/StreamBuffer.php',
				"Swift_Transport" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/Transport.php',
				"Swift_TransportException" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift/TransportException.php',
				"Swift" => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/classes/Swift.php',
				"JsonException" => self::$hahaha_dir . '/vendor/symfony/polyfill-php73/Resources/stubs/JsonException.php',
			],
		];
	}

	public static function Autoload_File_Mapping()
	{
		self::$autoload_files = [
				'5e542e65c06136d8b5a9be93b6252e3f' => self::$hahaha_dir . '/vendor/opis/closure/functions.php',
				'2692c8007f216c044b30161f9a0ea1f7' => self::$hahaha_dir . '/vendor/react/promise/src/functions_include.php',
				'bbb734b748bcbbed3f75fe65aebdba08' => self::$hahaha_dir . '/vendor/react/promise-timer/src/functions_include.php',
				'c63465383f4946b7e1b8dafe40797a88' => self::$hahaha_dir . '/vendor/swiftmailer/swiftmailer/lib/swift_required.php',
				'631e27653e6b6eab4467fee685cdcd60' => self::$hahaha_dir . '/vendor/symfony/polyfill-ctype/bootstrap.php',
				'b00be51f2f39ae517e78135278b7e0c9' => self::$hahaha_dir . '/vendor/symfony/polyfill-intl-idn/bootstrap.php',
				'cb46e787aba770a09023ef52ee9c6b42' => self::$hahaha_dir . '/vendor/symfony/polyfill-mbstring/bootstrap.php',
				'930b0cc67bf61df8ddd305a09235870a' => self::$hahaha_dir . '/vendor/symfony/polyfill-php72/bootstrap.php',
				'174730de74cbd282e4a0cbc2be4dc7bd' => self::$hahaha_dir . '/vendor/symfony/polyfill-php73/bootstrap.php',
				'e70f9cd6d5da639c76256ecbe2cf3de8' => self::$hahaha_dir . '/vendor/symfony/var-dumper/Resources/functions/dump.php',
				'242d1de116a4fad8d44965c367df1751' => self::$hahaha_dir . '/vendor/tightenco/collect/src/Collect/Support/helpers.php',
				'd33a622ab963cf8c165c661ff871e9e9' => self::$hahaha_dir . '/vendor/tightenco/collect/src/Collect/Support/alias.php',
		];
	}

	public static function Load_Class_Loader($class)
	{
		// 處理mapping
		if(empty(self::$hahaha))
		{
			self::Class_Mapping();
		}

		$nodes_ = explode("\\" , $class);

		$find_ = &self::$hahaha;

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

				require $filename_;
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
		self::$hahaha_dir = dirname(__FILE__);
		if (null !== self::$loader)
		{
			return self::$loader;
		}

		self::$loader = new \hahaha\hahaha_loader();
		spl_autoload_register(array('hahaha\hahaha_loader', 'Load_Class_Loader'), true, true);

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
				require_once $file;
				
				$GLOBALS['__composer_autoload_files'][$key] = true;
			}
		}

		return self::$loader;
	}
}

return \hahaha\hahaha_loader::Autoload();