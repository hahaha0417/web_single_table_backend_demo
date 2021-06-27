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
use hahaha\command\aid\hahaha_command_aid_npm as command_npm;

use hahaha\command\aid\hahaha_command_aid_npm as command_aid_npm;

*/

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表

 ----------------------------------------
注意 : 此為呼叫GPL程式相關代碼
 ----------------------------------------
*/
class hahaha_command_aid_npm
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
    // Plugin
    // --------------------------------------
	// 安裝
	public function command_plugin_install()
    {
        $file_ = $this->dir . "/" . key::NPM  . "/" . key::PLUGIN . "/" . "install.sh";

        exec($file_);

    }
	// 更新
	public function command_plugin_update()
    {
        $file_ = $this->dir . "/" . key::NPM  . "/" . key::PLUGIN . "/" . "install.sh";

        exec($file_);

    }

	// ----------------------------
	//
	// ----------------------------

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


