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
 * 特例(2) : ! Intelephense:analysis -- 這樣會導doctrine orm:generate-entities不能解析 
 * ! Intelephense:analysis  \backend\alias\hahaha_alias_table_define::Alias("hahaha\\backend\\");
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
*/
class hahaha_setting_index
{	
	use hahaha_instance_trait;

	/*
	setting
	*/
	public $Settings = [];

	/*
	導航欄
	必須初始化，不然下面不能用
	*/
	public $Nav = [];

	/*
	右方清單
	必須初始化，不然下面不能用
	*/
	public $Menu = [];

	/*
	尾端
	必須初始化，不然下面不能用
	*/
	public $Tail = [];

	function __construct()
	{
		$this->Initial();
	}
	
	public function Initial()
	{
		// 可以給其他人設定
		$this->Settings($this->Settings);
		$this->Nav($this->Nav);
		$this->Menu($this->Menu);
		$this->Tail($this->Tail);
	}

	/*
	setting
	因為未來要移植php hahaha framework，所以不放在config
	*/
	public function Settings(&$Settings)
	{
		// 因為同一個節點，這是共用設定
		$Settings = [
			key_::DEFAULT => [
				// 基於彈性，不一定要全部綁一起，如怕亂，請提供設定集，寫設定集的要提供該設定下的使用正常
				// iFrame有Cross Origin問題請小心，我有將他複製到所有專案下的/public/assets/cross_origin/
				// 因此所以站都應該讀的到(都要有該資料夾)
				// https://iandays.com/2018/09/23/postmessage/
				"index" => \p_ha::V_Url("cover"),
				// 這一定要實體的
				"page" => \p_ha::V_Url("page/cover"),
			],
		];
	}

	/*
	導航欄
	*/
	public function Nav(&$Nav)
	{
		$Nav = [

		];
	}

