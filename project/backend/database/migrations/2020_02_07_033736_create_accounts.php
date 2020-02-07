<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * 主表 
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            // 關注項目
            $table->string('account')->comment('帳號');
            $table->string('password')->comment('密碼');
            $table->string('email')->comment('信箱');
            $table->tinyInteger('gender')->comment('性別');            
            $table->integer('status')->comment('狀態 -1 停用 0 為驗證 1 驗證');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
