<?php

namespace hahaha\front;

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

			"hahaha" => [
				"accounts" => [
					"description" => "",
					"node" => "accounts/list",
					"namespace" => "",
					"url" => \p_ha::V_Url("table/backend/accounts/list"),
					"entity" => "entities\backend\Accounts",
					"table" => [
						"name" => "",
						"index" => [
							"main" => [

							],
							"panel" => [

							],
							"new" => [
	
							],
						],	
						"preview" => [

						],					
						"edit" => [

						],

					],
				],
				"accounts_detail" => [
					"description" => "",
					"node" => "accounts/detail",
					"namespace" => "",
					"url" => \p_ha::V_Url("table/backend/accounts/detail"),
					"entity" => "entities\backend\AccountsDetail",
				],
				"accounts_login_records" => [
					"description" => "",
					"namespace" => "",
					"node" => "accounts/login_records",
					"url" => \p_ha::V_Url("table/backend/accounts/login_records"),
					"entity" => "entities\backend\AccountsLoginRecords",
				],
				"accounts_relations" => [
					"description" => "",	
					"namespace" => "",				
					"node" => "accounts/relations",
					"url" => \p_ha::V_Url("table/backend/accounts/relations"),
					"entity" => "entities\backend\AccountsRelations",
				],
			],
		];
	}


}


