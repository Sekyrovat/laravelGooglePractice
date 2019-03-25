<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->smallIncrements('id')->comment("Auto-incrementing unsigned SmallInt, holds the ID of each user. Used as PK.");
            $table->string('nombre', 150)->comment("Varchar with the limit of 150 chars to hold the name of each user.");
            $table->string('apellido', 150)->comment("Varchar with the limit of 150 chars to hold the lastname of each user.");
            $table->string('correo', 150)->comment("Varchar with the limit of 150 chars to hold the email of each user.")->unique();
            $table->string('contrasenia', 255)->comment("Varchar with the limit of 255 chars to hold the hashed password.");
            $table->unsignedTinyInteger('idArea')->references('id')->on('areas')->comment("Unsigned TINYINT to refer to the area a particular user is related.");
            $table->boolean('validado')->default(0)->comment("Boolean to check if the account has been validated.");
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
        Schema::dropIfExists('usuarios');
    }
}