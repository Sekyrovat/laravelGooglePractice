<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_proyecto', function (Blueprint $table) {
            $table->unsignedSmallInteger('area_id')->references('id')->on('areas')->comment("Unsigned SmallInt to act as FK to identify the area.");
            $table->unsignedBigInteger('proyecto_id')->references('id')->on('proyectos')->comment("Unsigned BigInt to act as FK to identify the proyect.");
            $table->primary(['area_id', 'proyecto_id']);
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
        Schema::dropIfExists('area_proyecto');
    }
}
