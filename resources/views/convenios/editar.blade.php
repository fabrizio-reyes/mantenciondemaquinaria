@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('convenios.index') }}"><i class="fa fa-dashboard"></i> Listado de Convenios </a></li>
        <li><a href=""><i ></i> Editar Convenio</a></li>
        <li class="active"></li>
      </ol>

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-warning" >
            <div class="box-header with-border">
              <h2 class="titulo2">Editar Convenio {{$convenio->id_convenio}}</h2>
              <hr class="lineaEdit">


        <form method="POST" action="{{ route('convenios.update', $convenio->codigo)}}">
          @csrf
          {!! method_field('PUT')!!}
<div class="form-group {{ $errors->has('id_convenio') ? 'has-error' : ''}}">
        <label for="id_convenio" class="form-check-label" > ID Convenio <br>
        <input type="text" name="id_convenio" class="form-control" value="{{$convenio->id_convenio}}">

        </label>{!! $errors->first('id_convenio', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group {{ $errors->has('fecha_inicio') ? 'has-error' : ''}}">
        <label for="fecha_inicio" class="form-check-label" > Fecha de Inicio <br>
        <input type="date" name="fecha_inicio" class="form-control" value="{{$convenio->fecha_inicio}}">
        </label>{!! $errors->first('fecha_inicio', '<span class=help-block>:message</span>') !!}</div>


        <div class="form-group {{ $errors->has('fecha_termino') ? 'has-error' : ''}}">
        <label for="fecha_termino" class="form-check-label" > Fecha de Término <br>
        <input type="date" name="fecha_termino" class="form-control" value="{{$convenio->fecha_termino}}">
        </label>{!! $errors->first('fecha_termino', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group {{ $errors->has('empresaexterna_codigo') ? 'has-error' : ''}}">
        <label for="empresaexterna_codigo">Empresa</label> <br>
        <select name="empresaexterna_codigo" id="empresaexterna_codigo" class="form-control">
        <option value="{{$convenio->empresaexterna->codigo}}">{{$convenio->empresaexterna->razon_social}}</option>
        @foreach ($empresasexternas as $empresa)
        <option value="{{ $empresa->codigo }}">{{ $empresa->razon_social}}</option>
        @endforeach

        </select>
        {!! $errors->first('empresaexterna_codigo', "<span class=help-block>:message</span>") !!}

        </div>

        <br>

         <div class="form-group {{ $errors->has('maquinarias') ? 'has-error' : ''}}">
          <label>Maquinarias</label>
           <select class="form-control select2" multiple="multiple" data-placeholder="Seleccione las maquinarias"
              style="width: 100%;" name="maquinarias[]">
              @foreach ($maquinarias2 as $maquinaria)
              <option
              value="{{$maquinaria->codigo}}"
              name="maquinarias[]"
              {{$convenio->maquinarias->pluck('codigo')->contains($maquinaria->codigo) ? 'selected' : '' }}>
              {{$maquinaria->nombre}}
              </option>
              @endforeach

            </select>{!! $errors->first('maquinarias', "<span class=help-block>:message</span>") !!}
          </div>
        <hr class="lineaEdit">
        &nbsp&nbsp<button type="submit" class="btn btn-primary" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
                <a href="{{ route('convenios.index') }}" class="btn btn-warning pull-left"
        role="button"><i class="fa fa-reply" aria-hidden="true"></i> Atrás</a>
    </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
