<?php

namespace Seeder\Demo;

use Illuminate\Database\Seeder;
use DB;

class AccountsTableSeeder extends Seeder
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
        DB::table('accounts')->insert([
            [
                'account' => 'admin',
                'password' => md5('admin'),
                'email' => 'hahaha0417@hotmail.com',
                'gender' => 1,
                'status' => 1,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);

        DB::table('accounts_detail')->insert([
            [
                'accounts_id' => $i,
                'name' => 'hahaha',
                'phone' => '0916353255',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
        DB::table('accounts_login_records')->insert([
            [
                'accounts_id' => $i,
                'ip' => '127.0.0.1:8700',
                'login_time' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),                
            ],
        ]);

        $i++;
        DB::table('accounts')->insert([
            [
                'account' => 'hahaha',
                'password' => md5('hahaha'),
                'email' => 'hahaha0417@hotmail.com',
                'gender' => 1,
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);

        DB::table('accounts_detail')->insert([
            [
                'accounts_id' => $i,
                'name' => 'hahaha',
                'phone' => '0916353255',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);  
        DB::table('accounts_login_records')->insert([
            [
                'accounts_id' => $i,
                'ip' => '127.0.0.1:8700',
                'login_time' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);
        
        // relative
        DB::table('accounts_relations')->insert([
            [
                'accounts_id1' => 1,
                'accounts_id2' => 2,
                'description' => 'hahaha',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);        

        $i++;
        DB::table('accounts')->insert([
            [
                'account' => 'hahaha1',
                'password' => md5('hahaha'),
                'email' => 'hahaha0417@hotmail.com1',
                'gender' => 1,
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);

        $i++;
        DB::table('accounts')->insert([
            [
                'account' => 'hahaha2',
                'password' => md5('hahaha'),
                'email' => 'hahaha0417@hotmail.com2',
                'gender' => 1,
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);

        $i++;
        DB::table('accounts')->insert([
            [
                'account' => 'hahaha3',
                'password' => md5('hahaha'),
                'email' => 'hahaha0417@hotmail.com3',
                'gender' => 1,
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);

        $i++;
        DB::table('accounts')->insert([
            [
                'account' => 'hahaha4',
                'password' => md5('hahaha'),
                'email' => 'hahaha0417@hotmail.com4',
                'gender' => 1,
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);

        $i++;
        DB::table('accounts')->insert([
            [
                'account' => 'hahaha5',
                'password' => md5('hahaha'),
                'email' => 'hahaha0417@hotmail.com5',
                'gender' => 1,
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);

        $i++;
        DB::table('accounts')->insert([
            [
                'account' => 'hahaha6',
                'password' => md5('hahaha'),
                'email' => 'hahaha0417@hotmail.com4',
                'gender' => 1,
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);

        $i++;
        DB::table('accounts')->insert([
            [
                'account' => 'hahaha7',
                'password' => md5('hahaha'),
                'email' => 'hahaha0417@hotmail.com5',
                'gender' => 1,
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);

        $i++;
        DB::table('accounts')->insert([
            [
                'account' => 'hahaha8',
                'password' => md5('hahaha'),
                'email' => 'hahaha0417@hotmail.com4',
                'gender' => 1,
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);

        $i++;
        DB::table('accounts')->insert([
            [
                'account' => 'hahaha9',
                'password' => md5('hahaha'),
                'email' => 'hahaha0417@hotmail.com5',
                'gender' => 1,
                'status' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ]);

    }
}
