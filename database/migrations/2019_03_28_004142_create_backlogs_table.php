<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBacklogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        
        Schema::create('backlogs', function (Blueprint $table) {
            $table->bigIncrements('id')->comment("Auto-incrementing unsigned BigInt, holds the ID of the element in the backlog. Used as PK.");
            $table->string('actividad');
            $table->string('descripcion');
            $table->boolean('completado')->default(0)->comment("Boolean to allow the area leader marks which elements have been marked as completed but are pending validation.");
            $table->boolean('aceptado')->default(0)->comment("Boolean to mark which elements have been marked as accepeted by the owner.");
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
        Schema::dropIfExists('backlogs');
    }
}
