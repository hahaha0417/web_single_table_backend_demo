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
        
        class_alias('hahaha\define\hahaha_define_base_direction', $namespace . 'direction');
        class_alias('hahaha\define\hahaha_define_base_key', $namespace . 'key');
        class_alias('hahaha\define\hahaha_define_base_node', $namespace . 'node');
        class_alias('hahaha\define\hahaha_define_base_validate', $namespace . 'validate');
        class_alias('hahaha\define\hahaha_define_table_db_field_type', $namespace . 'field_type');
        class_alias('hahaha\define\hahaha_define_html_attribute', $namespace . 'attr');
        class_alias('hahaha\define\hahaha_define_html_class', $namespace . 'class_');
        class_alias('hahaha\define\hahaha_define_html_property', $namespace . 'prop');
        class_alias('hahaha\define\hahaha_define_html_style', $namespace . 'style');
        class_alias('hahaha\define\hahaha_define_html_tag', $namespace . 'tag');
        class_alias('hahaha\define\hahaha_define_sql_operator', $namespace . 'op');
        class_alias('hahaha\define\hahaha_define_table_action', $namespace . 'action');
        class_alias('hahaha\define\hahaha_define_table_group', $namespace . 'group');
        class_alias('hahaha\define\hahaha_define_table_setting', $namespace . 'setting');
        class_alias('hahaha\define\hahaha_define_table_target', $namespace . 'target');
        class_alias('hahaha\define\hahaha_define_table_type', $namespace . 'type');
        class_alias('hahaha\define\hahaha_define_table_use', $namespace . 'use_');

    }

}



