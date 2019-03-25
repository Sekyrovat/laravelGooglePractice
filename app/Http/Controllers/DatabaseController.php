<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// You need to include the DB to use raw queries.
use DB;

class DatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

////////////////
//Raw Queries //
////////////////

///////////////////
//Insert Queries //
///////////////////

    public function insertAreaRaw($id, $desc)
    {
        DB::table('areas')->insert(['nombreArea' => $id, 'description'=> $desc]);
    }
    public function insertUserRaw($name, $lastname, $email, $pwd)
    {
        DB::table('usuarios')->insert(['nombre' => $name, 'apellido'=> $lastname, 'correo' => $email, 'contrasenia' => $pwd]);
    }
    public function insertProyRaw($name, $client)
    {
        DB::table('proyectos')->insert(['nombreProy' => $name, 'nombreCliente'=> $client]);
    }
    public function insertBacklogRaw($proy, $area, $act, $desc)
    {
        DB::table('backlogs')->insert(['idProy' => $proy, 'idArea'=> $area, 'actividad' => $act, 'descripcion' => $desc]);
    }
    public function insertRelationRaw($proy, $employee)
    {
        DB::table('proyecto_empleados')->insert(['idProy' => $proy, 'idUsuario'=> $employee]);
    }

////////////////
//Get Queries //
////////////////

    public function getAreaRaw($name = null, $id = null)
    {
        $results = DB::select('select * from areas where id = ? AND nombreArea = ?', [$id, $name]);
        foreach($results as $result)
        {
            return $result->nombreArea;
        }
    }
    public function getAreaRawId($id = null)
    {
        $results = DB::select('select * from areas where id = ?', [$id]);
        foreach($results as $result)
        {
            return $result->id;
        }
    }
    public function getAreaRawName($name = null)
    {
        $results = DB::select('select * from areas where nombreArea = ?', [$name]);
        foreach($results as $result)
        {
            return $result->nombreArea;
        }
    }

    public function getUserRaw($id = null, $name = null, $lastname = null, $email = null)
    {
        $results = DB::select('select * from usuarios where id = ?, AND nombre = ?, AND apellido = ? AND correo = ?', [$id, $name, $lastname, $email]);
        foreach($results as $result)
        {
            return $result->id;
        }
    }
    public function getUserRawId($id = null)
    {
        $results = DB::select('select * from usuarios where id = ?', [$id]);
        foreach($results as $result)
        {
            return $result->id;
        }
    }
    public function getUserRawName($name = null)
    {
        $results = DB::select('select * from usuarios where nombre = ?', [$name]);
        foreach($results as $result)
        {
            return $result->nombre;
        }
    }
    public function getUserRawLastname($lastname = null)
    {
        $results = DB::select('select * from usuarios where apellido = ?', [$lastname]);
        foreach($results as $result)
        {
            return $result->apellido;
        }
    }
    public function getUserRawEmail($email = null)
    {
        $results = DB::select('select * from usuarios where correo = ?', [$email]);
        foreach($results as $result)
        {
            return $result->correo;
        }
    }


    public function getProyRaw($id = null, $name = null, $client = null, $succes = null)
    {
        $results = DB::select('select * from proyectos where id = ?, AND nombreProy = ?, AND nombreCliente = ? AND exito = ?', [$id, $name, $client, $succes]);
        foreach($results as $result)
        {
            return $result->id;
        }
    }
    public function getProyRawId($id = null)
    {
        $results = DB::select('select * from proyectos where id = ?', [$id]);
        foreach($results as $result)
        {
            return $result->id;
        }
    }
    public function getProyRawName($name = null)
    {
        $results = DB::select('select * from proyectos where nombreProy = ?', [$name]);
        foreach($results as $result)
        {
            return $result->nombreProy;
        }
    }
    public function getProyRawClient($client = null)
    {
        $results = DB::select('select * from proyectos where nombreCliente = ?', [$client]);
        foreach($results as $result)
        {
            return $result->nombreCliente;
        }
    }
    public function getProyRawSuccess($succes = null)
    {
        $results = DB::select('select * from proyectos where exito = ?', [$succes]);
        foreach($results as $result)
        {
            return $result->exito;
        }
    }

    public function getBacklogRaw($id = null, $act_Name = null, $proy_id = null, $area_id = null, $completed = null, $accepeted = null)
    {
        $results = DB::select('select * from backlogs where id = ?, AND actividad = ?, AND idProy = ?, AND idArea = ?, AND completado = ? AND aceptado = ?', [$id, $act_Name, $proy_id, $area_id, $completed, $accepeted]);
        foreach($results as $result)
        {
            return $result->id;
        }
    }
    public function getBacklogRawId($id = null)
    {
        $results = DB::select('select * from backlogs where id = ?', [$id]);
        foreach($results as $result)
        {
            return $result->id;
        }
    }
    public function getBacklogRawName($act_Name = null)
    {
        $results = DB::select('select * from backlogs where actividad = ?', [$act_Name]);
        foreach($results as $result)
        {
            return $result->actividad;
        }
    }
    public function getBacklogRawIdProy($proy_id = null)
    {
        $results = DB::select('select * from backlogs where idProy = ?', [$proy_id]);
        foreach($results as $result)
        {
            return $result->idProy;
        }
    }
    public function getBacklogRawIdArea($area_id = null)
    {
        $results = DB::select('select * from backlogs where idArea = ?', [$area_id]);
        foreach($results as $result)
        {
            return $result->idArea;
        }
    }
    public function getBacklogRawCompleted($completed = null)
    {
        $results = DB::select('select * from backlogs where completado = ?', [$completed]);
        foreach($results as $result)
        {
            return $result->completado;
        }
    }
    public function getBacklogRawAccepted($accepeted = null)
    {
        $results = DB::select('select * from backlogs where aceptado = ?', [$accepeted]);
        foreach($results as $result)
        {
            return $result->aceptado;
        }
    }

    public function getRelationRaw($proy_id = null, $employee_id = null)
    {
        $results = DB::select('select * from proyecto_empleados where idProy = ? AND idUsuario = ?', [$proy_id, $employee_id]);
        foreach($results as $result)
        {
            return $result->idProy;
        }
    }
    public function getRelationRawProyect($proy_id = null)
    {
        $results = DB::select('select * from proyecto_empleados where idProy = ?', [$proy_id]);
        foreach($results as $result)
        {
            return $result->idProy;
        }
    }
    public function getRelationRawUser($employee_id = null)
    {
        $results = DB::select('select * from proyecto_empleados where idUsuario = ?', [$employee_id]);
        foreach($results as $result)
        {
            return $result->idArea;
        }
    }


