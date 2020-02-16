<?php

namespace hahaha\backend;

use hahahasublib\hahaha_instance_trait;
use hahaha\hahaha_table_trait;

use  hahaha\define\hahaha_define_table_action as action;
use  hahaha\define\hahaha_define_table_group as group;
use  hahaha\define\hahaha_define_table_key as key;
use  hahaha\define\hahaha_define_table_class as class_;
use  hahaha\define\hahaha_define_table_direction as direction;
use  hahaha\define\hahaha_define_table_type as type;
use  hahaha\define\hahaha_define_table_validate as validate;

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



	function __construct()
	{
		$this->Initial();
	}

	public function Initial()
	{
		// 可以給其他人設定
		// 初始化設定檔
		$this->Settings($this->Settings);
		$this->Settings_Fields($this->Settings_Fields);
		$this->Settings_Index($this->Settings_Index);
		$this->Settings_Preview($this->Settings_Preview);
		$this->Settings_Edit($this->Settings_Edit);
		// 初始化使用設定
		$this->Initial_Index($this->Index);
		$this->Initial_Preview($this->Preview);
		$this->Initial_Edit($this->Edit);
	
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
	fields - DB table fields
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
				key::TITLE => __('backend.id'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
			],
			self::ACCOUNT => [					// 帳號不可以改
				key::ID => "index_item_" . self::ACCOUNT,
				key::TITLE => __('backend.account'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
			],
			self::PASSWORD => [
				key::ID => "index_item_" . self::PASSWORD,
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
				key::TITLE => __('backend.email'),
				key::TYPE => type::TEXT,
				key::VALIDATE => validate::EMAIL,				
			],
			self::GENDER => [
				key::ID => "index_item_" . self::GENDER,
				key::TITLE => __('backend.gender'),
				key::TYPE => type::REDIOBOX,
			],
			self::STATUS => [
				key::ID => "index_item_" . self::STATUS,
				key::TITLE => __('backend.status'),
				key::TYPE => type::TEXT,
				key::ACTIONS => [
					action::AUTO_UPDATE => true,
				],	
			],
			self::CREATED_AT => [
				key::ID => "index_item_" . self::CREATED_AT,
				key::TITLE => __('backend.created_at'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
			],
			self::UPDATED_AT => [
				key::ID => "index_item_" . self::UPDATED_AT,
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
				key::ID => "index_item_select",
				key::TYPE => type::CHECKBOX_SELECTED,
			],
			self::PANEL_DETAIL => [
				key::ID => "index_item_" . self::PANEL_DETAIL,
				key::TITLE => __('backend.detail'),
				key::TYPE => type::PANEL,
			],
			self::BUTTON_DELETE => [
				key::ID => "index_item_" . self::BUTTON_DELETE,
				key::TITLE => __('backend.delete'),
				key::TYPE => type::BUTTON_ICON,
			],
			self::BUTTON_EDIT => [
				key::ID => "index_item_" . self::BUTTON_EDIT,
				key::TITLE => __('backend.edit'),
				key::TYPE => type::BUTTON_ICON,
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
			"hahaha" => [
                // 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				// 主要列表
				// 兩層，沒有要做多層
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
						key::ITEMS => [
							self::GENDER => [
								key::TYPE => type::LABEL,
							],
						],
						key::STYLES => [
							"width" => "45px",
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
                // 
                // detail panel
                "detail" => [
					// [						
					// 	key::TITLE => __('backend.selected'),
					// 	key::TYPE => type::CHECKBOX,
					// 	key::ITEMS => [
					// 		self::CHECKBOX_SELECTED => [
					// 			key::TITLE => __('backend.selected'),
					// 			key::TYPE => type::CHECKBOX,
					// 			key::CLASSES => [
					// 				class_::DISABLED => true,
					// 			],
					// 		],
					// 	],
					// ],
					// [
					// 	key::TITLE => __('backend.account'),
					// 	key::ITEMS => [
					// 		self::ACCOUNT => [					// 帳號不可以改
					// 			key::TITLE => __('backend.account'),
					// 			key::TYPE => type::TEXT,
					// 			key::CLASSES => [
					// 				class_::DISABLED => true,
					// 			],
					// 		],
					// 		self::PANEL_DETAIL => [
					// 			key::TITLE => __('backend.detail'),
					// 			key::TYPE => type::PANEL,
					// 			key::CLASSES => [
					// 				class_::DISABLED => true,
					// 			],
					// 		],
					// 	],
					// ],
					// [
					// 	key::TITLE => __('backend.email'),
					// 	key::ITEMS => [
					// 		self::EMAIL => [
					// 			[
					// 				key::TYPE => type::TEXT,
					// 				key::VALIDATE => validate::EMAIL,	
					// 			],									
					// 		],
					// 	],
					// ],
					// [
					// 	key::TITLE => __('backend.gender'),
					// 	key::ITEMS => [
					// 		self::GENDER => [
					// 			[
					// 				key::TYPE => type::TEXT,
					// 			],
					// 		],
					// 	],
					// ],
					// [
					// 	key::TITLE => __('backend.operator'),
					// 	key::ITEMS => [
					// 		self::BUTTON_DELETE => [
					// 			key::TITLE => __('backend.delete'),
					// 			key::TYPE => type::BUTTON_ICON,
					// 		],
					// 		self::BUTTON_EDIT => [
					// 			key::TITLE => __('backend.edit'),
					// 			key::TYPE => type::BUTTON_ICON,
					// 		],
					// 	],
					// ],
					// [
					// 	key::TITLE => __('backend.status'),
					// 	key::ITEMS => [
					// 		self::STATUS => [
					// 			[
					// 				key::TYPE => type::TEXT,
					// 				key::ACTIONS => [
					// 					action::AUTO_UPDATE => true,
					// 				],	
					// 			],
					// 		],
					// 	],
					// ],	
					// self::ID => [
					// 	key::TYPE => type::TEXT,
					// 	key::CLASSES => [
					// 		class_::DISABLED => true,
					// 	],
					// ],
					// self::ACCOUNT => [					// 帳號不可以改
					// 	key::TYPE => type::TEXT,
					// 	key::CLASSES => [
					// 		class_::DISABLED => true,
					// 	],
					// ],
					// self::PASSWORD => [
					// 	key::TYPE => type::PASSWORD,
					// ],
					// self::PASSWORD_CONFIRM => [
					// 	key::TYPE => type::PASSWORD,
					// ],
					// self::PASSWORD_NEW => [
					// 	key::TYPE => type::PASSWORD,
					// ],
					// self::PASSWORD_NEW_CONFIRM => [
					// 	key::TYPE => type::PASSWORD,
					// ],
					// self::EMAIL => [
					// 	key::TYPE => type::TEXT,
					// 	key::VALIDATE => validate::EMAIL,				
					// ],
					// self::GENDER => [
					// 	key::TYPE => type::REDIOBOX,
					// ],
					// self::STATUS => [
					// 	key::TYPE => type::TEXT,
					// 	key::ACTIONS => [
					// 		action::AUTO_UPDATE => true,
					// 	],	
					// ],
					// self::CREATED_AT => [
					// 	key::TYPE => type::TEXT,
					// 	key::CLASSES => [
					// 		class_::DISABLED => true,
					// 	],
					// ],
					// self::UPDATED_AT => [
					// 	key::TYPE => type::TEXT,
					// 	key::CLASSES => [
					// 		class_::DISABLED => true,
					// 	],
					// ],
                ],
                // new panel
                "new" => [
					// self::ID => [
					// 	key::TYPE => type::TEXT,
					// 	key::CLASSES => [
					// 		class_::DISABLED => true,
					// 	],
					// ],
					// self::ACCOUNT => [					// 帳號不可以改
					// 	key::TYPE => type::TEXT,
					// 	key::CLASSES => [
					// 		class_::DISABLED => true,
					// 	],
					// ],
					// self::PASSWORD => [
					// 	key::TYPE => type::PASSWORD,
					// ],
					// self::PASSWORD_CONFIRM => [
					// 	key::TYPE => type::PASSWORD,
					// ],
					// self::PASSWORD_NEW => [
					// 	key::TYPE => type::PASSWORD,
					// ],
					// self::PASSWORD_NEW_CONFIRM => [
					// 	key::TYPE => type::PASSWORD,
					// ],
					// self::EMAIL => [
					// 	key::TYPE => type::TEXT,
					// 	key::VALIDATE => validate::EMAIL,				
					// ],
					// self::GENDER => [
					// 	key::TYPE => type::REDIOBOX,
					// ],
					// self::STATUS => [
					// 	key::TYPE => type::TEXT,
					// 	key::ACTIONS => [
					// 		action::AUTO_UPDATE => true,
					// 	],	
					// ],
					// self::CREATED_AT => [
					// 	key::TYPE => type::TEXT,
					// 	key::CLASSES => [
					// 		class_::DISABLED => true,
					// 	],
					// ],
					// self::UPDATED_AT => [
					// 	key::TYPE => type::TEXT,
					// 	key::CLASSES => [
					// 		class_::DISABLED => true,
					// 	],
					// ],
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