	/*
	右方清單
	- type 項目
	--- 'type' => 'label', 標籤
	--- 'type' => type::ITEM, 項目
	--- 'type' => type::MENU, 清單
	- link 項目
	--- 'target' => 'web' 直接連結
	--- 'target' => '_self' 站內
	--- 'target' => 'index_content_frame',

	// ----------------------------------------- 
	使用方法
	// -----------------------------------------
	沒規定要怎樣擺，因為有多站點，因此我統一收在Table裡面
	額外項目有
	DashBoard X 1
	Fast Link X 3
	Tools X 1
	Index X 1
	Other X 3
	Global X 1
	Label X 3

	基本上畫面也差不多滿了
	// ----------------------------------------- 
	其他用法
	// ----------------------------------------- 
	// 'Main' => [
	// 	// 標籤，可以顯示，目前為隱藏(要查code，應該是改css)
	// 	'type' => 'label',
	// 	'background' => 'rgba(190,155,90,0.5)',
	// 	'active' => 'true',
	// ],

	// 'ABC' => [
	// 	// box，要查，忘了用途
	// 	'type' => 'box',
	// 	// 'url' => '/',
	// 	'target' => '_self',
	// 	'icon' => "fa-list",
	// 	'active' => 'false',
	// 	'background' => 'rgba(2550,155,190,0.5)',
	// 	'mini' => 'ABC',
	// 	// 'icon' => "fa-angle-double-down",
	// 	// 'icon' => "fa-angle-double-down",
	// 	// 'icon' => "fa-angle-double-down",
	// 	// 'icon' => "fa-angle-double-down",
	// 	// 'icon' => "fa-angle-double-down",
	// 	// 'icon' => "fa-angle-double-down",
	// 	// type::MENU => array(

	// 	// ),
	// 	// 'menu2' => array(

	// 	// ),
	// ],

	// 'Dashboard' => [
	// 	// 主控版	
	//     'type' => type::ITEM,
	//     // 'url' => '/',
	//     'target' => '_self',
	//     'icon' => "fa-desktop",
	//     'active' => 'false',
	//     'background' => 'rgba(190,155,255,0.5)',
	//     'mini' => 'Board',
	//     type::MENU => [
	//     ],
	// ],

	// 'Index' => array(
	// 	// 快捷清單
	//     'type' => type::MENU,
	//     'url' => '/backend/index',
	//     'target' => 'index_content_frame',
	//     'icon' => "fa-home",
	//     'active' => 'false',
	//     'background' => 'rgba(90,255,150,0.5)',
	//     'mini' => 'Index',
	//     type::MENU => array(
	//         'Index' => [
	//             'type' => type::ITEM,
	//             'url' => 'backend/index/index',
	//             'target' => 'index_content_frame',
	//             'background' => 'rgba(90,255,150,0.5)',
	//             'icon' => 'fa-angle-double-down',
	//         ],
	//     ),
	// ),

	// 'Index' => [
	// 	// 首頁
	// 	'type' => type::ITEM,
	// 	'url' => 'backend/index/index',
	// 	'target' => 'index_content_frame',
	// 	'icon' => "fa-info",
	// 	'active' => 'false',
	// 	'background' => 'rgba(90,255,150,0.5)',
	// 	'mini' => 'Index',
	// ],

	// 'Class' => [
	// 	// 導覽頁
	// 	'type' => type::MENU,
	// 	'url' => null,
	// 	'target' => '_self',
	// 	'icon' => 'fa-tags',
	// 	'active' => 'false',
	// 	'background' => 'rgba(150,255,255,0.5)',
	// 	'mini' => 'Class',
	// 	type::MENU => [
	// 		'All' => [
	// 			'type' => type::ITEM,
	// 			'url' => 'backend/class/all',
	// 			'target' => 'index_content_frame',
	// 			'background' => '',
	// 			//'icon' => 'fa-angle-double-down',
	// 			// dir
	// 		],
	// 	],
	// ],

	// 'Global' => [
	//	全域設定	
	//     'type' => type::MENU,
	//     'url' => '/',
	//     'target' => '_self',
	//     //'icon' => "fa-angle-double-down",
	//     type::MENU => array(
	//         // other
	//         'Module' => [
	//             'type' => type::ITEM,
	//             'url' => '/map/global/module',
	//             'target' => 'index_content_frame',
	//             'background' => '',
	//             //'icon' => 'fa-angle-double-down',
	//             // dir
	//             // type::MENU => array(
	//             //     'Root' => [
	//             //         'type' => type::ITEM,
	//             //         'url' => '#',
	//             //         'target' => 'frame',
	//             //         //'icon' => 'fa-angle-double-down',
	//             //         // dir
	//             //     ],
	//             //     'Home' => [
	//             //         'type' => type::ITEM,
	//             //         'url' => '#',
	//             //         'target' => 'frame',
	//             //         //'icon' => 'fa-angle-double-down',
	//             //         // page
	//             //     ],
	//             //     'Product' => [
	//             //         'type' => type::ITEM,
	//             //         'url' => '#',
	//             //         'target' => 'frame',
	//             //         //'icon' => "fa-angle-double-down",
	//             //         // node
	//             //     ],
	//             //     'Device' => [
	//             //         'type' => type::ITEM,
	//             //         'url' => '#',
	//             //         'target' => 'frame',
	//             //         //'icon' => 'fa-angle-double-down',
	//             //         // node
	//             //     ],
	//             // ),
	//         ],
	//         'Global' => [
	//             'type' => type::ITEM,
	//             'url' => '/map/global/global',
	//             'target' => 'index_content_frame',
	//             'background' => '',
	//             //'icon' => 'fa-angle-double-down',
	//             // page
	//         ],
	//     ),
	// ],
	*/
	public function Menu(&$Menu)
	{
		// front
		$front_settings_ = \hahaha\front\hahaha_setting_table::Instance();		
		$front_tables_ = &$front_settings_->Tables[$front_settings_->Settings['default']['table']];
		// backend
		$backend_settings_ = \hahaha\backend\hahaha_setting_table::Instance();
		$backend_tables_ = &$backend_settings_->Tables[$backend_settings_->Settings['default']['table']];

		// --------------------------------------------- 
		/*
		'url' => "/backend/tool/table_field",
		注意 : url page不是這樣改'url' => "/backend/page/tool/table_field",
		因為是iframe設計，所以url不能load page，會變成遞迴(自己呼叫自己)
		
		基本上切換原則上用cookie記(因為server不需要知道client端怎樣操作頁面，不重要的存在cookie，何況還可以不同分頁紀錄不同操作)，減低server負擔(server可以讀到cookie)
		
		*/
		// --------------------------------------------- 
		$Menu = [
			__('backend.index.menu.home') => [
				key_::NAME => 'home',
				key_::TYPE => type::ITEM,
				key_::URL => \p_ha::Self_Url('/'),
				key_::TARGET => target::SELF,
				key_::ICON => "fa-home",
				key_::ACTIVE => 'false',
				key_::BACKGROUND => 'rgba(90,255,150,0.5)',
				key_::MINI => 'Home',				
			],		
			__('backend.cover') => [
				key_::NAME => 'cover',
				key_::TYPE => type::ITEM,
				key_::URL => \p_ha::V_Url('cover'),
				key_::TARGET => 'index_content_frame',
				key_::ICON => "fa-desktop",
				key_::ACTIVE => 'false',
				key_::BACKGROUND => 'rgba(90,255,150,0.5)',
				key_::MINI => 'Note',
			],
			__('backend.index.menu.note') => [
				key_::NAME => 'note',
				key_::TYPE => type::ITEM,
				key_::URL => \p_ha::V_Url('note'),
				key_::TARGET => 'index_content_frame',
				key_::ICON => "fa-sticky-note",
				key_::ACTIVE => 'false',
				key_::BACKGROUND => 'rgba(90,255,150,0.5)',
				key_::MINI => 'Note',
			],
			__('backend.index.menu.table') => [
				// 目前，最多四層，如果不夠用串的
				// ex.
				// Front
				// -- Accounts
				// 第一層
				key_::NAME => 'table',
				// ---------------------------------- 
				key_::PAGE => 'table',
				// ---------------------------------- 
				key_::TYPE => type::MENU,
				key_::URL => null,
				key_::TARGET => target::SELF,
				key_::ICON => 'fa-envelope',
				key_::ACTIVE => 'false',
				key_::BACKGROUND => 'rgba(255,255,0,0.5)',
				key_::MINI => __('backend.index.menu.table'),
				key_::MENU => [
					// 第二層
					// __('backend.index.menu.front') => [
					// 	'name' => 'front',
					// 	'type' => type::MENU,
					// 	'url' => null,
					// 	'target' => '_self',
					// 	//'icon' => 'fa-angle-double-down',
					// 	type::MENU => [
					// 		// 第三層
					// 		__('backend.index.menu.account') => [
					// 			'name' => 'front_account',
					// 			'type' => type::MENU,
					// 			'url' => null,
					// 			'target' => 'index_content_frame',
					// 			'background' => '',								
					// 			type::MENU => [
					// 				// 第四層
					// 				__('backend.index.menu.list') => [
					// 					'name' => 'front_account_list',
					// 					'type' => type::ITEM,
					// 					'url' => \p_ha::V_Url('table/front/accounts/list'),
					// 					'target' => 'index_content_frame',
					// 					'background' => '',
					// 				],
					// 				__('backend.index.menu.detail') => [
					// 					'name' => 'front_account_detail',
					// 					'type' => type::ITEM,
					// 					'url' => \p_ha::V_Url('table/front/accounts/detail'),
					// 					'target' => 'index_content_frame',
					// 					'background' => '',
					// 				],
					// 				__('backend.index.menu.login_record') => [
					// 					'name' => 'front_account_login_record',
					// 					'type' => type::ITEM,
					// 					'url' => \p_ha::V_Url('table/front/accounts/login_record'),
					// 					'target' => 'index_content_frame',
					// 					'background' => '',
					// 				],
					// 				'| --  ' . __('backend.index.menu.relation') => [
					// 					'name' => 'front_account_relation',
					// 					'type' => type::ITEM,
					// 					'url' => \p_ha::V_Url('table/front/accounts/relation'),
					// 					'target' => 'index_content_frame',
					// 					'background' => '',
					// 				],
					// 			],
					// 		],
					// 		__('backend.index.menu.product') => [
					// 			'name' => 'product',
					// 			'type' => type::MENU,
					// 			'url' => null,
					// 			'target' => 'index_content_frame',
					// 			'background' => '',								
					// 			type::MENU => [
					// 				// node
					// 				__('backend.index.menu.list') => [
					// 					'name' => 'front_product_list',
					// 					'type' => type::ITEM,
					// 					'url' => \p_ha::V_Url('table/front/products/list'),
					// 					'target' => 'index_content_frame',
					// 					'background' => '',
					// 				],
					// 			],
					// 		],
					// 		__('backend.index.menu.relation') => [
					// 			'name' => 'front_relation',
					// 			'type' => type::MENU,
					// 			'url' => null,
					// 			'target' => 'index_content_frame',
					// 			'background' => '',								
					// 			type::MENU => [
					// 				// node									
					// 				__('backend.index.menu.account') . ' X ' . __('backend.index.menu.product') . ' - ' . __('backend.index.menu.like') => [
					// 					'name' => 'front_account_product_like',
					// 					'type' => type::ITEM,
					// 					'url' => \p_ha::V_Url('table/front/relation/accounts_products_like'),
					// 					'target' => 'index_content_frame',
					// 					'background' => '',
					// 				],
					// 			],
					// 		],
					// 	],
					// ],
					__('backend.index.menu.backend') => [
						key_::NAME => 'backend',
						key_::TYPE => type::MENU,
						key_::URL => '/',
						key_::TARGET => target::SELF,
						//key_::ICON => 'fa-angle-double-down',
						key_::MENU => [
							// 第三層
							__('backend.index.menu.account') => [
								key_::NAME => 'backend_accouts',
								key_::TYPE => type::MENU,
								key_::URL => null,
								key_::TARGET => 'index_content_frame',
								key_::BACKGROUND => '',								
								key_::MENU => [
									// 第四層
									__('backend.index.menu.list') => [
										key_::NAME => 'backend_accounts_list',
										key_::TYPE => type::ITEM,
										key_::URL => $backend_tables_['accounts']['url'],
										key_::TARGET => 'index_content_frame',
										key_::BACKGROUND => '',
									],
									__('backend.index.menu.detail') => [
										key_::NAME => 'backend_accounts_detail',
										key_::TYPE => type::ITEM,
										key_::URL => $backend_tables_['accounts_detail']['url'],
										key_::TARGET => 'index_content_frame',
										key_::BACKGROUND => '',
									],
									__('backend.index.menu.login_record') => [
										key_::NAME => 'backend_accounts_login_record',
										key_::TYPE => type::ITEM,
										key_::URL => $backend_tables_['accounts_login_records']['url'],
										key_::TARGET => 'index_content_frame',
										key_::BACKGROUND => '',
									],
									'| --  ' . __('backend.index.menu.relation') => [
										key_::NAME => 'backend_accoutns_account_relation',
										key_::TYPE => type::ITEM,
										key_::URL => $backend_tables_['accounts_relations']['url'],
										key_::TARGET => 'index_content_frame',
										key_::BACKGROUND => '',
									],
								],
							],
						],
					],
				],
			],
			__('backend.default_page') => [
				key_::NAME => 'default_page',
				key_::TYPE => type::ITEM,
				// 請注意settings初始化順序
				key_::URL => $this->Settings['default']['page'],
				key_::TARGET => target::SELF,
				key_::ICON => "fa-desktop",
				key_::ACTIVE => 'false',
				key_::BACKGROUND => 'rgba(90,255,150,0.5)',
				key_::MINI => 'Note',
			],
			__('backend.tool') => [
				// 目前，最多四層，如果不夠用串的
				// ex.
				// Front
				// -- Accounts
				// 第一層
				key_::NAME => 'tool',
				// ---------------------------------- 
				key_::PAGE => 'class',
				// ---------------------------------- 
				key_::TYPE => type::MENU,
				key_::URL => null,
				key_::TARGET => target::SELF,
				key_::ICON => 'fa-envelope',
				key_::ACTIVE => 'false',
				key_::BACKGROUND => 'rgba(255,255,0,0.5)',
				key_::MINI => __('backend.index.menu.table'),
				key_::MENU => [		
					__('backend.table_field') => [
						// 'name' => 'table_field',
						key_::NAME => 'table_field',
						key_::TYPE => type::ITEM,
						key_::URL => "/backend/tool/table_field",
						key_::TARGET => 'index_content_frame',
						key_::BACKGROUND => '',
					],			
					// __('backend.index.menu.backend') => [
					// 	'name' => 'backend',
					// 	'type' => type::MENU,
					// 	'url' => '/',
					// 	'target' => '_self',
					// 	//'icon' => 'fa-angle-double-down',
					// 	type::MENU => [
					// 		// // 第三層
					// 		// __('backend.index.menu.account') => [
					// 		// 	'name' => 'backend_accouts',
					// 		// 	'type' => type::MENU,
					// 		// 	'url' => null,
					// 		// 	'target' => 'index_content_frame',
					// 		// 	'background' => '',								
					// 		// 	type::MENU => [
					// 		// 		// 第四層
					// 		// 		__('backend.index.menu.list') => [
					// 		// 			'name' => 'backend_accounts_list',
					// 		// 			'type' => type::ITEM,
					// 		// 			'url' => $backend_tables_['accounts']['url'],
					// 		// 			'target' => 'index_content_frame',
					// 		// 			'background' => '',
					// 		// 		],
					// 		// 		__('backend.index.menu.detail') => [
					// 		// 			'name' => 'backend_accounts_detail',
					// 		// 			'type' => type::ITEM,
					// 		// 			'url' => $backend_tables_['accounts_detail']['url'],
					// 		// 			'target' => 'index_content_frame',
					// 		// 			'background' => '',
					// 		// 		],
					// 		// 		__('backend.index.menu.login_record') => [
					// 		// 			'name' => 'backend_accounts_login_record',
					// 		// 			'type' => type::ITEM,
					// 		// 			'url' => $backend_tables_['accounts_login_records']['url'],
					// 		// 			'target' => 'index_content_frame',
					// 		// 			'background' => '',
					// 		// 		],
					// 		// 		'| --  ' . __('backend.index.menu.relation') => [
					// 		// 			'name' => 'backend_accoutns_account_relation',
					// 		// 			'type' => type::ITEM,
					// 		// 			'url' => $backend_tables_['accounts_relations']['url'],
					// 		// 			'target' => 'index_content_frame',
					// 		// 			'background' => '',
					// 		// 		],
					// 		// 	],
					// 		// ],
					// 	],
					// ],
					
				],
			],
		];
	}

	/*
	尾端
	*/
	public function Tail(&$Tail)
	{
		$Tail = [

		];
	}
}


