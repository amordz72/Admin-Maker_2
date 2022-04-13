<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_banks', function (Blueprint $table) {

            $table->increments('id');
            $table->text("title");
            $table->text("short");
            $table->text("body");


            $table->integer('technology_id')->unsigned();
            $table->foreign('technology_id')->onDelete('cascade')->references('id')
                ->on('technologies');

            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->onDelete('cascade')->references('id')
                ->on('groups');


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
        Schema::dropIfExists('code_banks');
    }
};
