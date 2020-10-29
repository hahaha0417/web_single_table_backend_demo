<?php

namespace hahaha;

use  hahaha\define\hahaha_define_sql_key as key_;

use hahaha\hahaha_convert_doctrine_dql;
use Doctrine\ORM\Query;

use Registry;
use EntityManager;
use Config;

/*
需要\hahaha\hahaha_repositories_single_table_basic_trait
*/
trait hahaha_repositories_single_table_composite_trait
{
	/*
    https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/tutorials/pagination.html
    因為我只傳部分欄位(因為我要精簡)，因此仿照doctrine pagination，手動處理
    https://github.com/doctrine/orm/blob/master/lib/Doctrine/ORM/Tools/Pagination/Paginator.php *
    他只有兩步驟
    取得count，並計算出分頁，iterator時取得頁面那些項目，自己寫的差別在，我可以精簡，並且不用轉成entity
     --------------------------------------------------
    注意 : $filters[key_::SETTING] 會被覆蓋
    */
    public function findByPagination(&$data_list,
        &$data_link,
        &$setting_table,
        &$filters = [],
        $page = 1,
        $size = 10
    )
    {
        $count_ = $this->findByCount($setting_table);

        $page_count_ = intVal(ceil($count_ / $size));
        $limit_ = $size;
        //DB 從0開始算
        $offset_ = ($page - 1) * $limit_;

        if(isset($filters[key_::SETTING]) )
        {
            // 設定錯誤，$filters[key_::SETTING]是使用 $page & $size 找出，避免混亂，拋出例外
            throw new \Exception('設定錯誤，$filters[key_::SETTING]是使用 $page & $size 找出，避免混亂，拋出例外');
        }

        // 替代
        $filters[key_::SETTING] = [
            key_::OFFSET => &$offset_,
            key_::LIMIT => &$limit_,
        ];

        // 筆數內容
        $result_ = $this->findByFields($data_list,
            $setting_table,
            $filters
        );

        // 清除
        unset($filters[key_::SETTING]);

        // 資料連結，從1開始算
        $data_link = [
            "page" => $page,
            "count" => $page_count_,
            "range" => Config::get("option.table.range"),
        ];

		return $result_;
    }


}
