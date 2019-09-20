<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mantencion;
use App\EmpresaExterna;
use App\Maquinaria;
use Carbon\Carbon;
use DB;
use App\Http\Requests\MantencionStoreRequest;
use App\Http\Requests\MantencionUpdateRequest;


class MantencionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){

        $this->middleware('auth');
        $this->middleware('perfiles:admin,jsg,jss');
    
    }
    public function index()
    {

        if(auth()->user()->hasPerfiles(['admin', 'jss'])){
        $j=1;
        $mantenciones = Mantencion::where('visible', '1')->get();

        return view('mantenciones.index', compact('mantenciones', 'j'));
     


    }else{
        $mantencioness = Mantencion::where('visible', '1')->get();
        $mantenciones;
        $user_centrodesalud = auth()->user()->centrodesalud_codigo;
        $j=0;
        foreach($mantencioness as $mantencion){
            if($user_centrodesalud == $mantencion->maquinaria->centrodesalud_codigo){
                //$codigo2= $solicitud->codigo;
                 //$solicitudes[$j] = Solicitud::where('codigo', $codigo2)->get(); 
                 $mantenciones[$j] = $mantencion;
                 $j++; 

            }  
        }     
        return view('mantenciones.index', compact('mantenciones', 'j'));    
    }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresasexternas = EmpresaExterna::All();
        $usuarioLogeadoCentro = auth()->user()->centrodesalud_codigo;
        $maquinarias = Maquinaria::where('visible', '1')->where('centrodesalud_codigo', $usuarioLogeadoCentro)->get();
        return view('mantenciones.crear', compact('empresasexternas','maquinarias'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MantencionStoreRequest $request)
    {

        Mantencion::create($request->all());

        return redirect()->route('mantenciones.index')->with('status','MANTENCIÓN INGRESADA CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
       $mantencion = Mantencion::findOrFail($codigo);

       return view('mantenciones.ver' , compact('mantencion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $mantencion = Mantencion::findOrFail($codigo);
        return view('mantenciones.editar', compact('mantencion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MantencionUpdateRequest $request, $codigo)
    {
        $mantencion = Mantencion::findOrFail($codigo);
        $mantencion->update($request->all());
        return redirect()->route('mantenciones.index')->with('status','MANTENCIÓN EDITADA CON ÉXITO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $codigo)
    {
        $mantencion = Mantencion::findOrFail($codigo);
        $mantencion->visible=0;
        $mantencion->update($request->all());
        return redirect()->route('mantenciones.index')->with('statusDeleted','MANTENCIÓN ELIMINADA CON ÉXITO');
    }
}
