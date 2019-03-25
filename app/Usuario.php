<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    // Se debe de quitar lo de validado o al menos revisarlo para que solo se peuda con update.
    protected $fillable = ['nombre', 'apellido', 'correo', 'contrasenia', 'idArea', 'validado'];
}
