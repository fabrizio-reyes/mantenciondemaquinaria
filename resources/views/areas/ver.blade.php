@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('areas.index') }}"><i class="fa fa-dashboard"></i> Listado de Áreas </a></li> 
        <li><a href=""><i ></i> Ver Área</a></li>
        <li class="active"></li>
      </ol>
    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2">Área <?php echo $area->nombre ?> </h2>
              <hr class="linea">
              <br>

             <div class="container"> 
               <form method="" action="">


        <div class="form-group">
        <label for="nombre" class="labelText" > Nombre <br>
        <input type="text" name="nombre" class="sinborde" value="{{ $area->nombre}}" readonly="readonly">
        </label></div>

        <div class="form-group">
        <label for="centrodesalud_codigo" class="labelText" > Centro de Salud <br>
        <input type="text" name="centrodesalud_codigo" class="sinborde" value="{{ $area->centrodesalud->nombre}}" readonly="readonly">
        </label></div>

        <br>
              </form>

             </div>
              
    <hr class="linea">
    <input type ='button' class="btn btn-warning"  value = 'Atrás' onclick="location.href = '{{ route('areas.index') }}'"/>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
