<?php

namespace hahaha\backend;

use hahahasublib\hahaha_instance_trait;
//
use hahaha\hahaha_table_trait;
//
use hahaha\hahaha_table_base;
// 
use hahaha\define\hahaha_define_table_action as action;
use hahaha\define\hahaha_define_table_class as class_;
use hahaha\define\hahaha_define_table_css as css;
use hahaha\define\hahaha_define_table_direction as direction;
use hahaha\define\hahaha_define_table_group as group;
use hahaha\define\hahaha_define_table_key as key;
use hahaha\define\hahaha_define_table_node as node;
use hahaha\define\hahaha_define_table_tag as tag;
use hahaha\define\hahaha_define_table_type as type;
use hahaha\define\hahaha_define_table_use as use_;
use hahaha\define\hahaha_define_table_validate as validate;
use hahaha\define\hahaha_define_table_setting as setting;
use hahaha\define\hahaha_define_table_db_field_type as db_field_type;


use EntityManager;

/*
首頁自定義欄位

因為套版用，設定會是死的，所以直接用array描述，不需要另外從資料庫撈，存在快取

如果有完整一套組合，請繼承出去修改，hahaha提供的格式，請勿直接亂改
基本上完全相異的做法，開一個新專案是比較好的選擇，避免composer要取聯集，載入太多東西
 ----------------------------------------- 
附加請繼承 hahaha_table_base 或用trait附加
 ----------------------------------------- 


 ----------------------------------------- 
注意 : 一些欄位設定是每個頁面寫法相同，因為是array，可以用trait的function附加欄位上去
 ----------------------------------------- 
*/
class hahaha_table_accounts_detail extends hahaha_table_base
{	
	use hahaha_instance_trait;

	// ---------------------------------- 
	// 整理後使用物件在這
	// ---------------------------------- 
	use hahaha_table_trait;
	// ---------------------------------- 

	// ---------------------------------- 
	// 所有頁面共用IDENTIFY
	// ---------------------------------- 	
	const IDENTIFY = "accounts_detail";
	// ---------------------------------- 

	// ---------------------------------- 
	// db - 欄位
	// ---------------------------------- 
	// 有空自己寫個標籤產生器
	// ---------------------------------- 
	const ID = "id"; 
	const ACCOUNTS_ID = "accounts_id"; 
	const NAME = "name"; 
	const NICKNAME = "nickname"; 
	const AVATAR = "avatar"; 
	const IMAGE = "image"; 
	const URL = "url"; 
	const PHONE = "phone"; 
	const VERIFY_TOKEN = "verify_token"; 
	const CREATED_AT = "created_at"; 
	const UPDATED_AT = "updated_at"; 

	// ---------------------------------- 
	const BUTTON_ACCOUNTS_ID = "button_accounts_id";
	// -------------------------------------------------------- 
	// 全域
	// -------------------------------------------------------- 	

	/*
	// -------------------------------------- 
	// 主設定
	// -------------------------------------- 
	settings - 設定
	因為未來要移植php hahaha framework，所以不放在config
	*/
	public function Settings(&$settings)
	{
		// 因為同一個節點，這是共用設定
		$settings = [
			"default" => [
                // 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
                "index" => self::HAHAHA,
                "preview" => self::HAHAHA,
                "edit" => self::HAHAHA,
			],
        ];
        
	}

	// -------------------------------------------------------- 
	// 基本
	// -------------------------------------------------------- 	

