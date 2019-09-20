<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ubicacion;
use Carbon\Carbon;
use DB;
use App\Http\Requests\UbicacionStoreRequest;
use App\Http\Requests\UbicacionUpdateRequest;
//importación de modelos a utilizar que son clave foranea de otras tablas.
use App\Maquinaria;
use App\CentroDeSalud;
use App\Sala;
use App\Area;




class UbicacionesController extends Controller
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
        $ubicaciones = Ubicacion::where('visible', '1')->get();

        return view('ubicaciones.index', compact('ubicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $maquinarias = Maquinaria::all();
        $centrosdesalud=CentroDeSalud::all();
        $salas = Sala::all();
        $areas = Area::all();

        return view('ubicaciones.crear', compact('maquinarias', 'centrosdesalud', 'salas', 'areas'));


    }

      public function create2($codigo)
    {
        $maquinaria = Maquinaria::findOrFail($codigo);
        $centrosdesalud=CentroDeSalud::all();
        $areas2=null;
        $j=0;
        $salas = Sala::all();
        $areas = Area::all();
        foreach ($areas as $area1) {
            if($area1->centrodesalud->codigo == auth()->user()->centrodesalud_codigo){
                $areas2[$j] = $area1; 
                $j++;
            }

        }


        return view('ubicaciones.crear2', compact( 'centrosdesalud', 'salas', 'areas2','maquinaria'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UbicacionStoreRequest $request)
    {

        Ubicacion::create($request->all());

        return redirect()->route('maquinarias.index')->with('status','UBICACIÓN INGRESADA CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
       $ubicacion = Ubicacion::findOrFail($codigo);

       return view('ubicaciones.ver' , compact('ubicacion'));
    }


        public function showUbicaciones($codigo)
    {
        $ubicaciones = Ubicacion::where('visible', '1')->where('maquinaria_codigo', $codigo)->get();
       $maquinaria = Maquinaria::findOrFail($codigo);

       return view('ubicaciones.ubicacionesMaquinaria' , compact('ubicaciones', 'maquinaria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $ubicacion = Ubicacion::findOrFail($codigo);
        $salas = Sala::all();
        $areas = Area::all();
        return view('ubicaciones.editar', compact('ubicacion', 'salas', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UbicacionUpdateRequest $request, $codigo)
    {
        $ubicacion = Ubicacion::findOrFail($codigo);
        $ubicacion->update($request->all());
        return redirect()->route('ubicaciones.index')->with('status','UBICACIÓN EDITADA CON ÉXITO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $codigo)
    {
        $ubicacion = Ubicacion::findOrFail($codigo);
        $ubicacion->visible=0;
        $ubicacion->update($request->all());
        return redirect()->route('maquinarias.index')->with('statusDeleted','UBICACIÓN ELIMINADA CON ÉXITO');
    }

    public function getSalass(Request $request){
        if($request->ajax()){
            $salas = Sala::where('area_codigo', $request->area_codigo)->get();
            foreach ($salas as $sala){
                $salasArray[$sala->codigo] = $sala->nombre;

            }
            return response()->json($salasArray);   
        }
    }
}
