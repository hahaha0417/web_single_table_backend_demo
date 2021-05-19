<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * 關係表
     */
    public function up()
    {
        Schema::create('accounts_relations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('accounts_id1')->comment('帳號id1');
            $table->unsignedBigInteger('accounts_id2')->comment('帳號id2');
            $table->string('description')->comment('description')->nullable();
            $table->timestamps();

            $table->foreign('accounts_id1')->references('id')->on('accounts');
            $table->foreign('accounts_id2')->references('id')->on('accounts');
            //
            $table->index(['accounts_id1', 'accounts_id2']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts_relations');
    }
}
