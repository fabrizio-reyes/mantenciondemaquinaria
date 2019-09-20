@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('solicitudes.index') }}"><i class="fa fa-dashboard"></i> Solicitudes</a></li> 
        <li><a href=" "><i ></i> Enviar Solicitud</a></li>
        <li class="active"></li>
      </ol>

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2">Enviar Solicitud de Mantención</h2>
              <hr class="linea">

        <form method="POST" action="{{ route('solicitudes.store')}}">
          @csrf

        <div class="form-group">
        <label for="user_id" class="form-check-label" hidden="true"> Usuario<br>
        <input type="text"  name="user_id" class="form-control" value="{{$usuarioLogeado}}" hidden="true">
        </div>

        <div class="form-group">
        <label for="jsg_id" class="form-check-label" hidden="true"> UsuarioDestinatario<br>
        <input type="text"  name="jsg_id" class="form-control" value="{{$usuarioJsg}}" hidden="true">
        </div>


        <div class="form-group {{ $errors->has('maquinaria_codigo') ? 'has-error' : ''}}">
                <label for="maquinaria_codigo" class="form-check-label" >Maquinaria</label>           
                <select name="maquinaria_codigo" id="maquinaria_codigo" class="form-control select2">
                <option value="">Seleccione la Maquinaria</option>
            @foreach ($maquinarias as $maquinaria)
              <option value="{{ $maquinaria['codigo'] }}">{{ $maquinaria['nombre']}}</option>
            @endforeach
          </select>{!! $errors -> first('maquinaria_codigo', '<span class=help-block>:message</span>') !!}
        </div>
        <div class="form-group">
        <label for="estadosolicitud_codigo" class="form-check-label" hidden="true" ><br>
        <input type="text" name="estadosolicitud_codigo" class="form-control"  value="1">
        </label></div>
        <div class="form-group {{ $errors->has('detalle') ? 'has-error' : ''}}">
         <label for="detalle" class="form-check-label" > Detalle <br>
         <textarea  name="detalle"
            cols="50" rows="10"></textarea>
        </label>{!! $errors -> first('detalle', '<span class=help-block>:message</span>') !!}</div>

   
        <hr class="linea">
        &nbsp&nbsp<button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Enviar</button>
                <a href="{{ route('solicitudes.index') }}" class="btn btn-warning pull-left"
        role="button"><i class="fa fa-reply" aria-hidden="true"></i> Atrás</a>
        </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
