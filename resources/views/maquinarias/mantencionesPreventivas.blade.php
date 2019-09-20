@extends('layout')


@section('contenido')

<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css" rel="stylesheet"/>

@php
    use Carbon\Carbon;
@endphp

      <ol class="breadcrumb" style="margin: 0;">
        <li><a href="{{ route('maquinarias.index') }}"><i class="fa fa-dashboard"></i> Fecha de mantenciones próximas</a></li>
        <li class="active"></li>
      </ol>

     <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-info" >
            <div class="box-header with-border">
            <h2 class="titulo">Fecha de próximas mantenciones</h2>
              <br>
        <br>
        <br>
        
     <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th style="display: none">man</th>
                <th scope="col" class="table1">Mantenciones Preventivas</th>
                <th scope="col" class="table1">Id General</th>
                <th scope="col" class="table1">Id Inventario</th>
                <th scope="col">Nombre</th>

                <th scope="col">Estado</th>
                <th scope="col">Tipo</th>
                @if(auth()->user()->hasPerfiles(['admin', 'jss']))
                <th scope="col">Centro de salud</th>
                @endif
                @if(auth()->user()->hasPerfiles(['ja']))
                <th scope="col" class="table1">Enviar Solicitud</th>
                @endif
            </tr>
        </thead>

            <tbody>

                @foreach ($maquinarias2 as $maquinaria)

                <?php
                    $fechaM=Carbon::parse($maquinaria->mantenciones_preventivas);
                    $diff=$date->diffInDays($fechaM);
                if (strtotime($fechaM) < strtotime($date)){
                    echo '<tr style="background:black;color: white">';
                }elseif ($diff<=3 && $diff>=0) {
                    echo '<tr style="background:#dd4b39;color: white">';
                }elseif ($diff>3 && $diff<7) {
                    echo '<tr style="background:orange;color: white">';
                } elseif ($diff>7 && $diff<30) {
                    echo '<tr style="background:lightsalmon;color: white">';
                }else{
                    echo '<tr>';
                }
                ?>

                <td style="display: none">{{$maquinaria->mantenciones_preventivas}}</td>
                <td >{{$fechaM->format('d-m-Y')}} </td>
                <td>{{$maquinaria->id_general}}</td>
                <td>{{$maquinaria->id_inventario}}</td>
                <td>{{$maquinaria->nombre}}</td>

                <td>{{$maquinaria->estado}}</td>
                <td>{{$maquinaria->tipo->nombre}}</td>
                @if(auth()->user()->hasPerfiles(['admin', 'jss']))
                <td>{{$maquinaria->centrodesalud->nombre}}</td>
                @endif
                @if(auth()->user()->hasPerfiles(['ja']))
                <td>
                <a href="{{ route('solicitudes.createPreventiva',$maquinaria->codigo) }}" class="btn btn-primary"
        role="button"><i class="fa fa-share-square-o" aria-hidden="true"></i> </a>&nbsp
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
    },
    "order": [[ 0, 'asc' ]]
  });
});

</script>
@stop
