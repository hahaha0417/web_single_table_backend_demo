<?php

namespace ha;

/*
快捷翻譯
*/
class Lang
{
	use \hahahalib\hahaha_class_instance_handle_trait;

	public static $Class_Name_ = '\\hahaha\\hahaha_language';

	/*
	設定使用語言
	\ha\Lang::Get()->Initial();
	分開取得，記得不要重複Initial，除非有需要，原則上有用到在統一地方Initial
	$t_ = \ha\Lang::Locale('tw')->Language('default')->Initial();
	$t_->Target(['a','b']);
	$t1_ = \ha\Lang::Locale('en')->Language('default')->Initial();
	$t1_->Target(['a','b']);
	var_dump($t_->Translate('d', ['a','b']));
	var_dump($t1_->Translate('d', ['a','b']));
	*/
	public static function Locale($locale)
	{
		// 重要 : 我好像trait有提供Examine()，可以檢查是否已經建立過，因此可以做成切換模式，這樣可以判斷是否要Initial
		// 但如果要改這裡，需要換成Locale & Language變成屬性，然後取出物件另外寫GetXXX，避免建到沒用到的翻譯物件
		$language_ = self::Get();
		$language_->Locale = $locale;
		return $language_;
	}

	/*
	找出翻譯物件
	\ha\Lang::Get()->Initial();
	$t_ = \ha\Lang::Language('default')->Initial();
	$t_->Target(['a','b']);
	var_dump($t_->Translate('d', ['a','b']));
	*/
	public static function Language($language)
	{
		$language_ = self::Get();
		
		return $language_->Language($language);
	}

	// 這邊不做function t()，那在class ha有做

}