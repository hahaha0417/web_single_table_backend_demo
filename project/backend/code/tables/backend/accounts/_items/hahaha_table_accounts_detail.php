<?php

namespace hahaha\backend;

use hahahasublib\hahaha_instance_trait;
//
use hahaha\hahaha_table_trait;
//
use hahaha\hahaha_table_base;
// 
use EntityManager;

// ------------------------------------------------------ 
// 不要用這個
// \backend\alias\hahaha_alias_table_define::Alias("hahaha\\backend\\");
// ------------------------------------------------------ 
// 用傳統的貼法，避免出現錯誤
// 解法 : 
// 1. php提供新include，可以insert代碼做整理 * 
// 2. 插件可以幫我parser class_alias()，例如提供方法指定 
/** 
 * 特例(2) : 
 * @Intelephense:analysis  \backend\alias\hahaha_alias_table_define::Alias("hahaha\\backend\\"); 
 * 上面function獨立並只做class_alias
 * 
 **/
// ------------------------------------------------------ 
use hahaha\define\hahaha_define_base_key as key_;
use hahaha\define\hahaha_define_base_direction as direction;
use hahaha\define\hahaha_define_html_attribute as attr;
use hahaha\define\hahaha_define_html_class as class_;
use hahaha\define\hahaha_define_html_property as prop;
use hahaha\define\hahaha_define_base_node as node;
use hahaha\define\hahaha_define_base_validate as validate;
use hahaha\define\hahaha_define_html_style as style;
use hahaha\define\hahaha_define_html_tag as tag;
use hahaha\define\hahaha_define_table_action as action;
use hahaha\define\hahaha_define_table_group as group;
use hahaha\define\hahaha_define_table_setting as setting;
use hahaha\define\hahaha_define_table_target as target;
use hahaha\define\hahaha_define_table_type as type;
use hahaha\define\hahaha_define_table_use as use_;
use hahaha\define\hahaha_define_table_db_field_type as field_type;
use hahaha\define\hahaha_define_sql_operator as op;

