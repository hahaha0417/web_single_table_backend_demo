<?php

namespace hahaha\command\aid;

use hahahasublib\hahaha_instance_trait;
//
use hahaha\define\hahaha_define_command_aid_composer as define_composer;
use hahaha\define\hahaha_define_command_aid_env as define_env;
use hahaha\define\hahaha_define_command_aid_git as define_git;
use hahaha\define\hahaha_define_command_aid_migrate as define_migrate;
use hahaha\define\hahaha_define_command_aid_npm as define_npm;
use hahaha\define\hahaha_define_command_aid_tool as define_tool;
//
use hahaha\define\hahaha_define_base_key as key;
//

/*

use hahaha\command\aid\hahaha_command_aid_env as command_env;

use hahaha\command\aid\hahaha_command_aid_env as command_aid_env;

*/

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表

 ----------------------------------------
注意 : 此為呼叫GPL程式相關代碼
 ----------------------------------------

*/
class hahaha_command_aid_env
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

        return $this;

	}

    // --------------------------------------
    // 環境
    // --------------------------------------
	// 本地
	public function command_env_local()
    {
        $file_ = $this->dir . "/" . key::ENV . "/" . key::ENV . "/" . "local.sh";

        exec($file_);

    }
	// 伺服器
	public function command_env_server()
    {
        $file_ = $this->dir . "/" . key::ENV . "/" . key::ENV . "/" . "server.sh";

        exec($file_);

    }

	// --------------------------------------
    // 安裝
    // --------------------------------------
	// 展示用
	public function command_setup_demo()
    {
        $file_ = $this->dir . "/" . key::ENV . "/" . key::SETUP . "/" . "demo.sh";

        exec($file_);

    }
	// 初始化用
	public function command_setup_migrate()
    {
        $file_ = $this->dir . "/" . key::ENV . "/" . key::SETUP . "/" . "migrate.sh";

        exec($file_);

    }
	// 發佈用
	public function command_setup_public()
    {
        $file_ = $this->dir . "/" . key::ENV . "/" . key::SETUP . "/" . "public.sh";

        exec($file_);

    }

	// ----------------------------
	//
	// ----------------------------

	// ----------------------------
	// 錯誤訊息 - 要多國語言可以換成pattern，在另外的js二次查詢
	// ----------------------------

	// ----------------------------
	//
	// ----------------------------


}


