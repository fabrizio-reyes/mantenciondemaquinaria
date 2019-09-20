<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maquinaria;
use App\Http\Requests\MaquinariasStoreRequest;
use App\Http\Requests\MaquinariasUpdateRequest;
use Carbon\Carbon;
use DB;
use App\Tipo;
use App\CentroDeSalud;
use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Support\Facades\Crypt;

class MaquinariasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){
    
        $this->middleware('auth');
        $this->middleware('perfiles:admin,jsg,ja,jss');
        //$this->middleware('perfiles:jss', ['except' => ['edit', 'update', 'create']]);
    }

    public function index()
    {


        if(auth()->user()->hasPerfiles(['admin', 'jss'])){
        //obtenemos solo las maquinarias que están activas.
        $maquinarias = Maquinaria::where('estado','activo')->where('visible', '1')->get();


        return view('maquinarias.index', compact('maquinarias'));
        }else{

        $user_centrodesalud = auth()->user()->centrodesalud_codigo;
        //obtenemos solo las maquinarias que están activas.
        $maquinarias = Maquinaria::where('estado','activo')->where('visible', '1')->where('centrodesalud_codigo', $user_centrodesalud)->get();
        return view('maquinarias.index', compact('maquinarias'));   
         
        }
    }

    

    

/**
        public function index()
    {

        $maquinarias2= Maquinaria::all();
        $user_centrodesalud = auth()->user()->centrodesalud_codigo;
        foreach ($maquinarias2 as $maquinaria) {
            if($maquinaria->centrodesalud_codigo == $user_centrodesalud){
              $maquinarias = Maquinaria::findOrFail('$maquinaria->codigo');
            }
        }

        return view('maquinarias.index', compact('maquinarias'));
    }
 */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipo::All();
        return view('maquinarias.crear', compact('tipos'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaquinariasStoreRequest $request)
    {

        Maquinaria::create($request->all());

        return redirect()->route('maquinarias.index')->with('status','MAQUINARIA INGRESADA CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
       $maquinaria = Maquinaria::findOrFail($codigo);

       return view('maquinarias.ver' , compact('maquinaria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($codigo)
    {

        $codigo = Crypt::decrypt($codigo);
        $maquinaria = Maquinaria::findOrFail($codigo);
        return view('maquinarias.editar', compact('maquinaria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaquinariasUpdateRequest $request, $codigo)
    {
        $maquinaria = Maquinaria::findOrFail($codigo);
        $maquinaria->update($request->all());
        return redirect()->route('maquinarias.index')->with('status','MAQUINARIA EDITADA CON ÉXITO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $codigo)
    {
    
        $maquinaria = Maquinaria::findOrFail($codigo);
        $maquinaria->visible=0;
        $maquinaria->update($request->all());
        return redirect()->route('maquinarias.index')->with('statusDeleted','MAQUINARIA ELIMINADA CON ÉXITO');
    }
   
    public function pdf() {
        //Llamada a la BD
        //$maquinarias = DB::table('maquinarias')->get();
        $folio=0;
        $maquinarias = Maquinaria::get();
        //Se genera el archive PDF
        $pdf = PDF::loadView('pdf.maquinarias', compact('maquinarias', 'fecha'));
       
        //Lo forzamos a iniciar descarga
        return $pdf->download('listado_maquinarias.pdf');
        }



public function mantencionesPreventivas()
    {
        if(auth()->user()->hasPerfiles(['admin', 'jss'])){
        $maquinarias2 = Maquinaria::where('estado','activo')->where('visible', '1')->whereNotNull('mantenciones_preventivas')->get();
        }else{
        $user_centrodesalud = auth()->user()->centrodesalud_codigo;
        $maquinarias2 = Maquinaria::where('estado','activo')->where('visible', '1')->where('centrodesalud_codigo', $user_centrodesalud)->whereNotNull('mantenciones_preventivas')->get();
        }
        // $maquinarias2 = array();
        // $j = 0;
         $date = Carbon::today();
        // for ($i = 0; $i < \sizeof($maquinarias); $i++) {
        //     $fecha = Carbon::parse($maquinarias[$i]->mantenciones_preventivas);
        //     if (strtotime($fecha) >= strtotime($date)) {
        //         $maquinarias2[$j] = $maquinarias[$i];
        //         $j++;
        //     }
        // }
        return view('maquinarias.mantencionesPreventivas', compact('maquinarias2', 'date'));
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
