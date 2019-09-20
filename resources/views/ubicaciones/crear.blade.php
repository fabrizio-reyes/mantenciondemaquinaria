@extends('layout')

@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('ubicaciones.index') }}"><i class="fa fa-dashboard"></i> Maquinarias </a></li> 
        <li><a href=""><i ></i> Listado de Ubicaciones</a></li>
        <li><a href=""><i ></i> Ingresar una Nueva Ubicación</a></li>
        <li class="active"></li>
      </ol>

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2">Crear Ubicación</h2>
              <hr class="linea">
        <form method="POST" action="{{ route('ubicaciones.store')}}">
          @csrf

        <div class="form-group {{ $errors->has('fecha_llegada') ? 'has-error' : ''}}">
        <label for="fecha_llegada" class="form-check-label" > Fecha de LLegada <br>
        <input type="date" name="fecha_llegada" class="form-control">
        
        </label>{!! $errors -> first('fecha_llegada', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group">
        <label for="maquinaria_codigo" class="form-check-label" > Maquinaria <br>
        <input type="text" name="maquinaria_codigo"  value="{{$maquinaria->codigo}}"class="form-control">
        
        </label>{!! $errors -> first('fecha_llegada', '<span class=help-block>:message</span>') !!}</div>
       

         <div class="form-group {{ $errors->has('fecha_ida') ? 'has-error' : ''}}">
        <label for="fecha_ida" class="form-check-label" > Fecha de Ida <br>
        <input type="date" name="fecha_ida" class="form-control">
        
        </label>{!! $errors -> first('fecha_ida', '<span class=help-block>:message</span>') !!}</div>
      
 
         <div class="form-group {{ $errors->has('centrodesalud_codigo') ? 'has-error' : ''}}">
                <label for="centrodesalud_codigo">Centro de Salud</label>
                <select name="centrodesalud_codigo" id="centrodesalud_codigo" class="form-control">
                <option value=""> Seleccione Centro de Salud</option>
                @foreach ($centrosdesalud as $centrodesalud)
                <option value="{{ $centrodesalud['codigo'] }}">{{ $centrodesalud['nombre']}}</option>
                @endforeach
               </select>{!! $errors -> first('centrodesalud_codigo', '<span class=help-block>:message</span>') !!}
        </div>

         <div class="form-group {{ $errors->has('sala_codigo') ? 'has-error' : ''}}">
                <label for="sala_codigo" class="form-check-label" >Sala</label> <br>
                <select name="sala_codigo" id="sala_codigo" class="form-control">
              <option value="">Seleccione Sala</option>
            @foreach ($salas as $sala)
              <option value="{{ $sala['codigo'] }}">{{ $sala['nombre']}} N° {{ $sala['numero']}}</option>
            @endforeach
          </select>{!! $errors -> first('sala_codigo', '<span class=help-block>:message</span>') !!}
        </div>
      <div class="form-group {{ $errors->has('area_codigo') ? 'has-error' : ''}}">
         <label for="">Área</label> <br>
        <select name="area_codigo" id="area_codigo" class="form-control">
        <option value="">Seleccione Área</option>
    @foreach ($areas as $area)
      <option value="{{ $area['codigo'] }}">{{ $area['nombre']}}</option>
    @endforeach
  </select>{!! $errors -> first('area_codigo', '<span class=help-block>:message</span>') !!}</div>
        <hr class="linea">
        <button type="submit" class="btn btn-primary" >Ingresar</button>
    </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
