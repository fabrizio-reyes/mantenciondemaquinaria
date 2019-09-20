@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('convenios.index') }}"><i class="fa fa-dashboard"></i> Listado de Convenios </a></li> 
        <li><a href=""><i ></i> Ver Convenio</a></li>
        <li class="active"></li>
      </ol>
    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2">Ver Convenio</h2>
              <hr class="linea">
              <br>
             <div class="container"> 
                    <form method="POST" action="{{ route('convenios.update', $convenio->id_convenio)}}">
          @csrf
          {!! method_field('PUT')!!}
<div class="form-group">
        <label for="id_convenio" class="labelText" > ID Convenio <br>
        <input type="text" name="id_convenio" class="sinborde" value="{{$convenio->id_convenio}}" readonly="readonly">
        {!! $errors->first('id_convenio', '<span class="error">:message</span>') !!}
        </label></div>

        <div class="form-group">
        <label for="fecha_inicio" class="labelText" > Fecha de Inicio <br>
        <input type="date" name="fecha_inicio" class="sinborde" value="{{$convenio->fecha_inicio}}" readonly="readonly">
        </label></div>
      

        <div class="form-group">
        <label for="fecha_termino" class="labelText" > Fecha de Término <br>
        <input type="date" name="fecha_termino" class="sinborde" value="{{$convenio->fecha_termino}}" readonly="readonly">
        </label></div>
       

        <div class="form-group">
        <label for="id_convenio" class="labelText" > Empresa <br>
        <input type="text" name="empresaexterna_codigo" class="sinborde" value="{{$convenio->empresaexterna->razon_social}}" readonly="readonly">
        
        </label></div>


          <div class="form-group">
         <label for="perfil" class="labelText" > Maquinarias <br>
          @foreach($convenio->maquinarias as $maquinaria)
        <input type="text" id="perfil" class="sinborde" name="perfil" value="{{$maquinaria->nombre}}" readonly="readonly" >
        <br>
          @endforeach
        </label>
      </div>
        <br>
    </form>

             </div>

               

    <hr class="linea">
                <a href="{{ route('convenios.index') }}" class="btn btn-warning pull-left"
        role="button"><i class="fa fa-reply" aria-hidden="true"></i> Atrás</a>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop