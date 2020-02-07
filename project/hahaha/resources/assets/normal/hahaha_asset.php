<?php

namespace hahaha\asset\normal;


/*
Asset檔
這文件最後會用Generator產生，如覺得使用上需要用代稱，可以用\ha\Asset快捷使用，
或是將我文件繼承出去實作代稱或其他需要功能
*/
class hahaha_asset extends \hahaha\asset\hahaha_asset_base
{
	use \hahahalib\hahaha_instance_trait;

	/*
	如果不需要分類，直接使用Initial處理即可
	*/
	public function Initial()
	{
		// 不能用這個hahaha_system_setting::Instance()，會無限迴圈
		if(method_exists($this, "Initial_Ha"))
		{
			$this->Initial_Ha($this);
        }
        // 基於所見即所得，任何情況的Asset必須相同，因此沒有分狀況(default & local))，如不同需求要不同翻譯，請自己寫判斷式
        // 除非Asset超級多，不然不要分檔案(一般情況下不可能)，以節省載入php檔案數

        if(method_exists(\hahaha\asset\normal\set\hahaha_asset_class::Instance(), "Initial_Ha"))
		{
			\hahaha\asset\normal\set\hahaha_asset_class::Instance()->Initial_Ha($this);
		}
		if(method_exists(\hahaha\asset\normal\set\hahaha_asset_class2::Instance(), "Initial_Ha"))
		{
			\hahaha\asset\normal\set\hahaha_asset_class2::Instance()->Initial_Ha($this);
        }
        
		return $this;
	}

	public function Initial_Ha($asset)
	{
		// 基於快速查找，Node式管理Asset
		// 可以多層

		// Asset_Dir 為Root
        $asset->Asset_ = array_merge($asset->Asset_, [
			'_Items' => [
				'app' => [
					[
						'css' => '/app.css',
					],
					[
						'js' => '/app.js',
					],
				],
			],
			'module' => [

			],
			'module_template' => [

			],
			'plugin' => [
				'carousel' => [
					'_Items' => [
						'water_wheel_carousel' => [
							[
								'js' => '/plugin/carousel/water_wheel_carousel/water_wheel_carousel.js',
							],
						],
					],
				],
			],
			'plugin_split' => [
				'asus' => [
					'_Items' => [
						'asus_carousel' => [
							[
								'css' => '/plugin_split/asus/carousel/asus_carousel/owl.carousel.css',
							],
							[
								'js' => '/plugin_split/asus/carousel/asus_carousel/asus_carousel.js',
							],
						],
					],
				],
			],
			'web' => [

			],
			'web_template' => [

			],
			
		]);
		
	}
	

	
}