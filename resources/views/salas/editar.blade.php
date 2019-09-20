@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('salas.index') }}"><i class="fa fa-dashboard"></i> Listado de Salas </a></li> 
        <li><a href=""><i ></i> Editar Sala</a></li>
        <li class="active"></li>
      </ol>

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-warning" >
            <div class="box-header with-border">
              <h2 class="titulo2">Editar Sala {{ $sala->nombre }}</h2>
              <hr class="lineaEdit">


        <form method="POST" action="{{ route('salas.update' , $sala->codigo)}}">
          @csrf
        {!! method_field('PUT')!!}
        <div class="form-group {{ $errors->has('numero') ? 'has-error' : ''}}">
        <label for="numero" class="form-check-label" >Número<br>
        <input type="number" name="numero" class="form-control" value="{{ $sala->numero}}" >
       
        </label>{!! $errors->first('numero', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
        <label for="nombre" class="form-check-label" > Nombre <br>
        <input type="text" name="nombre" class="form-control" value="{{ $sala->nombre}}">
      
        </label>{!! $errors->first('nombre', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group">
        <label for="area_codigo" class="form-check-label" > Área <br>
        <input type="text" name="area_codigo" class="form-control" value="{{ $sala->area->codigo}}" readonly="readonly">
        </label></div>
        <hr class="lineaEdit">
        <button type="submit" class="btn btn-primary" >Editar</button>
        <input type ='button' class="btn btn-warning"  value = 'Atrás' onclick="location.href = '{{ route('salas.index') }}'"/>
    </form>
    <br>
    
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
