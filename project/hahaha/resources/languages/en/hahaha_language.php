<?php

namespace hahaha\language\en;
// 如需要建置多國語言，使用快速取代替換掉locale(tw)，很多程式都有，例如Visual Studio
// 不然用我的小工具轉(目前還沒寫)

/*
翻譯檔(繁體中文)
*/
class hahaha_language extends \hahaha\language\hahaha_language_base
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
        // 基於所見即所得，任何情況的翻譯必須相同，因此沒有分狀況(default & local))，如不同需要要不同翻譯，請自己寫判斷式
        // 除非翻譯超級多，不然不要分檔案(一般情況下不可能)，以節省載入php檔案數
		/*
        if(method_exists(\hahaha\language\tw\set\hahaha_language_class::Instance(), "Initial_Ha"))
		{
			\hahaha\language\tw\set\hahaha_language_class::Instance()->Initial_Ha($this);
		}
		if(method_exists(\hahaha\language\tw\set\hahaha_language_class2::Instance(), "Initial_Ha"))
		{
			\hahaha\language\tw\set\hahaha_language_class2::Instance()->Initial_Ha($this);
		}
		*/
        
		return $this;
	}

	public function Initial_Ha($language)
	{
		// 基於快速查找，Node式管理翻譯內容
		// 可以多層		
        $language->Language_ = array_merge($language->Language_, [
			'_Items' => [
				'a' => 'hello',
				'c' => 'test1',
				'd' => 'test1 {數量} times，{成功}!',
			],
			'a' => [
				'_Items' => [
					'c' => 'test',
					'd' => "test2 {ha[數量]} times，{ha[成功]}!",
				],
				'b' => [
					'_Items' => [
						'c' => 'test',
						'd' => "test3 {ha[數量]} times，{ha[成功]}!",
						'e' => "test4 {數量} times，{成功}!",
					],
				],
			],
		]);
		
	}
	

	
}