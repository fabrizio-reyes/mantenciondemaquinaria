@extends('layout')


@section('contenido')


<section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2>Usuario</h2>
              <br>

        <form method="" action="">
        <div class="form-group">
        <label for="rut" class="form-check-label" > Rut <br> 
        <input type="text"  id ="rut" class="form-control" name="rut" value="{{$usuario->rut}}" readonly="readonly">
        </label></div>
       


        <div class="form-group">
        <label for="nombre" class="form-check-label" > Nombre <br>
        <input type="text"  id ="nombre" class="form-control" name="nombre" value="{{$usuario->nombre}}" readonly="readonly">
        </label></div>

        <div class="form-group">
        <label for="apellidos" class="form-check-label" > Apellidos <br>
        <input type="text"  id ="apellidos" class="form-control" name="apellidos" value="{{$usuario->apellidos}}" readonly="readonly">
        </label></div>
  

        <div class="form-group">
         <label for="correo" class="form-check-label" > Correo <br>
        <input type="text" id="correo" class="form-control" name="correo" value="{{$usuario->correo}}" readonly="readonly">
        </label></div>
   

        <div class="form-group">
         <label for="fecha_nacimiento" class="form-check-label" > Fecha de Nacimiento <br>
        <input type="date" id="fecha_nacimiento" class="form-control" name="fecha_nacimiento" value="{{$usuario->fecha_nacimiento}}" readonly="readonly">
        </label></div>
  

        <div class="form-group">
         <label for="cargo" class="form-check-label" > Cargo <br>
        <input type="text" id="cargo" class="form-control" name="cargo" value="{{$usuario->cargo}}" readonly="readonly">
        </label></div>
    

          <div class="form-group">
         <label for="perfil_codigo" class="form-check-label" > Perfil <br>
        <input type="text" id="perfil_codigo" class="form-control" name="perfil_codigo" value="{{$usuario->perfil_codigo}}" readonly="readonly" >
        </label></div>


       <div class="form-group">
         <label for="area_codigo" class="form-check-label" > Area <br>
        <input type="text" id="area_codigo" class="form-control" name="area_codigo" value="{{$usuario->area_codigo}}" readonly="readonly">
        </label></div>
<br>
    </form>
    <input type ='button' class="btn btn-warning"  value = 'Atrás' onclick="location.href = '{{ route('usuarios.index') }}'"/>
              </div>
            </div>
          </div>
        </div>
      </section>
@stop