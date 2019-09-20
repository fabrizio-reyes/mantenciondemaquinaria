@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('mantenciones.index') }}"><i class="fa fa-dashboard"></i> Mantenciones</a></li> 
        <li><a href=""><i ></i> Crear Mantención</a></li>
        <li class="active"></li>
      </ol>

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-10" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2">Crear Mantención</h2>
              <hr class="linea">
        <form method="POST" action="{{ route('mantenciones.store')}}">
          @csrf
        <div class="col-md-12" >
          <div class="col-md-6" >

        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
        <label for="fecha" class="form-check-label" > Fecha de realización<br>
        <input type="date" name="fecha" class="form-control">
        </label>{!! $errors->first('fecha', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group {{ $errors->has('maquinaria_codigo') ? 'has-error' : ''}}">
                <label for="maquinaria_codigo" class="form-check-label" >Maquinaria</label> <br>
                <select name="maquinaria_codigo" id="maquinaria_codigo" class="form-control">
                  <option value="">Seleccione Maquinaria</option>
            @foreach ($maquinarias as $maquinaria)
              <option value="{{ $maquinaria['codigo'] }}">{{ $maquinaria['nombre']}}</option>
            @endforeach
          </select>{!! $errors->first('maquinaria_codigo', '<span class=help-block>:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('empresa_externa_codigo') ? 'has-error' : ''}}">
        <label for="empresa_externa_codigo" class="form-check-label" > Empresa Externa <br>
        </label>
           <select name="empresa_externa_codigo" id="empresa_externa_codigo" class="form-control">
            <option value="">Seleccione Empresa</option>
           @foreach ($empresasexternas as $empresaexterna)
              <option value="{{ $empresaexterna['codigo'] }}">{{ $empresaexterna['razon_social']}}</option>
            @endforeach
          </select>{!! $errors->first('empresa_externa_codigo', '<span class=help-block>:message</span>') !!} 
        </div>


          </div>


          <div class="col-md-6" >

                    <div class="form-group {{ $errors->has('valor') ? 'has-error' : ''}}">
        <label for="valor" class="form-check-label" > Valor <br>
        <input type="number" name="valor" class="form-control">
        </label>{!! $errors->first('valor', '<span class=help-block>:message</span>') !!}</div>
   



                <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
         <label for="descripcion" class="form-check-label" > Descripción <br>
         <textarea  name="descripcion"
            cols="50" rows="10"></textarea>
</label>{!! $errors->first('descripcion', '<span class=help-block>:message</span>') !!}</div>
          </div>
      
        <hr class="linea">
        &nbsp&nbsp<button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Ingresar</button>

        <a href="{{ route('mantenciones.index') }}" class="btn btn-warning pull-left"
        role="button"><i class="fa fa-reply" aria-hidden="true"></i> Atrás</a>

        </div>





    </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
