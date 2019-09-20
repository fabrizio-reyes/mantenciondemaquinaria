@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('ubicaciones.index') }}"><i class="fa fa-dashboard"></i> Listado de Ubicaciones </a></li> 
        <li><a href=""><i ></i> Editar Ubicación</a></li>
        <li class="active"></li>
      </ol>

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-warning" >
            <div class="box-header with-border">
              <h2 class="titulo2">Editar Ubicación de {{ $ubicacion->maquinaria->nombre}}</h2>
              <hr class="lineaEdit">

        <form method="POST" action="{{ route('ubicaciones.update' , $ubicacion->codigo)}}">
          @csrf
        {!! method_field('PUT')!!}

        <div class="form-group {{ $errors->has('fecha_llegada') ? 'has-error' : ''}}">
        <label for="fecha_llegada" class="form-check-label" > Fecha de LLegada <br>
        <input type="date" name="fecha_llegada" class="form-control" value="{{ $ubicacion->fecha_llegada}}">
        
        </label>{!! $errors -> first('fecha_llegada', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group {{ $errors->has('fecha_ida') ? 'has-error' : ''}}">
        <label for="fecha_ida" class="form-check-label" > Fecha de Ida <br>
        <input type="date" name="fecha_ida" class="form-control" value="{{ $ubicacion->fecha_ida}}">
        
        </label>{!! $errors -> first('fecha_ida', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group">
        <label for="maquinaria_codigo" class="form-check-label" > Maquinaria <br>
        <input type="text" name="maquinaria_codigo" class="form-control" value="{{ $ubicacion->maquinaria->nombre}}" readonly="readonly">
        </label></div>

          <div class="form-group">
        <label for="centro_salud_codigo" class="form-check-label" > Centro de Salud <br>
        <input type="text" name="centro_salud_codigo" class="form-control" value="{{ $ubicacion->centrodesalud->nombre}}" readonly="readonly">
        </label></div>

         <div class="form-group {{ $errors->has('sala_codigo') ? 'has-error' : ''}}">
                <label for="sala_codigo" class="form-check-label" >Sala</label> <br>
                <select name="sala_codigo" id="sala_codigo" class="form-control">
              <option value="{{$ubicacion->codigo}}">{{$ubicacion->sala->nombre}} N° {{$ubicacion->sala->numero}} </option>
            @foreach ($salas as $sala)
              <option value="{{ $sala->codigo }}">{{ $sala->nombre}} N° {{ $sala->numero}}</option>
            @endforeach
          </select>{!! $errors -> first('sala_codigo', '<span class=help-block>:message</span>') !!}
        </div>

          <div class="form-group">
        <label for="area_codigo" class="form-check-label" > Área <br>
        <input type="text" name="area_codigo" class="form-control" value="{{ $ubicacion->area->nombre}}" readonly="readonly">
        </label></div>
        <hr class="lineaEdit">
        <button type="submit" class="btn btn-primary" >Editar</button>
        <input type ='button' class="btn btn-warning"  value = 'Atrás' onclick="location.href = '{{ route('ubicaciones.index') }}'"/>
    </form>
    <br>

    
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
