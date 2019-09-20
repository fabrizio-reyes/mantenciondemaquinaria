@extends('layout')

@section('contenido')

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-warning" >
            <div class="box-header with-border">
              <h3 class="box-title">Editar Tipo de falla</h3>
              <br>
              <br>

        <form method="POST" action="{{ route('tiposfallas.update' , $tipofalla->codigo)}}">
          @csrf
        {!! method_field('PUT')!!}
        <div class="form-group">
        <label for="nombre" class="form-check-label" > Nombre<br>
        <input type="text" name="nombre" class="form-check-input" value="{{ $tipofalla->nombre}}" >
        </label></div>

        <div class="form-group">
         <label for="descripcion" class="form-check-label" > Descripción <br>
        <input type="text" name="descripcion" class="form-check-input" value="{{ $tipofalla->descripcion}}">
        </label></div>

        <br>
        <button type="submit" class="btn btn-primary" >Editar</button>
    </form>
    <br>
    <input type ='button' class="btn btn-warning"  value = 'Atrás' onclick="location.href = '{{ route('tiposfallas.index') }}'"/>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
