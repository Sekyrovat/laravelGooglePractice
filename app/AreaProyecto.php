<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaProyecto extends Model
{
    //
    protected $table = 'area_proyecto';
    protected $fillable = ['area_id', 'proyecto_id', 'created_at', 'updated_at'];
}
