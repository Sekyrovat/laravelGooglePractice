<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //
    protected $fillable = ['nombreArea', 'idLider', 'description'];

    public function getLeader()
    {
    	return $this->hasOne('App\Usuario', 'id', 'idLider');
    }

    public function getBacklog()
    {
    	return $this->hasMany('App\Backlog', 'idArea', 'id');
    }
}
