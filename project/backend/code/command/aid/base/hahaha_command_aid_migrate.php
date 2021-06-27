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

use hahaha\command\aid\hahaha_command_aid_migrate as command_migrate;

use hahaha\command\aid\hahaha_command_aid_migrate as command_aid_migrate;

*/

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表

 ----------------------------------------
注意 : 此為呼叫GPL程式相關代碼
 ----------------------------------------

*/
class hahaha_command_aid_migrate
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
    // 資料表 - 整合
    // --------------------------------------
	// 重置
	public function command_migrate_reset()
    {
        $file_ = $this->dir . "/" . key::MIGRATE  . "/" . key::MIGRATE . "/" . "reset.sh";

        exec($file_);

    }
	// 刷新
	public function command_migrate_refresh()
    {
        $file_ = $this->dir . "/" . key::MIGRATE  . "/" . key::MIGRATE . "/" . "refresh.sh";

        exec($file_);

    }
	// 整合
	public function command_migrate_migrate()
    {
        $file_ = $this->dir . "/" . key::MIGRATE  . "/" . key::MIGRATE . "/" . "migrate.sh";

        exec($file_);

    }
	// 刪除
	public function command_migrate_rollback()
    {
        $file_ = $this->dir . "/" . key::MIGRATE  . "/" . key::MIGRATE . "/" . "rollback.sh";

        exec($file_);

    }

    // --------------------------------------
    // 資料表 - 填充
    // --------------------------------------
	// 展示用
	public function command_seed_demo()
    {
        $file_ = $this->dir . "/" . key::MIGRATE  . "/" . key::SEED . "/" . "demo.sh";

        exec($file_);

    }
	// 初始化用
	public function command_seed_migrate()
    {
        $file_ = $this->dir . "/" . key::MIGRATE  . "/" . key::SEED . "/" . "migrate.sh";

        exec($file_);

    }
	// 發佈用
	public function command_seed_public()
    {
        $file_ = $this->dir . "/" . key::MIGRATE  . "/" . key::SEED . "/" . "public.sh";

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


