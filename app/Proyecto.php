<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //
    protected $fillable = ['nombre_proyecto', 'nombre_cliente', 'descripcion'];

    public function areas()
    {
        return $this->belongsToMany('App\Area');
    }
}
