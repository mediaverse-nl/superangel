<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id', false, true);
            $table->string('color', 35);
            $table->string('size', 11);
            $table->integer('qty');
            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_stocks', function (Blueprint $table) {
            $table->dropForeign('item_stocks_item_id_foreign');
        });

        Schema::drop('item_stocks');
    }
}
