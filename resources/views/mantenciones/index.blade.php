@extends('layout')
<?php
//use App\EmpresaExterna;
//$empresasexternas = EmpresaExterna::all();

use App\Maquinaria;
$maquinarias = Maquinaria::all();

?>

@section('contenido')

<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css" rel="stylesheet"/>

      <ol class="breadcrumb">
        <li><a href="{{ route('mantenciones.index') }}"><i class="fa fa-dashboard"></i> Mantenciones</a></li> 
        <li class="active"></li>
      </ol>
   <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo">Mantenciones</h2>
              <br>
              @if(!auth()->user()->hasPerfiles(['jss']))
                        <a href="{{ route('mantenciones.create') }}" class="btn btn-primary pull-left"
        role="button"><i class="fa fa-check" aria-hidden="true"></i> Crear Nueva</a>&nbsp
        @endif
        <br>
        <br>
        
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                
                <th scope="col">Fecha</th>
                <th scope="col">Valor</th>
                <th scope="col">Descripción</th>
                <th scope="col">Maquinaria</th>
                <th scope="col">Empresa externa</th>
                <th scope="col" class="table1"></th>
                @if(!auth()->user()->hasPerfiles(['jss']))
                <th scope="col" class="table1"></th>
                <th scope="col" class="table1"></th>
                @endif

            </tr>
            </thead>
            <tbody>
              @if($j>0)
                @foreach ($mantenciones as $mantencion)

                <tr>
             
                <td>{{$mantencion->fecha}}</td>
                <td>{{$mantencion->valor}}</td>
                <td>{{$mantencion->descripcion}}</td>

                 <td>{{$mantencion->maquinaria->nombre}} </td>
                  <td>{{$mantencion->empresa_externa->razon_social}}</td>


                <td>
                    <form method="GET" style="display:inline" action="{{ route('mantenciones.show', $mantencion->codigo)}}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-success btn-xs" title="Ver">
                            <i class="fa fa-eye"></i>
                        </button>
                    </form>

                    </td>
                @if(!auth()->user()->hasPerfiles(['jss']))
                <td>

                 <form method="GET" style="display:inline" action="{{ route('mantenciones.edit' , $mantencion->codigo) }}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-warning btn-xs" title="Editar">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </form>


                    
                 </td>


                <td>
                    <form method="POST" style="display:inline" action="{{ route('mantenciones.destroy', $mantencion->codigo)}}" id="del{{$mantencion->codigo}}">
                    @csrf
                    {!! method_field('DELETE') !!}

                        <button type="submit" class="btn btn-block btn-danger btn-xs" title="Eliminar" onClick="confirmFunction('del{{$mantencion->codigo}}')">
                             <i class="fa fa-trash"></i>
                        </button>
                    </form>

                    </td>
                    @endif

            </tr>
                @endforeach

            </tbody>
            @endif
        
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
