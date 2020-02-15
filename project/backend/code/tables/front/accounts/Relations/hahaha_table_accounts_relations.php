<?php

namespace hahaha\front;

use hahahasublib\hahaha_instance_trait;

use  hahaha\define\hahaha_define_table_action as action;
use  hahaha\define\hahaha_define_table_key as key;
use  hahaha\define\hahaha_define_table_tag as tag;
use  hahaha\define\hahaha_define_table_type as type;
use  hahaha\define\hahaha_define_table_validate as validate;

/*
首頁自定義欄位

因為套版用，設定會是死的，所以直接用array描述，不需要另外從資料庫撈，存在快取

如果有完整一套組合，請繼承出去修改，hahaha提供的格式，請勿直接亂改
基本上完全相異的做法，開一個新專案是比較好的選擇，避免composer要取聯集，載入太多東西
*/
class hahaha_table_accounts_relations
{	
    use hahaha_instance_trait;
    
    /*
	settings
	*/
	public $Settings = [];

	/*
	fields
	*/
	public $Fields = [];

	/*
	index
	*/
	public $Index = [];

	/*
	preview
	*/
	public $Preview = [];

	/*
	edit
	*/
	public $Edit = [];

	function __construct()
	{
		$this->Initial();
	}

	public function Initial()
	{
        // 可以給其他人設定
		$this->Settings($this->Settings);
		$this->Fields($this->Fields);
		$this->Index($this->Index);
		$this->Preview($this->Preview);
		$this->Edit($this->Edit);
	}

	/*
	settings - 設定
	因為未來要移植php hahaha framework，所以不放在config
	*/
	public function Settings(&$Settings)
	{
		// 因為同一個節點，這是共用設定
		$Settings = [
			"default" => [
                // 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
                "main" => "hahaha",
                "preview" => "hahaha",
                "edit" => "hahaha",
			],
        ];
        
	}
	
	/*
	fields - DB table fields
	因為未來要移植php hahaha framework，所以不放在config
	
	"id" => [
		key::TYPE => type::TEXT,
		key::VALIDATE => validate::EMAIL,
		key::ACTIONS => [
			action::AUTO_UPDATE => false,
		],				
		key::TAGS => [
			tag::VISLBLED => true,
			tag::ENABLED => true,
			tag::DISPLAY_NONE => false,
		],
	],
	*/
	public function Fields(&$Fields)
	{
		// 因為同一個節點，這是共用設定
		$Fields = [
			"id" => [
				"type" => null,
				"validate" => null,
				"auto_update" => false,
				"visible" => true,
				"enabled" => true,
				"dispaly_none" => false,
			],




			
			// $table->bigIncrements('id');
			// // 關注項目
			// $table->string('account')->comment('帳號');
			// $table->string('password')->comment('密碼');
			// $table->string('email')->comment('信箱');
			// $table->tinyInteger('gender')->comment('性別 0 女 1 男');            
			// $table->integer('status')->comment('狀態 -1 停用 0 為驗證 1 驗證');
			// $table->timestamps();
			// created_at
			// updated_at
        ];
        
    }
    
    /*
	index - 首頁
	因為未來要移植php hahaha framework，所以不放在config
	*/
	public function Index(&$Index)
	{
		// 因為同一個節點，這是共用設定
		$Index = [
			"hahaha" => [
                // 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
                // 主要列表
                "main" => [

                ],
                // 
                // detail panel
                "detail" => [

                ],
                // new panel
                "new" => [

                ],
			],
        ];
        
	}

	/*
	preview - 預覽葉
	因為未來要移植php hahaha framework，所以不放在config
	*/
	public function Preview(&$Preview)
	{
		// 因為同一個節點，所以所有資料表共用一個router
		$Preview = [
			"hahaha" => [
				
			],
		];

	}

	/*
	edit - 編輯頁
	*/
	public function Edit(&$Edit)
	{
		// 因為同一個節點，所以所有資料表共用一個model
		$Edit = [
			"hahaha" => [
				
			],
        ];
        
	}

}


