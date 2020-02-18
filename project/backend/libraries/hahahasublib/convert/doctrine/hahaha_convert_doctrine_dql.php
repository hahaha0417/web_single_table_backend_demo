<?php

namespace hahaha;

use hahahasublib\hahaha_instance_trait;

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
} 

