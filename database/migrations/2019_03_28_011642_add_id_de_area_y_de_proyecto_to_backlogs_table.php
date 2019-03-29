<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdDeAreaYDeProyectoToBacklogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('backlogs', function (Blueprint $table) {
            //

            $table->unsignedBigInteger('proyecto_id')->references('id')->on('proyectos')->comment("Unsigned BigInt to refer to the proyect the element comes from."); 
            $table->unsignedTinyInteger('area_id')->references('id')->on('areas')->comment("Unsigned TINYINT to refer to the area the element of the baklog belongs to.");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('backlogs', function (Blueprint $table) {
            //

            $table->dropColumn('idProy');
            $table->dropColumn('idArea');
        });
    }
}