	/*
	// -------------------------------------- 
	選項
	// -------------------------------------- 
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
	// -------------------------------------- 
	欄位
	// -------------------------------------- 
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
		// -------------------------------------- 
		// 因為有規則，可以寫規則來設定
		// 有空再補
		// -------------------------------------- 
		// 將這邊改成list做設定

		// $key = self::ID;
		// $item = []; 
		// $setting = [
		// 	key::TYPE => type::TEXT,
		// ];
		// $this->xxx($key, $item, $setting);
		// $settings_fields[$key] = &$item;
		// -------------------------------------- 

		// 因為同一個節點，這是共用設定
		$settings_fields = [
			self::ID => [
				key::ID => self::IDENTIFY . "_" . self::ID,
				key::DB_FIELD => [
					key::IS_FIELD => true,
					// key::NAME => self::ID,
				],
				key::TITLE => __('backend.id'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
				key::PLACEHOLDER => __('backend.help') . " : " . "integer",
			],
			self::ACCOUNTS_ID => [
				key::ID => self::IDENTIFY . "_" . self::ID,
				key::DB_FIELD => [
					key::IS_FIELD => true,
					// 這裡另外給entity variable處理
					key::NAME => "accountsId",
				],
				key::TITLE => __('backend.accounts_id'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
				key::PLACEHOLDER => __('backend.help') . " : " . __('backend.accounts_id'),
			],
			self::NAME => [
				key::ID => self::IDENTIFY . "_" . self::NAME,
				key::DB_FIELD => [
					key::IS_FIELD => true,
					// 這裡另外給entity variable處理
					// key::NAME => "name",
				],
				key::TITLE => __('backend.name'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
				key::PLACEHOLDER => __('backend.help') . " : " . __('backend.name'),
			],
			self::NICKNAME => [
				key::ID => self::IDENTIFY . "_" . self::NICKNAME,
				key::DB_FIELD => [
					key::IS_FIELD => true,
					// 這裡另外給entity variable處理
					// key::NAME => "nickname",
				],
				key::TITLE => __('backend.nickname'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
				key::PLACEHOLDER => __('backend.help') . " : " . __('backend.nickname'),
			],
			self::AVATAR => [
				key::ID => self::IDENTIFY . "_" . self::AVATAR,
				key::DB_FIELD => [
					key::IS_FIELD => true,
					// 這裡另外給entity variable處理
					// key::NAME => "avatar",
				],
				key::TITLE => __('backend.avatar'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
				key::PLACEHOLDER => __('backend.help') . " : " . __('backend.avatar'),
			],
			self::IMAGE => [
				key::ID => self::IDENTIFY . "_" . self::IMAGE,
				key::DB_FIELD => [
					key::IS_FIELD => true,
					// 這裡另外給entity variable處理
					// key::NAME => "image",
				],
				key::TITLE => __('backend.image'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
				key::PLACEHOLDER => __('backend.help') . " : " . __('backend.image'),
			],
			self::URL => [
				key::ID => self::IDENTIFY . "_" . self::URL,
				key::DB_FIELD => [
					key::IS_FIELD => true,
					// 這裡另外給entity variable處理
					// key::NAME => "url",
				],
				key::TITLE => __('backend.url'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
				key::PLACEHOLDER => __('backend.help') . " : " . __('backend.url'),
			],
			self::PHONE => [
				key::ID => self::IDENTIFY . "_" . self::PHONE,
				key::DB_FIELD => [
					key::IS_FIELD => true,
					// 這裡另外給entity variable處理
					// key::NAME => "phone",
				],
				key::TITLE => __('backend.phone'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
				key::PLACEHOLDER => __('backend.help') . " : " . __('backend.phone'),
			],
			self::VERIFY_TOKEN => [
				key::ID => self::IDENTIFY . "_" . self::VERIFY_TOKEN,
				key::DB_FIELD => [
					key::IS_FIELD => true,
					// 這裡另外給entity variable處理
					key::NAME => "verifyToken",
				],
				key::TITLE => __('backend.verify_token'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
				key::PLACEHOLDER => __('backend.help') . " : " . __('backend.verify_token'),
			],
			self::CREATED_AT => [
				key::ID => self::IDENTIFY . "_" . self::CREATED_AT,
				key::DB_FIELD => [
					key::IS_FIELD => true,
					key::NAME => 'createdAt',
				],
				key::TITLE => __('backend.created_at'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
			],
			self::UPDATED_AT => [
				key::ID => self::IDENTIFY . "_" . self::UPDATED_AT,
				key::DB_FIELD => [
					key::IS_FIELD => true,
					key::NAME => 'updatedAt',
				],
				key::TITLE => __('backend.updated_at'),
				key::TYPE => type::TEXT,
				key::CLASSES => [
					class_::DISABLED => true,
				],
			],
			//
			self::CHECKBOX_SELECTED => [
				key::ID => self::IDENTIFY . "_" . self::CHECKBOX_SELECTED,
				key::TITLE => __('backend.selected'),
				key::TYPE => type::CHECKBOX_SELECTED,
			],
			
			// ---------------------------------------------------------------------------- 
			// 功能
			// ----------------------------------------------------------------------------
			self::BUTTON_PREPEND_DETAIL => [
				key::ID => self::IDENTIFY . "_" . self::BUTTON_PREPEND_DETAIL,
				// key::TITLE => __('backend.detail'),
				key::TYPE => type::BUTTON_ICON,
			],
			self::PANEL_DETAIL => [
				key::ID => self::IDENTIFY . "_" . self::PANEL_DETAIL,
				key::TITLE => __('backend.detail'),
				key::TYPE => type::PANEL,
			],
			// ------------------------- 
			self::BUTTON_DELETE => [
				key::ID => self::IDENTIFY . "_" . self::BUTTON_DELETE,
				// 不顯示字
				//key::TITLE => __('backend.delete'),
				key::TYPE => type::BUTTON_ICON,
				key::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key::CLASSES_ICON => [
					"fas fa-minus" => true,
				],
				key::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
			],
			self::BUTTON_EDIT => [
				key::ID => self::IDENTIFY . "_" . self::BUTTON_EDIT,
				// 不顯示字
				// key::TITLE => __('backend.edit'),
				key::TYPE => type::BUTTON_ICON_LINK,
				key::INDEX => self::ID,
				key::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key::CLASSES_ICON => [
					"fas fa-edit" => true,
				],
				key::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
			],
			// ------------------------- 
			self::UPLOAD => [
				key::ID => self::IDENTIFY . "_" . self::UPLOAD,
				// 不顯示字
				// key::TITLE => __('backend.edit'),
				key::TYPE => type::UPLOAD,
				key::INDEX => self::ID,
				key::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key::STYLES => [
					"display" => "inline-block",
					"width" => "50px",
					"height" => "50px",
				],
			],
			// 附加
			self::BUTTON_ACCOUNTS_ID => [
				key::ID => self::IDENTIFY . "_" . self::BUTTON_ACCOUNTS_ID,
				// 不顯示字
				// key::TITLE => __('backend.edit'),
				key::TYPE => type::BUTTON_ICON_LINK,
				key::INDEX => self::ID,
				key::CLASSES_1 => [
					"btn btn-dark" => true,
				],
				key::CLASSES_2 => [
					"fas fa-user" => true,
				],
				key::STYLES_1 => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
			],
			//
			self::BUTTON_ADD => [
				key::ID => self::IDENTIFY . "_" . self::BUTTON_ADD,
				key::TITLE => __('backend.add'),
				key::TYPE => type::BUTTON_ICON,
				// class
				key::CLASSES => [
					self::IDENTIFY . "_" . self::BUTTON_ADD => true,
				],
				key::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key::CLASSES_ICON => [
					"fas fa-plus" => true,
				],
				// class
				key::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
				key::SETTINGS => [
					setting::LABEL => false,
				],
			],
			self::BUTTON_SELECTED_DELETE => [
				key::ID => self::IDENTIFY . "_" . self::BUTTON_SELECTED_DELETE,
				key::TITLE => __('backend.selected_delete'),
				key::TYPE => type::BUTTON_ICON,
				key::CLASSES => [
					self::IDENTIFY . "_" . self::BUTTON_SELECTED_DELETE => true,
				],
				key::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key::CLASSES_ICON => [
					"fas fa-minus" => true,
				],
				key::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
				key::SETTINGS => [
					setting::LABEL => false,
				],
			],
			self::BUTTON_ALL_SAVE => [
				key::ID => self::IDENTIFY . "_" . self::BUTTON_ALL_SAVE,
				key::TITLE => __('backend.all_save'),
				key::TYPE => type::BUTTON_ICON,
				key::CLASSES => [
					self::IDENTIFY . "_" . self::BUTTON_ALL_REFRESH => true,
				],
				key::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key::CLASSES_ICON => [
					"fas fa-save" => true,
				],
				key::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
				key::SETTINGS => [
					setting::LABEL => false,
				],
			],
			self::BUTTON_ALL_REFRESH => [
				key::ID => self::IDENTIFY . "_" . self::BUTTON_ALL_REFRESH,
				key::TITLE => __('backend.all_refresh'),
				key::TYPE => type::BUTTON_ICON,
				key::CLASSES => [
					self::IDENTIFY . "_" . self::BUTTON_ALL_REFRESH => true,
				],
				key::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key::CLASSES_ICON => [
					"fas fa-refresh" => true,
				],
				key::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
				key::SETTINGS => [
					setting::LABEL => false,
				],
			],
			//
			self::PANEL_ADD_BUTTON_ADD => [
				key::ID => self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_ADD,
				key::TITLE => __('backend.add'),
				key::TYPE => type::BUTTON_ICON,
				// class
				key::CLASSES => [
					self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_ADD => true,
				],
				key::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key::CLASSES_ICON => [
					"fas fa-plus" => true,
				],
				// class
				key::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
				key::SETTINGS => [
					setting::LABEL => false,
				],
			],
			self::PANEL_ADD_BUTTON_CANCEL => [
				key::ID => self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_CANCEL,
				key::TITLE => __('backend.cancel'),
				key::TYPE => type::BUTTON_ICON,
				// class
				key::CLASSES => [
					self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_CANCEL => true,
				],
				key::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key::CLASSES_ICON => [
					"fas fa-times" => true,
				],
				// class
				key::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
				key::SETTINGS => [
					setting::LABEL => false,
				],
			],
			self::PANEL_DETAIL_BUTTON_CHANGE_PASSWORD => [
				key::ID => self::IDENTIFY . "_" . self::PANEL_DETAIL_BUTTON_CHANGE_PASSWORD,
				key::TITLE => __('backend.change_password'),
				key::TYPE => type::BUTTON_ICON,
				// class
				key::CLASSES => [
					self::IDENTIFY . "_" . self::PANEL_DETAIL_BUTTON_CHANGE_PASSWORD => true,
				],
				key::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key::CLASSES_ICON => [
					"far fa-arrow-alt-circle-right" => true,
				],
				// class
				key::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
			],
		];
				
		// -------------------------------------- 
		// 附加list法塞入，沒規定一定要用哪個，對於主要維護者而言，這不是很重要，這又不會常常改
		// 主要維護者反而怕牽一髮而動全身的改法
		// -------------------------------------- 
        
	}
	
	/*
	// -------------------------------------- 
	附加欄位
	// -------------------------------------- 
	fields - DB table additional fields
	因為未來要移植php hahaha framework，所以不放在config
	*/
	public function Settings_DB_Fields_Addition(&$settings_db_fields_addition)
	{
		// -------------------------------------- 
		// 因為有規則，可以寫規則來設定
		// 有空再補
		// -------------------------------------- 
		// 將這邊改成list做設定

		// $key = self::ID;
		// $item = []; 
		// $setting = [
		// 	key::DB_FIELD => [
		// 		key::IS_FIELD => true,
		// 		// key::TYPE => db_field_type::STRING,
		// 		// key::NAME => self::ID,
		// 	],		
		// ];
		// $this->xxx($key, $item, $setting);
		// $settings_fields[$key] = &$item;
		// -------------------------------------- 

		// 因為同一個節點，這是共用設定
		$settings_db_fields_addition = [
			self::ID => [
				key::DB_FIELD => [
					key::IS_FIELD => true,
					// key::TYPE => db_field_type::STRING,
					// key::NAME => self::ID,
				],				
			],	
			self::CREATED_AT => [
				key::DB_FIELD => [
					key::IS_FIELD => true,
					// key::TYPE => db_field_type::DATETIME,
					// 指定
					key::NAME => 'createdAt', 
				],				
			],		
			self::UPDATED_AT => [
				key::DB_FIELD => [
					key::IS_FIELD => true,
					// key::TYPE => db_field_type::DATETIME,
					// 指定
					key::NAME => 'updatedAt',
				],				
			],				
        ];
 
		// -------------------------------------- 
		// 附加list法塞入，沒規定一定要用哪個，對於主要維護者而言，這不是很重要，這又不會常常改
		// 主要維護者反而怕牽一髮而動全身的改法
		// -------------------------------------- 
        
	}
	// -------------------------------------------------------- 
	// 頁面
	// -------------------------------------------------------- 	
    
