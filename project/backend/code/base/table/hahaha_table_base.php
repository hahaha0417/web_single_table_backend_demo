<?php

namespace hahaha;

use  hahaha\define\hahaha_define_table_key as key;
use hahaha\define\hahaha_define_table_tag as tag;

class hahaha_table_base
{
	// ---------------------------------- 
	// block - 內建區塊
	// ---------------------------------- 
	const B_TOP = "top";
	const B_MAIN = "main";
	const B_BOTTOM = "bottom";
	const B_LINK = "link";
	const B_PANEL_ADD = "panel_add";
	const B_PANEL_DETAIL = "panel_detail";
	// ---------------------------------- 

	// ---------------------------------- 
	// 設定集
	// ---------------------------------- 
	const HAHAHA = "hahaha";
	// ---------------------------------- 
	
	// ---------------------------------- 
	// 其他 - 選項
	// ---------------------------------- 
	const UPLOAD = "upload";
	const CHECKBOX_SELECTED = "checkbox_selected";
	// 滑過顯示PANEL_DETAIL面板的BUTTON_ICON
	// 產生B_PANEL_DETAIL項目的PANEL_DETAIL
	const BUTTON_DELETE = "button_delete";
	const BUTTON_EDIT = "button_edit";
	//
	const BUTTON_ADD = "button_add";
	const BUTTON_SELECTED_DELETE = "button_selected_delete";
	const BUTTON_ALL_SAVE = "button_all_save";
	const BUTTON_ALL_REFRESH = "button_all_refresh";
	//
	const PANEL_ADD_BUTTON_ADD = self::B_PANEL_ADD . "_" . "button_add";
	const PANEL_ADD_BUTTON_CANCEL = self::B_PANEL_ADD . "_" . "button_cancel";
	//
	const BUTTON_PREPEND_DETAIL = "button_prepend_detail";
	const PANEL_DETAIL = self::B_PANEL_DETAIL . "_" . "panel_detail";
	//
	const PANEL_DETAIL_BUTTON_CHANGE_PASSWORD = self::B_PANEL_DETAIL . "_" . "button_change_password";
	// ---------------------------------- 

	// -------------------------------------------------------------  
	// index
	// -------------------------------------------------------------  
	// ---------------------------------- 
	// block - 內建區塊
	// ---------------------------------- 
	// const B_TOP = "top";
	// const B_MAIN = "main";
	// const B_BOTTOM = "bottom";
	// const B_LINK = "link";
	// const B_PANEL_ADD = "panel_add";
	// const B_PANEL_DETAIL = "panel_detail";

	// -------------------------------------------------------------  
	// edit
	// ------------------------------------------------------------- 



	// -------------------------------------------------------------  
	// 
	// ------------------------------------------------------------- 

	// ----------------------------------------------- 
	// 設定檔
	// ----------------------------------------------- 	
    /*
	settings
	*/
	public $Settings = [];

	/*
	settings fields
	*/
	public $Settings_Fields = [];

	/*
	settings options
	*/
	public $Settings_Options = [];

	/*
	settings index
	*/
	public $Settings_Index = [];

	/*
	settings preview
	*/
	public $Settings_Preview = [];

	/*
	settings edit
	*/
	public $Settings_Edit = [];

	/*
	settings 附加的DB欄位，用來DB撈資料附加要求欄位
	*/
	public $Settings_DB_Fields_Addition = [];

	function __construct()
	{
		$this->Initial();

	}

	public function Initial()
	{
		// 可以給其他人設定
		// ---------------------------------------------------- 
		// 一定要初始化
		// ---------------------------------------------------- 
		// 初始化設定檔
		$this->Settings($this->Settings);
		$this->Settings_Options($this->Settings_Options);
		// 
		$this->Settings_DB_Fields_Addition($this->Settings_DB_Fields_Addition);
		$this->Settings_Fields($this->Settings_Fields);
		
		// ---------------------------------------------------- 
		// Setting Preset
		$this->Settings_Index($this->Settings_Index);
		$this->Settings_Preview($this->Settings_Preview);
		$this->Settings_Edit($this->Settings_Edit);
		// 初始化使用設定，要用到才做初始化(為了快)
		// $this->Initial_Index($this->Index);
		// $this->Initial_Preview($this->Preview);
		// $this->Initial_Edit($this->Edit);
		// $this->Initial_Fields_Index($this->Fields_Index);
		// $this->Initial_Fields_Preview($this->Fields_Preview);
		// $this->Initial_Fields_Edit($this->Fields_Edit);
	
	}

	/*
	settings - 設定
	因為未來要移植php hahaha framework，所以不放在config
	*/
	public function Settings(&$settings)
	{
		// 因為同一個節點，這是共用設定
		// $settings = [
		// 	"default" => [
        //         // 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
        //         "index" => self::HAHAHA,
        //         "preview" => self::HAHAHA,
        //         "edit" => self::HAHAHA,
		// 	],
        // ];
        
	}

	/*
	設定選項
	*/
	public function Settings_Options(&$settings_options)
	{
		// 對應DB值
		// $settings_options = [
		// 	self::GENDER => [
		// 		'male' => [
		// 			key::VALUE => '1',					
		// 			key::TITLE => __('backend.male'),
		// 		],	
		// 		'female' => [
		// 			key::VALUE => '0',
		// 			key::TITLE => __('backend.female'),
		// 		],
							
		// 	],
		// ];

	}

	/*
	fields - DB table additional fields
	因為未來要移植php hahaha framework，所以不放在config
	*/
	public function Settings_DB_Fields_Addition(&$settings_db_fields_addition)
	{
		// 因為同一個節點，這是共用設定
		// $settings_db_fields_addition = [
		// 	self::ID => [
		// 		key::DB_FIELD => [
		// 			key::IS_FIELD => true,
		// 			// key::TYPE => db_field_type::STRING,
		// 			// key::NAME => self::ID,
		// 		],				
		// 	],	
		// 	self::CREATED_AT => [
		// 		key::DB_FIELD => [
		// 			key::IS_FIELD => true,
		// 			// key::TYPE => db_field_type::DATETIME,
		// 			// 指定
		// 			key::NAME => 'createdAt', 
		// 		],				
		// 	],		
		// 	self::UPDATED_AT => [
		// 		key::DB_FIELD => [
		// 			key::IS_FIELD => true,
		// 			// key::TYPE => db_field_type::DATETIME,
		// 			// 指定
		// 			key::NAME => 'updatedAt',
		// 		],				
		// 	],				
        // ];
        
    }
	
