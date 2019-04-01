<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdDeAreaToUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::table('usuarios', function (Blueprint $table) {
            //

            $table->unsignedTinyInteger('area_id')->references('id')->on('areas')->comment("Unsigned TINYINT to refer to the area a particular user is related.");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            //

            $table->dropColumn('area_id');
        });
    }
}
