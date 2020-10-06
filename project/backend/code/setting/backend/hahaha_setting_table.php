<?php

namespace hahaha\backend;

use hahahasublib\hahaha_instance_trait;

/*
首頁自定義欄位

因為套版用，設定會是死的，所以直接用array描述，不需要另外從資料庫撈，存在快取

如果有完整一套組合，請繼承出去修改，hahaha提供的格式，請勿直接亂改
基本上完全相異的做法，開一個新專案是比較好的選擇，避免composer要取聯集，載入太多東西
*/
class hahaha_setting_table
{	
	use hahaha_instance_trait;

	/*
	setting
	*/
	public $Settings = [];

	/*
	route
	*/
	public $Routes = [];

	/*
	model
	*/
	public $Models = [];

	/*
	view
	*/
	public $Views = [];

	/*
	controller
	*/
	public $Controllers = [];

	/*
	table
	*/
	public $Tables = [];

	function __construct()
	{
		$this->Initial();
	}
	
	public function Initial()
	{
		// 可以給其他人設定
		$this->Settings($this->Settings);
		$this->Routes($this->Routes);
		$this->Models($this->Models);
		$this->Views($this->Views);
		$this->Controllers($this->Controllers);
		$this->Tables($this->Tables);
	}

	/*
	setting
	因為未來要移植php hahaha framework，所以不放在config
	*/
	public function Settings(&$Settings)
	{
		// 因為同一個節點，這是共用設定
		$Settings = [
			"default" => [
				// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				"route" => "hahaha",
				"model" => "hahaha",
				"view" => "hahaha",
				"controller" => "hahaha",
				"table" => "hahaha",
			],
		];
	}

	/*
	router
	*/
	public function Routes(&$Routes)
	{
		// 因為同一個節點，所以所有資料表共用一個router
		$Routes = [
			"hahaha" => [
				"group" => [
				"middleware" => ["web", "backend.login"],
					"prefix" => "backend/table",
					"namespace" => "Backend\Table",
				],
			],
		];

	}

	/*
	model
	*/
	public function Models(&$Models)
	{
		// 因為同一個節點，所以所有資料表共用一個model
		$Models = [
			"hahaha" => [
				
			],
		];


	}

	/*
	view
	*/
	public function Views(&$Views)
	{
		// 因為同一個節點，所以所有資料表共用一個controller
		$Views = [
			"hahaha" => [
				
			],
		];


	}

	/*
	controller
	*/
	public function Controllers(&$Controllers)
	{
		// 因為同一個節點，所以所有資料表共用一個controller
		$Controllers = [
			"hahaha" => [
				"index" => [
					"method" => "get",
					"node" => "/",
					"controller" => "IndexController",
					"action" => "index",
				],
				"edit" => [
					"method" => "get",
					"node" => "/edit/{id}",
					"controller" => "IndexController",
					"action" => "edit",
				],
			],
		];

				
		// Route::group(['middleware' => ['web','backend.login'],'prefix'=>'backend','namespace'=>'Backend\Home'],function(){
		// 	// class
		// 	Route::get('/class/all', 'ClassController@all');
		// 	Route::get('/class/all/node', 'ClassController@node');
		// 	Route::get('/class/all/global', 'ClassController@global');
		// 	// 頁面還是必須手動建路由，避免頁面有版本對應問題
		// });
	}

