@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('tipos.index') }}"><i class="fa fa-dashboard"></i> Listado de Tipos </a></li> 
        <li><a href=""><i ></i> Crear Tipo</a></li>
        <li class="active"></li>
      </ol>


    <section class="content">
      <div class="row">

        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="titulo2">Ingresar Tipo de Maquinaria</h2>
              <hr class="linea">

    <form method="POST" action="{{ route('tipos.store')  }}">
        @csrf
        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    	<label for="nombre" class="form-check-label" > Nombre 
		<input type="text"  id ="nombre" class="form-control" name="nombre" value="{{old('nombre')}}">
        
    	</label>{!! $errors -> first('nombre', '<span class=help-block>:message</span>') !!}</div>
        <br>

        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
         <label for="descripcion" class="form-check-label" > Descripción <br>
         <textarea  name="descripcion"
            cols="50" rows="10" class="form-control"></textarea>
                  
        </label>{!! $errors -> first('descripcion', '<span class=help-block>:message</span>') !!}</div>
        <hr class="linea">
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>
</div>
</div>
</div>
</section>
@stop