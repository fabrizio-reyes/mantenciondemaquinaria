@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('areas.index') }}"><i class="fa fa-dashboard"></i> Listado de Áreas </a></li> 
        <li><a href=""><i ></i> Editar Área</a></li>
        <li class="active"></li>
      </ol>
    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-warning" >
            <div class="box-header with-border">
              <h2 class="titulo2">Editar Área {{$area->nombre}}</h2>
              <hr class="lineaEdit">

        <form method="POST" action="{{ route('areas.update' , $area->codigo)}}">
          @csrf
        {!! method_field('PUT')!!}

        <br>
        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
        <label for="nombre" class="form-check-label" > Nombre <br>
        <input type="text" name="nombre" class="form-control" value="{{ $area->nombre}}">
        
        </label>{!! $errors->first('nombre', '<span class=help-block>:message</span>') !!}</div>



        <hr class="lineaEdit">
        <button type="submit" class="btn btn-primary" >Editar</button>
        <input type ='button' class="btn btn-warning"  value = 'Atrás' onclick="location.href = '{{ route('areas.index') }}'"/>
    </form>
    <br>
    
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
