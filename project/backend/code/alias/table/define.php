<?php

namespace backend\alias;

use hahahasublib\hahaha_instance_trait;

/*
\backend\alias\hahaha_alias_table_define::Alias("hahaha\\backend\\");
*/

/*
table 定義

因為怕寫錯要查麻煩，因此弄成對應表
*/
class hahaha_alias_table_define
{	
    public static $Namespaces_ = [];
    public static function Alias($namespace)
    {        
        // 避免重複載入
        if(in_array($namespace, self::$Namespaces_))
        {
            return;
        }
        self::$Namespaces_[] = $namespace;
        
        class_alias(\hahaha\define\hahaha_define_base_direction::class, $namespace . 'direction');
        class_alias(\hahaha\define\hahaha_define_base_key_::class, $namespace . 'key');
        class_alias(\hahaha\define\hahaha_define_base_node::class, $namespace . 'node');
        class_alias(\hahaha\define\hahaha_define_base_validate::class, $namespace . 'validate');
        class_alias(\hahaha\define\hahaha_define_table_db_field_type::class, $namespace . 'field_type');
        class_alias(\hahaha\define\hahaha_define_html_attribute::class, $namespace . 'attr');
        class_alias(\hahaha\define\hahaha_define_html_class::class, $namespace . 'class_');
        class_alias(\hahaha\define\hahaha_define_html_property::class, $namespace . 'prop');
        class_alias(\hahaha\define\hahaha_define_html_style::class, $namespace . 'style');
        class_alias(\hahaha\define\hahaha_define_html_tag::class, $namespace . 'tag');
        class_alias(\hahaha\define\hahaha_define_sql_operator::class, $namespace . 'op');
        class_alias(\hahaha\define\hahaha_define_table_action::class, $namespace . 'action');
        class_alias(\hahaha\define\hahaha_define_table_group::class, $namespace . 'group');
        class_alias(\hahaha\define\hahaha_define_table_setting::class, $namespace . 'setting');
        class_alias(\hahaha\define\hahaha_define_table_target::class, $namespace . 'target');
        class_alias(\hahaha\define\hahaha_define_table_type::class, $namespace . 'type');
        class_alias(\hahaha\define\hahaha_define_table_use::class, $namespace . 'use_');

    }

}



