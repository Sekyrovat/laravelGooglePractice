<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->tinyIncrements('id')->comment("Auto-incrementing unsigned TINYINT that holds the ID of the area. Used as PK in this table.");
            $table->string('nombre_area', 150)->unique()->comment("Varchar with limit of 150 chars for the name of the area.");
            $table->mediumText('descripcion')->comment("Default description of the area. Used by the front end to obtain the description. Allowing to get the information from the database to use in the landing page.");
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
        Schema::dropIfExists('areas');
    }
}
