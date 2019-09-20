<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Convenio;
use App\EmpresaExterna;
use App\Maquinaria;
use Carbon\Carbon;
use App\Http\Requests\ConveniosStoreRequest;
use App\Http\Requests\ConveniosUpdateRequest;
use SebastianBergmann\Environment\Console;

class ConvenioController extends Controller
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
        if(auth()->user()->hasPerfiles(['admin', 'jss'])){
        //obtenemos solo los convenios que están activos.
        $j=1;
        $convenios = Convenio::where('visible', '1')->get();

        return view('convenios.index', compact('convenios', 'j'));

    }else{
        $convenioss = Convenio::where('visible', '1')->get();
        $convenios= array();
        $user_centrodesalud = auth()->user()->centrodesalud_codigo;
        $j=0;
        foreach($convenioss as $convenio){
         foreach($convenio->maquinarias as $maquinaria){
            if($user_centrodesalud == $maquinaria->centrodesalud_codigo){
                $esta=false;
                foreach ($convenios as $convenio1) {
                    if ($convenio1->codigo==$convenio->codigo) {
                        $esta=true;
                    }
                }
                if (!$esta) {
                    $convenios[$j] = $convenio;
                    $j++;
                }

            }

            }

            }
        return view('convenios.index', compact('convenios', 'j'));
        }

    }


    /**
        public function index()
    {
        $convenios = Convenio::where('visible', '1')->get();

        return view('convenios.index', compact('convenios'));
    }






     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_centrodesalud = auth()->user()->centrodesalud_codigo;
        $maquinarias = Maquinaria::where('estado','activo')->where('visible', '1')->where('centrodesalud_codigo', $user_centrodesalud)->get();
        $maquinarias2 = array();
        $j=0;

        foreach ($maquinarias as $maquinaria) {
            $esta=false;
            foreach ($maquinaria->convenios as $convenio) {
                if ($convenio->vigencia() && $convenio->visible!=0) {
                   $esta=true;
                }
            }
            if (!$esta) {
                $maquinarias2[$j]=$maquinaria;
                $j++;
            }
        }

        $empresasexternas = EmpresaExterna::where('visible', '1')->get();

        return view('convenios.crear', compact('empresasexternas', 'maquinarias2','j','maquinarias'));
    }

    // public function create()
    // {
    //     $user_centrodesalud = auth()->user()->centrodesalud_codigo;
    //     $maquinarias1 = Maquinaria::where('estado','activo')->where('visible', '1')->where('centrodesalud_codigo', $user_centrodesalud)->get();
    //     $maquinarias = $maquinarias1->pluck('nombre', 'codigo');
    //     $empresasexternas = EmpresaExterna::All();
    //     return view('convenios.crear', compact('empresasexternas', 'maquinarias'));
    // }


    // public function create()
    // {
    //     $user_centrodesalud = auth()->user()->centrodesalud_codigo;
    //     $maquinarias1 = Maquinaria::where('estado','activo')->where('visible', '1')->where('centrodesalud_codigo', $user_centrodesalud)->get();
    //     $convenios = Convenio::where('visible', '1')->get();
    //     $maq_con=MaquinariaConvenio::all();
    //     $maquinarias = array();
    //     $maq_con_conv = array();
    //     $j=0;
    //     foreach ($maq_con as $mc) {
    //         $esta=false;
    //         $convenio=Convenio::findOrFail($mc->convenio_codigo);
    //         foreach ($maq_con_conv as $mcc) {
    //             if ($mcc->codigo==$mc->maquinaria_codigo) {
    //                 $esta=true;
    //             }
    //         }
    //         $maq=false;
    //         foreach ($maquinarias1 as $maquinaria) {
    //             if($maquinaria->codigo==$mc->maquinaria_codigo){
    //                 $maq=true;
    //             }
    //         }
    //         if (!$esta && !$convenio->vigencia() && $convenio->visible && $maq) {
    //             $maq_con_conv[$j]=Maquinaria::findOrFail($mc->maquinaria_codigo);
    //             $j++;
    //         }
    //     }

    //     $maquinarias = $maq_con_conv->pluck('nombre', 'codigo');
    //    // $maquinarias = $maquinarias1->pluck('nombre', 'codigo');

    //     $empresasexternas = EmpresaExterna::All();



    //     return view('convenios.crear', compact('empresasexternas', 'maquinarias','j','maq_con_conv'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConveniosStoreRequest $request)
    {
        // dd($request);
        $convenio = Convenio::create($request->all());

        $convenio->maquinarias()->attach($request->maquinarias);

        return redirect()->route('convenios.index')->with('status','CONVENIO INGRESADO CON ÉXITO');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
        $convenio = Convenio::findOrFail($codigo);
        $maquinarias = Maquinaria::pluck('nombre', 'codigo');


        return view('convenios.ver' , compact('convenio', 'maquinarias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {
        $convenio = Convenio::findOrFail($codigo);
        $user_centrodesalud = auth()->user()->centrodesalud_codigo;
        $maquinarias = Maquinaria::where('estado','activo')->where('visible', '1')->where('centrodesalud_codigo', $user_centrodesalud)->get();
        $maquinarias2 = array();
        $j=0;

        foreach ($maquinarias as $maquinaria) {
            $esta=false;
            foreach ($maquinaria->convenios as $convenio) {
                if ($convenio->vigencia() && $convenio->visible!=0) {
                   $esta=true;
                }
            }
            if (!$esta) {
                $maquinarias2[$j]=$maquinaria;
                $j++;
            }
        }
        $maq_con=false;
        foreach ($convenio->maquinarias as $maquinaria) {
            $maquinarias2[$j]=$maquinaria;
                $j++;
        }


        $empresasexternas = EmpresaExterna::where('visible', '1')->get();


        return view('convenios.editar', compact('convenio', 'maquinarias2', 'empresasexternas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConveniosUpdateRequest $request, $codigo)
    {
        $convenio = Convenio::findOrFail($codigo);
        $convenio->update($request->all());

         $convenio->maquinarias()->sync($request->maquinarias);

        return redirect()->route('convenios.index')->with('status','CONVENIO EDITADO CON ÉXITO');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $codigo)
    {
        $convenio = Convenio::findOrFail($codigo);
        $convenio->visible=0;
        $convenio->update($request->all());

        return redirect()->route('convenios.index')->with('statusDeleted','CONVENIO ELIMINADO CON ÉXITO');
    }
}
