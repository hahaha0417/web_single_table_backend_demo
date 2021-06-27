<?php

/*
// --------------------------------------------------------------------------
注意
// --------------------------------------------------------------------------
沒 Opcache 很慢，請不要為了省力，摻入主要架構
使用多個資料庫需要建立連線，一次似乎要6ms(不確定)，請小心，不然會拖慢速度，
似乎PDO可以不先設定db(query時才下)，這裡應該有可能也可以
// --------------------------------------------------------------------------
*/

/*
Copyright (c) Doctrine Project

Permission is hereby granted, free of charge, to any person obtaining a copy of
this software and associated documentation files (the "Software"), to deal in
the Software without restriction, including without limitation the rights to
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
of the Software, and to permit persons to whom the Software is furnished to do
so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/

/*

{{-- 原始 : hahaha --}}
{{-- 維護 :  --}}
{{-- 指揮 :  --}}
{{-- ---------------------------------------------------------------------------------------------- --}}
{{-- 決定 : name --}}
{{-- 
    ----------------------------------------------------------------------------
    說明 : 
    ----------------------------------------------------------------------------   
    
    ----------------------------------------------------------------------------
--}}
{{-- ---------------------------------------------------------------------------------------------- --}}
*/

namespace hahahasublib;

/*
// --------------------------------------------------------------------------
// --------------------------------------------------------------------------
*/

// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use hahahalib\hahaha_orm_doctrine as hahaha_orm_doctrine_base;
use Config;

/*

*/
class hahaha_orm_doctrine extends hahaha_orm_doctrine_base 
{ 
    // 新柄，分層使用
    use \hahahasublib\hahaha_instance_trait;

    /*
    基本使用方法
    */
    public function Initial_Base_Laravel() 
    {
        // https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/tutorials/getting-started.html#getting-started-with-doctrine

        // Create a simple "default" Doctrine ORM configuration for Annotations
        $is_dev_mode_ = true;
        $proxy_dir_ = null; 
        $cache_ = null;
        $use_simple_annotation_reader_ = false;
        
        $config_ = Setup::createAnnotationMetadataConfiguration(
            [
                Config::Get('doctrine.connections.mysql_backend.path'),
            ], 
            $is_dev_mode_, 
            $proxy_dir_, 
            $cache_, 
            $use_simple_annotation_reader_
        );
        // or if you prefer yaml or XML
        //$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
        //$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

        // database configuration parameters
        // https://www.doctrine-project.org/projects/doctrine-dbal/en/2.9/reference/configuration.html
        // 查pdo_mysql
        
        $conn_ = [
            'driver' => Config::Get('doctrine.connections.mysql_backend.driver'),
            'host' => Config::Get('database.connections.mysql_backend.host'),
			'port' => Config::Get('database.connections.mysql_backend.port'),
            'user' => Config::Get('database.connections.mysql_backend.username'),
            'password' => Config::Get('database.connections.mysql_backend.password'),
            'dbname' => Config::Get('database.connections.mysql_backend.database'),
            'charset' => Config::Get('database.connections.mysql_backend.charset'),
        ];
       
        // obtaining the entity manager
        $this->Entity_Manager_ = EntityManager::create($conn_, $config_);

        return $this->Entity_Manager_;
    }

    /*
    設定資料庫，路徑
    // Database沒辦法動態切，所以每連一個不一樣的要new一個，或者是我在config設定多組，根據關鍵字，建立不同的關鍵字連道不同資料庫
    // 我這裡是用Initial_Config()的方式選擇資料庫
    // https://ourcodeworld.com/articles/read/137/how-to-use-more-than-one-database-using-doctrine-orm-in-symfony-3

    $app_ = \hahaha\hahaha_application::Instance();
    $doctrine_ = \hahahalib\hahaha_orm_doctrine::Instance();
    // 這可相對路徑，但是注意檔案在哪裡
    $doctrine_->Initial_Config('test_oring', $app_->Root_ . '/app/models/A');
    */
    public function Initial_Config_Laravel($db_name = NULL, $path = NULL)
    {
        // https://www.doctrine-project.org/projects/doctrine-orm/en/2.6/tutorials/getting-started.html#getting-started-with-doctrine

        $db_name_ = isset($db_name) ? $db_name : Config::Get('database.connections.mysql_backend.database');
        $path_ = isset($path) ? $path : Config::Get('doctrine.connections.mysql_backend.path');


        // Create a simple "default" Doctrine ORM configuration for Annotations
        $is_dev_mode_ = true;
        $proxy_dir_ = null;
        $cache_ = null;
        $use_simple_annotation_reader_ = false;
        
        $config_ = Setup::createAnnotationMetadataConfiguration(
            [
                $path_
            ], 
            $is_dev_mode_, 
            $proxy_dir_, 
            $cache_, 
            $use_simple_annotation_reader_
        );
        // or if you prefer yaml or XML
        //$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
        //$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

        // database configuration parameters
        // https://www.doctrine-project.org/projects/doctrine-dbal/en/2.9/reference/configuration.html
        // 查pdo_mysql
        
        $conn_ = [
            'driver' => Config::Get('doctrine.connections.mysql_backend.driver'),
            'host' => Config::Get('database.connections.mysql_backend.host'),
			'port' => Config::Get('database.connections.mysql_backend.port'),
            'user' => Config::Get('database.connections.mysql_backend.username'),
            'password' => Config::Get('database.connections.mysql_backend.password'),
            'dbname' => &$db_name_,
            'charset' => Config::Get('database.connections.mysql_backend.charset'),
        ];
       
        // obtaining the entity manager
        $this->Entity_Manager_ = EntityManager::create($conn_, $config_);

        return $this->Entity_Manager_;
    }

}