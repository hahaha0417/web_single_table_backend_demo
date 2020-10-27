<?php

namespace hahaha\front;

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
use hahaha\define\hahaha_define_base_key as key;
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
*/
class hahaha_table_accounts
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
		// 基礎欄位設定
		// 使用上，只要self::ID => []，這樣目的是使的可以覆蓋這裡的預設值，基本上有預設的，要調整就必須覆蓋
		$Fields = [
			self::ID => [
				key::TYPE => type::TEXT,
				key::TAGS => [
					tag::DISABLED => true,
				],
			],
			self::ACCOUNT => [					// 帳號不可以改
				key::TYPE => type::TEXT,
				key::TAGS => [
					tag::DISABLED => true,
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
				key::TYPE => type::RADIOBOX,
			],
			self::STATUS => [
				key::TYPE => type::TEXT,
				key::ACTIONS => [
					action::AUTO_UPDATE => true,
				],	
			],
			self::CREATED_AT => [
				key::TYPE => type::TEXT,
				key::TAGS => [
					tag::DISABLED => true,
				],
			],
			self::UPDATED_AT => [
				key::TYPE => type::TEXT,
				key::TAGS => [
					tag::DISABLED => true,
				],
			],
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
					self::ID => [
						key::TYPE => type::TEXT,
						key::TAGS => [
							tag::DISABLED => true,
						], 
					],
					self::ACCOUNT => [					// 帳號不可以改
						key::TYPE => type::TEXT,
						key::TAGS => [
							tag::DISABLED => true,
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
						key::TYPE => type::RADIOBOX,
					],
					self::STATUS => [
						key::TYPE => type::TEXT,
						key::ACTIONS => [
							action::AUTO_UPDATE => true,
						],	
					],
					self::CREATED_AT => [
						key::TYPE => type::TEXT,
						key::TAGS => [
							tag::DISABLED => true,
						],
					],
					self::UPDATED_AT => [
						key::TYPE => type::TEXT,
						key::TAGS => [
							tag::DISABLED => true,
						],
					],
                ],
                // 
                // detail panel
                "detail" => [
					self::ID => [
						key::TYPE => type::TEXT,
						key::TAGS => [
							tag::DISABLED => true,
						],
					],
					self::ACCOUNT => [					// 帳號不可以改
						key::TYPE => type::TEXT,
						key::TAGS => [
							tag::DISABLED => true,
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
						key::TYPE => type::RADIOBOX,
					],
					self::STATUS => [
						key::TYPE => type::TEXT,
						key::ACTIONS => [
							action::AUTO_UPDATE => true,
						],	
					],
					self::CREATED_AT => [
						key::TYPE => type::TEXT,
						key::TAGS => [
							tag::DISABLED => true,
						],
					],
					self::UPDATED_AT => [
						key::TYPE => type::TEXT,
						key::TAGS => [
							tag::DISABLED => true,
						],
					],
                ],
                // new panel
                "new" => [
					self::ID => [
						key::TYPE => type::TEXT,
						key::TAGS => [
							tag::DISABLED => true,
						],
					],
					self::ACCOUNT => [					// 帳號不可以改
						key::TYPE => type::TEXT,
						key::TAGS => [
							tag::DISABLED => true,
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
						key::TYPE => type::RADIOBOX,
					],
					self::STATUS => [
						key::TYPE => type::TEXT,
						key::ACTIONS => [
							action::AUTO_UPDATE => true,
						],	
					],
					self::CREATED_AT => [
						key::TYPE => type::TEXT,
						key::TAGS => [
							tag::DISABLED => true,
						],
					],
					self::UPDATED_AT => [
						key::TYPE => type::TEXT,
						key::TAGS => [
							tag::DISABLED => true,
						],
					],
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
				self::ID => [
					key::TYPE => type::TEXT,
					key::TAGS => [
						tag::DISABLED => true,
					],
				],
				self::ACCOUNT => [					// 帳號不可以改
					key::TYPE => type::TEXT,
					key::TAGS => [
						tag::DISABLED => true,
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
					key::TYPE => type::RADIOBOX,
				],
				self::STATUS => [
					key::TYPE => type::TEXT,
					key::ACTIONS => [
						action::AUTO_UPDATE => true,
					],	
				],
				self::CREATED_AT => [
					key::TYPE => type::TEXT,
					key::TAGS => [
						tag::DISABLED => true,
					],
				],
				self::UPDATED_AT => [
					key::TYPE => type::TEXT,
					key::TAGS => [
						tag::DISABLED => true,
					],
				],
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
				self::ACCOUNT => [					// 帳號不可以改
					key::TYPE => type::TEXT,
					key::TAGS => [
						tag::DISABLED => true,
					],
				],
				self::EMAIL => [
					key::TYPE => type::TEXT,
					key::VALIDATE => validate::EMAIL,				
				],
				self::GENDER => [
					key::TYPE => type::RADIOBOX,
				],
				self::STATUS => [
					key::TYPE => type::TEXT,
					key::ACTIONS => [
						action::AUTO_UPDATE => true,
					],	
				],
			],
        ];
        
	}

}


