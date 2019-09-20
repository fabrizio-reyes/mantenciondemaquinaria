@extends('layout')


@section('contenido')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h1 class="box-title">Estados de solicitud</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <input type ='button' class="btn btn-success"  value = 'Crear Nueva' onclick="location.href = '{{ route('estadosolicitudes.create') }}'"/>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones</th>

            </tr>
            <tbody>
                @foreach ($estadosolicitudes as $estadosolicitud)

                <tr>
                <td>{{$estadosolicitud->codigo}}</td>
                <td>{{$estadosolicitud->nombre}}</td>
                <td>{{$estadosolicitud->descripcion}}</td>
                <td>
                    <form method="GET" style="display:inline" action="{{ route('estadosolicitudes.show', $estadosolicitud->codigo)}}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-success btn-xs">Ver</button>
                    </form>

                    </td>
                <td>

                    <input type ='button' class="btn btn-block btn-warning btn-xs"  value = 'Editar' onclick="location.href = '{{ route('estadosolicitudes.edit' , $estadosolicitud->codigo) }}'"/>
                 </td>


                <td>
                    <form method="POST" style="display:inline" action="{{ route('estadosolicitudes.destroy', $estadosolicitud->codigo)}}">
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
@stop
