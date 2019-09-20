@extends('layout')

@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('tipos.index') }}"><i class="fa fa-dashboard"></i> Listado de Tipos </a></li> 
        <li><a href=""><i ></i> Ver Tipo</a></li>
        <li class="active"></li>
      </ol>
    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2">Tipo {{ $tipo->nombre}}  </h2>
              <br>
        <hr class="linea">
        <div class="container">
                  <form method="" action="">
<div class="form-group">
        <label for="nombre" class="labelText" > Nombre <br>
        <input type="text" name="nombre" class="sinborde" value="{{ $tipo->nombre}}" readonly="readonly">
        </label></div>

<div class="form-group">
         <label for="descripcion" class="labelText" > Descripción <br>
          <textarea class="sinborde" type="text" name="descripcion"  readonly="readonly" cols="50" rows="10">{{ $tipo->descripcion}}  </textarea>
        </label></div>
          </form>

        </div>


        <hr class="linea">
    <input type ='button' class="btn btn-warning"  value = 'Atrás' onclick="location.href = '{{ route('tipos.index') }}'"/>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
