<?php

namespace hahaha\define;

use hahahasublib\hahaha_instance_trait;

/*
use hahaha\define\hahaha_define_command_aid_env as define_env;

use hahaha\define\hahaha_define_command_aid_env as define_aid_env;

use hahaha\define\hahaha_define_command_aid_env as define_command_aid_env;
*/

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表
*/
class hahaha_define_command_aid_env
{
    // ----------------------------
	// 環境
	// ----------------------------
	// 本地
	const LOCAL = "local";
	// 伺服器
	const SERVER = "server";

	// ----------------------------
	// 安裝
	// ----------------------------
	// 展示用
	const DEMO = "demo";
	// 初始化用
	const MIGRATE = "migrate";
	// 發佈用
	const PUBLISH = "public";

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


