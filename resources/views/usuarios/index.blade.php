@extends('layout')
<?php
use App\Area;
$areas = Area::all();

use App\Perfil;
$perfiles= Perfil::all();
?>

@section('contenido')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2>Usuarios</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <input type ='button' class="btn btn-success"  value = 'Crear Nuevo' onclick="location.href = '{{ route('usuarios.create') }}'"/>
        <table id="" class="table">
        
        <thead>
            <tr>
                <th scope="col" >Código</th>
                <th scope="col">Rut</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Correo</th>
                <th scope="col">Fecha de Nacimiento</th>
                <th scope="col">Cargo</th>
                <th scope="col">Área</th>
                <th scope="col">Perfil</th>
                <th scope="col">Acciones</th>

            </tr>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                <td>{{$usuario->codigo}}</td>
                <td>{{$usuario->rut}}</td>
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->apellidos}}</td>
                <td>{{$usuario->correo}}</td>
                <td>{{$usuario->fecha_nacimiento}}</td>
                <td>{{$usuario->cargo}}</td>
    
                <td> @foreach($areas as $area)
                 @if($usuario->area_codigo==$area->codigo) 
                 {{$area->nombre}}
                 @endif
                 @endforeach</td>

                <td>@foreach($perfiles as $perfil)
                    @if($usuario->perfil_codigo==$perfil->codigo)
                    {{$perfil->nombre}}
                    @endif
                    @endforeach
                </td>


                <td>
                    <form method="GET" style="display:inline" action="{{ route('usuarios.show', $usuario->codigo)}}">
                    @csrf    
                    
                        <button type="submit" class="btn btn-block btn-success btn-xs">Ver</button>
                    </form>

                    </td>
                <td> 

                    <input type ='button' class="btn btn-block btn-warning btn-xs"  value = 'Editar' onclick="location.href = '{{ route('usuarios.edit' , $usuario->codigo) }}'"/>
                 </td>

            
                <td>
                    <form method="POST" style="display:inline" action="{{ route('usuarios.destroy', $usuario->codigo)}}">
                    @csrf    
                    {!! method_field('DELETE') !!}
                    
                        <button type="submit" class="btn btn-block btn-danger btn-xs">Eliminar</button>
                    </form>

                    </td>
                @endforeach
            </tbody>
        </thead>
    </table>

        </div>
    </div>
</div>
</div>
@stop
