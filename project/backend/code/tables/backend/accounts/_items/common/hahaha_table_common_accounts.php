<?php

namespace hahaha\backend;

use hahahasublib\hahaha_instance_trait;
//
use hahaha\hahaha_table_trait;
//
use hahaha\hahaha_table_base;
// 
/*
首頁自定義欄位 

因為套版用，設定會是死的，所以直接用array描述，不需要另外從資料庫撈，存在快取

如果有完整一套組合，請繼承出去修改，hahaha提供的格式，請勿直接亂改
基本上完全相異的做法，開一個新專案是比較好的選擇，避免composer要取聯集，載入太多東西
 ----------------------------------------- 
附加請繼承 hahaha_table_base 或用trait附加
 ----------------------------------------- 


 ----------------------------------------- 
注意 : 
不要用一些小東西去處理全部欄位，
這裡應直接做欄位設定產生器，不然複製後改一改就好了，小東西不會帶來太大的好處
 ----------------------------------------- 
*/
class hahaha_table_common_accounts extends hahaha_table_base
{	
	use hahaha_instance_trait;

	// ---------------------------------- 
	// 整理後使用物件在這
	// ---------------------------------- 
	use hahaha_table_trait;
	// ---------------------------------- 

	
}