	/*
	fields - table fields
	因為未來要移植php hahaha framework，所以不放在config
	
	"id" => [
		key::TYPE => type::TEXT,
		key::VALIDATE => validate::EMAIL,
		key::ACTIONS => [
			action::AUTO_UPDATE => false,
		],				
		key::CLASSES => [
			class_::VISLBLED => true,
			class_::ENABLED => true,
			class_::DISPLAY_NONE => false,
		],
	],
	*/
	public function Settings_Fields(&$settings_fields)
	{
		// 因為同一個節點，這是共用設定
		// $settings_fields = [
		// 	self::ID => [
		// 		key::ID => self::IDENTIFY . "_" . self::ID,
		// 		key::DB_FIELD => [
		// 			key::IS_FIELD => true,
		// 			// key::NAME => self::ID,
		// 		],
		// 		key::TITLE => __('backend.id'),
		// 		key::TYPE => type::TEXT,
		// 		key::CLASSES => [
		// 			class_::DISABLED => true,
		// 		],
		// 		key::PLACEHOLDER => __('backend.help') . " : " . "integer",
		// 	],
		// 	self::ACCOUNT => [					// 帳號不可以改
		// 		key::ID => self::IDENTIFY . "_" . self::ACCOUNT,
		// 		key::DB_FIELD => [
		// 			key::IS_FIELD => true,
		// 		],
		// 		key::TITLE => __('backend.account'),
		// 		key::TYPE => type::TEXT,
		// 		key::CLASSES => [
		// 			class_::DISABLED => true,
		// 		],
		// 		key::PLACEHOLDER => __('backend.help') . " : " . "hahaha",
		// 	],
		// 	self::PASSWORD => [
		// 		key::ID => self::IDENTIFY . "_" . self::PASSWORD,
		// 		key::DB_FIELD => [
		// 			key::IS_FIELD => true,
		// 		],
		// 		key::TITLE => __('backend.password'),
		// 		key::TYPE => type::PASSWORD,
		// 		key::PLACEHOLDER => __('backend.help') . " : " . "hahaha",
		// 	],
		// 	self::PASSWORD_CONFIRM => [
		// 		key::ID => self::IDENTIFY . "_" . self::PASSWORD_CONFIRM,
		// 		key::TITLE => __('backend.password_confirm'),
		// 		key::TYPE => type::PASSWORD,
		// 		key::PLACEHOLDER => __('backend.help') . " : " . "hahaha",
		// 	],
		// 	self::PASSWORD_NEW => [
		// 		key::ID => self::IDENTIFY . "_" . self::PASSWORD_NEW,
		// 		key::TITLE => __('backend.password_new'),
		// 		key::TYPE => type::PASSWORD,
		// 		key::PLACEHOLDER => __('backend.help') . " : " . "hahaha",
		// 	],
		// 	self::PASSWORD_NEW_CONFIRM => [
		// 		key::ID => self::IDENTIFY . "_" . self::PASSWORD_NEW_CONFIRM,
		// 		key::TITLE => __('backend.password_confirm_new'),
		// 		key::TYPE => type::PASSWORD,
		// 		key::PLACEHOLDER => __('backend.help') . " : " . "hahaha",
		// 	],
		// 	self::EMAIL => [
		// 		key::ID => self::IDENTIFY . "_" . self::EMAIL,
		// 		key::DB_FIELD => [
		// 			key::IS_FIELD => true,
		// 		],
		// 		key::TITLE => __('backend.email'),
		// 		key::TYPE => type::TEXT,
		// 		key::VALIDATE => validate::EMAIL,
		// 		key::PLACEHOLDER => __('backend.help') . " : " . "hahaha0417@hotmail.com",				
		// 	],
		// 	self::GENDER => [
		// 		key::ID => self::IDENTIFY . "_" . self::GENDER,
		// 		key::DB_FIELD => [
		// 			key::IS_FIELD => true,
		// 		],
		// 		key::TITLE => __('backend.gender'),
		// 		key::TYPE => type::RADIOBOX,
		// 	],
		// 	self::STATUS => [
		// 		key::ID => self::IDENTIFY . "_" . self::STATUS,
		// 		key::DB_FIELD => [
		// 			key::IS_FIELD => true,
		// 		],
		// 		key::TITLE => __('backend.status'),
		// 		key::TYPE => type::TEXT,
		// 		key::ACTIONS => [
		// 			action::AUTO_UPDATE => true,
		// 		],	
		// 		key::PLACEHOLDER => __('backend.help') . " : " . "-1 停權 0 未驗證 1 驗證",	
		// 	],
		// 	self::CREATED_AT => [
		// 		key::ID => self::IDENTIFY . "_" . self::CREATED_AT,
		// 		key::DB_FIELD => [
		// 			key::IS_FIELD => true,
		// 			key::NAME => 'createdAt',
		// 		],
		// 		key::TITLE => __('backend.created_at'),
		// 		key::TYPE => type::TEXT,
		// 		key::CLASSES => [
		// 			class_::DISABLED => true,
		// 		],
		// 	],
		// 	self::UPDATED_AT => [
		// 		key::ID => self::IDENTIFY . "_" . self::UPDATED_AT,
		// 		key::DB_FIELD => [
		// 			key::IS_FIELD => true,
		// 			key::NAME => 'updatedAt',
		// 		],
		// 		key::TITLE => __('backend.updated_at'),
		// 		key::TYPE => type::TEXT,
		// 		key::CLASSES => [
		// 			class_::DISABLED => true,
		// 		],
		// 	],
		// 	//
		// 	self::CHECKBOX_SELECTED => [
		// 		key::ID => self::IDENTIFY . "_" . self::CHECKBOX_SELECTED,
		// 		key::TITLE => __('backend.selected'),
		// 		key::TYPE => type::CHECKBOX_SELECTED,
		// 	],
		// 	// ------------------------- 
		// 	self::BUTTON_PREPEND_DETAIL => [
		// 		key::ID => self::IDENTIFY . "_" . self::BUTTON_PREPEND_DETAIL,
		// 		// key::TITLE => __('backend.detail'),
		// 		key::TYPE => type::BUTTON_ICON,
		// 	],
		// 	self::PANEL_DETAIL => [
		// 		key::ID => self::IDENTIFY . "_" . self::PANEL_DETAIL,
		// 		key::TITLE => __('backend.detail'),
		// 		key::TYPE => type::PANEL,
		// 	],
		// 	// ------------------------- 
		// 	self::BUTTON_DELETE => [
		// 		key::ID => self::IDENTIFY . "_" . self::BUTTON_DELETE,
		// 		// 不顯示字
		// 		//key::TITLE => __('backend.delete'),
		// 		key::TYPE => type::BUTTON_ICON,
		// 		key::CLASSES_1 => [
		// 			"btn btn-dark" => true,
		// 		],
		// 		key::CLASSES_2 => [
		// 			"fas fa-minus" => true,
		// 		],
		// 		key::STYLES => [
		// 			"font-size" => "1.5em", 
		// 			"color" => "Tomato",
		// 		],
		// 	],
		// 	self::BUTTON_EDIT => [
		// 		key::ID => self::IDENTIFY . "_" . self::BUTTON_EDIT,
		// 		// 不顯示字
		// 		// key::TITLE => __('backend.edit'),
		// 		key::TYPE => type::BUTTON_ICON_LINK,
		// 		key::INDEX => self::ID,
		// 		key::CLASSES_1 => [
		// 			"btn btn-dark" => true,
		// 		],
		// 		key::CLASSES_2 => [
		// 			"fas fa-edit" => true,
		// 		],
		// 		key::STYLES => [
		// 			"font-size" => "1.5em", 
		// 			"color" => "Tomato",
		// 		],
		// 	],
		// 	//
		// 	self::BUTTON_ADD => [
		// 		key::ID => self::IDENTIFY . "_" . self::BUTTON_ADD,
		// 		key::TITLE => __('backend.add'),
		// 		key::TYPE => type::BUTTON_ICON,
		// 		// class
		// 		key::CLASSES => [
		// 			self::IDENTIFY . "_" . self::BUTTON_ADD => true,
		// 		],
		// 		key::CLASSES_1 => [
		// 			"btn btn-dark" => true,
		// 		],
		// 		key::CLASSES_2 => [
		// 			"fas fa-plus" => true,
		// 		],
		// 		// class
		// 		key::STYLES => [
		// 			"font-size" => "1.5em", 
		// 			"color" => "Tomato",
		// 		],
		// 	],
		// 	self::BUTTON_SELECTED_DELETE => [
		// 		key::ID => self::IDENTIFY . "_" . self::BUTTON_SELECTED_DELETE,
		// 		key::TITLE => __('backend.selected_delete'),
		// 		key::TYPE => type::BUTTON_ICON,
		// 		key::CLASSES => [
		// 			self::IDENTIFY . "_" . self::BUTTON_SELECTED_DELETE => true,
		// 		],
		// 		key::CLASSES_1 => [
		// 			"btn btn-dark" => true,
		// 		],
		// 		key::CLASSES_2 => [
		// 			"fas fa-minus" => true,
		// 		],
		// 		key::STYLES => [
		// 			"font-size" => "1.5em", 
		// 			"color" => "Tomato",
		// 		],
		// 	],
		// 	self::BUTTON_ALL_SAVE => [
		// 		key::ID => self::IDENTIFY . "_" . self::BUTTON_ALL_SAVE,
		// 		key::TITLE => __('backend.all_save'),
		// 		key::TYPE => type::BUTTON_ICON,
		// 		key::CLASSES => [
		// 			self::IDENTIFY . "_" . self::BUTTON_ALL_REFRESH => true,
		// 		],
		// 		key::CLASSES_1 => [
		// 			"btn btn-dark" => true,
		// 		],
		// 		key::CLASSES_2 => [
		// 			"fas fa-save" => true,
		// 		],
		// 		key::STYLES => [
		// 			"font-size" => "1.5em", 
		// 			"color" => "Tomato",
		// 		],
		// 	],
		// 	self::BUTTON_ALL_REFRESH => [
		// 		key::ID => self::IDENTIFY . "_" . self::BUTTON_ALL_REFRESH,
		// 		key::TITLE => __('backend.all_refresh'),
		// 		key::TYPE => type::BUTTON_ICON,
		// 		key::CLASSES => [
		// 			self::IDENTIFY . "_" . self::BUTTON_ALL_REFRESH => true,
		// 		],
		// 		key::CLASSES_1 => [
		// 			"btn btn-dark" => true,
		// 		],
		// 		key::CLASSES_2 => [
		// 			"fas fa-refresh" => true,
		// 		],
		// 		key::STYLES => [
		// 			"font-size" => "1.5em", 
		// 			"color" => "Tomato",
		// 		],
		// 	],
		// 	//
		// 	self::PANEL_ADD_BUTTON_ADD => [
		// 		key::ID => self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_ADD,
		// 		key::TITLE => __('backend.add'),
		// 		key::TYPE => type::BUTTON_ICON,
		// 		// class
		// 		key::CLASSES => [
		// 			self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_ADD => true,
		// 		],
		// 		key::CLASSES_1 => [
		// 			"btn btn-dark" => true,
		// 		],
		// 		key::CLASSES_2 => [
		// 			"fas fa-plus" => true,
		// 		],
		// 		// class
		// 		key::STYLES => [
		// 			"font-size" => "1.5em", 
		// 			"color" => "Tomato",
		// 		],
		// 	],
		// 	self::PANEL_ADD_BUTTON_CANCEL => [
		// 		key::ID => self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_CANCEL,
		// 		key::TITLE => __('backend.cancel'),
		// 		key::TYPE => type::BUTTON_ICON,
		// 		// class
		// 		key::CLASSES => [
		// 			self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_CANCEL => true,
		// 		],
		// 		key::CLASSES_1 => [
		// 			"btn btn-dark" => true,
		// 		],
		// 		key::CLASSES_2 => [
		// 			"fas fa-times" => true,
		// 		],
		// 		// class
		// 		key::STYLES => [
		// 			"font-size" => "1.5em", 
		// 			"color" => "Tomato",
		// 		],
		// 	],
		// 	self::PANEL_DETAIL_BUTTON_CHANGE_PASSWORD => [
		// 		key::ID => self::IDENTIFY . "_" . self::PANEL_DETAIL_BUTTON_CHANGE_PASSWORD,
		// 		key::TITLE => __('backend.change_password'),
		// 		key::TYPE => type::BUTTON_ICON,
		// 		// class
		// 		key::CLASSES => [
		// 			self::IDENTIFY . "_" . self::PANEL_DETAIL_BUTTON_CHANGE_PASSWORD => true,
		// 		],
		// 		key::CLASSES_1 => [
		// 			"btn btn-dark" => true,
		// 		],
		// 		key::CLASSES_2 => [
		// 			"far fa-arrow-alt-circle-right" => true,
		// 		],
		// 		// class
		// 		key::STYLES => [
		// 			"font-size" => "1.5em", 
		// 			"color" => "Tomato",
		// 		],
		// 	],
        // ];
        
	}
	

    
    /*
	index - 首頁
	因為未來要移植php hahaha framework，所以不放在config

	注意 : 格式要統一
	*/
	public function Settings_Index(&$settings_index)
	{
		// 因為同一個節點，這是共用設定
		// $settings_index = [
		// 	// --------------------------------------------------- 
		// 	// hahaha的版本的設定集，寫死，避免要處理很細
		// 	// --------------------------------------------------- 			
		// 	// --------------------------------------------------- 
		// 	self::HAHAHA => [		
		// 		// --------------------------------------------------- 
		// 		// --------------------------------------------------- 
		// 		// 主要畫面區
		// 		// --------------------------------------------------- 	
		// 		// --------------------------------------------------- 
		// 		// 這裡不做太複雜，如果前端需要搬移設計
		// 		// 基本上如我前台首頁做法(page & item)
		// 		// 如要多層嵌套，基本上只要牽扯到動態資料，模組最多2~3個維度，也就是2層 + 彈出面板
		// 		// 不會有動態資料需要多層嵌套(這不是視窗程式，視窗程式也不會多層動態，那改起來太累了，一定是固定架構)
		// 		// 靜態資料，則可以拆分模組，多個模組整在一起會很難維護，原則上很多零散模組，則分開管理，避免太亂
		// 		// --------------------------------------------------- 
								
		// 		// --------------------------------------------------- 
		// 		// 上方區塊 - 一維嵌套
		// 		// --------------------------------------------------- 
		// 		// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
		// 		// --------------------------------------------------- 
        //         self::B_TOP => [
		// 			// 目前只放button，外層只是分隔線...
		// 			[
		// 				// key::TITLE => __('backend.item'),
		// 				key::TYPE => type::B_BLOCK_NORMAL,
		// 				key::GROUP => group::SHORT_WRAP,
		// 				key::ITEMS => [
		// 					self::BUTTON_ADD => [
		// 						// 因為ID重複，所以加上Top
		// 						key::ID => self::IDENTIFY . "_" . self::B_TOP . "_" . self::BUTTON_ADD,
		// 					],
		// 					self::BUTTON_SELECTED_DELETE => [
		// 						// 因為ID重複，所以加上Top
		// 						key::ID => self::IDENTIFY . "_" . self::B_TOP . "_" . self::BUTTON_SELECTED_DELETE,
		// 					],
		// 					self::BUTTON_ALL_SAVE => [
		// 						// 因為ID重複，所以加上Top
		// 						key::ID => self::IDENTIFY . "_" . self::B_TOP . "_" . self::BUTTON_ALL_SAVE,
		// 					],
		// 					self::BUTTON_ALL_REFRESH => [
		// 						// 因為ID重複，所以加上Top
		// 						key::ID => self::IDENTIFY . "_" . self::B_TOP . "_" . self::BUTTON_ALL_REFRESH,
		// 					],
		// 				],
		// 				key::STYLES => [
		// 				],
		// 			],				
		// 		],	

		// 		// --------------------------------------------------- 
		// 		// 上方區塊 - 2維嵌套
		// 		// --------------------------------------------------- 
		// 		// 每行有多項Items，樣式如下面那樣，有空再做
		// 		// --------------------------------------------------- 
        //         // "top_2d" => [
		// 		// 	[
		// 		// 		key::TITLE => __('backend.item'),
		// 		// 		key::TYPE => type::B_BLOCK_SEPERATOR,
		// 		// 		key::GROUP => group::SHORT_WRAP,
		// 		// 		key::LINES => [
		// 		// 			[
		// 		// 				key::TITLE => __('backend.item'),
		// 		// 				key::TYPE => type::B_BLOCK_SEPERATOR,
		// 		// 				key::GROUP => group::SHORT_WRAP,
		// 		// 				key::ITEMS => [
		// 		// 					self::BUTTON_ADD => [
		// 		// 						// 因為ID重複，所以加上Top
		// 		// 						key::ID => "index_item_top_" . self::BUTTON_ADD,
		// 		// 					],
		// 		// 					self::BUTTON_SELECTED_DELETE => [
		// 		// 						// 因為ID重複，所以加上Top
		// 		// 						key::ID => "index_item_top_" . self::BUTTON_SELECTED_DELETE,
		// 		// 					],
		// 		// 				],
		// 		// 				key::STYLES => [
		// 		// 				],
		// 		// 			],
		// 		// 		],
		// 		// 		key::STYLES => [
		// 		// 		],
		// 		// 	],
		// 		// ],

		// 		// --------------------------------------------------- 
		// 		// 主要區塊 - 多筆 - table
		// 		// --------------------------------------------------- 
		// 		// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
		// 		// --------------------------------------------------- 
        //         self::B_MAIN => [
		// 			[				
		// 				key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . "all_select",		
		// 				key::TITLE => __('backend.selected'),
		// 				key::TYPE => type::CHECKBOX_SELECTED,
		// 				key::ITEMS => [
		// 					self::CHECKBOX_SELECTED => [
								
		// 					],
		// 				],
		// 				key::STYLES => [
		// 					"width" => "45px",
		// 				],
		// 			],
		// 			[
		// 				key::TITLE => __('backend.account'),
		// 				key::TYPE => type::LABEL,
		// 				key::GROUP => group::INPUT_GROUP,
		// 				key::ITEMS => [
		// 					self::ACCOUNT => [					// 帳號不可以改
		// 						key::TITLE => __('backend.account'),
		// 						key::TYPE => type::TEXT,
		// 					],
		// 					self::BUTTON_PREPEND_DETAIL => [
		// 						// key::TITLE => __('backend.detail'),
		// 						key::TYPE => type::BUTTON_ICON,
		// 						key::CLASSES_1 => [
		// 							"btn-secondary input-group-text" => true,
		// 						],
		// 						key::CLASSES_2 => [
		// 							"fab fa-elementor" => true,
		// 						],
		// 						key::STYLES => [
		// 							// 這設定label的style沒有錯
		// 							"font-size" => "1.5em", 
		// 							"color" => "Tomato",
		// 						],
		// 					],
		// 					self::PANEL_DETAIL => [
		// 						key::TITLE => __('backend.detail'),
		// 						key::TYPE => type::PANEL,
		// 						key::ITEMS => [],
		// 						key::USE_ => use_::B_BLOCK,
		// 						key::CONTENT => [
		// 							// 因為前端沒很複雜，這裡簡單寫
		// 							self::B_PANEL_DETAIL
		// 						],
		// 					],
		// 				],
		// 				key::STYLES => [
		// 					"width" => "200px",
		// 				],
		// 			],
		// 			[
		// 				key::TITLE => __('backend.email'),
		// 				key::TYPE => type::LABEL,
		// 				key::ITEMS => [
		// 					self::EMAIL => [
		// 						key::TYPE => type::TEXT,
		// 						key::VALIDATE => validate::EMAIL,										
		// 					],
		// 				],
		// 				key::STYLES => [
		// 					"width" => "250px",
		// 				],
		// 			],
		// 			[
		// 				key::TITLE => __('backend.gender'),
		// 				key::TYPE => type::LABEL,
		// 				key::GROUP => group::INPUT_GROUP,
		// 				key::ITEMS => [
		// 					self::GENDER => [
		// 						 key::TYPE => type::LABEL_BY_OPTION_VALUE,
		// 						// key::TYPE => type::RADIOBOX,
		// 						key::OPTIONS => array_merge_recursive($this->Settings_Options[self::GENDER], [
		// 							"female" => [
		// 								key::ID => self::IDENTIFY . "_" . self::GENDER . "_" . "female",
		// 							],
		// 							"male" => [
		// 								key::ID => self::IDENTIFY . "_" . self::GENDER . "_" . "male",
		// 							],
									
		// 						]),
		// 						key::STYLES => [
		// 							"width" => "45px",
		// 						],
		// 					],
		// 				],
		// 				key::STYLES => [
		// 					"width" => "45px",
		// 					// "width" => "180px",
		// 				],
		// 			],
		// 			[
		// 				key::TITLE => __('backend.operator'),
		// 				key::TYPE => type::LABEL,
		// 				key::GROUP => group::INPUT_GROUP,
		// 				key::ITEMS => [
		// 					self::BUTTON_DELETE => [								
		// 						key::STYLES => [
		// 							"font-size" => "1em", 
		// 							"color" => "Tomato",
		// 							"width" => "45px",
		// 						],
		// 					],
		// 					self::BUTTON_EDIT => [
		// 						key::STYLES => [
		// 							"font-size" => "1em", 
		// 							"color" => "Tomato",
		// 							"width" => "45px",
		// 						],
		// 					],
		// 				],
		// 				key::STYLES => [
		// 					"width" => "92px",
		// 				],
		// 			],
		// 			[
		// 				key::TITLE => __('backend.status'),
		// 				key::TYPE => type::LABEL,
		// 				key::ITEMS => [
		// 					self::STATUS => [
		// 						key::TYPE => type::TEXT,
		// 						key::ACTIONS => [
		// 							action::AUTO_UPDATE => true,
		// 						],	
		// 						key::HINT => [
		// 							key::DIRECTION => direction::TOP,
		// 							key::TITLE => "-1 停用 0 未驗證 1 已驗證",
		// 						],
		// 					],
		// 				],
		// 				key::STYLES => [
		// 					"width" => "45px",
		// 				],
		// 			],					
		// 		],
		// 		// --------------------------------------------------- 
		// 		// 下方區塊 - 一維嵌套
		// 		// --------------------------------------------------- 
		// 		// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
		// 		// --------------------------------------------------- 
        //         self::B_BOTTOM => [
		// 			// 目前只放button，外層只是分隔線...
		// 			[
		// 				// key::TITLE => __('backend.item'),
		// 				key::TYPE => type::B_BLOCK_NORMAL,
		// 				key::GROUP => group::SHORT_WRAP,
		// 				key::ITEMS => [
		// 					self::BUTTON_SELECTED_DELETE => [
		// 						// 因為ID重複，所以加上Top
		// 						key::ID => self::IDENTIFY . "_" . self::B_BOTTOM . "_" . self::BUTTON_SELECTED_DELETE,
		// 					],
		// 					self::BUTTON_ALL_SAVE => [
		// 						// 因為ID重複，所以加上Top
		// 						key::ID => self::IDENTIFY . "_" . self::B_BOTTOM . "_" . self::BUTTON_ALL_SAVE,
		// 					],
		// 				],
		// 				key::STYLES => [
		// 				],
		// 			],			
		// 		],				
		// 		// --------------------------------------------------- 
		// 		// 連結區塊 - 一維嵌套
		// 		// --------------------------------------------------- 
		// 		// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
		// 		// --------------------------------------------------- 
        //         self::B_LINK => [
		// 			// 目前只有link，也沒有模組化，因此暫時沒用到
		// 		],
				

		// 		// --------------------------------------------------- 
		// 		// --------------------------------------------------- 
		// 		// 面板區
		// 		// --------------------------------------------------- 	
		// 		// --------------------------------------------------- 

		// 		// --------------------------------------------------- 
		// 		// 新增面板 - 單一
		// 		// --------------------------------------------------- 
		// 		// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
		// 		// --------------------------------------------------- 
        //         self::B_PANEL_ADD => [
		// 			[
		// 				key::TITLE => __('backend.account'),
		// 				key::TYPE => type::LABEL,
		// 				key::GROUP => group::FORM_GROUP_ROW,
		// 				key::ITEMS => [
		// 					self::ACCOUNT => [					// 帳號不可以改
		// 						key::ID => self::IDENTIFY . "_" . self::B_PANEL_ADD . "_" . self::ACCOUNT,
		// 						key::DB_FIELD => [
		// 							key::IS_FIELD => true,
		// 						],
		// 						key::TITLE => __('backend.account'),
		// 						key::TYPE => type::TEXT_EXIST_CHECK,
		// 						key::CLASSES => [
		// 							class_::DISABLED => false,
		// 						], 
		// 						key::CLASSES_1 => [
		// 							class_::REQUIRED => true,
		// 						], 
		// 					],
		// 				],
		// 				key::STYLES => [
		// 				],
		// 			],
		// 			[
		// 				key::TITLE => __('backend.password_new'),
		// 				key::TYPE => type::LABEL,
		// 				key::GROUP => group::FORM_GROUP_ROW,
		// 				key::ITEMS => [
		// 					self::PASSWORD_NEW => [
		// 						key::ID => self::IDENTIFY . "_" . self::B_PANEL_ADD . "_" . self::PASSWORD,
		// 						key::DB_FIELD => [
		// 							// key::IS_FIELD => true,
		// 						],
		// 						key::TITLE => __('backend.password_new'),
		// 						key::TYPE => type::PASSWORD,
		// 					],
		// 				],
		// 				key::STYLES => [
		// 				],
		// 			],
		// 			[
		// 				key::TITLE => __('backend.password_confirm'),
		// 				key::TYPE => type::LABEL,
		// 				key::GROUP => group::FORM_GROUP_ROW,
		// 				key::ITEMS => [
		// 					self::PASSWORD_CONFIRM => [
		// 						key::ID => self::IDENTIFY . "_" . self::B_PANEL_ADD . "_" . self::PASSWORD_CONFIRM,
		// 						key::TITLE => __('backend.password_confirm'),
		// 						key::TYPE => type::PASSWORD,
		// 					],
		// 				],
		// 				key::STYLES => [
		// 				],
		// 			],
		// 			[
		// 				key::TITLE => __('backend.email'),
		// 				key::TYPE => type::LABEL,
		// 				key::GROUP => group::FORM_GROUP_ROW,
		// 				key::ITEMS => [
		// 					self::EMAIL => [
		// 						key::ID => self::IDENTIFY . "_" . self::B_PANEL_ADD . "_" . self::EMAIL,
		// 						key::DB_FIELD => [
		// 							key::IS_FIELD => true,
		// 						],
		// 						key::TITLE => __('backend.email'),
		// 						key::TYPE => type::TEXT,
		// 						key::VALIDATE => validate::EMAIL,				
		// 					],
		// 				],
		// 				key::STYLES => [
		// 				],
		// 			],
		// 			[
		// 				key::TITLE => __('backend.gender'),
		// 				key::TYPE => type::LABEL,
		// 				key::GROUP => group::FORM_GROUP_ROW,
		// 				key::ITEMS => [
		// 					self::GENDER => [
		// 						key::ID => self::IDENTIFY . "_" . self::B_PANEL_ADD . "_" . self::GENDER,
		// 						key::DB_FIELD => [
		// 							key::IS_FIELD => true,
		// 						],
		// 						key::TITLE => __('backend.gender'),
		// 						key::TYPE => type::RADIOBOX,
		// 						key::STYLES_1 => [
		// 							"height" => "40px"
		// 						],								
		// 						key::OPTIONS => array_merge_recursive($this->Settings_Options[self::GENDER], [
		// 							"female" => [
		// 								key::ID => self::IDENTIFY . "_" . self::B_PANEL_ADD . "_" . self::GENDER . "_" . "female",
		// 							],
		// 							"male" => [
		// 								key::ID => self::IDENTIFY . "_" . self::B_PANEL_ADD . "_" . self::GENDER . "_" . "male",
		// 							],
									
		// 						]),
		// 					],
		// 				],
		// 				key::STYLES => [
		// 				],
		// 			],
		// 			[
		// 				key::TITLE => __('backend.status'),
		// 				key::TYPE => type::LABEL,
		// 				key::GROUP => group::FORM_GROUP_ROW,
		// 				key::ITEMS => [
		// 					self::STATUS => [
		// 						key::ID => self::IDENTIFY . "_" . self::B_PANEL_ADD . "_" . self::STATUS,
		// 						key::DB_FIELD => [
		// 							key::IS_FIELD => true,
		// 						],
		// 						key::TITLE => __('backend.status'),
		// 						key::TYPE => type::TEXT,
		// 						key::ACTIONS => [
		// 							action::AUTO_UPDATE => true,
		// 						],	
		// 					],
		// 				],
		// 				key::STYLES => [
		// 				],
		// 			],
		// 			[
		// 				// key::TITLE => __('backend.item'),
		// 				key::TYPE => type::B_BLOCK_SHORT_WRAP,
		// 				key::GROUP => group::FORM_GROUP_ROW,
		// 				key::ITEMS => [
		// 					self::PANEL_ADD_BUTTON_ADD => [
		// 						// 因為ID重複，所以加上Top
		// 						key::ID => self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_ADD,
		// 					],
		// 					self::PANEL_ADD_BUTTON_CANCEL => [
		// 						// 因為ID重複，所以加上Top
		// 						key::ID => self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_CANCEL,
		// 					],
		// 				],
		// 				key::STYLES => [
		// 				],
		// 			],				
		// 		],
        //         // --------------------------------------------------- 
		// 		// 細節面板 - 多筆 - table附加面板
		// 		// --------------------------------------------------- 
		// 		// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
		// 		// --------------------------------------------------- 
        //         self::B_PANEL_DETAIL => [
		// 			// 不一定應該在這邊提供更改密碼，這裡是為了打架構測試所以才加的
		// 			[
		// 				key::TITLE => __('backend.password_new'),
		// 				key::TYPE => type::LABEL,
		// 				key::GROUP => group::FORM_GROUP_ROW,
		// 				key::ITEMS => [
		// 					self::PASSWORD_NEW => [
		// 						key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::PASSWORD_NEW,
		// 					],
		// 				],
		// 				key::STYLES => [
		// 				],
		// 			],
		// 			[
		// 				key::TITLE => __('backend.password_new_confirm'),
		// 				key::TYPE => type::LABEL,
		// 				key::GROUP => group::FORM_GROUP_ROW,
		// 				key::ITEMS => [
		// 					self::PASSWORD_CONFIRM => [
		// 						key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::PASSWORD_NEW_CONFIRM,
		// 					],
		// 				],
		// 				key::STYLES => [
		// 				],
		// 			],
		// 			[
		// 				//key::TITLE => __('backend.change_password'),
		// 				key::TYPE => type::B_BLOCK_SHORT_WRAP,
		// 				// key::TYPE => type::LABEL,
		// 				key::GROUP => group::FORM_GROUP_ROW,
		// 				key::ITEMS => [
		// 					self::PANEL_DETAIL_BUTTON_CHANGE_PASSWORD => [
		// 						// 因為ID重複，所以加上Top
		// 						key::TITLE => __('backend.change_password'),
		// 						key::ID => self::IDENTIFY . "_" . self::PANEL_DETAIL_BUTTON_CHANGE_PASSWORD,
		// 					],
		// 				],
		// 				key::STYLES => [
		// 				],
		// 			],	
		// 			//
		// 			[
		// 				key::TITLE => __('backend.gender'),
		// 				key::TYPE => type::LABEL,
		// 				key::GROUP => group::FORM_GROUP_ROW,
		// 				key::ITEMS => [
		// 					self::GENDER => [
		// 						key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::GENDER,
		// 						key::TYPE => type::RADIOBOX,
		// 						key::STYLES_1 => [
		// 							"height" => "40px",
		// 							"line-height" => "50px",
		// 						],
								
		// 						key::OPTIONS => array_merge_recursive($this->Settings_Options[self::GENDER], [
		// 							"female" => [
		// 								key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::GENDER . "_" . "female",
		// 								key::STYLES_1 => "height:40px;",
		// 							],
		// 							"male" => [
		// 								key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::GENDER . "_" . "male",
		// 								key::STYLES_1 => "height:40px;",
		// 							],
									
		// 						]),
		// 					],
		// 				],
		// 				key::STYLES => [
		// 				],
		// 			],
		// 			[
		// 				key::TITLE => __('backend.created_at'),
		// 				key::TYPE => type::LABEL,
		// 				key::GROUP => group::FORM_GROUP_ROW,
		// 				key::ITEMS => [
		// 					self::CREATED_AT => [
		// 						key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::CREATED_AT,
		// 					],
		// 				],
		// 				key::STYLES => [
		// 				],
		// 			],
		// 			[
		// 				key::TITLE => __('backend.updated_at'),
		// 				key::TYPE => type::LABEL,
		// 				key::GROUP => group::FORM_GROUP_ROW,
		// 				key::ITEMS => [
		// 					self::UPDATED_AT => [
		// 						key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::UPDATED_AT,
		// 					],
		// 				],
		// 				key::STYLES => [
		// 				],
		// 			],
		// 		],
		// 	],
        // ];
	}

