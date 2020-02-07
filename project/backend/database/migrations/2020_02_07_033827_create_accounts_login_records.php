<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsLoginRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * 子表
     */
    public function up()
    {
        Schema::create('accounts_login_records', function (Blueprint $table) {
            // 關注項目
            $table->bigIncrements('id');
            $table->unsignedBigInteger('accounts_id')->comment('帳號id');
            $table->string('ip')->comment('ip');
            $table->dateTime('login_time')->comment('登入時間');
            $table->string('description')->comment('描述')->nullable();

            $table->timestamps();
            // 外鍵
            $table->foreign('accounts_id')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts_login_records');
    }
}
