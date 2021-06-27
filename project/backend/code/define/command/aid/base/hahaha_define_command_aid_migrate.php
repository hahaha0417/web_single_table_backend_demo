<?php

namespace hahaha\define;

use hahahasublib\hahaha_instance_trait;

/*
use hahaha\define\hahaha_define_command_aid_migrate as define_migrate;

use hahaha\define\hahaha_define_command_aid_migrate as define_aid_migrate;

use hahaha\define\hahaha_define_command_aid_migrate as define_command_aid_migrate;
*/

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表
*/
class hahaha_define_command_aid_migrate
{
	// ----------------------------
	// 資料表 - 整合
	// ----------------------------
	// 重置
	const MIGRATE_RESET = "migrate_reset";
	// 刷新
	const MIGRATE_REFRESH = "migrate_refresh";
	// 整合
	const MIGRATE_MIGRATE = "migrate_migrate";
	// 刪除
	const MIGRATE_ROLLBACK = "migrate_rollback";

	// ----------------------------
	// 資料表 - 填充
	// ----------------------------
	// 展示用
	const SEED_DEMO = "seed_demo";
	// 初始化用
	const SEED_MIGRATE = "seed_migrate";
	// 發佈用
	const SEED_PUBLISH = "seed_public";

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


