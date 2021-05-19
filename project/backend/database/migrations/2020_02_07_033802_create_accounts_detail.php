<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * 附加表
     */
    public function up()
    {
        Schema::create('accounts_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            // 關注項目
            $table->unsignedBigInteger('accounts_id')->comment('會員id');
            $table->string('name')->comment('名稱')->nullable();
            $table->string('nickname')->comment('暱稱')->nullable();
            $table->string('avatar', 512)->comment('頭像')->nullable();
            $table->string('image', 512)->comment('圖片')->nullable();
            $table->string('url', 512)->comment('連結')->nullable();
            $table->string('phone')->comment('電話')->nullable();
            // 暫存
            $table->string('verify_token')->comment('驗證碼')->nullable();
            
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
        Schema::dropIfExists('accounts_detail');
    }
}
