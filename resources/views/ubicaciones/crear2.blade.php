@extends('layout')

@section('contenido')


@inject('areass', 'App\Services\Areass')


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
              <h2 class="titulo2">Ingresar Nueva Ubicación</h2>
              <hr class="linea">
        <h3><b>{{$maquinaria->nombre}}</b></h3>
        <br>
        <form method="POST" action="{{ route('ubicaciones.store')}}">
        @csrf

        <div class="form-group {{ $errors->has('fecha_llegada') ? 'has-error' : ''}}">
        <label for="fecha_llegada" class="form-check-label" > Fecha de Llegada <br>
        <input type="date" name="fecha_llegada" class="form-control">
        
        </label>{!! $errors -> first('fecha_llegada', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group">
        <label hidden="true" for="maquinaria_codigo" class="form-check-label" > Maquinaria <br>
        <input type="text" name="maquinaria_codigo"  value="{{$maquinaria->codigo}}"class="form-control">
        </label></div>

        <div class="form-group">
        <label hidden="true" for="centrodesalud_codigo" class="form-check-label" > Centro De Salud <br>
        <input type="text" name="centrodesalud_codigo"  value="{{auth()->user()->centrodesalud->codigo}}"class="form-control">
        </label></div>

         <div class="form-group {{ $errors->has('fecha_ida') ? 'has-error' : ''}}">
        <label for="fecha_ida" class="form-check-label" > Fecha de Ida <br>
        <input type="date" name="fecha_ida" class="form-control">
        
        </label>{!! $errors -> first('fecha_ida', '<span class=help-block>:message</span>') !!}</div>


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




        <hr class="linea">
        &nbsp&nbsp<button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Ingresar</button>  


                <a href="{{ route('ubicaciones.showUbicaciones', $maquinaria->codigo)}}" class="btn btn-warning pull-left"
        role="button"><i class="fa fa-reply" aria-hidden="true"></i> Atrás</a>
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
