<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sala;
use Carbon\Carbon;
use DB;
use App\Http\Requests\SalasStoreRequest;
use App\Http\Requests\SalasUpdateRequest;


use App\Area;


class SalasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){

        $this->middleware('auth');
        $this->middleware('perfiles:admin,jsg');
    
    }
    public function index()
    {
        $salas = Sala::where('visible', '1')->get();

        return view('salas.index', compact('salas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view('salas.crear', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalasStoreRequest $request)
    {

        Sala::create($request->all());

        return redirect()->route('salas.index')->with('status','SALA INGRESADA CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
       $sala = Sala::findOrFail($codigo);

       return view('salas.ver' , compact('sala'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $sala = Sala::findOrFail($codigo);
        return view('salas.editar', compact('sala'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalasUpdateRequest $request, $codigo)
    {
        $sala = Sala::findOrFail($codigo);
        $sala->update($request->all());
        return redirect()->route('salas.index')->with('status','SALA EDITADA CON ÉXITO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $codigo)
    {
        $sala = Sala::findOrFail($codigo);
        $sala->visible=0;
        $sala->update($request->all());
        return redirect()->route('salas.index')->with('statusDeleted','SALA ELIMINADA CON ÉXITO');
    }
}
