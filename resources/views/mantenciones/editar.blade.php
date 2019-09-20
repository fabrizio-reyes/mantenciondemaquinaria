@extends('layout')

@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('mantenciones.index') }}"><i class="fa fa-dashboard"></i> Mantenciones</a></li> 
        <li><a href=""><i ></i> Editar Mantención</a></li>
        <li class="active"></li>
      </ol>

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-warning" >
            <div class="box-header with-border">
              <h2 class="titulo2">Editar Mantención</h2>
              <hr class="lineaEdit">
        <form method="POST" action="{{ route('mantenciones.update' , $mantencion->codigo)}}">
          @csrf
        {!! method_field('PUT')!!}

        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
        <label for="fecha" class="form-check-label" > Fecha de Mantención<br>
        <input type="date" name="fecha" class="form-control" value="{{ $mantencion->fecha}}">
        </label>{!! $errors->first('fecha', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group {{ $errors->has('valor') ? 'has-error' : ''}}">
        <label for="valor" class="form-check-label" > Valor <br>
        <input type="number" name="valor" class="form-control" value="{{ $mantencion->valor}}">
        </label>{!! $errors->first('valor', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
        <label for="descripcion" class="form-check-label" >Descripción<br>
        <textarea class="form-control" type="text" name="descripcion" cols="50" rows="10" >{{ $mantencion->descripcion}}  </textarea>
        </label>{!! $errors->first('descripcion', '<span class=help-block>:message</span>') !!}</div>

        <hr class="lineaEdit">
        &nbsp&nbsp<button type="submit" class="btn btn-primary" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
                <a href="{{ route('mantenciones.index') }}" class="btn btn-warning pull-left"
        role="button"><i class="fa fa-reply" aria-hidden="true"></i> Atrás</a>
    </form>
    <br>
    
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
