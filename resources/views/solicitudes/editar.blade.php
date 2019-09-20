@extends('layout')

@section('contenido')
<br>
    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-10" >
          <!-- general form elements -->
          <div class="box box-warning" >
            <div class="box-header with-border">
              <h2 class="titulo2">Editar Solicitud</h2>
              <hr class="lineaEdit">


        <form method="POST" action="{{ route('solicitudes.update' , $solicitud->codigo)}}">
          @csrf
        {!! method_field('PUT')!!}



        <div class="form-group">
        <label for="detalle" class="form-check-label" >Detalle<br>
        <textarea class="form-control" type="text" name="detalle" cols="50" rows="10" >{{ $solicitud->detalle}}  </textarea>
        </label></div>


  

        <hr class="lineaEdit">
        <button type="submit" class="btn btn-primary" >Editar</button>
        <input type ='button' class="btn btn-warning"  value = 'Atrás' onclick="location.href = '{{ route('solicitudes.index') }}'"/>
    </form>
    <br>
    
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
