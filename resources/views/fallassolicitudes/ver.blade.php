@extends('layout')

<?php
use App\Tipo;
$tipos = Tipo::all();
?>
@section('contenido')

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h3 class="box-title">Falla Solicitud <?php echo $fallasolicitud->codigo ?> </h3>
              <br>
              <br>

        <form method="" action="">

        <div class="form-group">
         <label for="detalle" class="form-check-label" > Detalle <br>
        <input type="text" name="detalle" class="form-check-input" value="{{ $fallasolicitud->detalle}}" readonly="readonly">
        </label></div>

        <div class="form-group">
         <label for="solicitud_codigo" class="form-check-label" > Solicitud <br>
        <input type="text" name="solicitud_codigo" class="form-check-input" value="{{ $fallasolicitud->solicitud_codigo}}" readonly="readonly">
        </label></div>

        <div class="form-group">
         <label for="tipo_falla_codigo" class="form-check-label" > Tipo de falla <br>
        <input type="text" name="tipo_falla_codigo" class="form-check-input" value="{{ $fallasolicitud->tipofalla_codigo}}" readonly="readonly">
        </label></div>

        <br>
    </form>
    <input type ='button' class="btn btn-warning"  value = 'Atrás' onclick="location.href = '{{ route('fallassolicitudes.index') }}'"/>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
