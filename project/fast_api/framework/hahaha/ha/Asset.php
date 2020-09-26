<?php

namespace ha;

/*
快捷翻譯
*/
class Asset
{
	use \hahahalib\hahaha_class_instance_handle_trait;

	public static $Class_Name_ = '\\hahaha\\hahaha_asset';
	

	/*
	分類 
	*/
	public static function Class($class)
	{
		// 重要 : 我好像trait有提供Examine()，可以檢查是否已經建立過，因此可以做成切換模式，這樣可以判斷是否要Initial
		// 但如果要改這裡，需要換成Locale & Language變成屬性，然後取出物件另外寫GetXXX，避免建到沒用到的翻譯物件
		$asset_manager_ = self::Get();
		$asset_manager_->Locale = $class;
		return $asset_manager_;
	}

	/*
	Asset
	*/
	public static function Asset($asset)
	{
		// 重要 : 我好像trait有提供Examine()，可以檢查是否已經建立過，因此可以做成切換模式，這樣可以判斷是否要Initial
		// 但如果要改這裡，需要換成Locale & Language變成屬性，然後取出物件另外寫GetXXX，避免建到沒用到的翻譯物件
		$asset_manager_ = self::Get();
		$asset_ = $asset_manager_->Asset($asset);
		return $asset_;
	}
	
	/*
	Asseter
	*/
	public static function Asseter()
	{
		// 重要 : 我好像trait有提供Examine()，可以檢查是否已經建立過，因此可以做成切換模式，這樣可以判斷是否要Initial
		// 但如果要改這裡，需要換成Locale & Language變成屬性，然後取出物件另外寫GetXXX，避免建到沒用到的翻譯物件
		$asseter_ = \hahahalib\hahaha_asset::Instance();
		return $asseter_;
	}

	/*
	渲染
	
	// 初始化
	\ha\Asset::Class('normal')->Initial();
	$asset_ = \ha\Asset::Asset('default')->Initial(); 
	$asseter_ = \ha\Asset::Asseter();

	// 初始asset階段
	$asset_->Asset($asseter_, 'main');
	$asset_->Asset($asseter_, 'sub');
	// 加入
	$asset_->Asset($asseter_, 'main', 'water_wheel_carousel', ['plugin', 'carousel'], \hahaha\asset\hahaha_asset_base::FRONT);
	$asset_->Asset($asseter_, 'main', 'water_wheel_carousel', ['plugin', 'carousel'], \hahaha\asset\hahaha_asset_base::FRONT);
	$asset_->Asset($asseter_, 'sub', 'app');

	echo "<pre>";
	var_dump( \ha\Asset::Render() );
	*/
	public static function Render($asset_names = [])
	{
		$asseter_ = \hahahalib\hahaha_asset::Instance();
		
		return $asseter_->Render($asset_names);
	}

	// 這邊不做function t()，那在class ha有做

}