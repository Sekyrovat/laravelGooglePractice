<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $fillable = ['nombre', 'apellido', 'correo', 'contrasenia', 'area_id'];


    // La funcion se debe llamar area, para que se sufije al nombre de la funcion '_id' para usarlo como FK
    public function area(){
    	return $this->belongsTo('App\Area');
    }
    // La otra forma de hacerlo es poner como segundo argumento la FK que deseas usar.
    public function getAreaFromMember(){
    	return $this->belongsTo('App\Area', 'area_id');
    }
}


// The following is related to the User default model laravel has
// <?php

// namespace App;

// use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Foundation\Auth\User as Authenticatable;

// class User extends Authenticatable
// {
//     use Notifiable;

//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var array
//      */
//     protected $fillable = [
//         'name', 'email', 'password',
//     ];

//     /**
//      * The attributes that should be hidden for arrays.
//      *
//      * @var array
//      */
//     protected $hidden = [
//         'password', 'remember_token',
//     ];

//     /**
//      * The attributes that should be cast to native types.
//      *
//      * @var array
//      */
//     protected $casts = [
//         'email_verified_at' => 'datetime',
//     ];
// }
