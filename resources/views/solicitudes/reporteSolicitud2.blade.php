@extends('layout')


@section('contenido')

      <ol class="breadcrumb">
        <li><a href="{{ route('solicitudes.index') }}"><i class="fa fa-dashboard"></i> Solicitudes</a></li> 
        <li><a href=" "><i ></i> Reportes</a></li>
        <li class="active"></li>
      </ol>
<br>
<br>

    <section class="content">
      <div class="row" >
        <!-- left column -->
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
            	<br>
              <h2 class="titulo2" align="center" >Reporte de Solicitudes</h2>
              <hr class="linea">
      
      <br>


<div class="col-md-12">

		<form action="{{ route('solicitudes2.pdf') }}" method="POST" enctype="multipart/form-data">
		@csrf

		<div class="col-md-12">

	  <div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label for="fechaI" class="text-uppercase">Fecha de Inicio</label>
					<div class="input-group">
							<div class="input-group-prepend">
									<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
							</div>
							<input class="form-control datepicker" id="fechaI" name="fechaI" placeholder="Seleccione una fecha" type="text" required>
					</div>
				</div>
			</div>

	<div class="col-md-3">
				<div class="form-group">
					<label for="fechaF" class="text-uppercase">Fecha de Termino</label>
					<div class="input-group">
							<div class="input-group-prepend">
									<span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
							</div>
							<input class="form-control datepicker" id="fechaF" name="fechaF" placeholder="Seleccione una fecha" type="text" required>
					</div>
				</div>
		</div>
		<div class="col-md-3">
			 <div class="form-group">
                <label for="fechaF" class="text-uppercase">Estado</label>
                <select class="form-control" name="estado" id="estado" style="width: 100%;">
                 
                  <option value="2">Aceptada</option>
                  <option value="1">Pendiente</option>
                  <option value="3">Rechazada</option>
                </select>
              </div>

		</div>
			<div class="col-md-3">
	     <div class="form-group {{ $errors->has('centrodesalud_codigo') ? 'has-error' : ''}}">
                <label for="centrodesalud_codigo" class="text-uppercase">Centro de Salud</label>
                <select name="centrodesalud_codigo" id="centrodesalud_codigo" class="form-control">
                <option value=""> Seleccione Centro de Salud</option>
                @foreach ($centrosdesalud as $centrodesalud)
                <option value="{{ $centrodesalud['codigo'] }}">{{ $centrodesalud['nombre']}}</option>
                @endforeach
               </select>{!! $errors -> first('centrodesalud_codigo', '<span class=help-block>:message</span>') !!}
        </div>
    </div>
	</div>
<br>
<br>
</div>

			<div class="col-md-12">
	      <div class="form-group">
	      	<input type="submit" class="btn btn-success" value="Generar PDF">
	      	<a href="/solicitudes" class="btn btn-danger">Cancelar</a>
	      </div>
	      <hr class="linea">
	    </div>

 

	</form>
	</div>


</div>
	



</div>
</div>
</div>

</section>

	



@endsection