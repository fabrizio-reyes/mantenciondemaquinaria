@extends('layout')

<?php
use App\Solicitud;
$solicitudes = Solicitud::all();

use App\TipoFalla;
$tiposfallas = TipoFalla::all();
?>
@section('contenido')

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h3 class="box-title">Crear Falla Solicitud</h3>
              <br>
              <br>

        <form method="POST" action="{{ route('fallassolicitudes.store')}}">
          @csrf

          <div class="form-group">
         <label for="detalle" class="form-check-label" > Detalle <br>
         <textarea  name="detalle"
            cols="60" rows="10"></textarea>
        </label></div>

<div class="form-group">
        <label for="solicitud_codigo" class="form-check-label" >Solicitud</label> <br>
        <select name="solicitud_codigo" id="solicitud_codigo" class="form-control">
    @foreach ($solicitudes as $solicitud)
      <option value="{{ $solicitud['codigo'] }}">{{ $solicitud['codigo']}}</option>
    @endforeach
  </select>
</div>


        <div class="form-group">
                <label for="tipofalla_codigo" class="form-check-label" >Tipo de falla</label> <br>
                <select name="tipofalla_codigo" id="tipofalla_codigo" class="form-control">
            @foreach ($tiposfallas as $tipofalla)
              <option value="{{ $tipofalla['codigo'] }}">{{ $tipofalla['nombre']}}</option>
            @endforeach
          </select>
        </div>




        <button type="submit" class="btn btn-primary" >Ingresar</button>
    </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
