<?php

namespace hahaha;

use  hahaha\define\hahaha_define_sql_key as key_;

use hahaha\hahaha_convert_doctrine_dql;
use Doctrine\ORM\Query;

use Registry;
use EntityManager;

/*
// 他會cache，基本上只要cache到redis or memcached，可以正常使用
// 只要有使用到Entity，就會parser檔案(因為要做type轉換)，這沒辦法避免
$class_meta_ = EntityManager::getClassMetadata($setting_table['entity']);
$table_name_ = $class_meta_->getTableName();

注意 : 因為是single table，所以這裡不join foreign key
*/
trait hahaha_repositories_single_table_basic_trait
{
    public function findByCount(&$setting_table)
    {
        $alias_ = &$setting_table['alias'];

        $qb_ = Registry::getManager($setting_table['connection'])->createQueryBuilder();
        $qb_->select("count({$alias_})")
           ->from($setting_table['entity'], $alias_);

        $query_ = $qb_->getQuery()
            ->setHint(Query::HINT_FORCE_PARTIAL_LOAD, true);

        $result_ = $query_->getArrayResult();

        if(!$result_)
        {
            return false;
		}

        return $result_[0][1];
    }

    /*
    找到所有的表所需的欄位
    因為table欄位有列表，所以這裡設計成，可參數化

    注意 : $fields = ['*'];會回傳entity，如果欄位不完整$fields = ['id', 'account']，只會回傳array
    */
    public function findByFields(&$result,
        &$setting_table,
        &$filters = []
    )
    {
        if(empty($filters))
        {
            return true;
        }
        //
        $alias_ = &$setting_table['alias'];

        $qb_ = Registry::getManager($setting_table['connection'])->createQueryBuilder();
        $qb_->from($setting_table['entity'], $alias_);

        // $class_meta_ = EntityManager::getClassMetadata($setting_table['entity']);
        $convert_doctrine_dql_ = hahaha_convert_doctrine_dql::Instance();

        // Select
        if(!empty($filters[key_::SELECT]) && is_array($filters[key_::SELECT]))
        {
            $convert_doctrine_dql_->Select($qb_, $filters[key_::SELECT], $alias_);
        }

        // Condition
        if (!empty($filters[key_::CONDITION]) && is_array($filters[key_::CONDITION]))
        {
            $convert_doctrine_dql_->Condition($qb_, $filters[key_::CONDITION], $alias_);
        }

        // Setting
        if (!empty($filters[key_::SETTING]) && is_array($filters[key_::SETTING]))
        {
            $convert_doctrine_dql_->Setting($qb_, $filters[key_::SETTING], $alias_);
        }

        // Order
        if (!empty($filters[key_::ORDER]) && is_array($filters[key_::ORDER]))
        {
            $convert_doctrine_dql_->Order($qb_, $filters[key_::ORDER], $alias_);
        }

        // Group
        if (!empty($filters[key_::GROUP]) && !is_array($filters[key_::GROUP]))
        {
            $convert_doctrine_dql_->Group($qb_, $filters[key_::GROUP], $alias_);
        }

        // Having
        if (!empty($filters[key_::HAVING]) && !is_array($filters[key_::HAVING]))
        {
            $convert_doctrine_dql_->Having($qb_, $filters[key_::HAVING], $alias_);
        }

        $query_ = $qb_->getQuery()
            ->setHint(Query::HINT_FORCE_PARTIAL_LOAD, true);
        $result = $query_->getArrayResult();

        if(!$result)
        {
            return false;
        }

        return true;
    }


}
