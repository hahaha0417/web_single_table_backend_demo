<?php

namespace hahaha;

use hahahasublib\hahaha_instance_trait;

use hahaha\define\hahaha_define_table_key as key;
use hahaha\define\hahaha_define_table_operator as op;

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

