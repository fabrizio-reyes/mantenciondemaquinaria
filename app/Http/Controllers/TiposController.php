<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Tipo;
use App\Http\Requests\TiposStoreRequest;
use App\Http\Requests\TiposUpdateRequest;


class TiposController extends Controller
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
        $tipos = Tipo::where('visible', '1')->get();

        return view('tipos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos.crear');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TiposStoreRequest $request)
    {

        Tipo::create($request->all());

        return redirect()->route('tipos.index')->with('status','TIPO INGRESADO CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
       $tipo = Tipo::findOrFail($codigo);

       return view('tipos.ver' , compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $tipo = Tipo::findOrFail($codigo);
        return view('tipos.editar', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TiposUpdateRequest $request, $codigo)
    {
       $tipo = Tipo::findOrFail($codigo);
        $tipo->update($request->all());
        return redirect()->route('tipos.index')->with('status','TIPO EDITADO CON ÉXITO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $codigo)
    {
       $tipo = Tipo::findOrFail($codigo);
       $tipo->visible=0;
       $tipo->update($request->all());
       return redirect()->route('tipos.index')->with('statusDeleted','TIPO ELIMINADO CON ÉXITO');
    }
}