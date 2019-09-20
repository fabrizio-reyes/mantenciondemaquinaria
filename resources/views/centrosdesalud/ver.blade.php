@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('centrosdesalud.index') }}"><i class="fa fa-dashboard"></i> Listado de Centros de Salud </a></li> 
        <li><a href=""><i ></i> Ver Centro de Salud</a></li>
        <li class="active"></li>
      </ol>
    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-8" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2">Centro de Salud</h2>
              <hr class="linea">           
        <form method="">
          @csrf
        <div class="col-md-12">
            <div class="col-md-6">

        <div class="form-group">
        <label for="nombre" class="labelText" > Nombre<br>
        <input type="text" name="nombre" class="sinborde" value="{{$centrodesalud->nombre}}" readonly="readonly">
        </label>
        </div>

        <div class="form-group">
        <label for="correo" class="labelText" > Correo<br>
        <input type="correo" name="correo" class="sinborde" value="{{$centrodesalud->correo}}" readonly="readonly">
        </label>
        </div>

        <div class="form-group">
        <label for="telefono" class="labelText" > Teléfono<br>
        <input type="text" name="telefono" class="sinborde" value="{{$centrodesalud->telefono}}" readonly="readonly">
        </label>
        </div>
                
            </div>
            <div class="col-md-6">
        <div class="form-group">
        <label for="ciudad" class="labelText" > Ciudad<br>
        <input type="text" name="ciudad" class="sinborde" value="{{$centrodesalud->ciudad}}" readonly="readonly">
        </label>
        </div>

        <div class="form-group">
        <label for="direccion" class="labelText" > Dirección<br>
        <input type="text" name="direccion" class="sinborde" value="{{$centrodesalud->direccion}}" readonly="readonly">
        </label>
        </div>

                <div class="form-group">
        <label for="descripcion" class="labelText" > Descripcion<br>
        <input type="text" name="descripcion" class="sinborde" value="{{$centrodesalud->descripcion}}" readonly="readonly">
        </label>
        </div>        

            </div>
            

        </div>

    <hr class="linea">
    <a href="{{ route('centrosdesalud.index') }}" class="btn btn-warning pull-left"
        role="button"><i class="fa fa-reply" aria-hidden="true"></i> Atrás</a>
    </form>
    <br>

            </div>
          </div>
        </div>
      </div>

    </section>
@stop