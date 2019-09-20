<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\TipoFalla;


class TiposFallasController extends Controller
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
        $tiposfallas = TipoFalla::all();

        return view('tiposfallas.index', compact('tiposfallas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiposfallas.crear');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        TipoFalla::create($request->all());

        return redirect()->route('tiposfallas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
       $tipofalla = TipoFalla::findOrFail($codigo);

       return view('tiposfallas.ver' , compact('tipofalla'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $tipofalla = TipoFalla::findOrFail($codigo);
        return view('tiposfallas.editar', compact('tipofalla'));
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
       $tipofalla = TipoFalla::findOrFail($codigo);
        $tipofalla->update($request->all());
        return redirect()->route('tiposfallas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codigo)
    {
        $tipofalla = TipoFalla::findOrFail($codigo);
        $tipofalla->delete();

        return redirect()->route('tiposfallas.index');
    }
}