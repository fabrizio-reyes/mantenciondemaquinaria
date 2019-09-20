@extends('layout')


@section('contenido')

<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css" rel="stylesheet"/>

      <ol class="breadcrumb">
        <li><a href="{{ route('solicitudes.index') }}"><i class="fa fa-dashboard"></i> Solicitudes</a></li> 
        <li class="active"></li>
      </ol>
   <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo">Solicitudes de Mantención</h2>
              <br>
        @if(auth()->user()->hasPerfiles(['ja', 'admin']))          
                        <a href="{{ route('solicitudes.create') }}" class="btn btn-primary pull-left"
        role="button"><i class="fa fa-share-square-o" aria-hidden="true"></i> Enviar Solicitud</a>&nbsp
        @endif
        @if(auth()->user()->hasPerfiles(['admin', 'jsg']))
        <a href="{{ route('solicitudes.reporte') }}" class="btn btn-danger pull-right"
        role="button"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Generar Reporte</a>
        @endif
        <br>
        <br>
        
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th style="display: none;">man</th>
                <th scope="col">Fecha de Creación</th>      
                <th scope="col">Usuario</th>
                <th scope="col">Maquinaria</th>
                <th scope="col">Estado</th>
            
                <th scope="col">Empresa a cargo</th>
                @if(auth()->user()->hasPerfiles(['admin', 'jsg']))
                <th scope="col" class="table1"></th>               
                <th scope="col" class="table1"></th>
                @endif
                <th scope="col" class="table1"></th>
                <!-- <th scope="col" class="table1"></th> -->
                @if(!auth()->user()->hasPerfiles(['jss']))
                <th scope="col" class="table1"></th>
                @endif
            </tr>
        </thead>
            
            <tbody>
                @if($j>0)
               
                @foreach ($solicitudes as $solicitud)
                @if(auth()->user()->id == $solicitud->user->id)              
                <tr>   
                 <td style="display: none">{{$solicitud->estadosolicitud->codigo.$solicitud->created_at}}</td>
                <td>{{$solicitud->created_at->format('d-m-Y')}} </td>
                <td> {{$solicitud->user->name}}</td>
                 <td>{{$solicitud->maquinaria->nombre}} </td>
                 <td>{{$solicitud->estadosolicitud->nombre}} </td>

            
                 <td><?php $cont=0 ?>
                      @foreach($solicitud->maquinaria->convenios as $convenio)
                      @if ($convenio->vigencia() && $convenio->visible)
                      {{$convenio->empresaexterna->razon_social}}
                      <?php $cont++; ?>
                      @endif
                      @endforeach
                      @if ($cont==0)
                      {{"Sin convenio"}}
                      @endif
                  </td>




                @if(auth()->user()->hasPerfiles(['admin', 'jsg']))
            <td>
                <form method="POST" style="display:inline" action="{{route('solicitudes.email', $solicitud->codigo)}}">
                @csrf
                      <button type="submit" class="btn btn-block btn-success btn-xs" title="Aceptar" onclick="procesando()">
                               <i class="fa fa-check"></i>
                      </button>
                </form>
            </td>
                

            <td>
                <form method="GET" style="display:inline" action="{{ route('solicitudes.rechazar', $solicitud->codigo)}}">
                @csrf

                        <button type="submit" class="btn btn-block btn-danger btn-xs" title="Rechazar">
                            <i class="fa fa-close"></i>
                        </button>
                </form>
            </td>
                 @endif
                


            <td>
                <form method="GET" style="display:inline" action="{{ route('solicitudes.show', $solicitud->codigo)}}">
                @csrf

                        <button type="submit" class="btn btn-block btn-warning btn-xs" title="Ver">
                            <i class="fa fa-eye"></i>
                        </button>
                </form>
            </td>

    <!--
                <td>
                 <form method="GET" style="display:inline" action="{{ route('solicitudes.edit' , $solicitud->codigo) }}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-warning btn-xs" title="Editar">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </form>  
                 </td> -->
              <td>
                    <form method="POST" style="display:inline" action="{{ route('solicitudes.destroy', $solicitud->codigo)}}" id="del{{$solicitud->codigo}}">
                    @csrf
                    {!! method_field('DELETE') !!}

                        <button type="submit" class="btn btn-block btn-danger btn-xs" title="Eliminar" onClick="confirmFunction('del{{$solicitud->codigo}}')">
                             <i class="fa fa-trash"></i>
                        </button>
                    </form>

              </td>
            </tr>
            @endif
             @if(auth()->user()->hasPerfiles(['admin', 'jsg', 'jss']))
            <tr>
          
                <td style="display: none">{{$solicitud->estadosolicitud->codigo.$solicitud->created_at}}</td>
                <td >{{$solicitud->created_at->format('d-m-Y')}} </td>
                <td> {{$solicitud->user->name}}</td>
                 <td>{{$solicitud->maquinaria->nombre}} </td>
                 <td>{{$solicitud->estadosolicitud->nombre}} </td>
            
                    <td><?php $cont=0 ?>
                      @foreach($solicitud->maquinaria->convenios as $convenio)
                      @if ($convenio->vigencia() && $convenio->visible)
                      {{$convenio->empresaexterna->razon_social}}
                      <?php $cont++; ?>
                      @endif
                      @endforeach
                      @if ($cont==0)
                      {{"Sin convenio"}}
                      @endif
                  </td>

          <?php if(auth()->user()->hasPerfiles(['admin', 'jsg'])){
                if($solicitud->estadosolicitud->nombre == 'Pendiente'){
          ?>
                    
                    <td>
                    <form method="GET" style="display:inline" action="{{ route('solicitudes.email', $solicitud->codigo)}}">
                    @csrf
                        <button type="submit" class="btn btn-block btn-success btn-xs" title="Aceptar" onclick="procesando()">
                            <i class="fa fa-check"></i>
                        </button>
                    </form>

                    </td>

                                    <td>
                    <form method="GET" style="display:inline" action="{{ route('solicitudes.rechazar', $solicitud->codigo)}}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-danger btn-xs" title="Rechazar">
                            <i class="fa fa-close"></i>
                        </button>
                    </form>

                    </td>
                 
                 <?php }else{ ?>
                <td>
                    <form method="GET" style="display:inline" action="{{ route('solicitudes.email', $solicitud->codigo)}}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-success btn-xs" title="Aceptar" disabled="true">
                            <i class="fa fa-check"></i>
                        </button>
                    </form>

                    </td>

                                    <td>
                    <form method="GET" style="display:inline" action="{{ route('solicitudes.rechazar', $solicitud->codigo)}}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-danger btn-xs" title="Rechazar" disabled="true">
                            <i class="fa fa-close"></i>
                        </button>
                    </form>

                    </td>



             
                 <?php } ?>                

                

               
                <?php } ?> 


                
                <td>
                    <form method="GET" style="display:inline" action="{{ route('solicitudes.show', $solicitud->codigo)}}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-warning btn-xs" title="Ver">
                            <i class="fa fa-eye"></i>
                        </button>
                    </form>

                    </td>

    <!--
                <td>
                 <form method="GET" style="display:inline" action="{{ route('solicitudes.edit' , $solicitud->codigo) }}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-warning btn-xs" title="Editar">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </form>  
                 </td> -->

                @if(auth()->user()->hasPerfiles(['ja', 'jsg', 'admin']))
                <td>
                    <form method="POST" style="display:inline" action="{{ route('solicitudes.destroy', $solicitud->codigo)}}" id="del{{$solicitud->codigo}}">
                    @csrf
                    {!! method_field('DELETE') !!}

                        <button type="submit" class="btn btn-block btn-danger btn-xs" title="Eliminar" onClick="confirmFunction('del{{$solicitud->codigo}}')">
                             <i class="fa fa-trash"></i>
                        </button>
                    </form>

                </td>
                @endif
            </tr>
            @endif
                @endforeach

            </tbody>
            @endif
        
    </table>
    
          </div>
      </div>
  </div>
</div>
</section>

<script src="/dist/js/procesando.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" defer ></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" defer></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js" defer></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js" defer></script>

<script>
  $(document).ready(function() {
  $('#example').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"

    }

      
  });

});

</script>

@stop