	/*
	// -------------------------------------- 
	index - 首頁
	// -------------------------------------- 
	因為未來要移植php hahaha framework，所以不放在config

	注意 : 格式要統一
	*/
	public function Settings_Index(&$settings_index)
	{
		// -------------------------------------- 
		// 這裡基本上會合併預設值，因此已經最簡
		// 
		// -------------------------------------- 
		// bootstrap樣式應該要這樣做
		//
		// self::BUTTON_PREPEND_DETAIL => [
		// 	// key::TITLE => __('backend.detail'),
		// 	key::TYPE => type::BUTTON_ICON,
		// 	key::CLASSES_1 => [
		// 		"btn-secondary input-group-text" => true,
		// 	],
		// 	key::CLASSES_2 => [
		// 		"fab fa-elementor" => true,
		// 	],
		// 	key::STYLES => [
		// 		// 這設定label的style沒有錯
		// 		"font-size" => "1.5em", 
		// 		"color" => "Tomato",
		// 	],
		// ],
		// =============================>
		// 直接做成專屬樣式，不要搞花招
		//
		// self::BUTTON_PREPEND_DETAIL => [
		// 	// key::TITLE => __('backend.detail'),
		// 	key::TYPE => type::BUTTON_ICON_BOOTSTRAP,
		// 	key::ICON => "input-group-text",
		// 	key::BUTTON => BUTTON::SECONDARY,
		// 	// key::STYLES => [
		// 	// 	// 這設定label的style沒有錯
		// 	// 	"font-size" => "1.5em", 
		// 	// 	"color" => "Tomato",
		// 	// ],
		// ],
		// -------------------------------------- 

		// 因為同一個節點，這是共用設定
		$settings_index = [
			// --------------------------------------------------- 
			// hahaha的版本的設定集，寫死，避免要處理很細
			// --------------------------------------------------- 			
			// --------------------------------------------------- 
			self::HAHAHA => [		
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
                self::B_TOP => [
					// 目前只放button，外層只是分隔線...
					[
						// key::TITLE => __('backend.item'),
						key::TYPE => type::B_BLOCK_NORMAL,
						key::GROUP => group::SHORT_WRAP,
						key::ITEMS => [
							// 新增
							// self::BUTTON_ADD => [
							// 	// 因為ID重複，所以加上Top
							// 	key::ID => self::IDENTIFY . "_" . self::B_TOP . "_" . self::BUTTON_ADD,
							// ],
							self::BUTTON_SELECTED_DELETE => [
								// 因為ID重複，所以加上Top
								key::ID => self::IDENTIFY . "_" . self::B_TOP . "_" . self::BUTTON_SELECTED_DELETE,
							],
							self::BUTTON_ALL_SAVE => [
								// 因為ID重複，所以加上Top
								key::ID => self::IDENTIFY . "_" . self::B_TOP . "_" . self::BUTTON_ALL_SAVE,
							],
							self::BUTTON_ALL_REFRESH => [
								// 因為ID重複，所以加上Top
								key::ID => self::IDENTIFY . "_" . self::B_TOP . "_" . self::BUTTON_ALL_REFRESH,
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
				// 主要區塊 - 多筆 - table
				// --------------------------------------------------- 
				// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				// --------------------------------------------------- 
                self::B_MAIN => [
					[				
						key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . "all_select",		
						key::TITLE => __('backend.selected'),
						key::TYPE => type::CHECKBOX_SELECTED,
						key::ITEMS => [
							self::CHECKBOX_SELECTED => [
								key::STYLES_1 => [
									"margin-top" => "5px",
								],								
							],
							
						],
						key::STYLES => [
							"width" => "45px",
						],
					],
					[
						key::TITLE => __('backend.avatar'),
						key::TYPE => type::LABEL,
						key::ITEMS => [
							self::AVATAR => [
								key::TYPE => type::IMAGE,
								key::STYLES => [
									"margin-top" => "5px",
									"float" => "left",
								],	
							],
						],
						key::STYLES => [
							"width" => "90px",
						],
					],
					[
						key::TITLE => __('backend.accounts_id'),
						key::TYPE => type::LABEL,
						key::ITEMS => [
							self::ACCOUNTS_ID => [
								key::TYPE => type::TEXT,
								key::READONLY => true,
								key::STYLES => [
									"width" => "70%", 
									"float" => "left", 
									"margin-top" => "5px",
								],
							],
							self::BUTTON_ACCOUNTS_ID => [
								key::STYLES => [
									"font-size" => "1em", 
									"color" => "Tomato",
									"width" => "22%",
									"margin-left" => "5px",
								],
							],
						],
						key::STYLES => [
							"width" => "90px",
						],
						
					],
					[
						key::TITLE => __('backend.name'),
						key::TYPE => type::LABEL,
						key::GROUP => group::INPUT_GROUP,
						key::ITEMS => [
							self::NAME => [					// 帳號不可以改
								key::TITLE => __('backend.name'),
								key::TYPE => type::TEXT,
								key::STYLES => [
									"margin-top" => "5px",
								],
							],
							self::BUTTON_PREPEND_DETAIL => [
								// key::TITLE => __('backend.detail'),
								key::TYPE => type::BUTTON_ICON,
								key::CLASSES_BUTTON => [
									"btn-secondary input-group-text" => true,
								],
								key::CLASSES_ICON => [
									"fab fa-elementor" => true,
								],
								key::STYLES_BUTTON => [
									// 這設定label的style沒有錯
									"font-size" => "1.5em", 
									"color" => "Tomato",
									"margin-top" => "5px",
								],
							],
							self::PANEL_DETAIL => [
								key::TITLE => __('backend.detail'),
								key::TYPE => type::PANEL,
								key::ITEMS => [],
								key::USE_ => use_::B_BLOCK,
								key::CONTENT => [
									// 因為前端沒很複雜，這裡簡單寫
									self::B_PANEL_DETAIL
								],
							],
						],
						key::STYLES => [
							"width" => "150px",
						],
					],
					[
						key::TITLE => __('backend.image'),
						key::TYPE => type::LABEL,
						key::ITEMS => [
							self::IMAGE => [
								key::TYPE => type::IMAGE,
							],
							self::UPLOAD => [
								key::ID => self::IDENTIFY . "_" . self::IMAGE . "_" . self::UPLOAD,
								key::TYPE => type::UPLOAD,
								key::STYLES => [
									"margin-top" => "5px", 
								],
								key::URL => "",					// table url + path
								key::PATH => "",				// table path + path
								// 二次關聯，請在設定完後寫關聯規則，大概作法為，上傳成功後，某個元件的設定(array) => 某個元件的設定(array)
								// 因為是列表，所以只要把需要的id存下來，找到index，就可以知道要怎樣處理了
								// 區塊的地方，因為已知對應，所以也知道要怎樣處理
								// key::UPLOAD_FILE => [
								// 	key::SUCCESS => [
								// 		[self::B_MAIN, self::UPLOAD] => [
								// 			[self::B_MAIN, self::IMAGE],
								// 		],
								// 	],
								// ],
							],
						],
						key::STYLES => [
							"width" => "90px",
							"margin-top" => "5px",
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
									"width" => "55px",
									"margin-right" => "0px", 
								],
								key::STYLES_1 => [
									"margin-right" => "0px", 
									"width" => "50px",
								],
								key::STYLES_2 => [
									"margin-right" => "0px", 
								],
							],
							self::BUTTON_EDIT => [
								key::STYLES => [
									"font-size" => "1em", 
									"color" => "Tomato",
									"width" => "55px",
									"margin-right" => "0px", 
								],
								key::STYLES_1 => [
									"margin-right" => "0px", 
									"width" => "50px",
								],
								key::STYLES_2 => [
									"margin-right" => "0px", 
								],
							],
							
						],
						key::STYLES => [
							"width" => "92px",
							
						],
					],				
				],
				// --------------------------------------------------- 
				// 下方區塊 - 一維嵌套
				// --------------------------------------------------- 
				// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				// --------------------------------------------------- 
                self::B_BOTTOM => [
					// 目前只放button，外層只是分隔線...
					[
						// key::TITLE => __('backend.item'),
						key::TYPE => type::B_BLOCK_NORMAL,
						key::GROUP => group::SHORT_WRAP,
						key::ITEMS => [
							self::BUTTON_SELECTED_DELETE => [
								// 因為ID重複，所以加上Top
								key::ID => self::IDENTIFY . "_" . self::B_BOTTOM . "_" . self::BUTTON_SELECTED_DELETE,
								key::SETTINGS => [
									setting::LABEL => false,
								],
							],
							self::BUTTON_ALL_SAVE => [
								// 因為ID重複，所以加上Top
								key::ID => self::IDENTIFY . "_" . self::B_BOTTOM . "_" . self::BUTTON_ALL_SAVE,
								key::SETTINGS => [
									setting::LABEL => false,
								],
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
                self::B_LINK => [
					// 目前只有link，也沒有模組化，因此暫時沒用到
				],
				

				// --------------------------------------------------- 
				// --------------------------------------------------- 
				// 面板區
				// --------------------------------------------------- 	
				// --------------------------------------------------- 

				// --------------------------------------------------- 
				// 新增面板 - 單一
				// --------------------------------------------------- 
				// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				// --------------------------------------------------- 
                // self::B_PANEL_ADD => [
				// 	[
				// 		key::TITLE => __('backend.avatar'),
				// 		key::TYPE => type::LABEL,
				// 		key::GROUP => group::FORM_GROUP_ROW,
				// 		key::ITEMS => [
				// 			self::AVATAR => [					// 帳號不可以改
				// 				key::ID => self::IDENTIFY . "_" . self::B_PANEL_ADD . "_" . self::AVATAR,
				// 				key::DB_FIELD => [
				// 					key::IS_FIELD => true,
				// 				],
				// 				key::TITLE => __('backend.avatar'),
				// 				key::TYPE => type::TEXT,
				// 				key::CLASSES => [
				// 					class_::DISABLED => false,
				// 				], 
				// 				key::CLASSES_1 => [
				// 					class_::REQUIRED => true,
				// 				], 
				// 			],
				// 		],
				// 		key::STYLES => [
				// 		],
				// 	],
				// 	[
				// 		key::TITLE => __('backend.accounts_id'),
				// 		key::TYPE => type::LABEL,
				// 		key::GROUP => group::FORM_GROUP_ROW,
				// 		key::ITEMS => [
				// 			self::ACCOUNTS_ID => [					// 帳號不可以改
				// 				key::ID => self::IDENTIFY . "_" . self::B_PANEL_ADD . "_" . self::ACCOUNTS_ID,
				// 				key::DB_FIELD => [
				// 					key::IS_FIELD => true,
				// 				],
				// 				key::TITLE => __('backend.accounts_id'),
				// 				key::TYPE => type::TEXT,
				// 				key::CLASSES => [
				// 					class_::DISABLED => true,
				// 				], 
				// 				key::CLASSES_1 => [
				// 					class_::REQUIRED => true,
				// 				], 
				// 				key::READONLY => true,
				// 			],
				// 		],
				// 		key::STYLES => [
				// 		],
				// 	],
				// 	[
				// 		key::TITLE => __('backend.name'),
				// 		key::TYPE => type::LABEL,
				// 		key::GROUP => group::FORM_GROUP_ROW,
				// 		key::ITEMS => [
				// 			self::NAME => [					// 帳號不可以改
				// 				key::ID => self::IDENTIFY . "_" . self::B_PANEL_ADD . "_" . self::NAME,
				// 				key::DB_FIELD => [
				// 					key::IS_FIELD => true,
				// 				],
				// 				key::TITLE => __('backend.name'),
				// 				key::TYPE => type::TEXT,
				// 				key::CLASSES => [
				// 					class_::DISABLED => false,
				// 				], 
				// 				key::CLASSES_1 => [
				// 					class_::REQUIRED => true,
				// 				], 
				// 			],
				// 		],
				// 		key::STYLES => [
				// 		],
				// 	],
				// 	[
				// 		key::TITLE => __('backend.image'),
				// 		key::TYPE => type::LABEL,
				// 		key::GROUP => group::FORM_GROUP_ROW,
				// 		key::ITEMS => [
				// 			self::AVATAR => [					// 帳號不可以改
				// 				key::ID => self::IDENTIFY . "_" . self::B_PANEL_ADD . "_" . self::IMAGE,
				// 				key::DB_FIELD => [
				// 					key::IS_FIELD => true,
				// 				],
				// 				key::TITLE => __('backend.image'),
				// 				key::TYPE => type::TEXT,
				// 				key::CLASSES => [
				// 					class_::DISABLED => false,
				// 				], 
				// 				key::CLASSES_1 => [
				// 					class_::REQUIRED => true,
				// 				], 
				// 			],
				// 		],
				// 		key::STYLES => [
				// 		],
				// 	],
				// 	//
				// 	[
				// 		// key::TITLE => __('backend.item'),
				// 		key::TYPE => type::B_BLOCK_SHORT_WRAP,
				// 		key::GROUP => group::FORM_GROUP_ROW,
				// 		key::ITEMS => [
				// 			self::PANEL_ADD_BUTTON_ADD => [
				// 				// 因為ID重複，所以加上Top
				// 				key::ID => self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_ADD,
				// 			],
				// 			self::PANEL_ADD_BUTTON_CANCEL => [
				// 				// 因為ID重複，所以加上Top
				// 				key::ID => self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_CANCEL,
				// 			],
				// 		],
				// 		key::STYLES => [
				// 		],
				// 	],				
				// ],
                // --------------------------------------------------- 
				// 細節面板 - 多筆 - table附加面板
				// --------------------------------------------------- 
				// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				// --------------------------------------------------- 
                self::B_PANEL_DETAIL => [
					// 不一定應該在這邊提供更改密碼，這裡是為了打架構測試所以才加的
					[
						key::TITLE => __('backend.avatar'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::AVATAR => [
								key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::AVATAR,
								key::TYPE => type::IMAGE,
								key::SETTINGS => [
									setting::LABEL => false,
								],
							],
							
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.nickname'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::NICKNAME => [
								key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::NICKNAME,
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.url'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::URL => [
								key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::URL,
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.phone'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::NAME => [
								key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::PHONE,
							],
						],
						key::STYLES => [
						],
					],	
					// [
					// 	key::TITLE => __('backend.image'),
					// 	key::TYPE => type::LABEL,
					// 	key::GROUP => group::FORM_GROUP_ROW,
					// 	key::ITEMS => [
					// 		self::IMAGE => [
					// 			key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::IMAGE,
					// 			key::TYPE => type::IMAGE_UPLOAD_RE,
					// 		],
					// 	],
					// 	key::STYLES => [
					// 	],
					// ],				
					[
						key::TITLE => __('backend.created_at'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::CREATED_AT => [
								key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::CREATED_AT,
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.updated_at'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::UPDATED_AT => [
								key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::UPDATED_AT,
							],
						],
						key::STYLES => [
						],
					],
				],
			],
        ];
	}

	/*
	// -------------------------------------- 
	preview - 預覽頁
	// -------------------------------------- 
	因為未來要移植php hahaha framework，所以不放在config
	*/
	public function Settings_Preview(&$settings_preview)
	{
		// 因為同一個節點，這是共用設定
		// 同首頁
		$settings_preview = &$this->Settings_Preview;

	}

	/*
	// -------------------------------------- 
	edit - 編輯頁
	// -------------------------------------- 
	*/
	public function Settings_Edit(&$settings_edit)
	{
		// 因為同一個節點，這是共用設定
		$settings_edit = [
			// --------------------------------------------------- 
			// hahaha的版本的設定集，寫死，避免要處理很細
			// --------------------------------------------------- 			
			// --------------------------------------------------- 
			self::HAHAHA => [		
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
            
				// --------------------------------------------------- 
				// 上方區塊 - 2維嵌套
				// --------------------------------------------------- 
				// 每行有多項Items，樣式如下面那樣，有空再做
				// --------------------------------------------------- 
           
				// --------------------------------------------------- 
				// 主要區塊 - 多筆 - table
				// --------------------------------------------------- 
				// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				// --------------------------------------------------- 
                self::B_MAIN => [
					[
						key::TITLE => __('backend.id'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::ID => [
								key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::ID,
								key::DB_FIELD => [
									key::IS_FIELD => true,
								],
								key::TITLE => __('backend.id'),
								key::TYPE => type::TEXT,
								key::ACTIONS => [
									// action::AUTO_UPDATE => true,
								],	
								key::READONLY => true, 
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.name'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::NAME => [
								key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::NAME,
								key::DB_FIELD => [
									key::IS_FIELD => true,
								],
								key::TITLE => __('backend.name'),
								key::TYPE => type::TEXT,
								key::ACTIONS => [
									// action::AUTO_UPDATE => true,
								],	
								// key::READONLY => true, 
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.nickname'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::NICKNAME => [
								key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::NICKNAME,
								key::DB_FIELD => [
									key::IS_FIELD => true,
								],
								key::TITLE => __('backend.nickname'),
								key::TYPE => type::TEXT,
								key::ACTIONS => [
									// action::AUTO_UPDATE => true,
								],	
								// key::READONLY => true, 
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.avatar'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::AVATAR => [
								key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::AVATAR,
								key::TYPE => type::TEXT,
								
								// key::READONLY => true, 
							],
							self::UPLOAD => [
								key::ID => self::IDENTIFY . "_" . self::IMAGE . "_" . self::UPLOAD,
								key::TYPE => type::UPLOAD,
								key::STYLES => [
									"margin-top" => "5px", 
								],
								key::SETTINGS => [
									setting::LABEL => false,
								],
								key::URL => "",					// table url + path
								key::PATH => "",				// table path + path
				
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.avatar'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::AVATAR => [
								key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::AVATAR,
								key::TYPE => type::IMAGE,
								key::SETTINGS => [
									setting::LABEL => false,
								], 
								// key::READONLY => true, 
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.image'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::IMAGE => [
								key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::IMAGE,
								key::TYPE => type::TEXT,
								
								// key::READONLY => true, 
							],
							self::UPLOAD => [
								key::ID => self::IDENTIFY . "_" . self::IMAGE . "_" . self::UPLOAD,
								key::TYPE => type::UPLOAD,
								key::STYLES => [
									"margin-top" => "5px", 
								],
								key::SETTINGS => [
									setting::LABEL => false,
								],
								key::URL => "",					// table url + path
								key::PATH => "",				// table path + path
				
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.image'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::IMAGE => [
								key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::IMAGE,
								key::DB_FIELD => [
									key::IS_FIELD => true,
								],
								key::TITLE => __('backend.image'),
								key::TYPE => type::IMAGE,
								key::SETTINGS => [
									setting::LABEL => false,
								],
								// key::READONLY => true, 
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.url'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::URL => [
								key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::URL,
								key::DB_FIELD => [
									key::IS_FIELD => true,
								],
								key::TITLE => __('backend.url'),
								key::TYPE => type::TEXT,
								key::ACTIONS => [
									// action::AUTO_UPDATE => true,
								],	
								// key::READONLY => true, 
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.phone'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::PHONE => [
								key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::PHONE,
								key::DB_FIELD => [
									key::IS_FIELD => true,
								],
								key::TITLE => __('backend.phone'),
								key::TYPE => type::TEXT,
								key::ACTIONS => [
									// action::AUTO_UPDATE => true,
								],	
								// key::READONLY => true, 
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.verify_token'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::VERIFY_TOKEN => [
								key::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::VERIFY_TOKEN,
								key::DB_FIELD => [
									key::IS_FIELD => true,
								],
								key::TITLE => __('backend.verify_token'),
								key::TYPE => type::TEXT,
								key::ACTIONS => [
									// action::AUTO_UPDATE => true,
								],	
								// key::READONLY => true, 
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.created_at'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::CREATED_AT => [
								key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::CREATED_AT,
							],
						],
						key::STYLES => [
						],
					],
					[
						key::TITLE => __('backend.updated_at'),
						key::TYPE => type::LABEL,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::UPDATED_AT => [
								key::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::UPDATED_AT,
							],
						],
						key::STYLES => [
						],
					],
					[
						// key::TITLE => __('backend.item'),
						key::TYPE => type::B_BLOCK_SHORT_WRAP,
						key::GROUP => group::FORM_GROUP_ROW,
						key::ITEMS => [
							self::BUTTON_ALL_SAVE => [
								// 因為ID重複，所以加上Top
								key::ID => self::IDENTIFY . "_" . self::BUTTON_ALL_SAVE,
								key::SETTINGS => [
									setting::LABEL => false,
								],
							],
							self::BUTTON_ALL_REFRESH => [
								// 因為ID重複，所以加上Top
								key::ID => self::IDENTIFY . "_" . self::BUTTON_ALL_REFRESH,
								key::SETTINGS => [
									setting::LABEL => false,
								],
							],
							
						],
						key::STYLES => [
						],
					],							
				],
				// --------------------------------------------------- 
				// 下方區塊 - 一維嵌套
				// --------------------------------------------------- 
				// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				// --------------------------------------------------- 
              			
				// --------------------------------------------------- 
				// 連結區塊 - 一維嵌套
				// --------------------------------------------------- 
				// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				// --------------------------------------------------- 
              
				// --------------------------------------------------- 
				// --------------------------------------------------- 
				// 面板區
				// --------------------------------------------------- 	
				// --------------------------------------------------- 

			
			],
        ];
	}

}


