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

    public function proyectos()
    {
        return $this->belongsToMany('App\Proyecto');
    }
}
