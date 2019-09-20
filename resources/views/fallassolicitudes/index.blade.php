@extends('layout')
<?php
use App\Solicitud;
$solicitudes = Solicitud::all();

use App\TipoFalla;
$tiposfallas = TipoFalla::all();
?>

@section('contenido')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h1 class="box-title">Fallas solicitudes</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <input type ='button' class="btn btn-success"  value = 'Crear Nueva' onclick="location.href = '{{ route('fallassolicitudes.create') }}'"/>
        <table id="" class="table">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Detalle</th>
                <th scope="col">Solicitud</th>
                <th scope="col">Tipo de Falla</th>
                <th scope="col">Acciones</th>

            </tr>
            <tbody>
                @foreach ($fallassolicitudes as $fallasolicitud)

                <tr>
                <td>{{$fallasolicitud->codigo}}</td>
                <td>{{$fallasolicitud->detalle}}</td>

                <td> @foreach($solicitudes as $solicitud)
                 @if($fallasolicitud->solicitud_codigo==$solicitud->codigo)
                  <?php echo $solicitud->codigo ?>
                 @endif
                 @endforeach</td>
                 <td> @foreach($tiposfallas as $tipofalla)
                 @if($fallasolicitud->tipofalla_codigo==$tipofalla->codigo)
                  <?php echo $tipofalla->nombre ?>
                 @endif
                 @endforeach</td>
                <td>
                    <form method="GET" style="display:inline" action="{{ route('fallassolicitudes.show', $fallasolicitud->codigo)}}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-success btn-xs">Ver</button>
                    </form>

                    </td>
                <td>

                    <input type ='button' class="btn btn-block btn-warning btn-xs"  value = 'Editar' onclick="location.href = '{{ route('fallassolicitudes.edit' , $fallasolicitud->codigo) }}'"/>
                 </td>


                <td>
                    <form method="POST" style="display:inline" action="{{ route('fallassolicitudes.destroy', $fallasolicitud->codigo)}}">
                    @csrf
                    {!! method_field('DELETE') !!}

                        <button type="submit" class="btn btn-block btn-danger btn-xs">Eliminar</button>
                    </form>

                    </td>

            </tr>
                @endforeach

            </tbody>
        </thead>
    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTables -->
    <script src="/adminlte/bower_components/datatables.net/js/jquery.dataTables.js"></script>
    <script src="/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/adminlte/bower_components/fastclick/lib/fastclick.js"></script>


    <!-- page script -->
    <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          'lengthChange': false,
          'searching'   : false,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : false
        })
      })
    </script>
@stop
