<?php

namespace hahaha;

use hahahasublib\hahaha_instance_trait;

/*
單表式後台generator
*/
class hahaha_generator_web
{
    use hahaha_instance_trait;

    function __construct()
    {

    }

    /*
    直接產生在物件身上
    */
    public function Generate_In_Object(&$objects = [])
    {
        foreach($objects as $key => $object)
        {
            $object->Generate($object->Static_Contents, $object->Dynamic_Contents);
        }

    }

    /*
    產生
    統一接口所以不產生自己
    */
    public function Generate(&$objects = [], &$static_contents = [], &$dynamic_contents = [])
    {
        $static_contents = [];
        $dynamic_contents = [];

        foreach($objects as $key => $object)
        {
            $static_contents[$key] = [];
            $dynamic_contents[$key] = [];
            $object->Generate($static_contents[$key], $dynamic_contents[$key]);
        }

    }

    /*
    指定輸出檔名
    key to key，資料和檔案名數量要一樣，並且1-1
    */
    public function Save(&$datas = [], &$files = [])
    {
        if(count($datas) != count($files) )
        {
            return false;
        }        
        
        foreach($datas as $key => &$data)
        {
            $file_ = \hahaha\hahaha_file::Instance();
            if(!empty($files[$key]))
            {
                $file_->Save_Text($files[$key], 
                    $data
                );
            }            
        }

    }

    /*
    輸出
    */
    public function Render(&$datas = [])
    {
        foreach($datas as $key => &$data)
        {
            foreach($data as $key => &$line)
            {
                echo $line;
            }
        }

    }

}