///////////////////
//Update Queries //
///////////////////

    public function updateAreaRawName($name = null, $id = null)
    {
        $results = DB::update('update areas set nombreArea = ? where id = ?', [$name, $id]);
        return $results;
    }
    public function updateUserRawName($name = null, $id = null)
    {
        $results = DB::update('update usuarios set nombre = ? where id = ?', [$name, $id]);
        return $results;
    }
    public function updateUserRawLastname($lastname = null, $id = null)
    {
        $results = DB::update('update usuarios set apellido = ? where id = ?', [$lastname, $id]);
        return $results;
    }
    public function updateUserRawEmail($email = null, $id = null)
    {
        $results = DB::update('update usuarios set correo = ? where id = ?', [$email, $id]);
        return $results;
    }
    public function updateProyRawName($name = null, $id = null)
    {
        $results = DB::update('update proyectos set nombreProy = ? where id = ?', [$name, $id]);
        return $results;
    }
    public function updateProyRawClient($client = null, $id = null)
    {
        $results = DB::update('update proyectos set nombreCliente = ? where id = ?', [$client, $id]);
        return $results;
    }
    public function updateProyRawSuccess($succes = null, $id = null)
    {
        $results = DB::update('update proyectos set exito = ? where id = ?', [$succes, $id]);
        return $results;
    }
    public function updateBacklogRawName($act_Name = null, $id = null)
    {
        $results = DB::update('update backlogs set actividad = ? where id = ?', [$act_Name, $id]);
        return $results;
    }
    public function updateBacklogRawIdArea($area_id = null, $id = null)
    {
        $results = DB::update('update backlogs set idArea = ? where id = ?', [$area_id, $id]);
        return $results;
    }
    public function updateBacklogRawCompleted($completed = null, $id = null)
    {
        $results = DB::update('update backlogs set completado = ? where id = ?', [$completed, $id]);
        return $results;
    }
    public function updateBacklogRawAccepted($accepeted = null, $id = null)
    {
        $results = DB::update('update backlogs set aceptado = ? where id = ?', [$accepeted, $id]);
        return $results;
    }
    public function updateRelationRawProyect($proy_id = null, $employee_id = null)
    {
        $results = DB::update('update proyecto_empleados set idProy = ? where idUsuario = ?', [$proy_id, $employee_id]);
        return $results;
    }
    public function updateRelationRawUser($employee_id = null, $proy_id = null)
    {
        $results = DB::update('update proyecto_empleados set idUsuario = ? where idProy = ?', [$employee_id, $proy_id]);
        return $results;
    }


}
