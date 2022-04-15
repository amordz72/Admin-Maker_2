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
        Schema::create('cols', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");


            $table->string("type");
            $table->boolean("null")->default(1);

            $table->boolean("fill")->default(1);
            $table->boolean("hidden")->default(0);
            $table->boolean("unique")->default(0);

            $table->string ("casts")->nullable();
            $table->string ("default")->nullable();

  $table->string("parent_tbl")->nullable();
            $table->string("relation")->nullable();

            $table->integer('tbl_id')->unsigned();
            $table->foreign('tbl_id')->onDelete('cascade')->references('id')
                ->on('tbls');


        $table->unique(['tbl_id', 'name']);

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
        Schema::dropIfExists('cols');
    }
};
