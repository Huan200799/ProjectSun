<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggest', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->string('product_img');
            $table->text('description');
            $table->text('reason');
            $table->integer('price');
            $table->integer('status');
            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')->references(
                'id')->on('categories')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references(
                'id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('suggest');
    }
}
