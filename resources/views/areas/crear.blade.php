@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('areas.index') }}"><i class="fa fa-dashboard"></i> Listado de Áreas </a></li> 
        <li><a href=""><i ></i> Crear Nueva Área</a></li>
        <li class="active"></li>
      </ol>
    <section class="content">
      <div class="row">

        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="titulo2">Ingresar Área</h2>
              <hr class="linea">
              <br>
        
    <form method="POST" action="{{ route('areas.store')}}">
        @csrf
        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    	<label for="nombre" class="form-check-label" > Nombre 
		<input type="text"  id ="nombre" class="form-control" name="nombre" value="{{old('nombre')}}">
    	</label>{!! $errors->first('nombre', '<span class=help-block>:message</span>') !!}</div>
    
    
    <div class="form-group {{ $errors->has('centrodesalud_codigo') ? 'has-error' : ''}}">
    <label for="">Centro de Salud</label>
    <select name="centrodesalud_codigo" id="centrodesalud_codigo" class="form-control">
    <option value="">Seleccione un Centro</option>
    @foreach ($centrosdesalud as $centrodesalud)
    <option value="{{ $centrodesalud['codigo'] }}">{{ $centrodesalud['nombre']}}</option>
    @endforeach
   </select>
   {!! $errors->first('centrodesalud_codigo', "<span class=help-block>:message</span>") !!}
 </div>
   <br>
<hr class="linea">
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>

</div>
</div>
</div>
</div>
</section>
@stop