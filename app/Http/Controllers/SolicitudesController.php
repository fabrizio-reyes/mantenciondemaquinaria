<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use Carbon\Carbon;
use DB;


use App\User;
use App\Maquinaria;
use App\EstadoSolicitud;
use App\TipoFalla;
use App\Convenio;
use App\CentroDeSalud;

use App\EmpresaExterna;
use Mail;
use Barryvdh\DomPDF\Facade as PDF;
use DateTime;


use App\Http\Requests\SolicitudesCreateRequest;
use App\Http\Requests\SolicitudesUpdateRequest;

//importación para las notificaciones
use App\Notifications\SolicitudEnviada;



class SolicitudesController extends Controller
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
        //primero valido que tipo de perfil tiene el usuario logeado, y dependiendo de eso se decide si se envían o no todas las maquinarias
        if(auth()->user()->hasPerfiles(['admin', 'jss'])){
        //obtenemos solo las maquinarias que están activas.
        $solicitudes = Solicitud::where('visible', '1')->get();
        $j=1;

        return view('solicitudes.index2', compact('solicitudes', 'j'));


    }else{
        $solicitudess = Solicitud::where('visible', '1')->get();
        $solicitudes;
        $user_centrodesalud = auth()->user()->centrodesalud_codigo;
        $j=0;
        foreach($solicitudess as $solicitud){
            if($user_centrodesalud == $solicitud->user->centrodesalud_codigo){
                //$codigo2= $solicitud->codigo;
                 //$solicitudes[$j] = Solicitud::where('codigo', $codigo2)->get(); 
                 $solicitudes[$j] = $solicitud;
                 $j++; 

            }  
        }     
        return view('solicitudes.index', compact('solicitudes', 'j'));    
    }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $solicitudes = Solicitud::where('visible', '1')->get();
        $usuarioLogeado = auth()->user()->id;
        $usuarioLogeadoCentro = auth()->user()->centrodesalud_codigo;
        //$maquinarias = Maquinaria::all();
        $maquinarias = Maquinaria::where('visible', '1')->where('centrodesalud_codigo', $usuarioLogeadoCentro)->get();
        $estadosolicitudes = EstadoSolicitud::all();
       $users = User::where('visible', '1')->get();
       $usuarioJsg;
        foreach($users as $user){
            if($usuarioLogeadoCentro == $user->centrodesalud_codigo){
                if($user->hasPerfiles(['jsg'])){
                 $usuarioJsg = $user->id;
                }
            }
        }
   



        //$fallas = TipoFalla::pluck('nombre', 'codigo');

        return view('solicitudes.crear', compact('maquinarias', 'estadosolicitudes', 'usuarioLogeado', 'usuarioJsg', 'solicitudes'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SolicitudesCreateRequest $request)
    {

        $solicitud = Solicitud::create($request->all());
        $maquinaria = Maquinaria::findOrFail($request->maquinaria_codigo);
        $maquinaria->mantenciones_preventivas=null;
        $maquinaria->update($request->all());
        $destinatario = User::find($request->jsg_id);
        $destinatario->notify(new SolicitudEnviada($solicitud));

        //$solicitud->tiposfallas()->attach($request->fallas);

        return redirect()->route('solicitudes.index')->with('status','SOLICITUD ENVIADA CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codigo)
    {
       $solicitud = Solicitud::findOrFail($codigo);
       //$fallas = TipoFalla::pluck('nombre', 'codigo');

       return view('solicitudes.ver' , compact('solicitud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codigo)
    {

        $solicitud = Solicitud::findOrFail($codigo);
        //$fallas = TipoFalla::pluck('nombre', 'codigo');
        return view('solicitudes.editar', compact('solicitud'));
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
        $solicitud = Solicitud::findOrFail($codigo);
        $solicitud->update($request->all());
        $solicitud->tiposfallas()->sync($request->fallas);
        return redirect()->route('solicitudes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $codigo)
    {
        $solicitud = Solicitud::findOrFail($codigo);
        $solicitud->visible=0;
        $solicitud->update($request->all());
        return redirect()->route('solicitudes.index')->with('statusDeleted','SOLICITUD ELIMINADA CON ÉXITO');
    }

    public function reporte(){
        return view('solicitudes.reporteSolicitud');
    }

    public function reporte2(){
        $centrosdesalud = CentroDeSalud::where('visible', '1')->get();
        return view('solicitudes.reporteSolicitud2', compact( 'centrosdesalud')   );
    }

    public function pdf(Request $request)
  {
        //$fechaInicial = date($request->input('fechaI'));
        $fechaInicial = new DateTime($request->input('fechaI')." 00:00:00");
        $fechaInicialTitulo = $fechaInicial->format('d-m-Y');
        $fechaInicial = $fechaInicial->format('Y-m-d H:i:s');


        //$fechaFinal = date($request->input('fechaF'));
        $fechaFinal = new DateTime($request->input('fechaF')." 23:59:59");
        $fechaFinalTitulo = $fechaFinal->format('d-m-Y');
        $fechaFinal = $fechaFinal->format('Y-m-d H:i:s');

        //return $fechaInicial." - ".$fechaFinal;

        $estado = $request->input('estado');
        $authUser = auth()->user()->id;
        $user =  auth()->user()->name;
        $user2 =  auth()->user()->apellidos;
        $centro = auth()->user()->centrodesalud->nombre;
        $date1 = Carbon::today();
        $date = $date1->format('d-m-Y');

        if(auth()->user()->hasPerfiles(['jsg'])){
        $solicitudes = Solicitud::where('visible', '1')->where('estadosolicitud_codigo', $estado)->where('jsg_id', $authUser)->whereBetween('created_at', [$fechaInicial, $fechaFinal])->get()->all();
        }else{
        $solicitudes = Solicitud::where('visible', '1')->where('estadosolicitud_codigo', $estado)->whereBetween('created_at', [$fechaInicial, $fechaFinal])->get()->all();  
        }


       
        //Se genera el archivo PDF
        $pdf = PDF::loadView('pdf.solicitudes', compact('solicitudes', 'user', 'user2','estado', 'date','centro' ,'fechaInicialTitulo', 'fechaFinalTitulo'))->setPaper('letter', 'landscape');
        //Lo forzamos a iniciar descarga
        return $pdf->download("reporte_de_solicitudes_from_".$fechaInicialTitulo."_to_"."$fechaFinalTitulo.pdf");

  }

      public function pdf2(Request $request)
  {
        //$fechaInicial = date($request->input('fechaI'));
        $fechaInicial = new DateTime($request->input('fechaI')." 00:00:00");
        $fechaInicialTitulo = $fechaInicial->format('d-m-Y');
        $fechaInicial = $fechaInicial->format('Y-m-d H:i:s');


        //$fechaFinal = date($request->input('fechaF'));
        $fechaFinal = new DateTime($request->input('fechaF')." 23:59:59");
        $fechaFinalTitulo = $fechaFinal->format('d-m-Y');
        $fechaFinal = $fechaFinal->format('Y-m-d H:i:s');

        //return $fechaInicial." - ".$fechaFinal;

        $estado = $request->input('estado');
        $authUser = auth()->user()->id;
        $user =  auth()->user()->name;
        $user2 =  auth()->user()->apellidos;
        $centro = auth()->user()->centrodesalud->nombre;
        $centro2 = $request->input('centrodesalud_codigo');
        $date1 = Carbon::today();
        $date = $date1->format('d-m-Y');
        $nombreCentro = CentroDeSalud::where('visible', '1')->where('codigo', $centro2)->get('nombre');
        
        $solicitudes = Solicitud::where('visible', '1')->where('estadosolicitud_codigo', $estado)->whereBetween('created_at', [$fechaInicial, $fechaFinal])->get()->all();
   
       
        //Se genera el archivo PDF
        $pdf = PDF::loadView('pdf.solicitudes2', compact('solicitudes', 'user', 'user2','estado', 'date','centro', 'nombreCentro', 'centro2' ,'fechaInicialTitulo', 'fechaFinalTitulo'))->setPaper('letter', 'landscape');
        //Lo forzamos a iniciar descarga
        return $pdf->download("reporte_de_solicitudes_from_".$fechaInicialTitulo."_to_"."$fechaFinalTitulo.pdf");

  }


     /* public function pdf2(Request $request)
  {

        $estado = $request->input('estado');
        $authUser = auth()->user()->id;
        

        if(auth()->user()->hasPerfiles(['jsg'])){
        $solicitudes = Solicitud::where('visible', '1')->where('jsg_id', $authUser)->get();
        }else{
         $solicitudes = Solicitud::where('visible', '1')->where('estadosolicitud_codigo', $estado)->get();   
        }
        
       
        //Se genera el archivo PDF
        $pdf = PDF::loadView('pdf.solicitudes2', compact('solicitudes', 'estado'))->setPaper('letter', 'landscape');
        //Lo forzamos a iniciar descarga
        return $pdf->download("reporte_de_solicitudes_activas.pdf");

  }*/



    //función que permite la aceptación de una solicitud y el correspondiente envío del correo a la empresa Externa
public function emailEmpresaExterna(Request $request, $codigo){
        //intanciando la solicitud
        $solicitud = Solicitud::findOrFail($codigo);

        //guardando en variables los valores que quiero luego pasar a la vista mails
        $userName = auth()->user()->name;
        $maqName = $solicitud->maquinaria->nombre;
        $tipoMaquinaria = $solicitud->maquinaria->tipo->nombre;
        $nombreCentro = $solicitud->maquinaria->centrodesalud->nombre;
        $maqCodigo = $solicitud->maquinaria->id_general;
        $ubicacionCentro = $solicitud->maquinaria->centrodesalud->direccion;
        $detalleSolicitud = $solicitud->detalle;
        $cont=0;
        for ($i=0; $i<sizeof($solicitud->maquinaria->convenios);$i++) {
            if ($solicitud->maquinaria->convenios[$i]->vigencia() && $solicitud->maquinaria->convenios[$i]->visible) {
                $nombreEmpresa=$solicitud->maquinaria->convenios[$i]->empresaexterna->razon_social;
                $correo=$solicitud->maquinaria->convenios[$i]->empresaexterna->correo;
                $cont++;
            }
        }
        if ($cont==0) {
            $nombreEmpresa = "Servicio de Salud de Ñuble";
            $correo = $solicitud->user->centrodesalud->correo;
        }
        //definiendo el array con los valores especificados anteriormente
      $dateMsg = array(
          'usuario'  => $userName,
          'nombreMaquinaria' => $maqName,
          'tipoMaquinaria' => $tipoMaquinaria,
          'nombreCentro' => $nombreCentro,
          'ubicacionCentro' => $ubicacionCentro,
          'nombreEmpresa' => $nombreEmpresa,
          'detalleSolicitud' => $detalleSolicitud,
          'maqCodigo'=> $maqCodigo,
      );
      //Hago el recorrido gracias a las relaciones para llegar al correo que necesito de la solicitud actual - maquinaria actual.

        Mail::send('emails.solicitud', $dateMsg, function ($m) use ($correo)
        {

          $m->to($correo)->subject('Solicitud de mantención');
        });

        $solicitud->estadosolicitud_codigo='2';
        $solicitud->update($request->all());

      return redirect()->route('solicitudes.index')->with('status','SOLICITUD ENVIADA CON ÉXITO Enviando correo a la empresa externa...');
  }

  public function createPreventiva(Request $request,$codigo){

    $solicitud=new Solicitud();
    $maquinaria = Maquinaria::findOrFail($codigo);
    $solicitud->maquinaria_codigo=$codigo;
    $solicitud->detalle="Se solicita realizar mantención por tema de mantención preventiva para el dia ".$maquinaria->mantenciones_preventivas;
    $solicitud->user_id=auth()->user()->id;
    $usuarioLogeadoCentro = auth()->user()->centrodesalud_codigo;
    $users = User::where('visible', '1')->get();
    $usuarioJsg;
     foreach($users as $user){
         if($usuarioLogeadoCentro == $user->centrodesalud_codigo){
             if($user->hasPerfiles(['jsg'])){
              $usuarioJsg = $user->id;
             }
         }
        }
    $solicitud->jsg_id=$usuarioJsg;
    $solicitud->estadosolicitud_codigo=1;
    $maquinaria->mantenciones_preventivas=null;
    $maquinaria->update($request->all());
    $solicitud->save();

    return redirect()->route('maquinarias.mantencionesPreventivas')->with('status','SOLICITUD ENVIADA CON ÉXITO');
  }

    public function rechazarSolicitud(Request $request, $codigo){

        $solicitud = Solicitud::findOrFail($codigo);
        $solicitud->estadosolicitud_codigo='3';
        $solicitud->update($request->all());

        return redirect()->route('solicitudes.index')->with('statusDeleted','SOLICITUD RECHAZADA CON ÉXITO');
  }

}
