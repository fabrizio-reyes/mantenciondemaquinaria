<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FallaSolicitud;
use Carbon\Carbon;
use DB;

class FallasSolicitudesController extends Controller
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
        $fallassolicitudes = FallaSolicitud::all();

        return view('fallassolicitudes.index', compact('fallassolicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fallassolicitudes.crear');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        FallaSolicitud::create($request->all());

        return redirect()->route('fallassolicitudes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
       $fallasolicitud = FallaSolicitud::findOrFail($codigo);

       return view('fallassolicitudes.ver' , compact('fallasolicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $fallasolicitud = FallaSolicitud::findOrFail($codigo);
        return view('fallassolicitudes.editar', compact('fallasolicitud'));
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
        $fallasolicitud = FallaSolicitud::findOrFail($codigo);
        $fallasolicitud->update($request->all());
        return redirect()->route('fallassolicitudes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codigo)
    {
        $fallasolicitud = FallaSolicitud::findOrFail($codigo);
        $fallasolicitud->delete();

        return redirect()->route('fallassolicitudes.index');
    }
}
