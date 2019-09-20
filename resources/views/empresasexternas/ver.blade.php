@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('empresasexternas.index') }}"><i class="fa fa-dashboard"></i> Listado de Empresas </a></li> 
        <li><a href=""><i ></i> Ver Empresa Externa</a></li>
        <li class="active"></li>
      </ol>
    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-8" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2">Empresa {{$empresaexterna->razon_social}}</h2>
            <hr class="linea">
              <br> 


    <form method="" action="">

            <div class="col-md-12">
                    <div class="col-md-6">
        <div class="form-group">
        <label for="rut" class="labelText" > Rut<br>
        <input type="text" name="rut" class="sinborde" value="{{$empresaexterna->rut}}" readonly="readonly">
  
        </label>
        </div>
        <div class="form-group">
        <label for="correo" class="labelText" > Correo<br>
        <input type="correo" name="correo" class="sinborde" value="{{$empresaexterna->correo}}" readonly="readonly">
        </label>
        </div>
        <div class="form-group">
        <label for="telefono" class="labelText" > Teléfono<br>
        <input type="text" name="telefono" class="sinborde" value="{{$empresaexterna->telefono}}" readonly="readonly"> 
        </label>
        </div>

                    </div>


    <div class="col-md-6">
                        
        <div class="form-group">
        <label for="ciudad" class="labelText" > Ciudad<br>
        <input type="text" name="ciudad" class="sinborde" value="{{$empresaexterna->ciudad}}" readonly="readonly">     
        </label>
        </div>
        <div class="form-group">
        <label for="direccion" class="labelText" > Dirección<br>
        <input type="text" name="direccion" class="sinborde" value="{{$empresaexterna->direccion}}" readonly="readonly">
        </label>
        </div>
     </div>
    </div>
    </form>
             

    <hr class="linea">
                        <a href="{{ route('empresasexternas.index') }}" class="btn btn-warning pull-left"
        role="button"><i class="fa fa-reply" aria-hidden="true"></i> Atrás</a>
            </div>
          </div>
        </div>
      </div>

    </section>
@stop