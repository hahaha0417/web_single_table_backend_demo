<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $type_ = Config::get("app.seeder.type");
        // 分類原則上各自獨立，但其實也可以互相使用，沒有硬性規定
        if($type_ == "demo")
        {
            $this->call(\Seeder\Demo\AccountsTableSeeder::class);
        }
        else if($type_ == "migrate")
        {

        }
        else if($type_ == "publish")
        {

        }
    }
}
