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
			$table->string('nombreArea', 150)->unique()->comment("Varchar with limit of 150 chars for the name of the area.");
			$table->unsignedSmallInteger('idLider')->default(0)->references('id')->on('usuarios')->comment("SmallInt used to hold the ID of the leader of the area. It has a default value of 0 so that the owner of the company is markes as the first owner.");
			$table->mediumText('description')->comment("Default description of the area. Used by the front end to obtain the description. Allowing to get the information from the database to use in the landing page.");
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
