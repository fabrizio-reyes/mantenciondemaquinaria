@extends('layout')

@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('maquinarias.index') }}"><i class="fa fa-dashboard"></i> Maquinarias</a></li> 
        <li><a href=""><i ></i> Editar Maquinaria</a></li>
        <li class="active"></li>
      </ol>

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-8" >
          <!-- general form elements -->
          <div class="box box-warning" >
            <div class="box-header with-border">
              <h2 class="titulo2">Editar Maquinaria {{ $maquinaria->nombre }}</h2>
              <hr class="lineaEdit">

        <form method="POST" action="{{ route('maquinarias.update' , $maquinaria->codigo)}}">
          @csrf
        {!! method_field('PUT')!!}
        <div class="col-md-12">
          <div class="col-md-6">
                    <div class="form-group {{ $errors->has('id_general') ? 'has-error' : ''}}">
        <label for="id_general" class="form-check-label" > ID General<br>
        <input type="text" name="id_general" class="form-control" value="{{ $maquinaria->id_general}}" >
 
        </label>{!! $errors -> first('id_general', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
        <label for="nombre" class="form-check-label" > Nombre <br>
        <input type="text" name="nombre" class="form-control" value="{{ $maquinaria->nombre}}">
   
        </label>{!! $errors -> first('nombre', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group  {{ $errors->has('marca') ? 'has-error' : ''}}">
        <label for="marca" class="form-check-label" > Marca <br>
        <input type="text" name="marca" class="form-control" value="{{$maquinaria->marca}}">
        </label>{!! $errors -> first('marca', '<span class=help-block>:message</span>') !!} </div>


         <div class="form-group {{ $errors->has('mantenciones_preventivas') ? 'has-error' : ''}}">
        <label for="mantenciones_preventivas" class="form-check-label" > Mantenciones Preventivas <br>
        <input type="date" name="mantenciones_preventivas" class="form-control" value="{{ $maquinaria->mantenciones_preventivas}}">
     
        </label>{!! $errors -> first('mantenciones_preventivas', '<span class=help-block>:message</span>') !!}</div>


          </div>

          <div class="col-md-6">
                    <div class="form-group {{ $errors->has('id_inventario') ? 'has-error' : ''}}">
         <label for="id_inventario" class="form-check-label" > Id Inventario <br>
        <input type="text" name="id_inventario" class="form-control" value="{{ $maquinaria->id_inventario}}">
    
        </label>{!! $errors -> first('id_inventario', '<span class=help-block>:message</span>') !!}</div>


         <div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
        <label for="estado" class="form-check-label" >Estado</label> <br>
        <select name="estado" id="estado" class="form-control"  >
   
      <option value="{{ $maquinaria->estado}}" >{{ $maquinaria->estado}}</option>
      @if($maquinaria->estado == 'activo')
      <option value="inactivo">Inactivo</option>
      @endif
        @if($maquinaria->estado == 'inactivo')
      <option value="activo">Activo</option>
      @endif
  </select>{!! $errors -> first('estado', '<span class=help-block>:message</span>') !!}</div>

    <div class="form-group  {{ $errors->has('modelo') ? 'has-error' : ''}}">
        <label for="modelo" class="form-check-label" > Modelo <br>
        <input type="text" name="modelo" class="form-control" value="{{$maquinaria->modelo}}">
        </label>{!! $errors -> first('modelo', '<span class=help-block>:message</span>') !!} </div>


          <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
        <label for="descripcion" class="form-check-label" >Descripción<br>
        <textarea class="form-control" type="text" name="descripcion" cols="50" rows="10" >{{ $maquinaria->descripcion}}  </textarea>
    
        </label>{!! $errors -> first('descripcion', '<span class=help-block>:message</span>') !!}</div>


            
          </div>
                  <hr class="lineaEdit">
        &nbsp&nbsp<button type="submit" class="btn btn-primary" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
                <a href="{{ route('maquinarias.index') }}" class="btn btn-warning pull-left"
        role="button"><i class="fa fa-reply" aria-hidden="true"></i> Atrás</a>
       <!--12 -->
        </div>


    </form>
    <br>

            </div>
          </div>
        </div>
      </div>
    </section>
@stop
