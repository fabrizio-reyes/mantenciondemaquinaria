@extends('layout')


@section('contenido')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h1 class="box-title">Tipos de fallas</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <input type ='button' class="btn btn-success"  value = 'Crear Nueva' onclick="location.href = '{{ route('tiposfallas.create') }}'"/>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones</th>

            </tr>
            <tbody>
                @foreach ($tiposfallas as $tipofalla)

                <tr>
                <td>{{$tipofalla->codigo}}</td>
                <td>{{$tipofalla->nombre}}</td>
                <td>{{$tipofalla->descripcion}}</td>
                <td>
                    <form method="GET" style="display:inline" action="{{ route('tiposfallas.show', $tipofalla->codigo)}}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-success btn-xs">Ver</button>
                    </form>

                    </td>
                <td>

                    <input type ='button' class="btn btn-block btn-warning btn-xs"  value = 'Editar' onclick="location.href = '{{ route('tiposfallas.edit' , $tipofalla->codigo) }}'"/>
                 </td>


                <td>
                    <form method="POST" style="display:inline" action="{{ route('tiposfallas.destroy', $tipofalla->codigo)}}">
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
