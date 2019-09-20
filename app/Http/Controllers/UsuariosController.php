<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Carbon\Carbon;
use App\Http\Requests\UsuariosStoreRequest;
use App\Http\Requests\UsuariosUpdateRequest;
use DB;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){

        $this->middleware([
            'auth' , 'perfiles:admin'
        ]);
    }

    public function index()
    {
        $usuarios = Usuario::all();

        return view('usuarios.index', compact('usuarios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.crear');
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuariosStoreRequest $request)
    {

        Usuario::create($request->all());

        return redirect()->route('usuarios.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
       $usuario = Usuario::findOrFail($codigo);

       return view('usuarios.ver' , compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $usuario = Usuario::findOrFail($codigo);
        return view('usuarios.editar', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuariosUpdateRequest $request, $codigo)
    {


        $usuario = Usuario::findOrFail($codigo);
        $usuario->update($request->all());

        return redirect()->route('usuarios.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codigo)
    {
       $usuario = Usuario::findOrFail($codigo);
       $usuario->delete();

        return redirect()->route('usuarios.index');
    }
}
