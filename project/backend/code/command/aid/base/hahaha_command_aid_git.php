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

use hahaha\command\aid\hahaha_command_aid_git as command_git;

use hahaha\command\aid\hahaha_command_aid_git as command_aid_git;

*/

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表

 ----------------------------------------
注意 : 此為呼叫GPL程式相關代碼
 ----------------------------------------

*/
class hahaha_command_aid_git
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

    // --------------------------------------------------------------
    // Base
    // --------------------------------------------------------------

    // --------------------------------------
    // All
    // --------------------------------------
	// all clone
	public function command_base_all_clone()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::BASE . "/" . key::ALL . "/" . "clone.sh";

        exec($file_);

    }
	// all pull
	public function command_base_all_pull()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::BASE . "/" . key::ALL . "/" . "pull.sh";

        exec($file_);

    }

	// --------------------------------------
    // Frontend
    // --------------------------------------
	// frontend clone
	public function command_base_frontend_clone()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::BASE . "/" . key::FRONTEND . "/" . "clone.sh";

        exec($file_);

    }
	// frontend pull
	public function command_base_frontend_pull()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::BASE . "/" . key::FRONTEND . "/" . "pull.sh";

        exec($file_);

    }

	// --------------------------------------
    // Backend
    // --------------------------------------
	// backend clone
	public function command_base_backend_clone()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::BASE . "/" . key::BACKEND . "/" . "clone.sh";

        exec($file_);

    }
	// backend pull
	public function command_base_backend_pull()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::BASE . "/" . key::BACKEND . "/" . "pull.sh";

        exec($file_);

    }

	// --------------------------------------
    // Api
    // --------------------------------------
	// api clone
	public function command_base_api_clone()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::BASE . "/" . key::API . "/" . "clone.sh";

        exec($file_);

    }
	// api clone
	public function command_base_api_pull()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::BASE . "/" . key::API . "/" . "pull.sh";

        exec($file_);

    }

	// --------------------------------------
    // Migrate
    // --------------------------------------
	// migrate clone
	public function command_base_migrate_clone()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::BASE . "/" . key::MIGRATE . "/" . "clone.sh";

        exec($file_);

    }
	// migrate pull
	public function command_base_migrate_pull()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::BASE . "/" . key::MIGRATE . "/" . "pull.sh";

        exec($file_);

    }

	// ----------------------------
	//
	// ----------------------------

    // --------------------------------------------------------------
    // Hahahalib
    // --------------------------------------------------------------

    // ----------------------------
	// all
	// ----------------------------
    // all clone
	public function command_hahahalib_all_clone()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::HAHAHALIB . "/" . key::ALL . "/" . "clone.sh";

        exec($file_);

    }
	// all pull
	public function command_hahahalib_all_pull()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::HAHAHALIB . "/" . key::ALL . "/" . "pull.sh";

        exec($file_);

    }

    // ----------------------------
	// hahahalib
	// ----------------------------
    // hahahalib clone
	public function command_hahahalib_hahahalib_clone()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::HAHAHALIB . "/" . key::HAHAHALIB . "/" . "clone.sh";

        exec($file_);

    }
	// hahahalib pull
	public function command_hahahalib_hahahalib_pull()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::HAHAHALIB . "/" . key::HAHAHALIB . "/" . "pull.sh";

        exec($file_);

    }

    // ----------------------------
	// hahalib
	// ----------------------------
    // hahalib clone
	public function command_hahahalib_hahalib_clone()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::HAHAHALIB . "/" . key::HAHALIB . "/" . "clone.sh";

        exec($file_);

    }
	// hahalib pull
	public function command_hahahalib_hahalib_pull()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::HAHAHALIB . "/" . key::HAHALIB . "/" . "pull.sh";

        exec($file_);

    }

    // ----------------------------
	// s_ulib
	// ----------------------------
    // s_ulib clone
	public function command_hahahalib_s_ulib_clone()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::HAHAHALIB . "/" . key::S_ULIB . "/" . "clone.sh";

        exec($file_);

    }
	// s_ulib pull
	public function command_hahahalib_s_ulib_pull()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::HAHAHALIB . "/" . key::S_ULIB . "/" . "pull.sh";

        exec($file_);

    }

    // ----------------------------
	// g_plib
	// ----------------------------
    // g_plib clone
	public function command_hahahalib_g_plib_clone()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::HAHAHALIB . "/" . key::G_PLIB . "/" . "clone.sh";

        exec($file_);

    }
	// g_plib pull
	public function command_hahahalib_g_plib_pull()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::HAHAHALIB . "/" . key::G_PLIB . "/" . "pull.sh";

        exec($file_);

    }

    // ----------------------------
	// _f_lib
	// ----------------------------
    // _f_lib clone
    public function command_hahahalib__f_lib_clone()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::HAHAHALIB . "/" . key::_F_LIB . "/" . "clone.sh";

        exec($file_);

    }
    // _f_lib pull
    public function command_hahahalib__f_lib_pull()
    {
        $file_ = $this->dir . "/" . key::GIT . "/" . key::HAHAHALIB . "/" . key::_F_LIB . "/" . "pull.sh";

        exec($file_);

    }

    // --------------------------------------------------------------
    //
    // --------------------------------------------------------------

	// ----------------------------
	// 錯誤訊息 - 要多國語言可以換成pattern，在另外的js二次查詢
	// ----------------------------

	// ----------------------------
	//
	// ----------------------------

}