// ------------------------------------------------------ 

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
		// 			key_::VALUE => '1',					
		// 			key_::TITLE => __('backend.male'),
		// 		],	
		// 		'female' => [
		// 			key_::VALUE => '0',
		// 			key_::TITLE => __('backend.female'),
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
		key_::TYPE => type::TEXT,
		key_::VALIDATE => validate::EMAIL,
		key_::ACTIONS => [
			action::AUTO_UPDATE => false,
		],				
		key_::CLASSES => [
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
		// 	key_::TYPE => type::TEXT,
		// ];
		// $this->xxx($key, $item, $setting);
		// $settings_fields[$key] = &$item;
		// -------------------------------------- 

		// 因為同一個節點，這是共用設定
		$settings_fields = [
			self::ID => [
				key_::ID => self::IDENTIFY . "_" . self::ID,
				key_::DB_FIELD => [
					key_::IS_FIELD => true,
					// key_::NAME => self::ID,
				],
				key_::TITLE => __('backend.id'),
				key_::TYPE => type::TEXT,
		
				key_::PLACEHOLDER => __('backend.help') . " : " . "integer",
			],
			self::ACCOUNTS_ID => [
				key_::ID => self::IDENTIFY . "_" . self::ID,
				key_::DB_FIELD => [
					key_::IS_FIELD => true,
					// 這裡另外給entity variable處理
					key_::NAME => "accountsId",
				],
				key_::TITLE => __('backend.accounts_id'),
				key_::TYPE => type::TEXT,
	
				key_::PLACEHOLDER => __('backend.help') . " : " . __('backend.accounts_id'),
			],
			self::NAME => [
				key_::ID => self::IDENTIFY . "_" . self::NAME,
				key_::DB_FIELD => [
					key_::IS_FIELD => true,
					// 這裡另外給entity variable處理
					// key_::NAME => "name",
				],
				key_::TITLE => __('backend.name'),
				key_::TYPE => type::TEXT,

				key_::PLACEHOLDER => __('backend.help') . " : " . __('backend.name'),
			],
			self::NICKNAME => [
				key_::ID => self::IDENTIFY . "_" . self::NICKNAME,
				key_::DB_FIELD => [
					key_::IS_FIELD => true,
					// 這裡另外給entity variable處理
					// key_::NAME => "nickname",
				],
				key_::TITLE => __('backend.nickname'),
				key_::TYPE => type::TEXT,
		
				key_::PLACEHOLDER => __('backend.help') . " : " . __('backend.nickname'),
			],
			self::AVATAR => [
				key_::ID => self::IDENTIFY . "_" . self::AVATAR,
				key_::DB_FIELD => [
					key_::IS_FIELD => true,
					// 這裡另外給entity variable處理
					// key_::NAME => "avatar",
				],
				key_::TITLE => __('backend.avatar'),
				key_::TYPE => type::TEXT,
		
				key_::PLACEHOLDER => __('backend.help') . " : " . __('backend.avatar'),
			],
			self::IMAGE => [
				key_::ID => self::IDENTIFY . "_" . self::IMAGE,
				key_::DB_FIELD => [
					key_::IS_FIELD => true,
					// 這裡另外給entity variable處理
					// key_::NAME => "image",
				],
				key_::TITLE => __('backend.image'),
				key_::TYPE => type::TEXT,

				key_::PLACEHOLDER => __('backend.help') . " : " . __('backend.image'),
			],
			self::URL => [
				key_::ID => self::IDENTIFY . "_" . self::URL,
				key_::DB_FIELD => [
					key_::IS_FIELD => true,
					// 這裡另外給entity variable處理
					// key_::NAME => "url",
				],
				key_::TITLE => __('backend.url'),
				key_::TYPE => type::TEXT,

				key_::PLACEHOLDER => __('backend.help') . " : " . __('backend.url'),
			],
			self::PHONE => [
				key_::ID => self::IDENTIFY . "_" . self::PHONE,
				key_::DB_FIELD => [
					key_::IS_FIELD => true,
					// 這裡另外給entity variable處理
					// key_::NAME => "phone",
				],
				key_::TITLE => __('backend.phone'),
				key_::TYPE => type::TEXT,

				key_::PLACEHOLDER => __('backend.help') . " : " . __('backend.phone'),
			],
			self::VERIFY_TOKEN => [
				key_::ID => self::IDENTIFY . "_" . self::VERIFY_TOKEN,
				key_::DB_FIELD => [
					key_::IS_FIELD => true,
					// 這裡另外給entity variable處理
					key_::NAME => "verifyToken",
				],
				key_::TITLE => __('backend.verify_token'),
				key_::TYPE => type::TEXT,

				key_::PLACEHOLDER => __('backend.help') . " : " . __('backend.verify_token'),
			],
			self::CREATED_AT => [
				key_::ID => self::IDENTIFY . "_" . self::CREATED_AT,
				key_::DB_FIELD => [
					key_::IS_FIELD => true,
					key_::NAME => 'createdAt',
				],
				key_::TITLE => __('backend.created_at'),
				key_::TYPE => type::TEXT,

			],
			self::UPDATED_AT => [
				key_::ID => self::IDENTIFY . "_" . self::UPDATED_AT,
				key_::DB_FIELD => [
					key_::IS_FIELD => true,
					key_::NAME => 'updatedAt',
				],
				key_::TITLE => __('backend.updated_at'),
				key_::TYPE => type::TEXT,

			],
			//
			self::CHECKBOX_SELECTED => [
				key_::ID => self::IDENTIFY . "_" . self::CHECKBOX_SELECTED,
				key_::TITLE => __('backend.selected'),
				key_::TYPE => type::CHECKBOX_SELECTED,
			],
			
			// ---------------------------------------------------------------------------- 
			// 功能
			// ----------------------------------------------------------------------------
			self::BUTTON_PREPEND_DETAIL => [
				key_::ID => self::IDENTIFY . "_" . self::BUTTON_PREPEND_DETAIL,
				// key_::TITLE => __('backend.detail'),
				key_::TYPE => type::BUTTON_ICON,
			],
			self::PANEL_DETAIL => [
				key_::ID => self::IDENTIFY . "_" . self::PANEL_DETAIL,
				key_::TITLE => __('backend.detail'),
				key_::TYPE => type::PANEL,
			],
			// ------------------------- 
			self::BUTTON_DELETE => [
				key_::ID => self::IDENTIFY . "_" . self::BUTTON_DELETE,
				// 不顯示字
				//key_::TITLE => __('backend.delete'),
				key_::TYPE => type::BUTTON_ICON,
				key_::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key_::CLASSES_ICON => [
					"fas fa-minus" => true,
				],
				key_::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
			],
			self::BUTTON_EDIT => [
				key_::ID => self::IDENTIFY . "_" . self::BUTTON_EDIT,
				// 不顯示字
				// key_::TITLE => __('backend.edit'),
				key_::TYPE => type::BUTTON_ICON_LINK,
				key_::INDEX => self::ID,
				key_::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key_::CLASSES_ICON => [
					"fas fa-edit" => true,
				],
				key_::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
			],
			// ------------------------- 
			self::UPLOAD => [
				key_::ID => self::IDENTIFY . "_" . self::UPLOAD,
				// 不顯示字
				// key_::TITLE => __('backend.edit'),
				key_::TYPE => type::UPLOAD,
				key_::INDEX => self::ID,
				key_::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key_::STYLES => [
					"display" => "inline-block",
					"width" => "50px",
					"height" => "50px",
				],
			],
			// 附加
			self::BUTTON_ACCOUNTS_ID => [
				key_::ID => self::IDENTIFY . "_" . self::BUTTON_ACCOUNTS_ID,
				// 不顯示字
				// key_::TITLE => __('backend.edit'),
				key_::TYPE => type::BUTTON_ICON_LINK,
				key_::INDEX => self::ID,
				key_::CLASSES_1 => [
					"btn btn-dark" => true,
				],
				key_::CLASSES_2 => [
					"fas fa-user" => true,
				],
				key_::STYLES_1 => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
			],
			//
			self::BUTTON_ADD => [
				key_::ID => self::IDENTIFY . "_" . self::BUTTON_ADD,
				key_::TITLE => __('backend.add'),
				key_::TYPE => type::BUTTON_ICON,
				// class
				key_::CLASSES => [
					self::IDENTIFY . "_" . self::BUTTON_ADD => true,
				],
				key_::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key_::CLASSES_ICON => [
					"fas fa-plus" => true,
				],
				// class
				key_::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
				key_::SETTINGS => [
					setting::LABEL => false,
				],
			],
			self::BUTTON_SELECTED_DELETE => [
				key_::ID => self::IDENTIFY . "_" . self::BUTTON_SELECTED_DELETE,
				key_::TITLE => __('backend.selected_delete'),
				key_::TYPE => type::BUTTON_ICON,
				key_::CLASSES => [
					self::IDENTIFY . "_" . self::BUTTON_SELECTED_DELETE => true,
				],
				key_::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key_::CLASSES_ICON => [
					"fas fa-minus" => true,
				],
				key_::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
				key_::SETTINGS => [
					setting::LABEL => false,
				],
			],
			self::BUTTON_ALL_SAVE => [
				key_::ID => self::IDENTIFY . "_" . self::BUTTON_ALL_SAVE,
				key_::TITLE => __('backend.all_save'),
				key_::TYPE => type::BUTTON_ICON,
				key_::CLASSES => [
					self::IDENTIFY . "_" . self::BUTTON_ALL_REFRESH => true,
				],
				key_::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key_::CLASSES_ICON => [
					"fas fa-save" => true,
				],
				key_::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
				key_::SETTINGS => [
					setting::LABEL => false,
				],
			],
			self::BUTTON_ALL_REFRESH => [
				key_::ID => self::IDENTIFY . "_" . self::BUTTON_ALL_REFRESH,
				key_::TITLE => __('backend.all_refresh'),
				key_::TYPE => type::BUTTON_ICON,
				key_::CLASSES => [
					self::IDENTIFY . "_" . self::BUTTON_ALL_REFRESH => true,
				],
				key_::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key_::CLASSES_ICON => [
					"fas fa-refresh" => true,
				],
				key_::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
				key_::SETTINGS => [
					setting::LABEL => false,
				],
			],
			//
			self::PANEL_ADD_BUTTON_ADD => [
				key_::ID => self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_ADD,
				key_::TITLE => __('backend.add'),
				key_::TYPE => type::BUTTON_ICON,
				// class
				key_::CLASSES => [
					self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_ADD => true,
				],
				key_::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key_::CLASSES_ICON => [
					"fas fa-plus" => true,
				],
				// class
				key_::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
				key_::SETTINGS => [
					setting::LABEL => false,
				],
			],
			self::PANEL_ADD_BUTTON_CANCEL => [
				key_::ID => self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_CANCEL,
				key_::TITLE => __('backend.cancel'),
				key_::TYPE => type::BUTTON_ICON,
				// class
				key_::CLASSES => [
					self::IDENTIFY . "_" . self::PANEL_ADD_BUTTON_CANCEL => true,
				],
				key_::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key_::CLASSES_ICON => [
					"fas fa-times" => true,
				],
				// class
				key_::STYLES_BUTTON => [
					"font-size" => "1.5em", 
					"color" => "Tomato",
				],
				key_::SETTINGS => [
					setting::LABEL => false,
				],
			],
			self::PANEL_DETAIL_BUTTON_CHANGE_PASSWORD => [
				key_::ID => self::IDENTIFY . "_" . self::PANEL_DETAIL_BUTTON_CHANGE_PASSWORD,
				key_::TITLE => __('backend.change_password'),
				key_::TYPE => type::BUTTON_ICON,
				// class
				key_::CLASSES => [
					self::IDENTIFY . "_" . self::PANEL_DETAIL_BUTTON_CHANGE_PASSWORD => true,
				],
				key_::CLASSES_BUTTON => [
					"btn btn-dark" => true,
				],
				key_::CLASSES_ICON => [
					"far fa-arrow-alt-circle-right" => true,
				],
				// class
				key_::STYLES_BUTTON => [
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
		// 	key_::DB_FIELD => [
		// 		key_::IS_FIELD => true,
		// 		// key_::TYPE => db_field_type::STRING,
		// 		// key_::NAME => self::ID,
		// 	],		
		// ];
		// $this->xxx($key, $item, $setting);
		// $settings_fields[$key] = &$item;
		// -------------------------------------- 

		// 因為同一個節點，這是共用設定
		$settings_db_fields_addition = [
			self::ID => [
				key_::DB_FIELD => [
					key_::IS_FIELD => true,
					// key_::TYPE => db_field_type::STRING,
					// key_::NAME => self::ID,
				],				
			],	
			self::CREATED_AT => [
				key_::DB_FIELD => [
					key_::IS_FIELD => true,
					// key_::TYPE => db_field_type::DATETIME,
					// 指定
					key_::NAME => 'createdAt', 
				],				
			],		
			self::UPDATED_AT => [
				key_::DB_FIELD => [
					key_::IS_FIELD => true,
					// key_::TYPE => db_field_type::DATETIME,
					// 指定
					key_::NAME => 'updatedAt',
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
		// 	// key_::TITLE => __('backend.detail'),
		// 	key_::TYPE => type::BUTTON_ICON,
		// 	key_::CLASSES_1 => [
		// 		"btn-secondary input-group-text" => true,
		// 	],
		// 	key_::CLASSES_2 => [
		// 		"fab fa-elementor" => true,
		// 	],
		// 	key_::STYLES => [
		// 		// 這設定label的style沒有錯
		// 		"font-size" => "1.5em", 
		// 		"color" => "Tomato",
		// 	],
		// ],
		// =============================>
		// 直接做成專屬樣式，不要搞花招
		//
		// self::BUTTON_PREPEND_DETAIL => [
		// 	// key_::TITLE => __('backend.detail'),
		// 	key_::TYPE => type::BUTTON_ICON_BOOTSTRAP,
		// 	key_::ICON => "input-group-text",
		// 	key_::BUTTON => BUTTON::SECONDARY,
		// 	// key_::STYLES => [
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
						// key_::TITLE => __('backend.item'),
						key_::TYPE => type::B_BLOCK_NORMAL,
						key_::GROUP => group::SHORT_WRAP,
						key_::ITEMS => [
							// 新增
							// self::BUTTON_ADD => [
							// 	// 因為ID重複，所以加上Top
							// 	key_::ID => self::IDENTIFY . "_" . self::B_TOP . "_" . self::BUTTON_ADD,
							// ],
							self::BUTTON_SELECTED_DELETE => [
								// 因為ID重複，所以加上Top
								key_::ID => self::IDENTIFY . "_" . self::B_TOP . "_" . self::BUTTON_SELECTED_DELETE,
							],
							self::BUTTON_ALL_SAVE => [
								// 因為ID重複，所以加上Top
								key_::ID => self::IDENTIFY . "_" . self::B_TOP . "_" . self::BUTTON_ALL_SAVE,
							],
							self::BUTTON_ALL_REFRESH => [
								// 因為ID重複，所以加上Top
								key_::ID => self::IDENTIFY . "_" . self::B_TOP . "_" . self::BUTTON_ALL_REFRESH,
							],
						],
						key_::STYLES => [
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
				// 		key_::TITLE => __('backend.item'),
				// 		key_::TYPE => type::B_BLOCK_SEPERATOR,
				// 		key_::GROUP => group::SHORT_WRAP,
				// 		key_::LINES => [
				// 			[
				// 				key_::TITLE => __('backend.item'),
				// 				key_::TYPE => type::B_BLOCK_SEPERATOR,
				// 				key_::GROUP => group::SHORT_WRAP,
				// 				key_::ITEMS => [
				// 					self::BUTTON_ADD => [
				// 						// 因為ID重複，所以加上Top
				// 						key_::ID => "index_item_top_" . self::BUTTON_ADD,
				// 					],
				// 					self::BUTTON_SELECTED_DELETE => [
				// 						// 因為ID重複，所以加上Top
				// 						key_::ID => "index_item_top_" . self::BUTTON_SELECTED_DELETE,
				// 					],
				// 				],
				// 				key_::STYLES => [
				// 				],
				// 			],
				// 		],
				// 		key_::STYLES => [
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
						key_::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . "all_select",		
						key_::TITLE => __('backend.selected'),
						key_::TYPE => type::CHECKBOX_SELECTED,
						key_::ITEMS => [
							self::CHECKBOX_SELECTED => [
								key_::STYLES_1 => [
									"margin-top" => "5px",
								],								
							],
							
						],
						key_::STYLES => [
							"width" => "45px",
						],
					],
					[
						key_::TITLE => __('backend.avatar'),
						key_::TYPE => type::LABEL,
						key_::ITEMS => [
							self::AVATAR => [
								key_::TYPE => type::IMAGE,
								key_::STYLES => [
									"margin-top" => "5px",
									"float" => "left",
								],	
							],
						],
						key_::STYLES => [
							"width" => "90px",
						],
					],
					[
						key_::TITLE => __('backend.accounts_id'),
						key_::TYPE => type::LABEL,
						key_::ITEMS => [
							self::ACCOUNTS_ID => [
								key_::TYPE => type::TEXT,
								key_::ATTRS => [
									attr::READONLY => true,
								],									
								key_::STYLES => [
									"width" => "70%", 
									"float" => "left", 
									"margin-top" => "5px",
								],
							],
							self::BUTTON_ACCOUNTS_ID => [
								key_::STYLES => [
									"font-size" => "1em", 
									"color" => "Tomato",
									"width" => "22%",
									"margin-left" => "5px",
								],
							],
						],
						key_::STYLES => [
							"width" => "90px",
						],
						
					],
					[
						key_::TITLE => __('backend.name'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::INPUT_GROUP,
						key_::ITEMS => [
							self::NAME => [					// 帳號不可以改
								key_::TITLE => __('backend.name'),
								key_::TYPE => type::TEXT,
								key_::STYLES => [
									"margin-top" => "5px",
								],
							],
							self::BUTTON_PREPEND_DETAIL => [
								// key_::TITLE => __('backend.detail'),
								key_::TYPE => type::BUTTON_ICON,
								key_::CLASSES_BUTTON => [
									"btn-secondary input-group-text" => true,
								],
								key_::CLASSES_ICON => [
									"fab fa-elementor" => true,
								],
								key_::STYLES_BUTTON => [
									// 這設定label的style沒有錯
									"font-size" => "1.5em", 
									"color" => "Tomato",
									"margin-top" => "5px",
								],
							],
							self::PANEL_DETAIL => [
								key_::TITLE => __('backend.detail'),
								key_::TYPE => type::PANEL,
								key_::ITEMS => [],
								key_::USE_ => use_::B_BLOCK,
								key_::CONTENT => [
									// 因為前端沒很複雜，這裡簡單寫
									self::B_PANEL_DETAIL
								],
							],
						],
						key_::STYLES => [
							"width" => "150px",
						],
					],
					[
						key_::TITLE => __('backend.image'),
						key_::TYPE => type::LABEL,
						key_::ITEMS => [
							self::IMAGE => [
								key_::TYPE => type::IMAGE,
							],
							self::UPLOAD => [
								key_::ID => self::IDENTIFY . "_" . self::IMAGE . "_" . self::UPLOAD,
								key_::TYPE => type::UPLOAD,
								key_::STYLES => [
									"margin-top" => "5px", 
								],
								key_::URL => "",					// table url + path
								key_::PATH => "",				// table path + path
								// 二次關聯，請在設定完後寫關聯規則，大概作法為，上傳成功後，某個元件的設定(array) => 某個元件的設定(array)
								// 因為是列表，所以只要把需要的id存下來，找到index，就可以知道要怎樣處理了
								// 區塊的地方，因為已知對應，所以也知道要怎樣處理
								// key_::UPLOAD_FILE => [
								// 	key_::SUCCESS => [
								// 		[self::B_MAIN, self::UPLOAD] => [
								// 			[self::B_MAIN, self::IMAGE],
								// 		],
								// 	],
								// ],
							],
						],
						key_::STYLES => [
							"width" => "90px",
							"margin-top" => "5px",
						],
					],
					[
						key_::TITLE => __('backend.operator'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::INPUT_GROUP,
						key_::ITEMS => [
							self::BUTTON_DELETE => [								
								key_::STYLES => [
									"font-size" => "1em", 
									"color" => "Tomato",
									"width" => "55px",
									"margin-right" => "0px", 
								],
								key_::STYLES_1 => [
									"margin-right" => "0px", 
									"width" => "50px",
								],
								key_::STYLES_2 => [
									"margin-right" => "0px", 
								],
							],
							self::BUTTON_EDIT => [
								key_::STYLES => [
									"font-size" => "1em", 
									"color" => "Tomato",
									"width" => "55px",
									"margin-right" => "0px", 
								],
								key_::STYLES_1 => [
									"margin-right" => "0px", 
									"width" => "50px",
								],
								key_::STYLES_2 => [
									"margin-right" => "0px", 
								],
							],
							
						],
						key_::STYLES => [
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
						// key_::TITLE => __('backend.item'),
						key_::TYPE => type::B_BLOCK_NORMAL,
						key_::GROUP => group::SHORT_WRAP,
						key_::ITEMS => [
							self::BUTTON_SELECTED_DELETE => [
								// 因為ID重複，所以加上Top
								key_::ID => self::IDENTIFY . "_" . self::B_BOTTOM . "_" . self::BUTTON_SELECTED_DELETE,
								key_::SETTINGS => [
									setting::LABEL => false,
								],
							],
							self::BUTTON_ALL_SAVE => [
								// 因為ID重複，所以加上Top
								key_::ID => self::IDENTIFY . "_" . self::B_BOTTOM . "_" . self::BUTTON_ALL_SAVE,
								key_::SETTINGS => [
									setting::LABEL => false,
								],
							],
						],
						key_::STYLES => [
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
         
                // --------------------------------------------------- 
				// 細節面板 - 多筆 - table附加面板
				// --------------------------------------------------- 
				// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				// --------------------------------------------------- 
                self::B_PANEL_DETAIL => [
					// 不一定應該在這邊提供更改密碼，這裡是為了打架構測試所以才加的
					[
						key_::TITLE => __('backend.avatar'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::AVATAR => [
								key_::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::AVATAR,
								key_::TYPE => type::IMAGE,
								key_::SETTINGS => [
									setting::LABEL => false,
								],
							],
							
						],
						key_::STYLES => [
						],
					],
					[
						key_::TITLE => __('backend.nickname'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::NICKNAME => [
								key_::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::NICKNAME,
							],
						],
						key_::STYLES => [
						],
					],
					[
						key_::TITLE => __('backend.url'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::URL => [
								key_::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::URL,
							],
						],
						key_::STYLES => [
						],
					],
					[
						key_::TITLE => __('backend.phone'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::NAME => [
								key_::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::PHONE,
							],
						],
						key_::STYLES => [
						],
					],	
					// [
					// 	key_::TITLE => __('backend.image'),
					// 	key_::TYPE => type::LABEL,
					// 	key_::GROUP => group::FORM_GROUP_ROW,
					// 	key_::ITEMS => [
					// 		self::IMAGE => [
					// 			key_::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::IMAGE,
					// 			key_::TYPE => type::IMAGE_UPLOAD_RE,
					// 		],
					// 	],
					// 	key_::STYLES => [
					// 	],
					// ],				
					[
						key_::TITLE => __('backend.created_at'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::CREATED_AT => [
								key_::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::CREATED_AT,
							],
						],
						key_::STYLES => [
						],
					],
					[
						key_::TITLE => __('backend.updated_at'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::UPDATED_AT => [
								key_::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::UPDATED_AT,
							],
						],
						key_::STYLES => [
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
						key_::TITLE => __('backend.id'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::ID => [
								key_::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::ID,
								key_::DB_FIELD => [
									key_::IS_FIELD => true,
								],
								key_::TITLE => __('backend.id'),
								key_::TYPE => type::TEXT,
								key_::ACTIONS => [
									// action::AUTO_UPDATE => true,
								],	
								key_::ATTRS => [
									attr::READONLY => true,
								],	
							],
						],
						key_::STYLES => [
						],
					],
					[
						key_::TITLE => __('backend.name'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::NAME => [
								key_::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::NAME,
								key_::DB_FIELD => [
									key_::IS_FIELD => true,
								],
								key_::TITLE => __('backend.name'),
								key_::TYPE => type::TEXT,
								key_::ACTIONS => [
									// action::AUTO_UPDATE => true,
								],	
								
							],
						],
						key_::STYLES => [
						],
					],
					[
						key_::TITLE => __('backend.nickname'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::NICKNAME => [
								key_::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::NICKNAME,
								key_::DB_FIELD => [
									key_::IS_FIELD => true,
								],
								key_::TITLE => __('backend.nickname'),
								key_::TYPE => type::TEXT,
								key_::ACTIONS => [
									// action::AUTO_UPDATE => true,
								],	
								
							],
						],
						key_::STYLES => [
						],
					],
					[
						key_::TITLE => __('backend.avatar'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::AVATAR => [
								key_::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::AVATAR,
								key_::TYPE => type::TEXT,
								
							],
							self::UPLOAD => [
								key_::ID => self::IDENTIFY . "_" . self::IMAGE . "_" . self::UPLOAD,
								key_::TYPE => type::UPLOAD,
								key_::STYLES => [
									"margin-top" => "5px", 
								],
								key_::SETTINGS => [
									setting::LABEL => false,
								],
								key_::URL => "",					// table url + path
								key_::PATH => "",				// table path + path
				
							],
						],
						key_::STYLES => [
						],
					],
					[
						key_::TITLE => __('backend.avatar'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::AVATAR => [
								key_::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::AVATAR,
								key_::TYPE => type::IMAGE,
								key_::SETTINGS => [
									setting::LABEL => false,
								], 
								
							],
						],
						key_::STYLES => [
						],
					],
					[
						key_::TITLE => __('backend.image'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::IMAGE => [
								key_::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::IMAGE,
								key_::TYPE => type::TEXT,
								
							],
							self::UPLOAD => [
								key_::ID => self::IDENTIFY . "_" . self::IMAGE . "_" . self::UPLOAD,
								key_::TYPE => type::UPLOAD,
								key_::STYLES => [
									"margin-top" => "5px", 
								],
								key_::SETTINGS => [
									setting::LABEL => false,
								],
								key_::URL => "",					// table url + path
								key_::PATH => "",				// table path + path
				
							],
						],
						key_::STYLES => [
						],
					],
					[
						key_::TITLE => __('backend.image'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::IMAGE => [
								key_::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::IMAGE,
								key_::DB_FIELD => [
									key_::IS_FIELD => true,
								],
								key_::TITLE => __('backend.image'),
								key_::TYPE => type::IMAGE,
								key_::SETTINGS => [
									setting::LABEL => false,
								],
								
							],
						],
						key_::STYLES => [
						],
					],
					[
						key_::TITLE => __('backend.url'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::URL => [
								key_::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::URL,
								key_::DB_FIELD => [
									key_::IS_FIELD => true,
								],
								key_::TITLE => __('backend.url'),
								key_::TYPE => type::TEXT,
								key_::ACTIONS => [
									// action::AUTO_UPDATE => true,
								],	
							],
						],
						key_::STYLES => [
						],
					],
					[
						key_::TITLE => __('backend.phone'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::PHONE => [
								key_::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::PHONE,
								key_::DB_FIELD => [
									key_::IS_FIELD => true,
								],
								key_::TITLE => __('backend.phone'),
								key_::TYPE => type::TEXT,
								key_::ACTIONS => [
									// action::AUTO_UPDATE => true,
								],	
							],
						],
						key_::STYLES => [
						],
					],
					[
						key_::TITLE => __('backend.verify_token'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::VERIFY_TOKEN => [
								key_::ID => self::IDENTIFY . "_" . self::B_MAIN . "_" . self::VERIFY_TOKEN,
								key_::DB_FIELD => [
									key_::IS_FIELD => true,
								],
								key_::TITLE => __('backend.verify_token'),
								key_::TYPE => type::TEXT,
								key_::ACTIONS => [
									// action::AUTO_UPDATE => true,
								],	
							],
						],
						key_::STYLES => [
						],
					],
					[
						key_::TITLE => __('backend.created_at'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::CREATED_AT => [
								key_::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::CREATED_AT,
							],
						],
						key_::STYLES => [
						],
					],
					[
						key_::TITLE => __('backend.updated_at'),
						key_::TYPE => type::LABEL,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::UPDATED_AT => [
								key_::ID => self::IDENTIFY . "_" . self::B_PANEL_DETAIL . "_" . self::UPDATED_AT,
							],
						],
						key_::STYLES => [
						],
					],
					[
						// key_::TITLE => __('backend.item'),
						key_::TYPE => type::B_BLOCK_SHORT_WRAP,
						key_::GROUP => group::FORM_GROUP_ROW,
						key_::ITEMS => [
							self::BUTTON_ALL_SAVE => [
								// 因為ID重複，所以加上Top
								key_::ID => self::IDENTIFY . "_" . self::BUTTON_ALL_SAVE,
								key_::SETTINGS => [
									setting::LABEL => false,
								],
							],
							self::BUTTON_ALL_REFRESH => [
								// 因為ID重複，所以加上Top
								key_::ID => self::IDENTIFY . "_" . self::BUTTON_ALL_REFRESH,
								key_::SETTINGS => [
									setting::LABEL => false,
								],
							],
							
						],
						key_::STYLES => [
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


