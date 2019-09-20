<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpresaExterna;

use App\Http\Requests\EmpresasExternasStoreRequest;
use App\Http\Requests\EmpresasExternasUpdateRequest;
use Carbon\Carbon;

class EmpresaExternaController extends Controller
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
        $empresasexternas = EmpresaExterna::where('visible', '1')->get();
        return view('empresasexternas.index', compact('empresasexternas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresasexternas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresasExternasStoreRequest $request)
    {
        EmpresaExterna::create($request->all());

        return redirect()->route('empresasexternas.index')->with('status','EMPRESA EXTERNA INGRESADA CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
        $empresaexterna = EmpresaExterna::findOrFail($codigo);

       return view('empresasexternas.ver' , compact('empresaexterna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $empresaexterna = EmpresaExterna::findOrFail($codigo);
        return view('empresasexternas.editar', compact('empresaexterna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresasExternasUpdateRequest $request, $codigo)
    {
        $empresaexterna = EmpresaExterna::findOrFail($codigo);
        $empresaexterna->update($request->all());

        return redirect()->route('empresasexternas.index')->with('status','EMPRESA EXTERNA EDITADA CON ÉXITO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $codigo)
    {
        $empresaexterna = EmpresaExterna::findOrFail($codigo);
        $empresaexterna->visible=0;
        $empresaexterna->update($request->all());

        return redirect()->route('empresasexternas.index')->with('statusDeleted','EMPRESA EXTERNA ELIMINADA CON ÉXITO');
    }
}
