<?php

namespace Seeder\Demo;

use Illuminate\Database\Seeder;
use DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $i = 1;
        DB::table('products')->insert([
            [
                'type' => 'OGC',
                'name' => 'hahaha',
                'show_start_time' =>  \Carbon\Carbon::now(),
                'show_end_time' => \Carbon\Carbon::now(),
                'sale_start_time' =>  \Carbon\Carbon::now(),
                'sale_end_time' => \Carbon\Carbon::now(),
                'status' => 0,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);

        DB::table('accounts_products_likes')->insert([
            [
                'accounts_id' => '1',
                'products_id' => '1',
                'like' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
        $i++;
        DB::table('products')->insert([
            [
                'type' => '3cm',
                'name' => 'bank',
                'show_start_time' =>  \Carbon\Carbon::now(),
                'show_end_time' => \Carbon\Carbon::now(),
                'sale_start_time' =>  \Carbon\Carbon::now(),
                'sale_end_time' => \Carbon\Carbon::now(),
                'status' => 0,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);

        DB::table('accounts_products_likes')->insert([
            [
                'accounts_id' => '1',
                'products_id' => '2',
                'like' => '0',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
    }
}
