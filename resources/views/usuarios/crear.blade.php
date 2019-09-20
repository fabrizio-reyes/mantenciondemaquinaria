@extends('layout')

<?php 
use App\Perfil;
$perfiles = Perfil::all();

use App\Area;
$areas = Area::all();
?>


@section('contenido')
    <section class="content">
      <div class="row">

        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h2>Crear Usuario</h2>
              <br>

         <form method="POST" action="{{ route('usuarios.store' )}}">    
          @csrf    
        <div class="form-group">
        <label for="rut" class="form-check-label" > Rut <br>
        <input type="text"  id ="rut" class="form-control" name="rut" value="{{old('rut')}}" onChange="Valida_Rut(this);" placeholder="11.111.111-1">
        {!! $errors->first('rut', '<span class="error">:message</span>') !!}
        </label></div>
        
        <div class="form-group">
        <label for="nombre" class="form-check-label" > Nombre <br>
        <input type="text"  id ="nombre" class="form-control" name="nombre" value="{{old('nombre')}}">
        {!! $errors->first('nombre', '<span class="error">:message</span>') !!}
        </label></div>

        <div class="form-group">
        <label for="nombre" class="form-check-label" > Apellidos <br>
        <input type="text"  id ="apellidos" class="form-control" name="apellidos" value="{{old('apellidos')}}">
        {!! $errors->first('apellidos', '<span class="error">:message</span>') !!}
        </label></div>
        

        <div class="form-group">
         <label for="correo" class="form-check-label" > Correo <br>
        <input type="text" id="correo" class="form-control" name="correo" value="{{old('correo')}}">
        {!! $errors->first('correo', '<span class="error">:message</span>') !!}
        </label></div>
        

        <div class="form-group">
         <label for="fecha_nacimiento" class="form-check-label" > Fecha de Nacimiento <br>
        <input type="date" id="fecha_nacimiento" class="form-control" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}">
        {!! $errors->first('fecha_nacimiento', '<span class="error">:message</span>') !!}
        </label></div>
        

<div class="form-group">
        <label for="cargo" class="form-check-label" >Cargo</label> <br>
        <select name="cargo" id="cargo" class="form-control">
   
      <option value="Jefe de Área">Jefe de Área</option>
      <option value="Jefe de Servicios Generales">Jefe de Servicios Generales</option>

  </select>
</div> 
        

        <label for="">Perfil</label> <br>
        <select name="perfil_codigo" id="perfil_codigo" class="form-control">
    @foreach ($perfiles as $perfil)
      <option value="{{ $perfil['codigo'] }}">{{ $perfil['nombre']}}</option>
    @endforeach
  </select>



          <label for="">Area</label> <br>
        <select name="area_codigo" id="area_codigo" class="form-control">
    @foreach ($areas as $area)
      <option value="{{ $area['codigo'] }}">{{ $area['nombre']}}</option>
    @endforeach
  </select>
  <br>


        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>

            </div>
            </div>
        </div>
      </div>
    </section> 

@stop
