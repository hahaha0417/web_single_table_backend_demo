<?php

namespace hahaha\command\aid;

use hahahasublib\hahaha_instance_trait;
//
use hahaha\define\hahaha_define_base_key as key;
//
use hahaha\command\aid\hahaha_command_aid_composer as command_composer;
use hahaha\command\aid\hahaha_command_aid_env as command_env;
use hahaha\command\aid\hahaha_command_aid_git as command_git;
use hahaha\command\aid\hahaha_command_aid_migrate as command_migrate;
use hahaha\command\aid\hahaha_command_aid_npm as command_npm;
use hahaha\command\aid\hahaha_command_aid_tool as command_tool;
//
use hahaha\command\aid\hahaha_command_aid as command;
//
use hahaha\define\hahaha_define_command_aid_composer as define_composer;
use hahaha\define\hahaha_define_command_aid_env as define_env;
use hahaha\define\hahaha_define_command_aid_git as define_git;
use hahaha\define\hahaha_define_command_aid_migrate as define_migrate;
use hahaha\define\hahaha_define_command_aid_npm as define_npm;
use hahaha\define\hahaha_define_command_aid_tool as define_tool;
//
use hahaha\define\hahaha_define_command_aid_item as define_item;
//

/*

use hahaha\command\aid\hahaha_command_aid as command;

use hahaha\command\aid\hahaha_command_aid as command_aid;

*/

/*

 ----------------------------------------
柄
 ----------------------------------------
會初始化裡面全部腳本
因為沒效能需求，簡單寫
 ----------------------------------------

 ----------------------------------------
注意 : 此為呼叫GPL程式相關代碼
 ----------------------------------------

*/
class hahaha_command_aid
{
    use hahaha_instance_trait;

    public $dir;

    /*
    注意 : 沒有要做完，有做到才補
    */

    // 如要其他類型，則這樣寫TEXT_HA

    // --------------------------------------
    //
    // --------------------------------------

    // --------------------------------------
    //
    // --------------------------------------

	function __construct()
	{
		// $this->Initial();

	}

	public function Initial(&$dir)
	{
        $this->dir = &$dir;

        $command_composer_ = command_composer::Instance()->Initial($dir);
        $command_env_ = command_env::Instance()->Initial($dir);
        $command_git_ = command_git::Instance()->Initial($dir);
        $command_migrate_ = command_migrate::Instance()->Initial($dir);
        $command_npm_ = command_npm::Instance()->Initial($dir);
        $command_tool_ = command_tool::Instance()->Initial($dir);

        return $this;

	}

