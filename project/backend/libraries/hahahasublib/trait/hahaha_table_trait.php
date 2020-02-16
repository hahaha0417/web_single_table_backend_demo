<?php

namespace hahaha;

use  hahaha\define\hahaha_define_table_key as key;

trait hahaha_table_trait
{
	// ----------------------------------------------- 
	// 最後使用
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



	public function Initial_Index(&$index)
	{
		$setting_ = &$this->Settings_Index[$this->Settings["default"]["index"]];
		// 複製
		$index = $setting_;

		foreach($setting_ as $key => &$items)
		{
			$items_target_ = &$index[$key];
			foreach($items as $key_item => &$item)
			{
				$fields_target_ = &$items_target_[$key_item][key::ITEMS];
				$fields_ = &$item[key::ITEMS];

				foreach($fields_ as $key_field => &$field)
				{				
					// 一個欄位，從Fields撈出對應key，合併，存入$index
					if(!empty($this->Settings_Fields[$key_field]))
					{
						$field_target_ = &$fields_target_[$key_field];
						
						// 有預設值，合併
						$field_target_ = array_merge($this->Settings_Fields[$key_field], $field);
						
						// 轉換tag & style格式，array to html class & style format
						if(!empty($field_target_[key::CLASSES]))
						{
							$class_list_ = &$field_target_[key::CLASSES];
							$class_ = "";
							$last_ = count($class_list_) - 1;
							$i = 0;
							foreach($class_list_ as $key_class => &$class)
							{
								if($class)
								{
									// class true才設
									if($i != $last_)
									{
										$class_ .= "{$key_class} ";
									}
									else
									{
										$class_ .= "{$key_class}";
									}
								}
								$i++;								
							}
							$field_target_[key::CLASSES] = $class_;
						}
						else
						{
							unset($field_target_[key::CLASSES]);
						}
						if(!empty($field_target_[key::STYLES]))
						{
							$style_list_ = &$field_target_[key::STYLES];
							$style_ = "";
							foreach($style_list_ as $key_style => &$style)
							{
								$style_ .= "{$key_style}:{$style};";
							}
							$field_target_[key::STYLES] = $style_;
						}
						else
						{
							unset($field_target_[key::STYLES]);
						}
					}
				}

				// item也要處理style & class
				$item_target_ = &$items_target_[$key_item];
				
				// 轉換tag & style格式，array to html class & style format
				if(!empty($item_target_[key::CLASSES]))
				{
					$class_list_ = &$item_target_[key::CLASSES];
					$class_ = "";
					$last_ = count($class_list_) - 1;
					$i = 0;
					foreach($class_list_ as $key_class => &$class)
					{
						if($class)
						{
							// class true才設
							if($i != $last_)
							{
								$class_ .= "{$key_class} ";
							}
							else
							{
								$class_ .= "{$key_class}";
							}
						}
						$i++;								
					}
					$item_target_[key::CLASSES] = $class_;
				}
				else
				{
					unset($item_target_[key::CLASSES]);
				}
				if(!empty($item_target_[key::STYLES]))
				{
					$style_list_ = &$item_target_[key::STYLES];
					$style_ = "";
					foreach($style_list_ as $key_style => &$style)
					{
						$style_ .= "{$key_style}:{$style};";
					}
					$item_target_[key::STYLES] = $style_;
				}
				else
				{
					unset($item_target_[key::STYLES]);
				}
				
			}
		}

	}

	public function Initial_Preview(&$preview)
	{

	}
	
	public function Initial_Edit(&$edit)
	{

	}
}
