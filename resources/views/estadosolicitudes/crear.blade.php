@extends('layout')


@section('contenido')
 <h1>Ingresar Estado de Solicitud</h1>
    <form method="POST" action="{{ route('estadosolicitudes.store')  }}">
        @csrf
        <div class="form-group">
    	<label for="nombre" class="form-check-label" > Nombre
		<input type="text"  id ="nombre" class="form-check-input" name="nombre">
    	</label></div>
        <br><br>

        <div class="form-group">
    	 <label for="descripcion" class="form-check-label" > Descripción
		<input type="text" id="descripcion" class="form-check-input" name="descripcion">
    	</label></div>
        <br><br>

        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
@stop