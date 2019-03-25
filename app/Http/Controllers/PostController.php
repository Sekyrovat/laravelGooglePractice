<?php

////////////////////////
// TAKE OUT THIS FILE //
////////////////////////
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "You are in the controller";
    }

    // The function takes everything from the url.
    public function indexWithParams($id)
    {
        return "You are in the controller with params " . $id;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "You are looking to create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        return "You are showing the controller with params " . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "You are in the controller trying to delete " . $id;
    }

    public function showCustomView1()
    {
        $people = ['Hector', 'Adriana', 'Adriana', 'Alvaro', 'Hector'];
        return view('contact', compact('people'));
    }

    ////////////////////////////////
    //Formas de enviar parametros //
    ////////////////////////////////

    //////////////////
    //Primera forma //
    //////////////////
    public function dataToView($id)
    {
        // Chaining. We use tha name of the variable and then the variable.
        //  return view('post') -> with('id', $id);
        return view('post', compact('id'));
    }

    //////////////////
    //Segunda forma //
    //////////////////
    public function dataToView2($id, $old, $new)
    {
       //  La otra forma de pasar parametros es usar la fucncion comapct()
       //  compact() toma los nombres y si una variable tiene el mismo nombre hace la conversion
       //  No importa el orden, solo el nombre.
       return view('post', compact('id', 'new', 'old'));
    }
}
