@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('ubicaciones.index') }}"><i class="fa fa-dashboard"></i> Listado de Ubicaciones </a></li> 
        <li><a href=""><i ></i> Ver Ubicación</a></li>
        <li class="active"></li>
      </ol>
    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2">Ubicación Maquinaria {{$ubicacion->maquinaria->nombre}}  </h2>
              <hr class="linea">
              <br>
              <div class="container">
                        <form method="" action="">

           <div class="form-group">
        <label for="fecha_llegada" class="labelText" > Fecha llegada <br>
        <input type="date" name="fecha_llegada" class="sinborde" value="{{ $ubicacion->fecha_llegada}}" readonly="readonly">
        </label></div>

        

        <div class="form-group">
        @if(empty($ubicacion->fecha_ida))
        <label for="fecha_ida" class="labelText" > Fecha de Ida <br>
        <input type="text" name="fecha_ida" class="sinborde" value="Fecha NO definida" readonly="readonly">
        </label>

         @else

        <label for="fecha_ida" class="labelText" > Fecha de Ida <br>
        <input type="date" name="fecha_ida" class="sinborde" value="{{ $ubicacion->fecha_ida}}" readonly="readonly">
        </label></div>

        @endif
        

         <div class="form-group">
        <label for="maquinaria_codigo" class="labelText" > Maquinaria <br>
        <input type="text" name="maquinaria_codigo" class="sinborde" value="{{ $ubicacion->maquinaria->nombre}}" readonly="readonly">
        </label></div>

          <div class="form-group">
        <label for="centro_salud_codigo" class="labelText" > Centro de Salud <br>
        <input type="text" name="centro_salud_codigo" class="sinborde" value="{{ $ubicacion->centrodesalud->nombre}}" readonly="readonly">
        </label></div>

          <div class="form-group">
        <label for="sala_codigo" class="labelText" > Sala <br>
        <input type="text" name="sala_codigo" class="sinborde" value="{{ $ubicacion->sala->nombre}}" readonly="readonly">
        </label></div>

          <div class="form-group">
        <label for="area_codigo" class="labelText" > Area <br>
        <input type="text" name="area_codigo" class="sinborde" value="{{ $ubicacion->area->nombre}}" readonly="readonly">
        </label></div>

        <br>
    </form>
              </div>


    <hr class="linea">
    <input type ='button' class="btn btn-warning"  value = 'Atrás' onclick="location.href = '{{ route('ubicaciones.index') }}'"/>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
