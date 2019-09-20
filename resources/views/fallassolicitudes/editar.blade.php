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
          <div class="box box-warning" >
            <div class="box-header with-border">
              <h3 class="box-title">Editar Falla Solicitud</h3>
              <br>
              <br>

        <form method="POST" action="{{ route('fallassolicitudes.update' , $fallasolicitud->codigo)}}">
          @csrf
        {!! method_field('PUT')!!}

        <div class="form-group">
        <label for="detalle" class="form-check-label" >Detalle<br>
        <input type="text" name="detalle" class="form-check-input" value="{{ $fallasolicitud->detalle}}" >
        </label></div>

        <br>
        <button type="submit" class="btn btn-primary" >Editar</button>
    </form>
    <br>
    <input type ='button' class="btn btn-warning"  value = 'Atrás' onclick="location.href = '{{ route('fallassolicitudes.index') }}'"/>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
