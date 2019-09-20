@extends('layout')

@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('maquinarias.index') }}"><i class="fa fa-dashboard"></i> Maquinarias</a></li> 
        <li><a href=""><i ></i> Ver Maquinaria</a></li>
        <li class="active"></li>
      </ol>
    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-10" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2">Maquinaria {{ $maquinaria->nombre }} - {{$maquinaria->id_inventario}}  </h2>
              <hr class="linea">
              <br>
            
                        <form method="" action="">
        <div class="col-md-12">
          <div class="col-md-6">

          <div class="form-group">
        <label for="id_general" class="labelText" > Id General<br>
        <input type="text" name="id_general" class="sinborde" value="{{ $maquinaria->id_general}}" readonly="readonly">
        </label></div>

            <div class="form-group">
        <label for="nombre" class="labelText" > Nombre <br>
        <input type="text" name="nombre" class="sinborde" value="{{ $maquinaria->nombre}}" readonly="readonly">
        </label></div>


        <div class="form-group">
        <label for="estado" class="labelText" > Estado <br>
        <input type="text" name="estado" class="sinborde" value="{{ $maquinaria->estado}}" readonly="readonly">
        </label></div>

        <div class="form-group">
        <label for="tipo_id" class="labelText" > Tipo <br>
        <input type="text" name="tipo_id" class="sinborde" value="{{ $maquinaria->tipo->nombre}}" readonly="readonly">
        </label></div>

                 <div class="form-group">
        <label for="mantenciones_preventivas" class="labelText" > Mantenciones Preventivas <br>
        <input type="date" name="mantenciones_preventivas" class="sinborde" value="{{ $maquinaria->mantenciones_preventivas}}" readonly="readonly">
        </label></div>

          </div>

          <div class="col-md-6">



                        <div class="form-group">
         <label for="id_inventario" class="labelText" > Id Inventario <br>
        <input type="text" name="id_inventario" class="sinborde" value="{{ $maquinaria->id_inventario}}" readonly="readonly">
        </label></div>


                <div class="form-group">
        <label for="id_general" class="labelText" > Centro de salud<br>
        <input type="text" name="id_general" class="sinborde" value="{{ $maquinaria->centrodesalud->nombre}}" readonly="readonly">
        </label></div>

        <div class="form-group">
         <label for="descripcion" class="labelText" > Descripción <br>
        <textarea class="sinborde" type="text" name="descripcion  " cols="50" rows="10" readonly="readonly" >{{ $maquinaria->descripcion}}  </textarea>
        </label></div>
        <br>
          </div>
        </div>

    </form>

                           
        <hr class="linea">
                <a href="{{ route('maquinarias.index') }}" class="btn btn-warning pull-left"
        role="button"><i class="fa fa-reply" aria-hidden="true"></i> Atrás</a>

            </div>
          </div>
        </div>
      </div>
    </section>
@stop
