<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id', false, true);
            $table->string('name');
            $table->string('description');
            $table->double('price');
            $table->integer('btw');
            $table->foreign('category_id')->references('id')->on('item_categories')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function(Blueprint $table)
        {
            $table->dropForeign('items_category_id_foreign');
        });
        Schema::drop('items');
    }
}
