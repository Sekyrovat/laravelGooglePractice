<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_proyectos', function (Blueprint $table) {
            $table->unsignedSmallInteger('idArea')->references('id')->on('areas')->comment("Unsigned SmallInt to act as FK to identify the area.");
            $table->unsignedBigInteger('idProy')->references('id')->on('proyectos')->comment("Unsigned BigInt to act as FK to identify the proyect.");
            $table->primary(['idProy', 'idArea']);
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
        Schema::dropIfExists('area_proyectos');
    }
}
