<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\CentrosStoreRequest;
use App\Http\Requests\CentrosUpdateRequest;
use App\CentroDeSalud;

class CentrosDeSaludController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){

        $this->middleware('auth');
        $this->middleware('perfiles:admin,jss');
    }

    public function index()
    {
        $centrosdesalud = CentroDeSalud::where('visible', '1')->get();

        return view('centrosdesalud.index', compact('centrosdesalud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('centrosdesalud.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CentrosStoreRequest $request)
    {
        DB::table('centrodesalud')->insert([
            "nombre" => $request->input('nombre'),
            "descripcion" => $request->input('descripcion'),
            "correo" => $request->input('correo'),
            "telefono" => $request->input('telefono'),
            "ciudad" => $request->input('ciudad'),
            "direccion" => $request->input('direccion'),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),

        ]);

        return redirect()->route('centrosdesalud.index')->with('status','CENTRO DE SALUD INGRESADO CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
        $centrodesalud = CentroDeSalud::findOrFail($codigo);

       return view('centrosdesalud.ver' , compact('centrodesalud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $centrodesalud = CentroDeSalud::findOrFail($codigo);
        return view('centrosdesalud.editar', compact('centrodesalud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CentrosUpdateRequest $request, $codigo)
    {
        $centrodesalud = CentroDeSalud::findOrFail($codigo);
        $centrodesalud->update($request->all());
        return redirect()->route('centrosdesalud.index')->with('status','CENTRO DE SALUD EDITADO CON ÉXITO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $codigo)
    {
        $centrodesalud = CentroDeSalud::findOrFail($codigo);
        $centrodesalud->visible=0;
        $centrodesalud->update($request->all());
        return redirect()->route('centrosdesalud.index')->with('statusDeleted','CENTRO DE SALUD ELIMINADO CON ÉXITO');

    }
}
