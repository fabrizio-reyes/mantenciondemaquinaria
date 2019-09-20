<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\EstadoSolicitud;


class EstadoSolicitudesController extends Controller
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
        $estadosolicitudes = EstadoSolicitud::all();

        return view('estadosolicitudes.index', compact('estadosolicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estadosolicitudes.crear');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        EstadoSolicitud::create($request->all());

        return redirect()->route('estadosolicitudes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
       $estadosolicitud = EstadoSolicitud::findOrFail($codigo);

       return view('estadosolicitudes.ver' , compact('estadosolicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $estadosolicitud = EstadoSolicitud::findOrFail($codigo);
        return view('estadosolicitudes.editar', compact('estadosolicitud'));
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
       $estadosolicitud = EstadoSolicitud::findOrFail($codigo);
        $estadosolicitud->update($request->all());
        return redirect()->route('estadosolicitudes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codigo)
    {
        $estadosolicitud = EstadoSolicitud::findOrFail($codigo);
        $estadosolicitud->delete();

        return redirect()->route('estadosolicitudes.index');
    }
}