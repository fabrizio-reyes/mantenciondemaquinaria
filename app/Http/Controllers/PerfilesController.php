<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Perfil;

class PerfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){

        $this->middleware('auth');
    }
    
    public function index()
    {
        $perfiles = Perfil::where('visible' , '1')->get();

        return view('perfiles.index', compact('perfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfiles.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Perfil::create($request->all());

        return redirect()->route('perfiles.index')->with('status','PERFIL INGRESADO CON ÉXITO');

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
         $perfil = Perfil::findOrFail($codigo);
        return view('perfiles.editar', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $codigo)
    {
        $perfil = Perfil::findOrFail($codigo);
        $perfil->update($request->all());

        return redirect()->route('perfiles.index')->with('status','PERFIL EDITADO CON ÉXITO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $codigo)
    {
        $perfil = Perfil::findOrFail($codigo);
        $perfil->visible=0;
        $perfil->update($request->all());

        return redirect()->route('perfiles.index')->with('statusDeleted','PERFIL ELIMINADO CON ÉXITO');
    }
}
