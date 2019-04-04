<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $fillable = ['nombre_area', 'lider_id', 'descripcion'];

    public function lider()
    {
        //return $this->hasOne('App\Usuario', 'id', 'lider_id');
        return $this->hasOne('App\Usuario');
    }

    public function getAreaMembers(){
        return $this->hasMany('App\Usuario');
    }

    public function getBacklog()
    {
        //return $this->hasMany('App\Backlog', 'area_id', 'id');
        return $this->hasMany('App\Backlog');
    }

    // public function proyectos()
    // {
    //     return $this->hasManyThrough('App\Proyecto',    // A que modelo voy
    //                                 'App\AreaProyecto', // Que modelo me va a ayudar
    //                                 'area_id',          // Cual es con la que me voy a comunicar con la llave del que parto (aka en la tabla de area_proyecto)
    //                                 'id',               // Como se llama con la llave que comparo en la tabla final (aka proyectos)
    //                                 'id',               // Llave con la que parto de la tabla inicial (aka areas)
    //                                 'proyecto_id');     // Cual es la llave con la que parto de la tabla media a la final (aka area_proyecto)
    // }
    // 
    // Apparently interchangeable ^ v 
    public function proyectos(){
        return $this->belongsToMany('App\Proyecto')->withTimestamps();
    }
}
