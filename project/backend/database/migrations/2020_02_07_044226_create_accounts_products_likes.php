<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsProductsLikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts_products_likes', function (Blueprint $table) {
            $table->unsignedBigInteger('accounts_id')->comment('帳號id');
            $table->unsignedBigInteger('products_id')->comment('產品id');
            $table->tinyInteger('like')->comment('喜歡 0 不喜歡 1 喜歡');      
            $table->timestamps();

            $table->foreign('accounts_id')->references('id')->on('accounts');
            $table->foreign('products_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts_products_likes');
    }
}
