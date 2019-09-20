@extends('layout')

@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('mantenciones.index') }}"><i class="fa fa-dashboard"></i> Mantenciones</a></li> 
        <li><a href=""><i ></i> Ver Mantencion</a></li>
        <li class="active"></li>
      </ol>
    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2">Mantención {{$mantencion->codigo}} </h2>
              <hr class="linea">
              <br>

        <div class="container">
                  <form method="" action="">

        <div class="form-group">
        <label for="fecha" class="labelText" > Fecha <br>
        <input type="date" name="fecha" class="sinborde" value="{{ $mantencion->fecha}}" readonly="readonly">
        </label></div>

        <div class="form-group">
         <label for="valor" class="labelText" > Valor <br>
        <input type="number" name="valor" class="sinborde" value="{{ $mantencion->valor}}" readonly="readonly">
        </label></div>

        <div class="form-group">
         <label for="descripcion" class="labelText" > Descripción <br>
        <input type="text" name="descripcion" class="sinborde" value="{{ $mantencion->descripcion}}" readonly="readonly">
        </label></div>

        <div class="form-group">
         <label for="maquinaria_codigo" class="labelText" > Maquinaria <br>
        <input type="text" name="maquinaria_codigo" class="sinborde" value="{{ $mantencion->maquinaria->nombre}}" readonly="readonly">
        </label></div>

          <div class="form-group">
         <label for="empresa_externa_codigo" class="labelText" > Empresa realizadora <br>
        <input type="text" name="empresa_externa_codigo" class="sinborde" value="{{ $mantencion->empresa_externa->razon_social}}" readonly="readonly">
        </label></div>

        <br>
    </form>
        </div>
    <hr class="linea">
        <a href="{{ route('mantenciones.index') }}" class="btn btn-warning pull-left"
        role="button"><i class="fa fa-reply" aria-hidden="true"></i> Atrás</a>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