	/*
	preview - 預覽葉
	因為未來要移植php hahaha framework，所以不放在config
	*/
	public function Settings_Preview(&$settings_preview)
	{
		// // 因為同一個節點，所以所有資料表共用一個router
		// $settings_preview = [
			
		// ];

	}

	/*
	edit - 編輯頁
	*/
	public function Settings_Edit(&$settings_edit)
	{
	// 	// 因為同一個節點，這是共用設定
	// 	$settings_edit = [
	// 		// --------------------------------------------------- 
	// 		// hahaha的版本的設定集，寫死，避免要處理很細
	// 		// --------------------------------------------------- 			
	// 		// --------------------------------------------------- 
	// 		self::HAHAHA => [		
	// 			// --------------------------------------------------- 
	// 			// --------------------------------------------------- 
	// 			// 主要畫面區
	// 			// --------------------------------------------------- 	
	// 			// --------------------------------------------------- 
	// 			// 這裡不做太複雜，如果前端需要搬移設計
	// 			// 基本上如我前台首頁做法(page & item)
	// 			// 如要多層嵌套，基本上只要牽扯到動態資料，模組最多2~3個維度，也就是2層 + 彈出面板
	// 			// 不會有動態資料需要多層嵌套(這不是視窗程式，視窗程式也不會多層動態，那改起來太累了，一定是固定架構)
	// 			// 靜態資料，則可以拆分模組，多個模組整在一起會很難維護，原則上很多零散模組，則分開管理，避免太亂
	// 			// --------------------------------------------------- 
								
	// 			// --------------------------------------------------- 
	// 			// 上方區塊 - 一維嵌套
	// 			// --------------------------------------------------- 
	// 			// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
	// 			// --------------------------------------------------- 
            
	// 			// --------------------------------------------------- 
	// 			// 上方區塊 - 2維嵌套
	// 			// --------------------------------------------------- 
	// 			// 每行有多項Items，樣式如下面那樣，有空再做
	// 			// --------------------------------------------------- 
           
	// 			// --------------------------------------------------- 
	// 			// 主要區塊 - 多筆 - table
	// 			// --------------------------------------------------- 
	// 			// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
	// 			// --------------------------------------------------- 
    //             self::B_MAIN => [
	// 				[
	// 					key::TITLE => __('backend.account'),
	// 					key::TYPE => type::LABEL,
	// 					key::GROUP => group::FORM_GROUP_ROW,
	// 					key::ITEMS => [
	// 						self::ACCOUNT => [					// 帳號不可以改
	// 							key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::ACCOUNT,
	// 							key::DB_FIELD => [
	// 								key::IS_FIELD => true,
	// 							],
	// 							key::TITLE => __('backend.account'),
	// 							key::TYPE => type::TEXT_EXIST_CHECK,
	// 							key::CLASSES => [
	// 								class_::DISABLED => false,
	// 							], 
	// 							key::CLASSES_1 => [
	// 								class_::REQUIRED => true,
	// 							], 
	// 						],
	// 					],
	// 					key::STYLES => [
	// 					],
	// 				],
	// 				[
	// 					key::TITLE => __('backend.password_new'),
	// 					key::TYPE => type::LABEL,
	// 					key::GROUP => group::FORM_GROUP_ROW,
	// 					key::ITEMS => [
	// 						self::PASSWORD_NEW => [
	// 							key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::PASSWORD,
	// 							key::DB_FIELD => [
	// 								key::IS_FIELD => true,
	// 							],
	// 							key::TITLE => __('backend.password_new'),
	// 							key::TYPE => type::PASSWORD,
	// 						],
	// 					],
	// 					key::STYLES => [
	// 					],
	// 				],
	// 				[
	// 					key::TITLE => __('backend.password_confirm'),
	// 					key::TYPE => type::LABEL,
	// 					key::GROUP => group::FORM_GROUP_ROW,
	// 					key::ITEMS => [
	// 						self::PASSWORD_CONFIRM => [
	// 							key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::PASSWORD_CONFIRM,
	// 							key::TITLE => __('backend.password_confirm'),
	// 							key::TYPE => type::PASSWORD,
	// 						],
	// 					],
	// 					key::STYLES => [
	// 					],
	// 				],
	// 				[
	// 					key::TITLE => __('backend.email'),
	// 					key::TYPE => type::LABEL,
	// 					key::GROUP => group::FORM_GROUP_ROW,
	// 					key::ITEMS => [
	// 						self::EMAIL => [
	// 							key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::EMAIL,
	// 							key::DB_FIELD => [
	// 								key::IS_FIELD => true,
	// 							],
	// 							key::TITLE => __('backend.email'),
	// 							key::TYPE => type::TEXT,
	// 							key::VALIDATE => validate::EMAIL,				
	// 						],
	// 					],
	// 					key::STYLES => [
	// 					],
	// 				],
	// 				[
	// 					key::TITLE => __('backend.gender'),
	// 					key::TYPE => type::LABEL,
	// 					key::GROUP => group::FORM_GROUP_ROW,
	// 					key::ITEMS => [
	// 						self::GENDER => [
	// 							key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::GENDER,
	// 							key::DB_FIELD => [
	// 								key::IS_FIELD => true,
	// 							],
	// 							key::TITLE => __('backend.gender'),
	// 							key::TYPE => type::RADIOBOX,
	// 							key::STYLES_1 => [
	// 								"height" => "40px"
	// 							],								
	// 							key::OPTIONS => array_merge_recursive($this->Settings_Options[self::GENDER], [
	// 								"female" => [
	// 									key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::GENDER . "_" . "female",
	// 								],
	// 								"male" => [
	// 									key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::GENDER . "_" . "male",
	// 								],
									
	// 							]),
	// 						],
	// 					],
	// 					key::STYLES => [
	// 					],
	// 				],
	// 				[
	// 					key::TITLE => __('backend.status'),
	// 					key::TYPE => type::LABEL,
	// 					key::GROUP => group::FORM_GROUP_ROW,
	// 					key::ITEMS => [
	// 						self::STATUS => [
	// 							key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::STATUS,
	// 							key::DB_FIELD => [
	// 								key::IS_FIELD => true,
	// 							],
	// 							key::TITLE => __('backend.status'),
	// 							key::TYPE => type::TEXT,
	// 							key::ACTIONS => [
	// 								action::AUTO_UPDATE => true,
	// 							],	
	// 						],
	// 					],
	// 					key::STYLES => [
	// 					],
	// 				],
	// 				[
	// 					key::TITLE => __('backend.created_at'),
	// 					key::TYPE => type::LABEL,
	// 					key::GROUP => group::FORM_GROUP_ROW,
	// 					key::ITEMS => [
	// 						self::CREATED_AT => [
	// 							key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::CREATED_AT,
	// 						],
	// 					],
	// 					key::STYLES => [
	// 					],
	// 				],
	// 				[
	// 					key::TITLE => __('backend.updated_at'),
	// 					key::TYPE => type::LABEL,
	// 					key::GROUP => group::FORM_GROUP_ROW,
	// 					key::ITEMS => [
	// 						self::UPDATED_AT => [
	// 							key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::UPDATED_AT,
	// 						],
	// 					],
	// 					key::STYLES => [
	// 					],
	// 				],
	// 				[
	// 					// key::TITLE => __('backend.item'),
	// 					key::TYPE => type::B_BLOCK_SHORT_WRAP,
	// 					key::GROUP => group::FORM_GROUP_ROW,
	// 					key::ITEMS => [
	// 						self::PANEL_ADD_BUTTON_ADD => [
	// 							// 因為ID重複，所以加上Top
	// 							key::ID => self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_ADD,
	// 						],
	// 						self::PANEL_ADD_BUTTON_CANCEL => [
	// 							// 因為ID重複，所以加上Top
	// 							key::ID => self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_CANCEL,
	// 						],
	// 					],
	// 					key::STYLES => [
	// 					],
	// 				],					
	// 			],
	// 			// --------------------------------------------------- 
	// 			// 下方區塊 - 一維嵌套
	// 			// --------------------------------------------------- 
	// 			// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
	// 			// --------------------------------------------------- 
              			
	// 			// --------------------------------------------------- 
	// 			// 連結區塊 - 一維嵌套
	// 			// --------------------------------------------------- 
	// 			// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
	// 			// --------------------------------------------------- 
              
	// 			// --------------------------------------------------- 
	// 			// --------------------------------------------------- 
	// 			// 面板區
	// 			// --------------------------------------------------- 	
	// 			// --------------------------------------------------- 

			
	// 		],
    //     ];
	}

}
