@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('salas.index') }}"><i class="fa fa-dashboard"></i> Listado de Salas </a></li> 
        <li><a href=""><i ></i> Ver Sala</a></li>
        <li class="active"></li>
      </ol>
    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2">Sala {{ $sala->nombre." N° ".$sala->numero  }}  </h2>
              <br>
            <hr class="linea">

            <div class="container">
        <form method="" action="">
        <div class="form-group">
        <label for="numero" class="labelText" > Número de Sala<br>
        <input type="number" name="numero" class="sinborde" value="{{ $sala->numero}}" readonly="readonly">
        </label></div>

<div class="form-group">
        <label for="nombre" class="labelText" > Nombre <br>
        <input type="text" name="nombre" class="sinborde" value="{{ $sala->nombre}}" readonly="readonly">
        </label></div>

        <div class="form-group">
        <label for="area_codigo" class="labelText" > Área <br>
        <input type="text" name="area_codigo" class="sinborde" value="{{ $sala->area->nombre}}" readonly="readonly">
        </label></div>
    </form>

            </div>


    <hr class="linea">
    <input type ='button' class="btn btn-warning"  value = 'Atrás' onclick="location.href = '{{ route('salas.index') }}'"/>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