    // --------------------------------------
    //
    // --------------------------------------
    public function Command(&$item, &$command)
	{
        $command_composer_ = command_composer::Instance();
        $command_env_ = command_env::Instance();
        $command_git_ = command_git::Instance();
        $command_migrate_ = command_migrate::Instance();
        $command_npm_ = command_npm::Instance();
        $command_tool_ = command_tool::Instance();

        if($item == define_item::COMPOSER) {
            $list = [
                // --------------------------------------
                // All
                // --------------------------------------
                define_composer::ALL_DUMP_AUTOLOAD => "command_all_dump_autoload",
                define_composer::ALL_INSTALL_DEV => "command_all_install_dev",
                define_composer::ALL_INSTALL_NO_DEV => "command_all_install_no_dev",
                define_composer::ALL_UPDATE_DEV => "command_all_update_dev",
                define_composer::ALL_UPDATE_NO_DEV => "command_all_update_no_dev",
                // --------------------------------------
                // Frontend
                // --------------------------------------
                define_composer::FRONTEND_DUMP_AUTOLOAD => "command_frontend_dump_autoload",
                define_composer::FRONTEND_INSTALL_DEV => "command_frontend_install_dev",
                define_composer::FRONTEND_INSTALL_NO_DEV => "command_frontend_install_no_dev",
                define_composer::FRONTEND_UPDATE_DEV => "command_frontend_update_dev",
                define_composer::FRONTEND_UPDATE_NO_DEV => "command_frontend_update_no_dev",
                // --------------------------------------
                // Backend
                // --------------------------------------
                define_composer::BACKEND_DUMP_AUTOLOAD => "command_backend_dump_autoload",
                define_composer::BACKEND_INSTALL_DEV => "command_backend_install_dev",
                define_composer::BACKEND_INSTALL_NO_DEV => "command_backend_install_no_dev",
                define_composer::BACKEND_UPDATE_DEV => "command_backend_update_dev",
                define_composer::BACKEND_UPDATE_NO_DEV => "command_backend_update_no_dev",
                // --------------------------------------
                // Api
                // --------------------------------------
                define_composer::API_DUMP_AUTOLOAD => "command_api_dump_autoload",
                define_composer::API_INSTALL_DEV => "command_api_install_dev",
                define_composer::API_INSTALL_NO_DEV => "command_api_install_no_dev",
                define_composer::API_UPDATE_DEV => "command_api_update_dev",
                define_composer::API_UPDATE_NO_DEV => "command_api_update_no_dev",
                // --------------------------------------
                // Migrate
                // --------------------------------------
                define_composer::MIGRATE_DUMP_AUTOLOAD => "command_migrate_dump_autoload",
                define_composer::MIGRATE_INSTALL_DEV => "command_migrate_install_dev",
                define_composer::MIGRATE_INSTALL_NO_DEV => "command_migrate_install_no_dev",
                define_composer::MIGRATE_UPDATE_DEV => "command_migrate_update_dev",
                define_composer::MIGRATE_UPDATE_NO_DEV => "command_migrate_update_no_dev",
                // --------------------------------------
                //
                // --------------------------------------
            ];

            if(!empty($list[$command])) {
                call_user_func([
                    $command_composer_,
                    $list[$command],
                ]);
            }
        } else if($item == define_item::ENV) {
            $list = [
                // ----------------------------
                // 環境
                // ----------------------------
                // 本地
                define_env::LOCAL => "command_env_local",
                // 伺服器
                define_env::SERVER => "command_env_server",

                // ----------------------------
                // 安裝
                // ----------------------------
                // 展示用
                define_env::DEMO => "command_setup_demo",
                // 初始化用
                define_env::MIGRATE => "command_setup_migrate",
                // 發佈用
                define_env::PUBLISH => "command_setup_public",

                // ----------------------------
                //
                // ----------------------------
            ];

            if(!empty($list[$command])) {
                call_user_func([
                    $command_env_,
                    $list[$command],
                ]);
            }
        } else if($item == define_item::GIT) {
            $list = [
                // -------------------------------------------
                // Base
                // -------------------------------------------
                // ----------------------------
                // All
                // ----------------------------
                define_git::BASE_ALL_CLONE => "command_base_all_clone",
                define_git::BASE_ALL_PULL => "command_base_all_pull",


                // ----------------------------
                // Frontend
                // ----------------------------
                define_git::BASE_FRONTEND_CLONE => "command_base_frontend_clone",
                define_git::BASE_FRONTEND_PULL => "command_base_frontend_pull",


                // ----------------------------
                // Backend
                // ----------------------------
                define_git::BASE_BACKEND_CLONE => "command_base_backend_clone",
                define_git::BASE_BACKEND_PULL => "command_base_backend_pull",


                // ----------------------------
                // Api
                // ----------------------------
                define_git::BASE_API_CLONE => "command_base_api_clone",
                define_git::BASE_API_PULL => "command_base_api_pull",


                // ----------------------------
                // Migrate
                // ----------------------------
                define_git::BASE_MIGRATE_CLONE => "command_base_migrate_clone",
                define_git::BASE_MIGRATE_PULL => "command_base_migrate_pull",


                // -------------------------------------------
                // Hahahalib
                // -------------------------------------------
                // ----------------------------
                // hahahalib
                // ----------------------------
                define_git::HAHAHALIB_ALL_CLONE => "command_hahahalib_all_clone",
                define_git::HAHAHALIB_ALL_PULL => "command_hahahalib_all_pull",

                // ----------------------------
                // hahahalib
                // ----------------------------
                define_git::HAHAHALIB_HAHAHALIB_CLONE => "command_hahahalib_hahahalib_clone",
                define_git::HAHAHALIB_HAHAHALIB_PULL => "command_hahahalib_hahahalib_pull",


                // ----------------------------
                // hahalib
                // ----------------------------
                define_git::HAHAHALIB_HAHALIB_CLONE => "command_hahahalib_hahalib_clone",
                define_git::HAHAHALIB_HAHALIB_PULL => "command_hahahalib_hahalib_pull",


                // ----------------------------
                // g_plib
                // ----------------------------
                define_git::HAHAHALIB_G_PLIB_CLONE => "command_hahahalib_g_plib_clone",
                define_git::HAHAHALIB_G_PLIB_PULL => "command_hahahalib_g_plib_pull",


                // ----------------------------
                // s_ulib
                // ----------------------------
                define_git::HAHAHALIB_S_ULIB_CLONE => "command_hahahalib_s_ulib_clone",
                define_git::HAHAHALIB_S_ULIB_PULL => "command_hahahalib_s_ulib_pull",


                // ----------------------------
                // _f_lib
                // ----------------------------
                define_git::HAHAHALIB__F_LIB_CLONE => "command_hahahalib__f_lib_clone",
                define_git::HAHAHALIB__F_LIB_PULL => "command_hahahalib__f_lib_pull",


                // ----------------------------
                //
                // ----------------------------
            ];

            if(!empty($list[$command])) {
                call_user_func([
                    $command_git_,
                    $list[$command],
                ]);
            }
        } else if($item == define_item::MIGRATE) {
            $list = [
                // ----------------------------
                // 資料表 - 整合
                // ----------------------------
                define_migrate::MIGRATE_RESET => "command_migrate_reset",
                define_migrate::MIGRATE_REFRESH => "command_migrate_refresh",
                define_migrate::MIGRATE_MIGRATE => "command_migrate_migrate",
                define_migrate::MIGRATE_ROLLBACK => "command_migrate_rollback",


                // ----------------------------
                // 資料表 - 填充
                // ----------------------------
                define_migrate::SEED_DEMO => "command_seed_demo",
                define_migrate::SEED_MIGRATE => "command_seed_migrate",
                define_migrate::SEED_PUBLISH => "command_seed_publish",


                // ----------------------------
                //
                // ----------------------------
            ];

            if(!empty($list[$command])) {
                call_user_func([
                    $command_migrate_,
                    $list[$command],
                ]);
            }
        } else if($item == define_item::NPM) {
            $list = [
                // ----------------------------
                // 資料表 - 整合
                // ----------------------------
                define_npm::PLUGIN_INSTALL => "command_plugin_install",
                define_npm::PLUGIN_UPDATE => "command_plugin_update",

                // ----------------------------
                //
                // ----------------------------
            ];

            if(!empty($list[$command])) {
                call_user_func([
                    $command_npm_,
                    $list[$command],
                ]);
            }
        } else if($item == define_item::TOOL) {
            $list = [
                // ----------------------------
                // 資料表 - 整合
                // ----------------------------
                define_tool::GENERATE_DB_FIELD_CONST => "command_generate_db_field_const",

                // ----------------------------
                //
                // ----------------------------
            ];

            if(!empty($list[$command])) {
                call_user_func([
                    $command_tool_,
                    $list[$command],
                ]);
            }
        }

    }


}


