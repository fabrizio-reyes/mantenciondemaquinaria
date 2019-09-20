@extends('layout')

@section('contenido')

@inject('areass', 'App\Services\Areass')

      <ol class="breadcrumb">
        <li><a href="{{ route('maquinarias.index') }}"><i class="fa fa-dashboard"></i> Maquinarias</a></li> 
        <li><a href=""><i ></i> Crear Maquinaria</a></li>
        <li class="active"></li>
      </ol>

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-8" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h6 class="titulo2">Crear Maquinaria</h6>
              <hr class="linea">
        <div class="col-md-12">
        <div class="col-md-6">
        <form method="POST" action="{{ route('maquinarias.store')}}">
          @csrf
        <div class="form-group  {{ $errors->has('id_general') ? 'has-error' : ''}}">
        <label for="id_general" class="form-check-label" > Id General<br>
        <input type="text" name="id_general" class="form-control" value="{{ old('id_general')}}">
        </label>{!! $errors -> first('id_general', '<span class=help-block>:message</span>') !!}</div>

<div class="form-group  {{ $errors->has('nombre') ? 'has-error' : ''}}">
        <label for="nombre" class="form-check-label" > Nombre <br>
        <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}">
        </label>{!! $errors -> first('nombre', '<span class=help-block>:message</span>') !!} </div>
<div class="form-group  {{ $errors->has('marca') ? 'has-error' : ''}}">
        <label for="marca" class="form-check-label" > Marca <br>
        <input type="text" name="marca" class="form-control" value="{{old('marca')}}">
        </label>{!! $errors -> first('marca', '<span class=help-block>:message</span>') !!} </div>

        <div class="form-group {{ $errors->has('mantenciones_preventivas') ? 'has-error' : ''}}">
        <label for="mantenciones_preventivas" class="form-check-label" > Mantenciones Preventivas <br>
        <input type="date" name="mantenciones_preventivas" class="form-control">
         
        </label>{!! $errors -> first('mantenciones_preventivas', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group">
        <label for="estado" class="form-check-label" hidden="true" ><br>
        <input type="text" name="estado" class="form-control"  value='activo'>
        </label></div>


        <div class="form-group">
        <label for="centrodesalud_codigo" class="form-check-label" hidden="true" ><br>
        <input type="text" name="centrodesalud_codigo" id="centrodesalud_codigo"class="form-control"  value="{{auth()->user()->centrodesalud_codigo}}">
        </label></div>
        </div>

        <div class="col-md-6">
        <div class="form-group {{ $errors->has('id_inventario') ? 'has-error' : ''}}">
        <label for="id_inventario" class="form-check-label" > Id Inventario <br>
        <input type="text" name="id_inventario" class="form-control" value="{{old('id_inventario')}}">
         
        </label>{!! $errors -> first('id_inventario', '<span class=help-block>:message</span>') !!}</div>
        
        <div class="form-group {{ $errors->has('tipo_codigo') ? 'has-error' : ''}}">
        <label for="tipo_codigo" class="form-check-label" >Tipo</label> <br>
        <select name="tipo_codigo" id="tipo_codigo" class="form-control">
          <option value="">Seleccione Tipo</option>
    @foreach ($tipos as $tipo)
      <option value="{{ $tipo['codigo'] }}">{{ $tipo['nombre']}}</option>
    @endforeach
  </select>
  {!! $errors -> first('tipo_codigo', '<span class=help-block>:message</span>') !!}</div>

  <div class="form-group  {{ $errors->has('modelo') ? 'has-error' : ''}}">
        <label for="modelo" class="form-check-label" > Modelo <br>
        <input type="text" name="modelo" class="form-control" value="{{old('modelo')}}">
        </label>{!! $errors -> first('modelo', '<span class=help-block>:message</span>') !!} </div>

                   <div class="form-group {{ $errors->has('area_codigo') ? 'has-error' : ''}}">
         <label for="area">Área</label> <br>
        <select name="area_codigo" id="area" class="form-control">
    @foreach ($areass->get() as $index => $area)

      <option value="{{ $index }}" {{ old('area_codigo') == $index ? 'selected' : '' }} >{{$area}}</option>
    @endforeach
  </select>{!! $errors -> first('area_codigo', '<span class=help-block>:message</span>') !!}</div>


         <div class="form-group {{ $errors->has('sala_codigo') ? 'has-error' : ''}}">
                <label for="salas" class="form-check-label" >Sala</label> <br>
                <select  id="salas" data-old="{{old("sala_codigo")}}" name="sala_codigo" class="form-control">

          </select>{!! $errors -> first('sala_codigo', '<span class=help-block>:message</span>') !!}
        </div>
                </div>
              </div>
              <div class="content">
              <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
         <label for="descripcion" class="form-check-label" > Descripción <br>
         <textarea  name="descripcion"
            cols="80" rows="10" class="form-control"></textarea>
                    
        </label>{!! $errors -> first('descripcion', '<span class=help-block>:message</span>') !!}</div>

              </div>  
          <hr class="linea">
        &nbsp&nbsp<button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Ingresar</button>

        <a href="{{ route('maquinarias.index') }}" class="btn btn-warning pull-left"
        role="button"><i class="fa fa-reply" aria-hidden="true"></i> Atrás</a>

        
      
        <br>
        <br>
        <br>
    </form>
            </div>
          </div>
        </div>
      </div>
    </section>

        @section('script')
        <script>        
          $(document).ready(function(){
            $('#area').on('change', function(){
              var area_codigo = $(this).val();
              if($.trim(area_codigo) != ''){
                $.get('../../salass', {area_codigo: area_codigo}, function(salass){
                  $('#salas').empty();
                  $('#salas').append("<option value=''>Selecciona un área </option>");
                  $.each(salass, function(index, value){
                    $('#salas').append("<option value='" + index + "'>" + value +  " </option>");
                  });
                });
              }
            });

          });
        </script>
    @endsection
@stop
