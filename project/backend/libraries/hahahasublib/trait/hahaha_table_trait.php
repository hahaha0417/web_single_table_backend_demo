<?php

namespace hahaha;

use  hahaha\define\hahaha_define_table_key as key;
use hahaha\define\hahaha_define_table_tag as tag;

trait hahaha_table_trait
{
	// ----------------------------------------------- 
	// 整理項目
	// ----------------------------------------------- 
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

	// ----------------------------------------------- 
	// 需要欄位Field
	// ----------------------------------------------- 
	/*
	index fields
	*/
	public $Fields_Index = [];

	/*
	preview fields
	*/
	public $Fields_Preview = [];

	/*
	edit fields
	*/
	public $Fields_Edit = [];


	/*
	可以初始化自己也可以初始化他人
	回傳為自己物件，以便可以繼續用
	*/
	public function Initial_Index(&$index = null)
	{
		if(is_null($index))
		{
			$index_ = &$this->Index;
		}
		else
		{
			$index_ = &$index;
		}

		if(!empty($index_))
		{
			return $this;
		}

		$class_list_ = [
			key::CLASSES,
			key::CLASSES_1,
			key::CLASSES_2,
			key::CLASSES_3,
			key::CLASSES_4,
			key::CLASSES_5,
		];

		$style_list_ = [
			key::STYLES,
			key::STYLES_1,
			key::STYLES_2,
			key::STYLES_3,
			key::STYLES_4,
			key::STYLES_5,
		];

		$setting_ = &$this->Settings_Index[$this->Settings["default"]["index"]];
		// 複製
		$index_ = $setting_;

		foreach($setting_ as $key => &$items)
		{
			$items_target_ = &$index_[$key];
			foreach($items as $key_item => &$item)
			{
				$fields_target_ = &$items_target_[$key_item][key::ITEMS];
				$fields_ = &$item[key::ITEMS];

				foreach($fields_ as $key_field => &$field)
				{				
					// 一個欄位，從Fields撈出對應key，合併，存入$index
					$field_target_ = &$fields_target_[$key_field];

					if(!empty($this->Settings_Fields[$key_field]))
					{
						// 有預設值，合併
						$field_target_ = array_merge($this->Settings_Fields[$key_field], $field);
					}

					// class
					foreach($class_list_ as $key_list => &$value_list)
					{
						if(!empty($field_target_[$value_list]))
						{
							$value_list_ = &$field_target_[$value_list];
							$item_target_ = &$items_target_[$key_item];
	
							$str_ = "";
							$last_ = count($value_list_) - 1;
							$i = 0;
							foreach($value_list_ as $key_str => &$value_str)
							{
								if($value_str)
								{
									//  true才設
									if($i != $last_)
									{
										$str_ .= "{$key_str} ";
									}
									else
									{
										$str_ .= "{$key_str}";
									}

								}
								$i++;								
							}
							$field_target_[$value_list] = $str_;

							
						}
						else
						{
							unset($field_target_[$key_list]);
						}
					}
					
					$item_target_ = &$items_target_[$key_item];
	
					// style
					foreach($style_list_ as $key_list => &$value_list)
					{
						if(!empty($field_target_[$value_list]))
						{
							$value_list_ = &$field_target_[$value_list];
							$str_ = "";
							$last_ = count($value_list_) - 1;
							$i = 0;
							foreach($value_list_ as $key_str => &$value_str)
							{
								if($value_str != tag::NO_USE)
								{
									//  true才設
									if($i != $last_)
									{
										$str_ .= "{$key_str}:{$value_str}; ";
									}
									else
									{
										$str_ .= "{$key_str}:{$value_str};";
									}
								}
								$i++;								
							}
							$field_target_[$value_list] = $str_;
						}
						else
						{
							unset($field_target_[$key_list]);
						}
					}					
				}

				$item_target_ = &$items_target_[$key_item];
			
				// class
				foreach($class_list_ as $key_list => &$value_list)
				{
					if(!empty($item_target_[$value_list]))
					{
						$value_list_ = &$item_target_[$value_list];
						$str_ = "";
						$last_ = count($value_list_) - 1;
						$i = 0;
						foreach($value_list_ as $key_str => &$value_str)
						{
							if($value_str)
							{
								//  true才設
								if($i != $last_)
								{
									$str_ .= "{$key_str} ";
								}
								else
								{
									$str_ .= "{$key_str}";
								}
							}
							$i++;								
						}
						$item_target_[$value_list] = $str_;
					}
					else
					{
						unset($item_target_[$key_list]);
					}
				}	
				
				$item_target_ = &$items_target_[$key_item];
				
				// style
				foreach($style_list_ as $key_list => &$value_list)
				{
					if(!empty($item_target_[$value_list]))
					{
						$value_list_ = &$item_target_[$value_list];
						$str_ = "";
						$last_ = count($value_list_) - 1;
						$i = 0;
						foreach($value_list_ as $key_str => &$value_str)
						{
							if($value_str != tag::NO_USE)
							{
								//  true才設
								if($i != $last_)
								{
									$str_ .= "{$key_str}:{$value_str}; ";
								}
								else
								{
									$str_ .= "{$key_str}:{$value_str};";
								}
							}
							$i++;								
						}
						$item_target_[$value_list] = $str_;
					}
					else
					{
						unset($item_target_[$key_list]);
					}
				}
			}
		}
		
		return $this;
	}

