<?php

namespace hahaha;

use hahahasublib\hahaha_instance_trait;

// ------------------------------------------------------ 
// 不要用這個
// \backend\alias\hahaha_alias_table_define::Alias("hahaha\\");
// ------------------------------------------------------ 
// 用傳統的貼法，避免出現錯誤
// 解法 : 
// 1. php提供新include，可以insert代碼做整理 * 
// 2. 插件可以幫我parser class_alias()，例如提供方法指定 
/** 
 * 特例(2) : 
 * @Intelephense:analysis  \backend\alias\hahaha_alias_table_define::Alias("hahaha\\");
 * 上面function獨立並只做class_alias
 * 
 **/
// ------------------------------------------------------ 
use hahaha\define\hahaha_define_base_key as key;
use hahaha\define\hahaha_define_base_direction as direction;
use hahaha\define\hahaha_define_html_attribute as attr;
use hahaha\define\hahaha_define_html_class as class_;
use hahaha\define\hahaha_define_html_property as prop;
use hahaha\define\hahaha_define_base_node as node;
use hahaha\define\hahaha_define_base_validate as validate;
use hahaha\define\hahaha_define_html_style as style;
use hahaha\define\hahaha_define_html_tag as tag;
use hahaha\define\hahaha_define_table_action as action;
use hahaha\define\hahaha_define_table_group as group;
use hahaha\define\hahaha_define_table_setting as setting;
use hahaha\define\hahaha_define_table_target as target;
use hahaha\define\hahaha_define_table_type as type;
use hahaha\define\hahaha_define_table_use as use_;
use hahaha\define\hahaha_define_table_db_field_type as field_type;
use hahaha\define\hahaha_define_sql_operator as op;

// ------------------------------------------------------

class hahaha_convert_doctrine_dql
{
    use hahaha_instance_trait;

    public function To_Select(&$select, &$fields, &$alias)
    {
        $index_ = 0;
        $last_ = count($fields) - 1;
        foreach($fields as $key => &$field)
        {
            if($index_ == $last_)
            {
                if($field == '*')
                {
                    $select .= $alias; 
                    continue;
                }
                $select .= $alias . '.' . $field;
            }
            else
            {
                if($field == '*')
                {
                    $select .= $alias . ', ';
                    continue;
                }
                $select .= $alias . '.' . $field . ', ';
            }
            $index_++;
        }
    }

    /*
    https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/query-builder.html
    基於直觀，少用 $qb->expr()->，除非有比較難處理的，不然直接查到指令放進來即可
    $query_builder Doctrine Query Builder
    [
        key::AND => ['xx', '=', '123'],
        key::OR => ['xx', '>', '123'],
        key::OR => ['xx', operator::BETWEEN, '123', '234'],
        // ---------------------------------------------------------- 
        // 有空再弄
        // ---------------------------------------------------------- 
        // 命令處理，大約用幾次for迴圈，寫個模組串出指令
        // (a or b) and c
        key::AND_X => [
            "(", 
                ["id", op::IN, ["2", "4"]], key::OR, ["id", op::IN, ["3", "4"]],                 
            ")",                      
            key::AND, ["id", op::NOT_IN, ["2"]],
        ],
        // ---------------------------------------------------------- 
    ]
    */
    public function Filter(&$query_builder, &$filters, &$alias)
    {       
        foreach($filters as $key => &$filter) 
        {
            if($filter[1] == op::BETWEEN)
            {
                $str = "{$alias}.{$filter[0]} {$filter[1]} '{$filter[2]}' AND '{$filter[3]}'";
            }
            else if($filter[1] == op::IN)
            {
                $str = $query_builder->expr()->in("{$alias}.{$filter[0]}", $filter[2]);
            }
            else if($filter[1] == op::NOT_IN)
            {
                $str = $query_builder->expr()->notIn("{$alias}.{$filter[0]}", $filter[2]);
            }
            else 
            {
                $str = "{$alias}.{$filter[0]} {$filter[1]} '{$filter[2]}'";
            }

            if($key == key::NONE)  
            {
                $query_builder->where($str);           
            }  
            else if($key == key::AND)  
            {
                $query_builder->andWhere($str);
            }  
            else if($key == key::OR)  
            {
                $query_builder->orWhere($str);
            }  
        }
    }

} 

