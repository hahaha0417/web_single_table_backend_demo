<?php

namespace hahaha\backend;

use hahahasublib\hahaha_instance_trait;

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
			"default" => [
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
	--- 'type' => 'item', 項目
	--- 'type' => 'menu', 清單
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
	// 	// 'menu' => array(

	// 	// ),
	// 	// 'menu2' => array(

	// 	// ),
	// ],

	// 'Dashboard' => [
	// 	// 主控版	
	//     'type' => 'item',
	//     // 'url' => '/',
	//     'target' => '_self',
	//     'icon' => "fa-desktop",
	//     'active' => 'false',
	//     'background' => 'rgba(190,155,255,0.5)',
	//     'mini' => 'Board',
	//     'menu' => [
	//     ],
	// ],

	// 'Index' => array(
	// 	// 快捷清單
	//     'type' => 'menu',
	//     'url' => '/backend/index',
	//     'target' => 'index_content_frame',
	//     'icon' => "fa-home",
	//     'active' => 'false',
	//     'background' => 'rgba(90,255,150,0.5)',
	//     'mini' => 'Index',
	//     'menu' => array(
	//         'Index' => [
	//             'type' => 'item',
	//             'url' => 'backend/index/index',
	//             'target' => 'index_content_frame',
	//             'background' => 'rgba(90,255,150,0.5)',
	//             'icon' => 'fa-angle-double-down',
	//         ],
	//     ),
	// ),

	// 'Index' => [
	// 	// 首頁
	// 	'type' => 'item',
	// 	'url' => 'backend/index/index',
	// 	'target' => 'index_content_frame',
	// 	'icon' => "fa-info",
	// 	'active' => 'false',
	// 	'background' => 'rgba(90,255,150,0.5)',
	// 	'mini' => 'Index',
	// ],

	// 'Class' => [
	// 	// 導覽頁
	// 	'type' => 'menu',
	// 	'url' => null,
	// 	'target' => '_self',
	// 	'icon' => 'fa-tags',
	// 	'active' => 'false',
	// 	'background' => 'rgba(150,255,255,0.5)',
	// 	'mini' => 'Class',
	// 	'menu' => [
	// 		'All' => [
	// 			'type' => 'item',
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
	//     'type' => 'menu',
	//     'url' => '/',
	//     'target' => '_self',
	//     //'icon' => "fa-angle-double-down",
	//     'menu' => array(
	//         // other
	//         'Module' => [
	//             'type' => 'item',
	//             'url' => '/map/global/module',
	//             'target' => 'index_content_frame',
	//             'background' => '',
	//             //'icon' => 'fa-angle-double-down',
	//             // dir
	//             // 'menu' => array(
	//             //     'Root' => [
	//             //         'type' => 'item',
	//             //         'url' => '#',
	//             //         'target' => 'frame',
	//             //         //'icon' => 'fa-angle-double-down',
	//             //         // dir
	//             //     ],
	//             //     'Home' => [
	//             //         'type' => 'item',
	//             //         'url' => '#',
	//             //         'target' => 'frame',
	//             //         //'icon' => 'fa-angle-double-down',
	//             //         // page
	//             //     ],
	//             //     'Product' => [
	//             //         'type' => 'item',
	//             //         'url' => '#',
	//             //         'target' => 'frame',
	//             //         //'icon' => "fa-angle-double-down",
	//             //         // node
	//             //     ],
	//             //     'Device' => [
	//             //         'type' => 'item',
	//             //         'url' => '#',
	//             //         'target' => 'frame',
	//             //         //'icon' => 'fa-angle-double-down',
	//             //         // node
	//             //     ],
	//             // ),
	//         ],
	//         'Global' => [
	//             'type' => 'item',
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

		$Menu = [
			__('backend.index.menu.home') => [
				'name' => 'home',
				'type' => 'item',
				'url' => \p_ha::Self_Url('/'),
				'target' => '_self',
				'icon' => "fa-home",
				'active' => 'false',
				'background' => 'rgba(90,255,150,0.5)',
				'mini' => 'Home',				
			],		
			__('backend.cover') => [
				'name' => 'cover',
				'type' => 'item',
				'url' => \p_ha::V_Url('cover'),
				'target' => 'index_content_frame',
				'icon' => "fa-desktop",
				'active' => 'false',
				'background' => 'rgba(90,255,150,0.5)',
				'mini' => 'Note',
			],
			__('backend.index.menu.note') => [
				'name' => 'note',
				'type' => 'item',
				'url' => \p_ha::V_Url('note'),
				'target' => 'index_content_frame',
				'icon' => "fa-sticky-note",
				'active' => 'false',
				'background' => 'rgba(90,255,150,0.5)',
				'mini' => 'Note',
			],
			__('backend.index.menu.table') => [
				// 目前，最多四層，如果不夠用串的
				// ex.
				// Front
				// -- Accounts
				// 第一層
				'name' => 'table',
				'type' => 'menu',
				'url' => null,
				'target' => '_self',
				'icon' => 'fa-envelope',
				'active' => 'false',
				'background' => 'rgba(255,255,0,0.5)',
				'mini' => __('backend.index.menu.table'),
				'menu' => [
					// 第二層
					// __('backend.index.menu.front') => [
					// 	'name' => 'front',
					// 	'type' => 'menu',
					// 	'url' => null,
					// 	'target' => '_self',
					// 	//'icon' => 'fa-angle-double-down',
					// 	'menu' => [
					// 		// 第三層
					// 		__('backend.index.menu.account') => [
					// 			'name' => 'front_account',
					// 			'type' => 'menu',
					// 			'url' => null,
					// 			'target' => 'index_content_frame',
					// 			'background' => '',								
					// 			'menu' => [
					// 				// 第四層
					// 				__('backend.index.menu.list') => [
					// 					'name' => 'front_account_list',
					// 					'type' => 'item',
					// 					'url' => \p_ha::V_Url('table/front/accounts/list'),
					// 					'target' => 'index_content_frame',
					// 					'background' => '',
					// 				],
					// 				__('backend.index.menu.detail') => [
					// 					'name' => 'front_account_detail',
					// 					'type' => 'item',
					// 					'url' => \p_ha::V_Url('table/front/accounts/detail'),
					// 					'target' => 'index_content_frame',
					// 					'background' => '',
					// 				],
					// 				__('backend.index.menu.login_record') => [
					// 					'name' => 'front_account_login_record',
					// 					'type' => 'item',
					// 					'url' => \p_ha::V_Url('table/front/accounts/login_record'),
					// 					'target' => 'index_content_frame',
					// 					'background' => '',
					// 				],
					// 				'| --  ' . __('backend.index.menu.relation') => [
					// 					'name' => 'front_account_relation',
					// 					'type' => 'item',
					// 					'url' => \p_ha::V_Url('table/front/accounts/relation'),
					// 					'target' => 'index_content_frame',
					// 					'background' => '',
					// 				],
					// 			],
					// 		],
					// 		__('backend.index.menu.product') => [
					// 			'name' => 'product',
					// 			'type' => 'menu',
					// 			'url' => null,
					// 			'target' => 'index_content_frame',
					// 			'background' => '',								
					// 			'menu' => [
					// 				// node
					// 				__('backend.index.menu.list') => [
					// 					'name' => 'front_product_list',
					// 					'type' => 'item',
					// 					'url' => \p_ha::V_Url('table/front/products/list'),
					// 					'target' => 'index_content_frame',
					// 					'background' => '',
					// 				],
					// 			],
					// 		],
					// 		__('backend.index.menu.relation') => [
					// 			'name' => 'front_relation',
					// 			'type' => 'menu',
					// 			'url' => null,
					// 			'target' => 'index_content_frame',
					// 			'background' => '',								
					// 			'menu' => [
					// 				// node									
					// 				__('backend.index.menu.account') . ' X ' . __('backend.index.menu.product') . ' - ' . __('backend.index.menu.like') => [
					// 					'name' => 'front_account_product_like',
					// 					'type' => 'item',
					// 					'url' => \p_ha::V_Url('table/front/relation/accounts_products_like'),
					// 					'target' => 'index_content_frame',
					// 					'background' => '',
					// 				],
					// 			],
					// 		],
					// 	],
					// ],
					__('backend.index.menu.backend') => [
						'name' => 'backend',
						'type' => 'menu',
						'url' => '/',
						'target' => '_self',
						//'icon' => 'fa-angle-double-down',
						'menu' => [
							// 第三層
							__('backend.index.menu.account') => [
								'name' => 'backend_accouts',
								'type' => 'menu',
								'url' => null,
								'target' => 'index_content_frame',
								'background' => '',								
								'menu' => [
									// 第四層
									__('backend.index.menu.list') => [
										'name' => 'backend_accounts_list',
										'type' => 'item',
										'url' => $backend_tables_['accounts']['url'],
										'target' => 'index_content_frame',
										'background' => '',
									],
									__('backend.index.menu.detail') => [
										'name' => 'backend_accounts_detail',
										'type' => 'item',
										'url' => $backend_tables_['accounts_detail']['url'],
										'target' => 'index_content_frame',
										'background' => '',
									],
									__('backend.index.menu.login_record') => [
										'name' => 'backend_accounts_login_record',
										'type' => 'item',
										'url' => $backend_tables_['accounts_login_records']['url'],
										'target' => 'index_content_frame',
										'background' => '',
									],
									'| --  ' . __('backend.index.menu.relation') => [
										'name' => 'backend_accoutns_account_relation',
										'type' => 'item',
										'url' => $backend_tables_['accounts_relations']['url'],
										'target' => 'index_content_frame',
										'background' => '',
									],
								],
							],
						],
					],
				],
			],
			__('backend.default_page') => [
				'name' => 'default_page',
				'type' => 'item',
				// 請注意settings初始化順序
				'url' => $this->Settings['default']['page'],
				'target' => '_self',
				'icon' => "fa-desktop",
				'active' => 'false',
				'background' => 'rgba(90,255,150,0.5)',
				'mini' => 'Note',
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


