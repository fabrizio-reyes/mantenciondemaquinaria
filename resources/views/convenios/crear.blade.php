@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('convenios.index') }}"><i class="fa fa-dashboard"></i> Listado de Convenios </a></li>
        <li><a href=""><i ></i> Crear Convenio</a></li>
        <li class="active"></li>
      </ol>
    <section class="content" >




      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2">Ingresar Nuevo Convenio</h2>
              <hr class="linea">

        <form method="POST" action="{{ route('convenios.store')}}">
          @csrf
        <div class="form-group {{ $errors->has('id_convenio') ? 'has-error' : ''}}">
        <label for="id_convenio" class="form-check-label" > ID Convenio <br>
        <input type="text" name="id_convenio" class="form-control" value="{{old('id_convenio')}}">

        </label>

        {!! $errors->first('id_convenio', '<span class=help-block>:message</span>') !!}</div>

<div class="form-group {{ $errors->has('empresaexterna_codigo') ? 'has-error' : ''}}">
        <label for="empresaexterna_codigo">Empresa</label> <br>
        <select name="empresaexterna_codigo" id="empresaexterna_codigo" class="form-control" style="width:200px">
        <option value="">Selecciona la empresa</option>
        @foreach ($empresasexternas as $empresa)
        <option value="{{ $empresa->codigo }}">{{ $empresa->razon_social}}</option>
        @endforeach

        </select>
        {!! $errors->first('empresaexterna_codigo', "<span class=help-block>:message</span>") !!}

        </div>
        <br>

<div class="col-md-12">
        <div class="col-md-6">
        <div class="form-group {{ $errors->has('fecha_inicio') ? 'has-error' : ''}}">
        <label for="fecha_inicio" class="form-check-label" > Fecha de Inicio <br>
        <input type="text" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{old('fecha_inicio')}}">

        </label>{!! $errors->first('fecha_inicio', '<span class=help-block>:message</span>') !!}
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group {{ $errors->has('fecha_termino') ? 'has-error' : ''}} " >
        <label for="fecha_termino" class="form-check-label" > Fecha de Término <br>
        <input type="text" name="fecha_termino" id="fecha_termino" class="form-control" value="{{old('fecha_termino')}}">
        </label>
        {!! $errors->first('fecha_termino', '<span class=help-block>:message</span>') !!}
        </div>
        </div>
    </div>

        <br>

         <div class="form-group {{ $errors->has('maquinarias') ? 'has-error' : ''}}">
          <label>Maquinarias</label>
           <select class="form-control select2" multiple="multiple" data-placeholder="Seleccione las maquinarias"
              style="width: 100%;color:black" name="maquinarias[]">
              @foreach ($maquinarias2 as $maquinaria)
              <option value="{{$maquinaria->codigo}}" name="maquinarias[]" > {{$maquinaria->nombre}} </option>
              @endforeach

            </select>{!! $errors->first('maquinarias', "<span class=help-block>:message</span>") !!}
          </div>
          <br>



   <hr class="linea">
        <button type="submit" class="btn btn-primary">Ingresar</button>
        <input type ='button' class="btn btn-warning" value = 'Atrás' onclick="location.href = '{{ route('convenios.index') }}'"/>
    </form>
            </div>
          </div>
        </div>
      </div>

    </section>



@stop