	/*
	table
	*/
	public function Tables(&$Tables)
	{	
		$Tables = [
			// 因為資料表命名唯一，所以用來當key值
			// 這裡只是用來當表，不用來跑程式，因此callback之類的不要用在這
			// node 代表這是一個節點，開花
			// 因為table不一定是自己產生，所以在這邊填對應表

			
			// table index_main - 主要頁面顯示項目，盡量精簡
			// table index_detail - 面板顯示項目，第二層資訊，不重要的收進來
			// table index_new - 主要頁面新增顯示項目
			// table preview - 預覽頁面顯示項目，通常是全部
			// table edit - 編輯頁面顯示項目，通常是全部
			// 因為欄位有各種操作，不是相同資料類型就動作一樣，因此還是必須建表
			// 因為項目很多並且設定應該是一樣的，因此表另外建立，這裡只做選擇，將要顯示的列在下面
			// 清單有必要維持簡潔，因此這裡用instance()->main("xxx")，取得設置項目

			// 因為初始化要時間，因此要用到時再new or Instance
			// --------------------------------------------------- 
			// 設定區
			// --------------------------------------------------- 
			// 基於一致性，設定檔格式是相同的
			// 基本上就是entity & table & controller的action一組
			// 1. 基本上採附加的方式(寫trait附加)，附加的情況就以我的判斷為主，例如我覺得不妥，就必須移除或放置在其他地方
			// 2. 如從根本上就不一致，請另外弄一組，例如accounts/list整個做法不同，請另外弄一個entity & repositories，搭配自己的table & view，
			//  - 寫在另一塊(避免髒掉)，ex. code2(因為專案的關係，我不打算再往裡面放一層，預設規劃裡面是沒有額外的另一組，另外寫一個資料夾自行處理比較好)，至於要不要使用我的東西，請自行決定，也可以複製一份自己維護(意思Github不會出現那包東西，有需要請另外安裝，不管是不是套件)
			// 3. 因為架構上規劃，我這邊附加的，不直接使用其他實作塊的東西，避免關聯亂掉
			// 4. 以上是我的規定，因為是MIT，如要自行搬移結構也可，但是要更新專案版本，太難搬，請自行負責
			// --------------------------------------------------- 
			"hahaha" => [
				"accounts" => [					
					"node" => "accounts/list",
					"title" => "會員 / 列表",
					"description" => "紀錄著會員資訊",
					"namespace" => "",
					"url" => \p_ha::V_Url("table/backend/accounts/list"),
					// --------------------------------------------- 
					// 主要模塊
					// --------------------------------------------- 
					"entity" => '\entities\backend\Accounts',
					"table" => '\hahaha\backend\hahaha_table_accounts',
					// --------------------------------------------- 
					"connection" => 'backend',
					"stage" => 'backend',
					"alias" => "a",
				],
				"accounts_detail" => [
					"node" => "accounts/detail",
					"title" => "會員 / 細節",
					"description" => "紀錄著會員詳細資訊",
					"namespace" => "",
					"url" => \p_ha::V_Url("table/backend/accounts/detail"),
					// --------------------------------------------- 
					// 主要模塊
					// --------------------------------------------- 
					"entity" => '\entities\backend\AccountsDetail',
					"table" => '\hahaha\backend\hahaha_table_accounts_detail',
					// --------------------------------------------- 
					"connection" => 'backend',
					"stage" => 'backend',
					"alias" => "ad",
				],
				"accounts_login_records" => [
					"node" => "accounts/login_records",
					"title" => "會員 / 登入紀錄",
					"description" => "紀錄著會員登入紀錄",
					"namespace" => "",
					"url" => \p_ha::V_Url("table/backend/accounts/login_records"),
					// --------------------------------------------- 
					// 主要模塊
					// --------------------------------------------- 
					"entity" => '\entities\backend\AccountsLoginRecords',
					"table" => '\hahaha\backend\hahaha_table_accounts_login_records',
					// --------------------------------------------- 
					"connection" => 'backend',
					"stage" => 'backend',
					"alias" => "alr",
				],
				"accounts_relations" => [
					"node" => "accounts/relations",					
					"title" => "會員 / 關係",
					"description" => "紀錄著會員關係",
					"namespace" => "",				
					"url" => \p_ha::V_Url("table/backend/accounts/relations"),
					// --------------------------------------------- 
					// 主要模塊
					// --------------------------------------------- 
					"entity" => '\entities\backend\AccountsRelations',
					"table" => '\hahaha\backend\hahaha_table_accounts_relations',
					// --------------------------------------------- 
					"connection" => 'backend',
					"stage" => 'backend',
					"alias" => "ar",
				],
			],
		];
	}


}


