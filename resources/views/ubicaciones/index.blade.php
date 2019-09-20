@extends('layout')


@section('contenido')

<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css" rel="stylesheet"/>


      <ol class="breadcrumb">
        <li><a href="{{ route('ubicaciones.index') }}"><i class="fa fa-dashboard"></i> Listado de Ubicaciones </a></li> 
        <li class="active"></li>
      </ol>
   <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-info" >
            <div class="box-header with-border">
              <h2 class="titulo">Ubicaciones</h2>
              <br>
    <input type ='button' class="btn btn-success"  value = 'Crear Nueva' onclick="location.href = '{{ route('ubicaciones.create') }}'"/>
   <br>
   <br>
    <div class="table-responsive">
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

        <thead>
            <tr>
                <th scope="col" >Código</th>
                <th scope="col">Fecha llegada</th>
                <th scope="col">Fecha ida</th>
                <th scope="col">Maquinaria</th>
                <th scope="col">Centro de Salud</th>
                <th scope="col">Sala</th>
                <th scope="col">Area</th>
                <th scope="col" class="table1"></th>
                <th scope="col" class="table1"></th>
                <th scope="col" class="table1"></th>

            </tr>
          </thead>
            <tbody>
                @foreach ($ubicaciones as $ubicacion)

                <tr>
                <td>{{$ubicacion->codigo}}</td>
                <td>{{$ubicacion->fecha_llegada}}</td>
                <td>{{$ubicacion->fecha_ida}}</td>
                <td> {{$ubicacion->maquinaria->nombre}}</td>
                <td> {{$ubicacion->centrodesalud->nombre}}</td>
                 <td>{{$ubicacion->sala->nombre}}</td>
                  <td>{{$ubicacion->area->nombre}}</td>
                <td>
                    <form method="GET" style="display:inline" action="{{ route('ubicaciones.show', $ubicacion->codigo)}}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-success btn-xs" title="Ver">
                            <i class="fa fa-eye"></i>
                        </button>
                    </form>

                    </td>
                <td>

                 <form method="GET" style="display:inline" action="{{ route('ubicaciones.edit' , $ubicacion->codigo) }}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-warning btn-xs" title="Editar">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </form>


                    
                 </td>


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
                @endforeach

            </tbody>
        
    </table>
    </div>
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
