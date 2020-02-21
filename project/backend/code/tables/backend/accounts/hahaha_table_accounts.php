<?php

namespace hahaha\backend;

use hahahasublib\hahaha_instance_trait;
use hahaha\hahaha_table_trait;

use hahaha\define\hahaha_define_table_action as action;
use hahaha\define\hahaha_define_table_group as group;
use hahaha\define\hahaha_define_table_key as key;
use hahaha\define\hahaha_define_table_class as class_;
use hahaha\define\hahaha_define_table_direction as direction;
use hahaha\define\hahaha_define_table_type as type;
use hahaha\define\hahaha_define_table_validate as validate;

use EntityManager;

/*
首頁自定義欄位

因為套版用，設定會是死的，所以直接用array描述，不需要另外從資料庫撈，存在快取

如果有完整一套組合，請繼承出去修改，hahaha提供的格式，請勿直接亂改
基本上完全相異的做法，開一個新專案是比較好的選擇，避免composer要取聯集，載入太多東西
*/
class hahaha_table_accounts
{	
	use hahaha_instance_trait;
	use hahaha_table_trait;
	
	// 寫成標籤，避免要檢查字串
	// const 必須對應DB field，如怕不安全，則在array裡加key::DB_Field => [key::Field => true, key::Name => "id"]，以便自動產生query
	// 沒設用key name，有設用field
	// 可以用這個取得entity name的field name
	// $em->getClassMetadata('Entities\MyEntity')->getColumnNames()
	// $em->getClassMetadata('Entities\MyEntity')->getColumnName('id');
	const ID = "id";
	const ACCOUNT = "account";
	const PASSWORD = "password";
	const PASSWORD_CONFIRM = "password_confirm";	// 驗證密碼欄位
	const PASSWORD_NEW = "password_new";	// 驗證密碼欄位
	const PASSWORD_NEW_CONFIRM = "password_new_confirm";	// 驗證密碼欄位
	const EMAIL = "email";	
	const GENDER = "gender";	
	const STATUS = "status";	
	const CREATED_AT = "created_at";
	const UPDATED_AT = "updated_at";
	//
	const CHECKBOX_SELECTED = "checkbox_selected";
	const PANEL_DETAIL = "panel_detail";
	const BUTTON_DELETE = "button_delete";
	const BUTTON_EDIT = "button_edit";
	//
	const BUTTON_ADD = "button_add";
	const BUTTON_SELECTED_DELETE = "button_selected_delete";
	const BUTTON_ALL_SAVE = "button_all_save";
	const BUTTON_ALL_REFRESH = "button_all_refresh";

	
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
		// 初始化設定檔
		$this->Settings($this->Settings);
		$this->Settings_DB_Fields_Addition($this->Settings_DB_Fields_Addition);
		$this->Settings_Fields($this->Settings_Fields);
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
		$settings = [
			"default" => [
                // 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
                "index" => "hahaha",
                "preview" => "hahaha",
                "edit" => "hahaha",
			],
        ];
        
	}

	/*
	fields - DB table additional fields
	因為未來要移植php hahaha framework，所以不放在config
	*/
	public function Settings_DB_Fields_Addition(&$settings_db_fields_addition)
	{
		// 因為同一個節點，這是共用設定
		$settings_db_fields_addition = [
			self::ID => [
				key::DB_FIELD => [
					key::IS_FIELD => true,
					// key::NAME => self::ID,
				],				
			],			
        ];
        
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
		$settings_fields = [
			self::ID => [
				key::ID => "index_item_" . self::ID,
				key::DB_FIELD => [
					key::IS_FIELD => true,
					// key::NAME => self::ID,
				],
				key::TITLE => __('backend.id'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
			],
			self::ACCOUNT => [					// 帳號不可以改
				key::ID => "index_item_" . self::ACCOUNT,
				key::DB_FIELD => [
					key::IS_FIELD => true,
				],
				key::TITLE => __('backend.account'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
			],
			self::PASSWORD => [
				key::ID => "index_item_" . self::PASSWORD,
				key::DB_FIELD => [
					key::IS_FIELD => true,
				],
				key::TITLE => __('backend.password'),
				key::TYPE => type::PASSWORD,
			],
			self::PASSWORD_CONFIRM => [
				key::ID => "index_item_" . self::PASSWORD_CONFIRM,
				key::TITLE => __('backend.password_confirm'),
				key::TYPE => type::PASSWORD,
			],
			self::PASSWORD_NEW => [
				key::ID => "index_item_" . self::PASSWORD_NEW,
				key::TITLE => __('backend.password_new'),
				key::TYPE => type::PASSWORD,
			],
			self::PASSWORD_NEW_CONFIRM => [
				key::ID => "index_item_" . self::PASSWORD_NEW_CONFIRM,
				key::TITLE => __('backend.password_new_confirm'),
				key::TYPE => type::PASSWORD,
			],
			self::EMAIL => [
				key::ID => "index_item_" . self::EMAIL,
				key::DB_FIELD => [
					key::IS_FIELD => true,
				],
				key::TITLE => __('backend.email'),
				key::TYPE => type::TEXT,
				key::VALIDATE => validate::EMAIL,				
			],
			self::GENDER => [
				key::ID => "index_item_" . self::GENDER,
				key::DB_FIELD => [
					key::IS_FIELD => true,
				],
				key::TITLE => __('backend.gender'),
				key::TYPE => type::REDIOBOX,
			],
			self::STATUS => [
				key::ID => "index_item_" . self::STATUS,
				key::DB_FIELD => [
					key::IS_FIELD => true,
				],
				key::TITLE => __('backend.status'),
				key::TYPE => type::TEXT,
				key::ACTIONS => [
					action::AUTO_UPDATE => true,
				],	
			],
			self::CREATED_AT => [
				key::ID => "index_item_" . self::CREATED_AT,
				key::DB_FIELD => [
					key::IS_FIELD => true,
				],
				key::TITLE => __('backend.created_at'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
			],
			self::UPDATED_AT => [
				key::ID => "index_item_" . self::UPDATED_AT,
				key::DB_FIELD => [
					key::IS_FIELD => true,
				],
				key::TITLE => __('backend.updated_at'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
			],
			//
			self::CHECKBOX_SELECTED => [
				key::ID => "index_item_" . self::CHECKBOX_SELECTED,
				key::TITLE => __('backend.selected'),
				key::TYPE => type::CHECKBOX_SELECTED,
			],
			self::PANEL_DETAIL => [
				key::ID => "index_item_" . self::PANEL_DETAIL,
				key::TITLE => __('backend.detail'),
				key::TYPE => type::PANEL,
			],
			self::BUTTON_DELETE => [
				key::ID => "index_item_" . self::BUTTON_DELETE,
				// 不顯示字
				//key::TITLE => __('backend.delete'),
				key::TYPE => type::BUTTON_ICON,
				key::CLASSES_1 => [
					"btn btn-dark",
				],
				key::CLASSES_2 => [
					"fas fa-minus",
				],
				key::STYLES => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
			],
			self::BUTTON_EDIT => [
				key::ID => "index_item_" . self::BUTTON_EDIT,
				// 不顯示字
				// key::TITLE => __('backend.edit'),
				key::TYPE => type::BUTTON_ICON,
				key::CLASSES_1 => [
					"btn btn-dark",
				],
				key::CLASSES_2 => [
					"fas fa-edit",
				],
				key::STYLES => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
			],
			//
			self::BUTTON_ADD => [
				key::ID => "index_item_" . self::BUTTON_ADD,
				key::TITLE => __('backend.new'),
				key::TYPE => type::BUTTON_ICON,
				// class
				key::CLASSES => [
					"index_item_" . self::BUTTON_ADD,
				],
				key::CLASSES_1 => [
					"btn btn-dark",
				],
				key::CLASSES_2 => [
					"fas fa-plus",
				],
				// class
				key::STYLES => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
			],
			self::BUTTON_SELECTED_DELETE => [
				key::ID => "index_item_" . self::BUTTON_SELECTED_DELETE,
				key::TITLE => __('backend.selected_delete'),
				key::TYPE => type::BUTTON_ICON,
				key::CLASSES => [
					"index_item_" . self::BUTTON_SELECTED_DELETE,
				],
				key::CLASSES_1 => [
					"btn btn-dark",
				],
				key::CLASSES_2 => [
					"fas fa-minus",
				],
				key::STYLES => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
			],
			self::BUTTON_ALL_SAVE => [
				key::ID => "index_item_" . self::BUTTON_ALL_SAVE,
				key::TITLE => __('backend.all_save'),
				key::TYPE => type::BUTTON_ICON,
				key::CLASSES => [
					"index_item_" . self::BUTTON_ALL_REFRESH,
				],
				key::CLASSES_1 => [
					"btn btn-dark",
				],
				key::CLASSES_2 => [
					"fas fa-save",
				],
				key::STYLES => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
			],
			self::BUTTON_ALL_REFRESH => [
				key::ID => "index_item_" . self::BUTTON_ALL_REFRESH,
				key::TITLE => __('backend.all_refresh'),
				key::TYPE => type::BUTTON_ICON,
				key::CLASSES => [
					"index_item_" . self::BUTTON_ALL_REFRESH,
				],
				key::CLASSES_1 => [
					"btn btn-dark",
				],
				key::CLASSES_2 => [
					"fas fa-refresh",
				],
				key::STYLES => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
			],
        ];
        
    }
    
    /*
	index - 首頁
	因為未來要移植php hahaha framework，所以不放在config

	注意 : 格式要統一
	*/
	public function Settings_Index(&$settings_index)
	{
		// 因為同一個節點，這是共用設定
		$settings_index = [
			// --------------------------------------------------- 
			// hahaha的版本的設定集，寫死，避免要處理很細
			// --------------------------------------------------- 			
			// --------------------------------------------------- 
			"hahaha" => [		
				// --------------------------------------------------- 
				// --------------------------------------------------- 
				// 主要畫面區
				// --------------------------------------------------- 	
				// --------------------------------------------------- 
				// 這裡不做太複雜，如果前端需要搬移設計
				// 基本上如我前台首頁做法(page & item)
				// 如要多層嵌套，基本上只要牽扯到動態資料，模組最多2~3個維度，也就是2層 + 彈出面板
				// 不會有動態資料需要多層嵌套(這不是視窗程式，視窗程式也不會多層動態，那改起來太累了，一定是固定架構)
				// 靜態資料，則可以拆分模組，多個模組整在一起會很難維護，原則上很多零散模組，則分開管理，避免太亂
				// --------------------------------------------------- 
								
				// --------------------------------------------------- 
				// 上方區塊 - 一維嵌套
				// --------------------------------------------------- 
				// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				// --------------------------------------------------- 
                "top" => [
					// 目前只放button，外層只是分隔線...
					[
						// key::TITLE => __('backend.item'),
						key::TYPE => type::B_BLOCK_NORMAL,
						key::GROUP => group::SHORT_WRAP,
						key::ITEMS => [
							self::BUTTON_ADD => [
								// 因為ID重複，所以加上Top
								key::ID => "index_item_top_" . self::BUTTON_ADD,
							],
							self::BUTTON_SELECTED_DELETE => [
								// 因為ID重複，所以加上Top
								key::ID => "index_item_top_" . self::BUTTON_SELECTED_DELETE,
							],
							self::BUTTON_ALL_SAVE => [
								// 因為ID重複，所以加上Top
								key::ID => "index_item_top_" . self::BUTTON_ALL_SAVE,
							],
							self::BUTTON_ALL_REFRESH => [
								// 因為ID重複，所以加上Top
								key::ID => "index_item_top_" . self::BUTTON_ALL_REFRESH,
							],
						],
						key::STYLES => [
						],
					],				
				],	

				// --------------------------------------------------- 
				// 上方區塊 - 2維嵌套
				// --------------------------------------------------- 
				// 每行有多項Items，樣式如下面那樣，有空再做
				// --------------------------------------------------- 
                // "top_2d" => [
				// 	[
				// 		key::TITLE => __('backend.item'),
				// 		key::TYPE => type::B_BLOCK_SEPERATOR,
				// 		key::GROUP => group::SHORT_WRAP,
				// 		key::LINES => [
				// 			[
				// 				key::TITLE => __('backend.item'),
				// 				key::TYPE => type::B_BLOCK_SEPERATOR,
				// 				key::GROUP => group::SHORT_WRAP,
				// 				key::ITEMS => [
				// 					self::BUTTON_ADD => [
				// 						// 因為ID重複，所以加上Top
				// 						key::ID => "index_item_top_" . self::BUTTON_ADD,
				// 					],
				// 					self::BUTTON_SELECTED_DELETE => [
				// 						// 因為ID重複，所以加上Top
				// 						key::ID => "index_item_top_" . self::BUTTON_SELECTED_DELETE,
				// 					],
				// 				],
				// 				key::STYLES => [
				// 				],
				// 			],
				// 		],
				// 		key::STYLES => [
				// 		],
				// 	],
				// ],

				// --------------------------------------------------- 
				// 主要區塊
				// --------------------------------------------------- 
				// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				// --------------------------------------------------- 
                "main" => [
					[				
						key::ID => "index_item_all_select",		
						key::TITLE => __('backend.selected'),
						key::TYPE => type::CHECKBOX_SELECTED,
						key::ITEMS => [
							self::CHECKBOX_SELECTED => [
								
							],
						],
						key::STYLES => [
							"width" => "45px",
						],
					],
					[
						key::TITLE => __('backend.account'),
						key::TYPE => type::LABEL,
						key::GROUP => group::INPUT_GROUP,
						key::ITEMS => [
							self::ACCOUNT => [					// 帳號不可以改
								key::TITLE => __('backend.account'),
								key::TYPE => type::TEXT,
							],
							self::PANEL_DETAIL => [
								key::TITLE => __('backend.detail'),
								key::TYPE => type::PANEL,
								key::CLASSES => [
									"index_item_prepend_" . self::ACCOUNT,
								],
								key::STYLES => [
									// 這設定label的style沒有錯
									"font-size" => "1.5em", 
									"color" => "Tomato",
								],
								// 如有要子屬性，則新增，key::Nodes，裡面遞迴，不一定要按照HTML方式建立結構，因為，不一定每個地方都要設參數

							],
						],
						key::STYLES => [
							"width" => "200px",
						],
					],
					[
						key::TITLE => __('backend.email'),
						key::TYPE => type::LABEL,
						key::ITEMS => [
							self::EMAIL => [
								key::TYPE => type::TEXT,
								key::VALIDATE => validate::EMAIL,										
							],
						],
						key::STYLES => [
							"width" => "250px",
						],
					],
					[
						key::TITLE => __('backend.gender'),
						key::TYPE => type::LABEL,
						key::GROUP => group::INPUT_GROUP,
						key::ITEMS => [
							self::GENDER => [
								key::TYPE => type::LABEL,
								key::STYLES => [
									"width" => "45px",
								],
							],
						],
						key::STYLES => [
							"width" => "45px",
						],
					],
					[
						key::TITLE => __('backend.operator'),
						key::TYPE => type::LABEL,
						key::GROUP => group::INPUT_GROUP,
						key::ITEMS => [
							self::BUTTON_DELETE => [								
								key::STYLES => [
									"font-size" => "1em", 
									"color" => "Tomato",
									"width" => "45px",
								],
							],
							self::BUTTON_EDIT => [
								key::STYLES => [
									"font-size" => "1em", 
									"color" => "Tomato",
									"width" => "45px",
								],
							],
						],
						key::STYLES => [
							"width" => "92px",
						],
					],
					[
						key::TITLE => __('backend.status'),
						key::TYPE => type::LABEL,
						key::ITEMS => [
							self::STATUS => [
								key::TYPE => type::TEXT,
								key::ACTIONS => [
									action::AUTO_UPDATE => true,
								],	
								key::HINT => [
									key::DIRECTION => direction::TOP,
									key::TITLE => "-1 停用 0 未驗證 1 已驗證",
								],
							],
						],
						key::STYLES => [
							"width" => "45px",
						],
					],					
				],
				// --------------------------------------------------- 
				// 下方區塊 - 一維嵌套
				// --------------------------------------------------- 
				// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				// --------------------------------------------------- 
                "bottom" => [
					// 目前只放button，外層只是分隔線...
					[
						// key::TITLE => __('backend.item'),
						key::TYPE => type::B_BLOCK_NORMAL,
						key::GROUP => group::SHORT_WRAP,
						key::ITEMS => [
							self::BUTTON_SELECTED_DELETE => [
								// 因為ID重複，所以加上Top
								key::ID => "index_item_bottom_" . self::BUTTON_SELECTED_DELETE,
							],
							self::BUTTON_ALL_SAVE => [
								// 因為ID重複，所以加上Top
								key::ID => "index_item_bottom_" . self::BUTTON_ALL_SAVE,
							],
						],
						key::STYLES => [
						],
					],			
				],				
				// --------------------------------------------------- 
				// 連結區塊 - 一維嵌套
				// --------------------------------------------------- 
				// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				// --------------------------------------------------- 
                "link" => [
					// 目前只有link，也沒有模組化，因此暫時沒用到
				],
				

				// --------------------------------------------------- 
				// --------------------------------------------------- 
				// 面板區
				// --------------------------------------------------- 	
				// --------------------------------------------------- 

				// --------------------------------------------------- 
				// 新增面板
				// --------------------------------------------------- 
				// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				// --------------------------------------------------- 
                "add_panel" => [
					[
						key::TITLE => __('backend.account'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::ACCOUNT => [					// 帳號不可以改
								key::ID => "index_item_add_panel_" . self::ACCOUNT,
								key::DB_FIELD => [
									key::IS_FIELD => true,
								],
								key::TITLE => __('backend.account'),
								key::TYPE => type::TEXT,
								key::CLASSES => [
									class_::DISABLED => true,
								],
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.password'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::PASSWORD => [
								key::ID => "index_item_add_panel_" . self::PASSWORD,
								key::DB_FIELD => [
									key::IS_FIELD => true,
								],
								key::TITLE => __('backend.password'),
								key::TYPE => type::PASSWORD,
							],
							self::PASSWORD_CONFIRM => [
								key::ID => "index_item_add_panel_" . self::PASSWORD_CONFIRM,
								key::TITLE => __('backend.password_confirm'),
								key::TYPE => type::PASSWORD,
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.email'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::EMAIL => [
								key::ID => "index_item_add_panel_" . self::EMAIL,
								key::DB_FIELD => [
									key::IS_FIELD => true,
								],
								key::TITLE => __('backend.email'),
								key::TYPE => type::TEXT,
								key::VALIDATE => validate::EMAIL,				
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.email'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::GENDER => [
								key::ID => "index_item_add_panel_" . self::GENDER,
								key::DB_FIELD => [
									key::IS_FIELD => true,
								],
								key::TITLE => __('backend.gender'),
								key::TYPE => type::REDIOBOX,
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.email'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::STATUS => [
								key::ID => "index_item_add_panel_" . self::STATUS,
								key::DB_FIELD => [
									key::IS_FIELD => true,
								],
								key::TITLE => __('backend.status'),
								key::TYPE => type::TEXT,
								key::ACTIONS => [
									action::AUTO_UPDATE => true,
								],	
							],
						],
						key::STYLES => [
						],
					],
				],
                // --------------------------------------------------- 
				// 細節面板
				// --------------------------------------------------- 
				// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				// --------------------------------------------------- 
                "detail_panel" => [
					
				],
				
              
			],
        ];
        
	}

	/*
	preview - 預覽葉
	因為未來要移植php hahaha framework，所以不放在config
	*/
	public function Settings_Preview(&$settings_preview)
	{
		// 因為同一個節點，所以所有資料表共用一個router
		$settings_preview = [
			"hahaha" => [
				self::ID => [
					key::TYPE => type::TEXT,
					key::CLASSES => [
						class_::DISABLED => true,
					],
				],
				self::ACCOUNT => [					// 帳號不可以改
					key::TYPE => type::TEXT,
					key::CLASSES => [
						class_::DISABLED => true,
					],
				],
				self::PASSWORD => [
					key::TYPE => type::PASSWORD,
				],
				self::PASSWORD_CONFIRM => [
					key::TYPE => type::PASSWORD,
				],
				self::PASSWORD_NEW => [
					key::TYPE => type::PASSWORD,
				],
				self::PASSWORD_NEW_CONFIRM => [
					key::TYPE => type::PASSWORD,
				],
				self::EMAIL => [
					key::TYPE => type::TEXT,
					key::VALIDATE => validate::EMAIL,				
				],
				self::GENDER => [
					key::TYPE => type::REDIOBOX,
				],
				self::STATUS => [
					key::TYPE => type::TEXT,
					key::ACTIONS => [
						action::AUTO_UPDATE => true,
					],	
				],
				self::CREATED_AT => [
					key::TYPE => type::TEXT,
					key::CLASSES => [
						class_::DISABLED => true,
					],
				],
				self::UPDATED_AT => [
					key::TYPE => type::TEXT,
					key::CLASSES => [
						class_::DISABLED => true,
					],
				],
			],
		];

	}

	/*
	edit - 編輯頁
	*/
	public function Settings_Edit(&$settings_edit)
	{
		// 因為同一個節點，所以所有資料表共用一個model
		$settings_edit = [
			"hahaha" => [
				self::ID => [
					key::TYPE => type::TEXT,
					key::CLASSES => [
						class_::DISABLED => true,
					],
				],
				self::ACCOUNT => [					// 帳號不可以改
					key::TYPE => type::TEXT,
					key::CLASSES => [
						class_::DISABLED => true,
					],
				],
				self::PASSWORD => [
					key::TYPE => type::PASSWORD,
				],
				self::PASSWORD_CONFIRM => [
					key::TYPE => type::PASSWORD,
				],
				self::PASSWORD_NEW => [
					key::TYPE => type::PASSWORD,
				],
				self::PASSWORD_NEW_CONFIRM => [
					key::TYPE => type::PASSWORD,
				],
				self::EMAIL => [
					key::TYPE => type::TEXT,
					key::VALIDATE => validate::EMAIL,				
				],
				self::GENDER => [
					key::TYPE => type::REDIOBOX,
				],
				self::STATUS => [
					key::TYPE => type::TEXT,
					key::ACTIONS => [
						action::AUTO_UPDATE => true,
					],	
				],
				self::CREATED_AT => [
					key::TYPE => type::TEXT,
					key::CLASSES => [
						class_::DISABLED => true,
					],
				],
				self::UPDATED_AT => [
					key::TYPE => type::TEXT,
					key::CLASSES => [
						class_::DISABLED => true,
					],
				],
			],
        ];
        
	}



}


