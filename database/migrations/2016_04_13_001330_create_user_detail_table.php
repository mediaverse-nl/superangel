<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id', false, true);
            $table->string('firstname', 20);
            $table->string('lastname', 50);
            $table->enum('sex', array('man', 'vrouw'));
            $table->string('address', 255);
            $table->string('zipcode', 10);
            $table->string('city');
            $table->string('country');
            $table->integer('cellphone');
            $table->integer('mobile');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_details');
    }
}
