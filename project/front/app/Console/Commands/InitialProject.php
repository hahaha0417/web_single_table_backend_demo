<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Config;

class InitialProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'initial:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // create database
        $conn_ = mysqli_connect(
            Config::get('database.connections.mysql_front.host'), 
            Config::get('database.connections.mysql_front.username'), 
            Config::get('database.connections.mysql_front.password'),
            NULL,       // 要建立DB，所以為null
            Config::get('database.connections.mysql_front.port')
        );            
        
        $database_ = Config::get('database.connections.mysql_front.database');
        $charset_ = Config::get('database.connections.mysql_front.charset');
        $collation_ = Config::get('database.connections.mysql_front.collation');
        

        $result_ = mysqli_query($conn_, "SHOW DATABASES LIKE '$database_';");
        $row = mysqli_fetch_row($result_);
        // 釋放
        mysqli_free_result($result_);

        if($row[0] != $database_) 
        {
            // 不存在，則建立DB
            $result_ = mysqli_query($conn_, "CREATE DATABASE $database_ CHARACTER SET $charset_ COLLATE $collation_;");
            if($result_) 
            {
                echo "資料庫創建成功";                
            } else 
            {
                echo "資料庫創建失敗";
            }
        }
        else 
        {
            echo "資料庫已經存在";
        }
        mysqli_close($conn_);

    }
}