	/*
	可以初始化自己也可以初始化他人
	回傳為自己物件，以便可以繼續用
	*/
	public function Initial_Preview(&$preview)
	{
		if(is_null($preview))
		{
			$preview_ = &$this->Preview;
		}
		else
		{
			$preview_ = &$preview;
		}

		if(!empty($preview))
		{
			return $this;
		}

		return $this;
	}
	
	/*
	可以初始化自己也可以初始化他人
	回傳為自己物件，以便可以繼續用
	*/
	public function Initial_Edit(&$edit)
	{
		if(is_null($edit))
		{
			$edit_ = &$this->Edit;
		}
		else
		{
			$edit_ = &$edit;
		}

		if(!empty($edit))
		{
			return $this;
		}

		return $this;
	}

	/*
	可以初始化自己也可以初始化他人
	回傳為自己物件，以便可以繼續用
	*/
	public function Initial_Fields_Index(&$fields_index = null)
	{
		if(is_null($fields_index))
		{
			$fields_index_ = &$this->Fields_Index;
		}
		else
		{
			$fields_index_ = &$fields_index;
		}

		if(!empty($fields_index_))
		{
			return $this;
		}

		$index_ = &$this->Index;

		$this->Initial_Fields($index_, $fields_index_);

		return $this;
	}

	/*
	可以初始化自己也可以初始化他人
	回傳為自己物件，以便可以繼續用
	*/
	public function Initial_Fields_Preview(&$fields_preview = null)
	{
		if(is_null($fields_preview))
		{
			$fields_preview_ = &$this->Fields_Preview;
		}
		else
		{
			$fields_preview_ = &$fields_preview;
		}

		if(!empty($fields_preview_))
		{
			return $this;
		}

		$preview_ = &$this->Preview;

		$this->Initial_Fields($preview_, $fields_preview_);

		return $this;
	}
	
	/*
	可以初始化自己也可以初始化他人
	回傳為自己物件，以便可以繼續用
	*/
	public function Initial_Fields_Edit(&$fields_edit = null)
	{
		if(is_null($fields_edit))
		{
			$fields_edit_ = &$this->Fields_Edit;
		}
		else
		{
			$fields_edit_ = &$fields_edit;
		}

		if(!empty($fields_edit_))
		{
			return $this;
		}

		$edit_ = &$this->Edit;

		$this->Initial_Fields($edit_, $fields_edit_);

		return $this;
	}

	/*
	// 將&page所有分類項目的_items(key::FIELD => [key::IS_FIELD => true])，整理至$fields
	*/
	public function Initial_Fields(&$page, &$fields)
	{
		// 這是一定要merge的，如果選項則命名為Optional_Addition
		$db_fields_addition_ = &$this->Settings_DB_Fields_Addition;
		
		foreach($db_fields_addition_ as $key_field => &$field)
		{
			if(!empty($field[key::DB_FIELD]))
			{						
				$db_field_ = &$field[key::DB_FIELD];

				if(!empty($db_field_[key::IS_FIELD]) && $db_field_[key::IS_FIELD])
				{
					// 是DB欄位
					if(!empty($db_field_[key::NAME]))
					{
						// 用欄位
						$fields[$key_field] = $db_field_[key::NAME];
					}
					else
					{
						// 用key	
						$fields[$key_field] = $key_field;
					}

				}
			}
			
		}

		// 主要欄位整理，為求快，重複的就不用再次assign
		foreach($page as $key_class => &$class)
		{
			foreach($class as $key_item => &$item)
			{
				if(!empty($item['_items'])) 
				{
					$items_ = &$item['_items'];
				}
				
				foreach($items_ as $key_field => &$field)
				{
					if(!empty($field[key::DB_FIELD]))
					{						
						$db_field_ = &$field[key::DB_FIELD];

						if(!empty($db_field_[key::IS_FIELD]) && $db_field_[key::IS_FIELD])
						{
							// 是DB欄位
							if(empty($fields[$key_field]))
							{
								if(!empty($db_field_[key::NAME]))
								{
									// 用欄位
									$fields[$key_field] = $db_field_[key::NAME];
								}
								else
								{
									// 用key	
									$fields[$key_field] = $key_field;
								}
							}
						}
					}
				}
			}
		}

	}
}
