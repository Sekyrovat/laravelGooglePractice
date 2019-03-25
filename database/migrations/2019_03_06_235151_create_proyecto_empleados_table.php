<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_empleados', function (Blueprint $table) {
            $table->unsignedBigInteger('idProy')->references('id')->on('proyectos')->comment("Unsigned BigInt to act as FK to identify the proyect.");
            $table->unsignedSmallInteger('idUsuario')->references('id')->on('usuarios')->comment("Unsigned SmallInt to act as FK to identify the user.");
            $table->primary(['idProy', 'idUsuario']);
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
        Schema::dropIfExists('proyecto_empleados');
    }
}
