<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        
        Schema::create('proyectos', function (Blueprint $table) {
            $table->bigIncrements('id')->comment("Auto-incrementing unsigned BigInt, holds the ID of the proyect. Used as PK.");
            $table->string('nombre_proyecto', 150)->comment("Varchar with the limit of 150 chars to hold the value of the name of the proyect.");
            $table->string('nombre_cliente', 150)->comment("Varchar with the limit of 150 chars to hold the value of the name of the client.");
            $table->mediumText('descripcion')->comment("Description of the proyect.");
            $table->date('finalizo')->nullable($value = true);
            $table->boolean('exito')->default(0)->comment("Boolean to check if the proyect was successful.");
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
        Schema::dropIfExists('proyectos');
    }
}
