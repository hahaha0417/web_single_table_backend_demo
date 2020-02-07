<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->comment('類型');
            $table->string('name')->comment('名稱');
            $table->string('description', 1024)->comment('描述')->nullable();
            $table->string('comment', 1024)->comment('備註')->nullable();
            $table->string('image', 512)->comment('圖片')->nullable();
            $table->string('url', 512)->comment('連結')->nullable();
            $table->dateTime('show_start_time')->comment('顯示開始時間')->nullable();
            $table->dateTime('show_end_time')->comment('顯示結束時間')->nullable();
            $table->dateTime('sale_start_time')->comment('販賣開始時間')->nullable();
            $table->dateTime('sale_end_time')->comment('販賣結束時間')->nullable();
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
        Schema::dropIfExists('products');
    }
}
