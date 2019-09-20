@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('salas.index') }}"><i class="fa fa-dashboard"></i> Listado de Salas </a></li> 
        <li><a href=""><i ></i> Crear Sala</a></li>
        <li class="active"></li>
      </ol>

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2">Crear Sala</h2>
              <hr class="linea">
              <br>

        <form method="POST" action="{{ route('salas.store')}}">
          @csrf
        <div class="form-group {{ $errors->has('numero') ? 'has-error' : ''}}">
        <label for="numero" class="form-check-label" > Número de Sala <br>
        <input type="number" name="numero" class="form-control" value="{{old('numero')}}">
        
        </label>{!! $errors->first('numero', '<span class=help-block>:message</span>') !!}</div>

<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
        <label for="nombre" class="form-check-label" > Nombre <br>
        <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}">
        
        </label>{!! $errors->first('nombre', '<span class=help-block>:message</span>') !!}</div>

<div class="form-group {{ $errors->has('area_codigo') ? 'has-error' : ''}}">
        <label for="area_codigo" class="form-check-label" >Área</label> <br>
        <select name="area_codigo" id="area_codigo" class="form-control">
        <option value="">Seleccione Área</option>
    @foreach ($areas as $area)
      <option value="{{ $area['codigo'] }}">{{ $area['nombre']}}</option>
    @endforeach
  </select>{!! $errors->first('area_codigo', '<span class=help-block>:message</span>') !!}
</div>
<br>
      <hr class="linea">
        <button type="submit" class="btn btn-primary" >Ingresar</button>
    </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
