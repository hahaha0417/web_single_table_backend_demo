<?php

namespace hahaha;

 /*
// 在每個view php裡面建class(composer似乎不會class map php以外的檔案，要自己寫)
// 利用Instance載入檔案
\hahaha\view\index_view_header::Instance();
後面可以直接使用對應函式，或使用Require載入phtml做view
*/
/*
// 跳入其他的view
$view->View([
	[\hahaha\view\index_view_header::Instance(), "Index"],
	[\hahaha\view\index_view_body::Instance(), "Index"],
	[\hahaha\view\index_view_footer::Instance(), "Index"],
]);
*/

// 執行程式或引入寫在不同檔案的對應function，用$view->View呼叫
/*
// 使用phtml
$this->Require('index_view');
$this->Require('index_view2');
*/
class hahaha_view_base
{
	// --------------------------------------------------------------------------
	// Property
	// -------------------------------------------------------------------------- 
	// 可以換引入副檔名，但是IDE可能沒有上色功能
	public $Extension = "phtml";

	// --------------------------------------------------------------------------
	// 
	// --------------------------------------------------------------------------
	// 為了避免使用上碰撞，將其取比較複雜命名
	public $Reflection_Class_ = NULL;

	public function Initial_Reflection_Class()
	{
		$this->Reflection_Class_ = new \ReflectionClass(get_class($this));	
	}

	function __construct()
	{
		$this->Initial_Reflection_Class();
	}
	
	/*
	如要引入其他位置，這涉及到檔案規劃，請自己另外寫
	// 在loop內不要使用這個，他會導致執行慢一倍以上，這主要是留著個別引用，如要使用widgit，請使用class or function處理，避免重複解譯Opcode
	*/
	public function Require($name = NULL)
	{
		if($name)
		{
			require dirname($this->Reflection_Class_->getFileName()) . '\\' . $name . '.' . $this->Extension;
		}
		else
		{
			require dirname($this->Reflection_Class_->getFileName()) . '\\' . $this->Reflection_Class_->getShortName() . '.' . $this->Extension;
		}
		
	}
	
	/*
	method找不到時用此方法呼叫class外對應的function
	*/
	public function __call($function , $args)
	{		
		$function_ = '\\' . $this->Reflection_Class_->getNamespaceName() . '\\' . ucwords(strtolower(str_replace('\\', '_', $this->Reflection_Class_->getName() . '_' . $function)), '_');
		$function_($args[0], $this);
	}

	
}
