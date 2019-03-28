<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdDeJefeDeAreaColumnToAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('areas', function (Blueprint $table) {
            //
            
            $table->unsignedSmallInteger('idLider')->default(0)->references('id')->on('usuarios')->comment("SmallInt used to hold the ID of the leader of the area. It has a default value of 0 so that the owner of the company is markes as the first owner.");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('areas', function (Blueprint $table) {
            //

            $table->dropColumn('idLider');
        });
    }
}
