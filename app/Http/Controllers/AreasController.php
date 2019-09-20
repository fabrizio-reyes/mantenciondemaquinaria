<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\CentroDeSalud;
use Carbon\Carbon;
use DB;
use App\Http\Requests\AreasStoreRequest;
use App\Http\Requests\AreasUpdateRequest;

class AreasController extends Controller
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
        $areas = Area::where('visible', '1')->get();

        return view('areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centrosdesalud = CentroDeSalud::all();
        return view('areas.crear', compact('centrosdesalud'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreasStoreRequest $request)
    {

        Area::create($request->all());

      

        return redirect()->route('areas.index')->with('status','ÁREA INGRESADA CON EXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
       $area = Area::findOrFail($codigo);

       return view('areas.ver' , compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $area = Area::findOrFail($codigo);
        return view('areas.editar', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreasUpdateRequest $request, $codigo)
    {
        $area = Area::findOrFail($codigo);
        $area->update($request->all());
        return redirect()->route('areas.index')->with('status','ÁREA EDITADA CON EXITO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $codigo)
    {
        $area = Area::findOrFail($codigo);
        $area->visible=0;
        $area->update($request->all());
        return redirect()->route('areas.index')->with('statusDeleted','ÁREA ELIMINADA CON EXITO');
    }
}
