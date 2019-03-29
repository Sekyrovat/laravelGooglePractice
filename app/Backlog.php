<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backlog extends Model
{
    //
    protected $fillable = ['actividad', 'descripcion', 'area_id', 'proyecto_id'];
}
