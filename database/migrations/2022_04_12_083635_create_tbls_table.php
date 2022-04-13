<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Filament\Forms\Components\MultiSelect;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbls', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->json("childs")->default('[]')->nullable();
            $table->boolean("softDelete")->default(0);

            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->onDelete('cascade')->references('id')
                ->on('projects');

        $table->unique(['project_id', 'name']);//

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
        Schema::dropIfExists('tbls');
    }
};
