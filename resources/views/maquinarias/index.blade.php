@extends('layout')


@section('contenido')


<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css" rel="stylesheet"/>


      <ol class="breadcrumb" style="margin: 0;">
        <li><a href="{{ route('maquinarias.index') }}"><i class="fa fa-dashboard"></i> Maquinarias</a></li> 
        <li class="active"></li>
      </ol> 
     <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo">Maquinarias</h2>
          @if(!auth()->user()->hasPerfiles(['jss']))     
        <a href="{{ route('maquinarias.crear') }}" class="btn btn-primary pull-left"
        role="button"><i class="fa fa-check" aria-hidden="true"></i> Crear Nueva</a>
        @endif
       @if(auth()->user()->hasPerfiles(['admin']))
        &nbsp;&nbsp;&nbsp;&nbsp;<a onclick="location.href = '{{ route('maquinarias.importExportView') }}'" class="btn btn-success pull-left"
        role="button" ><i class="fa fa-file-text" aria-hidden="true"></i>  Importar</a>       
        @endif


        <br>
        <br>
        
     <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th scope="col" class="table1">Id General</th>
                <th scope="col" class="table1">Id Inventario</th>
                <th scope="col">Nombre</th> 
                <th scope="col">Estado</th>
                <th scope="col" class="table1">Mantenciones Preventivas</th>
                <th scope="col">Tipo</th>
                @if(auth()->user()->hasPerfiles(['jss']))
                <th scope="col">Hospital</th>
                @endif
                <!-- <th scope="col">Convenios</th> -->
                
                <th scope="col" class="table1"></th>
                @if(!auth()->user()->hasPerfiles(['jss']))
                <th scope="col" class="table1"></th>
                <th scope="col" class="table1"></th>
                <th scope="col" class="table1"></th>
               @endif
                </tr>
      </thead>
            
            <tbody>
                @foreach ($maquinarias as $maquinaria)
        
                <tr>
                <td>{{$maquinaria->id_general}}</td>
                <td>{{$maquinaria->id_inventario}}</td>
                <td>{{$maquinaria->nombre}}</td>
                <td>{{$maquinaria->estado}}</td>
                <td>{{$maquinaria->mantenciones_preventivas}}</td>

                <td>{{$maquinaria->tipo->nombre}}</td>
                @if(auth()->user()->hasPerfiles(['jss']))
                <td>{{$maquinaria->centrodesalud->nombre}}</td>
                @endif
                <!-- <td>
                 @foreach($maquinaria->convenios as $convenio)
                {{$convenio->empresaexterna->correo}}
                @endforeach
                </td> -->
                                 <td>
                    <form method="GET" style="display:inline" action="{{ route('maquinarias.show', $maquinaria->codigo)}}">
                    @csrf    
                    
                        <button type="submit" class="btn btn-block btn-success btn-xs" title="Ver">
                              <i class="fa fa-eye"></i>

                        </button>
                        
                    </form>

                    </td>


                    @if(!auth()->user()->hasPerfiles(['jss']))
                  <td>
                    <form method="GET" style="display:inline" action="{{ route('ubicaciones.showUbicaciones', $maquinaria->codigo)}}">
                    @csrf    
                    
                        <button type="submit" style="background: #008080;" class="btn btn-block btn-success btn-xs" title="Ver ubicaciones">
                              <i class="fa fa-map-marker"></i>

                        </button>
                        
                    </form>

                    </td>  

                <td> 

                  <form method="GET" style="display:inline" action="{{ route('maquinarias.editar' , Crypt::encrypt($maquinaria->codigo)) }}">
                    @csrf    
                    
                        <button type="submit" class="btn btn-block btn-warning btn-xs"title="Editar" >
                              <i class="fa fa-pencil"></i>

                        </button>
                        
                    </form> 
                 </td>
     
            
                <td>
                    <form method="POST" style="display:inline" action="{{ route('maquinarias.destroy', $maquinaria->codigo)}}" id="del{{$maquinaria->codigo}}">
                    @csrf    
                    {!! method_field('DELETE') !!}
                    
                     <button type="submit"  class="btn btn-block btn-danger btn-xs" title="Eliminar" onClick="confirmFunction('del{{$maquinaria->codigo}}')">
                      <i class="fa fa-trash"></i>

                    </button>
                    </form>
                </td>
                @endif

    




            </tr>
      
                @endforeach
            </tbody>
        
    </table>
  
          </div>
      </div>
  </div>
</div>

</section>





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
