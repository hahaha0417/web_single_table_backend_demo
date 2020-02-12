<?php

namespace hahaha;

use hahahasublib\hahaha_instance_trait;

/*
首頁自定義欄位

因為套版用，設定會是死的，所以直接用array描述，不需要另外從資料庫撈，存在快取
*/
class hahaha_setting_index
{	
	use hahaha_instance_trait;

	/*
	導航欄
	必須初始化，不然下面不能用
	*/
	public $nav = [];

	/*
	右方清單
	必須初始化，不然下面不能用
	*/
	public $menu = [];

	/*
	尾端
	必須初始化，不然下面不能用
	*/
	public $tail = [];

	function __construct()
	{
		$this->Initial();
	}
	
	public function Initial()
	{
		// 可以給其他人設定
		$this->nav($this->nav);
		$this->menu($this->menu);
		$this->tail($this->tail);
	}

	/*
	導航欄
	*/
	public function nav(&$nav)
	{
		$nav = [

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
	public function menu(&$menu)
	{
		$menu = [
			'Home' => [
				// 前端首頁
				'type' => 'item',
				'url' => \p_ha::Url('/'),
				'target' => '_self',
				'icon' => "fa-home",
				'active' => 'false',
				'background' => 'rgba(90,255,150,0.5)',
				'mini' => 'Home',
				
			],		
			'Note' => [
				// 備註，有很多註解再規劃到 /note 資料夾，目前是單頁
				'type' => 'item',
				'url' => '/backend/note',
				'target' => 'index_content_frame',
				'icon' => "fa-sticky-note",
				'active' => 'false',
				'background' => 'rgba(90,255,150,0.5)',
				'mini' => 'Note',
				// 前端首頁
			],
			'Table' => [
				// 目前，最多四層，如果不夠用串的
				// ex.
				// Front
				// -- Accounts
				// 第一層
				'type' => 'menu',
				'url' => null,
				'target' => '_self',
				'icon' => 'fa-envelope',
				'active' => 'false',
				'background' => 'rgba(255,255,0,0.5)',
				'mini' => 'Table',
				'menu' => [
					// 第二層
					'Front' => [
						'type' => 'menu',
						'url' => '/',
						'target' => '_self',
						//'icon' => 'fa-angle-double-down',
						'menu' => [
							// 第三層
							'Accounts' => [
								'type' => 'menu',
								'url' => 'backend/map/node/product',
								'target' => 'index_content_frame',
								'background' => '',								
								'menu' => [
									// 第四層
									'List' => [
										'type' => 'item',
										'url' => 'backend/product/list',
										'target' => 'index_content_frame',
										'background' => '',
									],
									'Details' => [
										'type' => 'item',
										'url' => 'backend/product/list',
										'target' => 'index_content_frame',
										'background' => '',
									],
									'Login Records' => [
										'type' => 'item',
										'url' => 'backend/product/list',
										'target' => 'index_content_frame',
										'background' => '',
									],
									'| --  Relations' => [
										'type' => 'item',
										'url' => 'backend/product/list',
										'target' => 'index_content_frame',
										'background' => '',
									],
								],
							],
							'Products' => [
								'type' => 'menu',
								'url' => 'backend/map/node/device',
								'target' => 'index_content_frame',
								'background' => '',								
								'menu' => [
									// node
									'List' => [
										'type' => 'item',
										'url' => 'backend/device/list',
										'target' => 'index_content_frame',
										'background' => '',
									],
								],
							],
							'Relations' => [
								'type' => 'menu',
								'url' => 'backend/map/node/device',
								'target' => 'index_content_frame',
								'background' => '',								
								'menu' => [
									// node
									'Accounts X Products - Like' => [
										'type' => 'item',
										'url' => 'backend/device/list',
										'target' => 'index_content_frame',
										'background' => '',
									],
								],
							],
						],
					],
					'Backend' => [
						'type' => 'menu',
						'url' => '/',
						'target' => '_self',
						//'icon' => 'fa-angle-double-down',
						'menu' => [
							// 第三層
							'Accounts' => [
								'type' => 'menu',
								'url' => 'backend/map/node/product',
								'target' => 'index_content_frame',
								'background' => '',								
								'menu' => [
									// 第四層
									'Lists' => [
										'type' => 'item',
										'url' => 'backend/product/list',
										'target' => 'index_content_frame',
										'background' => '',
									],
									'Details' => [
										'type' => 'item',
										'url' => 'backend/product/list',
										'target' => 'index_content_frame',
										'background' => '',
									],
									'Login Records' => [
										'type' => 'item',
										'url' => 'backend/product/list',
										'target' => 'index_content_frame',
										'background' => '',
									],
									'| --  Relations' => [
										'type' => 'item',
										'url' => 'backend/product/list',
										'target' => 'index_content_frame',
										'background' => '',
									],
								],
							],
						],
					],
				],
			],
		];
	}

	/*
	尾端
	*/
	public function tail(&$tail)
	{
		$tail = [

		];
	}
}


