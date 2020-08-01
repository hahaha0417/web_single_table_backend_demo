<?php

namespace hahaha;

use  hahaha\define\hahaha_define_table_key as key;

use hahaha\hahaha_convert_doctrine_dql;
use Doctrine\ORM\Query;

use Registry;
use EntityManager;

/*
// 不要用，他會parser檔案，導致慢很多，可以的話用填表法代替
$class_meta_ = EntityManager::getClassMetadata($setting_table['entity']);
$table_name_ = $class_meta_->getTableName();
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
        &$fields = ['*'], 
        $offset = null, 
        $limit = null
    ) 
    {
        //
        $alias_ = &$setting_table['alias'];

        // 串出需要的select
		$select_ = '';
		$convert_doctrine_dql_ = hahaha_convert_doctrine_dql::Instance();
        $convert_doctrine_dql_->To_Select($select_, $fields, $alias_);

        $qb_ = Registry::getManager($setting_table['connection'])->createQueryBuilder();
        $qb_->select($select_)
           ->from($setting_table['entity'], $alias_);

        if (!is_null($offset))
        {
            $qb_->setFirstResult($offset);
        }
   
        if (!is_null($limit))
        {
            $qb_->setMaxResults($limit);
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