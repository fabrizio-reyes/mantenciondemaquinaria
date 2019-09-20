@extends('layout')

@section('contenido')

<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css" rel="stylesheet"/>

      <ol class="breadcrumb">
        <li><a href="{{ route('maquinarias.index') }}"><i class="fa fa-dashboard"></i> Maquinarias</a></li> 
        <li><a href=""><i ></i> Listado de Ubicaciones</a></li>
        <li class="active"></li>
      </ol>
    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-10" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2"> Ubicaciones {{$maquinaria->nombre}} código: {{$maquinaria->id_inventario}}  </h2>
              <hr class="linea">
                      <a href="{{ route('ubicaciones.create2', $maquinaria->codigo) }}" class="btn btn-primary pull-center"
        role="button" style="background: #008080;"><i class="fa fa-map-marker" aria-hidden="true"></i> Ingresar Ubicación</a>
        <br>
        <br>
          
  
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                     <thead>
                      <tr>
                          <th scope="col">Código</th>
                          <th scope="col">Maquinaria</th>
                         <th scope="col">Centro de Salud</th>
                         <th scope="col">Área</th>
                         <th scope="col">Sala</th>
                         <th scope="col"></th>
                          </tr>
                            </thead>
                          <tbody>
                              <tr>
                              
                          @foreach ($ubicaciones as $ubicacion)
                    <td scope="row" width="20px">{{$ubicacion->codigo}}</td>
                    <td scope="row" >{{$ubicacion->maquinaria->nombre}}</td>
                   <td scope="row">{{$ubicacion->centrodesalud->nombre}}</td>
                   <td scope="row">{{$ubicacion->area->nombre}}</td>
                   <td scope="row">{{$ubicacion->sala->nombre}}</td>
                                   <td>
                    <form method="POST" style="display:inline" action="{{ route('ubicaciones.destroy', $ubicacion->codigo)}}" id="del{{$ubicacion->codigo}}">
                    @csrf
                    {!! method_field('DELETE') !!}

                        <button type="submit" class="btn btn-block btn-danger btn-xs" title="Eliminar" onClick="confirmFunction('del{{$ubicacion->codigo}}')">
                             <i class="fa fa-trash"></i>
                        </button>
                    </form>

                    </td>
                      </tr>
        
                        </tbody>
                        @endforeach 
                      </table>
     
        <br>
            

                           
        <hr class="linea">
                <a href="{{ route('maquinarias.index') }}" class="btn btn-warning pull-left"
        role="button"><i class="fa fa-reply" aria-hidden="true"></i> Atrás</a>



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
