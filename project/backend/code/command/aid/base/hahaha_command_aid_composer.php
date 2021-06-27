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
use hahaha\command\aid\hahaha_command_aid_composer as command_composer;
use hahaha\command\aid\hahaha_command_aid_env as command_env;
use hahaha\command\aid\hahaha_command_aid_git as command_git;
use hahaha\command\aid\hahaha_command_aid_migrate as command_migrate;
use hahaha\command\aid\hahaha_command_aid_npm as command_npm;
use hahaha\command\aid\hahaha_command_aid_tool as command_tool;
//
use hahaha\command\aid\hahaha_command_aid as command;
//

/*

use hahaha\command\aid\hahaha_command_aid_composer as command_composer;

use hahaha\command\aid\hahaha_command_aid_composer as command_aid_composer;

*/

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表

 ----------------------------------------
注意 : 此為呼叫GPL程式相關代碼
 ----------------------------------------
*/
class hahaha_command_aid_composer
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
    // All
    // --------------------------------------
	public function command_all_dump_autoload()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::ALL . "/" . "dump_autoload.sh";

        exec($file_);

    }
	// all install dev
	public function command_all_install_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::ALL . "/" . "install_dev.sh";

        exec($file_);

    }
	// all install no dev
	public function command_all_install_no_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::ALL . "/" . "install_no_dev.sh";

        exec($file_);


    }
	// all update dev
	public function command_all_update_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::ALL . "/" . "update_dev.sh";

        exec($file_);

    }
	// all update no dev
	public function command_all_update_no_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::ALL . "/" . "update_no_dev.sh";

        exec($file_);

    }

	// --------------------------------------
    // Frontend
    // --------------------------------------
	// frontend dump autoload
	public function command_frontend_dump_autoload()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::FRONTEND . "/" . "dump_autoload.sh";

        exec($file_);

    }
	// frontend install dev
	public function command_frontend_install_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::FRONTEND . "/" . "install_dev.sh";

        exec($file_);

    }
	// frontend install no dev
	public function command_frontend_install_no_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::FRONTEND . "/" . "install_no_dev.sh";

        exec($file_);

    }
	// frontend update dev
	public function command_frontend_update_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::FRONTEND . "/" . "update_dev.sh";

        exec($file_);

    }
	// frontend update no dev
	public function command_frontend_update_no_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::FRONTEND . "/" . "update_no_dev.sh";

        exec($file_);

    }

	// --------------------------------------
    // Backend
    // --------------------------------------
	// backend dump autoload
	public function command_backend_dump_autoload()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::BACKEND . "/" . "dump_autoload.sh";

        exec($file_);

    }
	// backend install dev
	public function command_backend_install_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::BACKEND . "/" . "install_dev.sh";

        exec($file_);

    }
	// backend install no dev
	public function command_backend_install_no_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::BACKEND . "/" . "install_no_dev.sh";

        exec($file_);

    }
	// backend update dev
	public function command_backend_update_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::BACKEND . "/" . "update_dev.sh";

        exec($file_);

    }
	// backend update no dev
	public function command_backend_update_no_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::BACKEND . "/" . "update_no_dev.sh";

        exec($file_);

    }

	// --------------------------------------
    // Api
    // --------------------------------------
	// api dump autoload
	public function command_api_dump_autoload()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::API . "/" . "dump_autoload.sh";

        exec($file_);

    }
	// api install dev
	public function command_api_install_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::API . "/" . "install_dev.sh";

        exec($file_);

    }
	// api install no dev
	public function command_api_install_no_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::API . "/" . "install_no_dev.sh";

        exec($file_);

    }
	// api update dev
	public function command_api_update_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::API . "/" . "update_dev.sh";

        exec($file_);

    }
	// api update no dev
	public function command_api_update_no_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::API . "/" . "update_no_dev.sh";

        exec($file_);

    }

	// --------------------------------------
    // Migrate
    // --------------------------------------
	// migrate dump autoload
	public function command_migrate_dump_autoload()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::MIGRATE . "/" . "dump_autoload.sh";

        exec($file_);

    }
	// migrate install dev
	public function command_migrate_install_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::MIGRATE . "/" . "dump_autoload.sh";

        exec($file_);

    }
	// migrate install no dev
	public function command_migrate_install_no_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::MIGRATE . "/" . "dump_autoload.sh";

        exec($file_);

    }
	// migrate update dev
	public function command_migrate_update_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::MIGRATE . "/" . "dump_autoload.sh";

        exec($file_);

    }
	// migrate update no dev
	public function command_migrate_update_no_dev()
    {
        $file_ = $this->dir . "/" . key::COMPOSER . "/" . key::MIGRATE . "/" . "dump_autoload.sh";

        exec($file_);

    }


}


