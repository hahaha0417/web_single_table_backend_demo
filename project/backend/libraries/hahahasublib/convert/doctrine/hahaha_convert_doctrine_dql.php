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
 * 特例(2) : ! Intelephense:analysis -- 這樣會導doctrine orm:generate-entities不能解析
 * ! Intelephense:analysis  \backend\alias\hahaha_alias_table_define::Alias("hahaha\\");
 * 上面function獨立並只做class_alias
 *
 **/
// ------------------------------------------------------
use hahaha\define\hahaha_define_sql_key as key_;
use hahaha\define\hahaha_define_sql_operator as op;
use hahaha\define\hahaha_define_sql_order as order;

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
    $filters = [
        sql_key::SELECT => ['id', 'status'],
    ];
    */
    public function Select(&$query_builder, &$fields, &$alias)
    {
        $select_ = "";
        $this->To_Select($select_, $fields, $alias);
        $query_builder->select($select_);

        return $this;

    }

    /*
    https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/query-builder.html
    基於直觀，少用 $qb->expr()->，除非有比較難處理的，不然直接查到指令放進來即可
    $query_builder Doctrine Query Builder
    $filters = [
        sql_key::CONDITION => [
            key_::NONE => ['xx', '=', '123'],
            key_::AND => ['xx', '=', '123'],
            key_::OR => ['xx', '>', '123'],
            key_::OR => ['xx', operator::BETWEEN, '123', '234'],
            // ----------------------------------------------------------
            // 有空再弄
            // ----------------------------------------------------------
            // 命令處理，大約用幾次for迴圈，寫個模組串出指令
            // (a or b) and c
            key_::AND_X => [
                "(",
                    ["id", op::IN, ["2", "4"]], key_::OR, ["id", op::IN, ["3", "4"]],
                ")",
                key_::AND, ["id", op::NOT_IN, ["2"]],
            ],
            // ----------------------------------------------------------
        ],
    ];
    */
    public function Condition(&$query_builder, &$conditions, &$alias)
    {
        foreach($conditions as $key => &$condition)
        {
            if($condition[1] == op::BETWEEN)
            {
                $str = "{$alias}.{$condition[0]} {$condition[1]} '{$condition[2]}' AND '{$condition[3]}'";
            }
            else if($condition[1] == op::IN)
            {
                $str = $query_builder->expr()->in("{$alias}.{$condition[0]}", $condition[2]);
            }
            else if($condition[1] == op::NOT_IN)
            {
                $str = $query_builder->expr()->notIn("{$alias}.{$condition[0]}", $condition[2]);
            }
            else
            {
                $str = "{$alias}.{$condition[0]} {$condition[1]} '{$condition[2]}'";
            }

            if($key == key_::NONE)
            {
                $query_builder->where($str);
            }
            else if($key == key_::AND)
            {
                $query_builder->andWhere($str);
            }
            else if($key == key_::OR)
            {
                $query_builder->orWhere($str);
            }
        }

        return $this;

    }

    /*
    https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/query-builder.html
    基於直觀，少用 $qb->expr()->，除非有比較難處理的，不然直接查到指令放進來即可
    $query_builder Doctrine Query Builder
    $filters = [
        sql_key::SETTING => [
            key_::OFFSET => 0,
            key_::LIMIT => 2,
            // ----------------------------------------------------------
        ],
    ];
    */
    public function Setting(&$query_builder, &$settings, &$alias)
    {
        foreach($settings as $key => &$setting)
        {
            if ($key == key_::OFFSET)
            {
                $query_builder->setFirstResult($setting);
            }
            else if ($key == key_::LIMIT)
            {
                $query_builder->setMaxResults($setting);
            }

        }

        return $this;

    }

    /*
    https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/query-builder.html
    基於直觀，少用 $qb->expr()->，除非有比較難處理的，不然直接查到指令放進來即可
    $query_builder Doctrine Query Builder
    $filters = [
        sql_key::ORDER => [
            key_::NONE => ["xx" => order::ASC]
            key_::ADD => ["xx" => order::ASC]
        ],
    ];
    */
    public function Order(&$query_builder, &$orders, &$alias)
    {
        foreach($orders as $key => &$order)
        {
            if ($key == key_::NONE)
            {
                $query_builder->orderBy("{$alias}.$order[0]", $order[1]);
            }
            else if ($key == key_::ADD)
            {
                $query_builder->addOrderby("{$alias}.$order[0]", $order[1]);
            }

        }

        return $this;

    }

    /*
    https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/query-builder.html
    基於直觀，少用 $qb->expr()->，除非有比較難處理的，不然直接查到指令放進來即可
    $query_builder Doctrine Query Builder
    $filters = [
        sql_key::GROUP => [
            key_::NONE => "xx"
            key_::ADD => "xx"
        ]
    ];
    */
    public function Group(&$query_builder, &$groups, &$alias)
    {
        foreach($groups as $key => &$group)
        {
            if ($key == key_::NONE)
            {
                $query_builder->groupBy("{$alias}.$group[0]");
            }
            else if ($key == key_::ADD)
            {
                $query_builder->addGroupBy("{$alias}.$group[0]");
            }
        }

        return $this;

    }

    /*
    https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/query-builder.html
    基於直觀，少用 $qb->expr()->，除非有比較難處理的，不然直接查到指令放進來即可
    $query_builder Doctrine Query Builder

    $filters = [
        sql_key::HAVING => [
            key_::NONE => ['xx', '=', '123'],
            key_::AND => ['xx', '=', '123'],
            key_::OR => ['xx', '>', '123'],
            key_::OR => ['xx', operator::BETWEEN, '123', '234'],
            // ----------------------------------------------------------
            // 有空再弄
            // ----------------------------------------------------------
            // 命令處理，大約用幾次for迴圈，寫個模組串出指令
            // (a or b) and c
            key_::AND_X => [
                "(",
                    ["id", op::IN, ["2", "4"]], key_::OR, ["id", op::IN, ["3", "4"]],
                ")",
                key_::AND, ["id", op::NOT_IN, ["2"]],
            ],
            // ----------------------------------------------------------
        ],
    ];
    */
    public function Having(&$query_builder, &$conditions, &$alias)
    {
        foreach($conditions as $key => &$condition)
        {
            if($condition[1] == op::BETWEEN)
            {
                $str = "{$alias}.{$condition[0]} {$condition[1]} '{$condition[2]}' AND '{$condition[3]}'";
            }
            else if($condition[1] == op::IN)
            {
                $str = $query_builder->expr()->in("{$alias}.{$condition[0]}", $condition[2]);
            }
            else if($condition[1] == op::NOT_IN)
            {
                $str = $query_builder->expr()->notIn("{$alias}.{$condition[0]}", $condition[2]);
            }
            else
            {
                $str = "{$alias}.{$condition[0]} {$condition[1]} '{$condition[2]}'";
            }

            if($key == key_::NONE)
            {
                $query_builder->having($str);
            }
            else if($key == key_::AND)
            {
                $query_builder->andHaving($str);
            }
            else if($key == key_::OR)
            {
                $query_builder->orHaving($str);
            }
        }

        return $this;

    }

}

