@extends('layout')

@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('tipos.index') }}"><i class="fa fa-dashboard"></i> Listado de Tipos </a></li> 
        <li><a href=""><i ></i> Editar Tipo</a></li>
        <li class="active"></li>
      </ol>
    <section class="content" >

      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-warning" >
            <div class="box-header with-border">
              <h2 class="titulo2">Editar Tipo {{ $tipo->nombre }}</h2>
              <hr class="lineaEdit">


        <form method="POST" action="{{ route('tipos.update' , $tipo->codigo)}}">
          @csrf
        {!! method_field('PUT')!!}
        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
        <label for="nombre" class="form-check-label" > Nombre<br>
        <input type="text" name="nombre" class="form-control" value="{{ $tipo->nombre}}" >
        </label>{!! $errors -> first('nombre', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
         <label for="descripcion" class="form-check-label" > Descripción <br>
        <textarea class="form-control" type="text" name="descripcion" cols="50" rows="10" >{{ $tipo->descripcion}}  </textarea>
        </label>{!! $errors -> first('descripcion', '<span class=help-block>:message</span>') !!}</div>

        <hr class="lineaEdit">
        <button type="submit" class="btn btn-primary" >Editar</button>
        <input type ='button' class="btn btn-warning"  value = 'Atrás' onclick="location.href = '{{ route('tipos.index') }}'"/>
    </form>
    
    
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
