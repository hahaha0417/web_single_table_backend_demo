<?php

namespace hahaha\language;

class hahaha_language_base
{
	// 翻譯文件
	public $Language_ = [];

	// 目標Node
	public $Target_Node_ = NULL;

	// --------------------------------------------------------------------------
	// 
	// --------------------------------------------------------------------------
	//為了避免衝突，預設這種樣式
	// 參數前半
	public $Parameter_Prefix_ = "{ha[";
	// 參數後半
	public $Parameter_Postfix_ = "]}";
	// --------------------------------------------------------------------------
	// 參數前半
	public $Parameter_Prefix_Length_ = 4;
	// 參數後半
	public $Parameter_Postfix_Length_ = 2;
	// --------------------------------------------------------------------------
	// 
	// --------------------------------------------------------------------------

	function __construct($initial = true)
	{		
		if($initial)
		{
			Initial();
		}
	}

	/*
	繼承出去改
	*/
	public function Initial()
	{		
		/*
		// 不能用這個hahaha_language::Instance()，會無限迴圈
		if(method_exists($this, "Initial_Ha"))
		{
			$this->Initial_Ha($this);
        }
        // 基於所見即所得，任何情況的翻譯必須相同，因此沒有分狀況(default & local))，如不同需要要不同翻譯，請自己寫判斷式
        // 除非翻譯超級多，不然不要分檔案(一般情況下不可能)，以節省載入php檔案數

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

	/*
	繼承出去改
	*/
	/*
	public function Initial_Ha($language)
	{
		// 基於快速查找，Node式管理翻譯內容
		// 可以多層
        $language->Language_ = array_merge($language->Language_, [
			'_Items' => [
			],
			'a' => [
			],		
		]);
	}
	*/

	/*
	注意 : 後面使用不是Initial，會重置
	這裡要refernce，不然會複製
	$node_ = &\hahaha\language\tw\hahaha_language::Instance()->Initial()->Find(['a', 'b']);
	$node_[222] = "123";
	var_dump(\hahaha\language\tw\hahaha_language::Instance()->Language_);
	return array reference
	這個直接使用太危險，可能忘記reference，所以設為reference
	*/
	protected function &Find(&$node_names)
	{
		$node_ = &$this->Language_;

		foreach($node_names as &$node_name)
		{
			if(empty($node_[$node_name]))
			{
				throw new \Exception('沒有找到翻譯Node');
			}
			$node_ = &$node_[$node_name];
		}
			
		return $node_;
	}

	/*
	有空整成模組
	https://www.php.net/manual/zh/ref.mbstring.php#94220
	*/
	protected function Mb_Substr_Replace(&$string, &$replacement, &$start, &$length){
		return mb_substr($string, 0, $start).$replacement.mb_substr($string, $start+$length);
	}

	protected function &Fill_Parameter(&$item, &$parameters, &$parameter_prefix, &$parameter_postfix)
	{
		if($parameter_prefix === NULL || $parameter_postfix === NULL)
		{
			// NULL，使用預設
			$parameter_prefix_ = &$this->Parameter_Prefix_;
			$parameter_postfix_ = &$this->Parameter_Postfix_;
			$parameter_prefix_length_ = &$this->Parameter_Prefix_Length_;
			$parameter_postfix_length_ = &$this->Parameter_Postfix_Length_;
		}
		else if($parameter_prefix == '' || $parameter_postfix == '')
		{
			// 不能這樣，拋出例外
			throw new \Exception('參數前後綴都要存在');
		}
		else
		{
			// 使用預設
			$parameter_prefix_ = &$parameter_prefix;
			$parameter_postfix_ = &$parameter_postfix;
			$parameter_prefix_length_ = mb_strlen($parameter_prefix);
			$parameter_postfix_length_ = mb_strlen($parameter_postfix);
		}

		// 複製字串
		$item_ = $item;

		$pos_ = 0;
		foreach($parameters as &$parameter)
		{				
			$pos_ = mb_strpos($item_, $parameter_prefix_, $pos_);

			if($pos_ !== False)
			{
				$pos_start_ = $pos_;
				$pos_ += $parameter_prefix_length_;
				$pos_ = mb_strpos($item_, $parameter_postfix_, $pos_);
				if($pos_ !== False)
				{
					$pos_end_ = $pos_;					
					$length_ = $pos_end_ - $pos_start_ + $parameter_postfix_length_ + 1;
					$find_ = mb_substr($item_, $pos_start_, $length_);
					$find_length_ = mb_strlen($find_); 
					$item_ = $this->Mb_Substr_Replace($item_, $parameter, $pos_start_, $find_length_);	
					// 由於替換掉，要修正$pos_
					$pos_ = $pos_start_ + mb_strlen($parameter);
				}
				else
				{					
					break;
				}
			}
			else
			{
				break;
			}
		}

		return $item_;
	}

	// --------------------------------------------------------------------------
	// 主功能
	// --------------------------------------------------------------------------
	public function Parameter_Style($prefix, $postfix)
	{
		$this->Parameter_Prefix_ = $prefix;
		$this->Parameter_Postfix_ = $postfix;

		$this->Parameter_Prefix_Length_ = mb_strlen($this->Parameter_Prefix_);
		$this->Parameter_Postfix_Length_ = mb_strlen($this->Parameter_Postfix_);
	}

	public function Target($node_names)
	{
		$this->Target_Node_ = &$this->Find($node_names);
			
		return $this;
	}

	/*
	這裡不做縮寫t()翻譯，外面做一個\ha::t()的函式處理，因為引入(需要最簡引入)，因此沒辦法做成純function呼叫，
	但由於在controller以後，其實不一定要最簡引入，因此可以使用instance的方式順便引入require，使用前instance一下
	https://www.php.net/manual/zh/language.namespaces.importing.php
	ex : 
	echo $lang_->Translate('d', ['1', '成功'], ['a', 'b']);
	echo $lang_->Translate('e', ['a', 'b']);
	$lang_->Target(['a', 'b']);
	echo $lang_->Translate('d', ['1', '成功']);
	$lang_->Parameter_Style('{', '}');
	echo $lang_->Translate('e', ['1', '成功']);
	echo $lang_->Translate('e', ['1', '成功'], [], '{', '}');
	echo $lang_->Translate('c');
	// 快捷用法
	\ha::t(['a','b']);
    var_dump(\ha::t('d', ['a','b']));
	//
	如有其他種翻譯處理方式，請用trait附加 or 繼承修改，一般對應接口的情況，應該是用繼承修改
	*/
	public function Translate($item, 
		$parameters = [], 
		$node_names = [], 
		$parameter_prefix = NULL,
		$parameter_postfix = NULL
	)
	{
		if(empty($node_names))
		{
			if(empty($this->Target_Node_))
			{
				$this->Target_Node_ = &$this->Language_;
			}
			$node_ = &$this->Target_Node_;
		}
		else
		{
			$node_ = &$this->Find($node_names);
		}

		if(empty($node_['_Items']))
		{
			// 翻譯失敗，傳回$item
			return $item;
		}
		$items_ = &$node_['_Items'];

		if(empty($items_[$item]))
		{
			// 翻譯失敗，傳回$item
			return $item;			
		}

		$item_ = &$items_[$item];

		if(empty($parameters))
		{
			// 回傳項目字串
			return $item_;			
		}
		else
		{
			// 分析盡可能填入參數
			return $this->Fill_Parameter($item_, $parameters, $parameter_prefix, $parameter_postfix);
		}
	}

	
}
