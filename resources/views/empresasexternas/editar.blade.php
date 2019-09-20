@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('empresasexternas.index') }}"><i class="fa fa-dashboard"></i> Listado de Empresas </a></li> 
        <li><a href=""><i ></i> Editar Empresa Externa</a></li>
        <li class="active"></li>
      </ol>     

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-warning" >
            <div class="box-header with-border">
              <h2 class="titulo2">Editar Empresa  {{ $empresaexterna->razon_social }}</h2>
              <hr class="lineaEdit">
               
        <form method="POST" action="{{ route('empresasexternas.update', $empresaexterna->codigo)}}">
          @csrf
          {!! method_field('PUT')!!}
          <div class="col-md-12">
              <div class="col-md-6">
                          <div class="form-group {{ $errors->has('razon_social') ? 'has-error' : ''}}">
        <label for="razon_social" class="form-check-label" > Razón Social<br>
        <input type="text" name="razon_social" class="form-control" value="{{$empresaexterna->razon_social}}">
        
        </label>{!! $errors->first('razon_social', '<span class=help-block>:message</span>') !!}
        </div>

                <div class="form-group {{ $errors->has('rut') ? 'has-error' : ''}}">
        <label for="rut" class="form-check-label" > Rut Empresa<br>
        <input type="text" name="rut" class="form-control" value="{{$empresaexterna->rut}}">
        
        </label>{!! $errors->first('rut', '<span class=help-block>:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('correo') ? 'has-error' : ''}}">
        <label for="correo" class="form-check-label" > Correo<br>
        <input type="correo" name="correo" class="form-control" value="{{$empresaexterna->correo}}">
       
        </label>{!! $errors->first('correo', '<span class=help-block>:message</span>') !!}
        </div>

              </div>
              <div class="col-md-6">
                   <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
        <label for="telefono" class="form-check-label" > Teléfono<br>
        <input type="text" name="telefono" class="form-control" value="{{$empresaexterna->telefono}}">
        
        </label>{!! $errors->first('telefono', '<span class=help-block>:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('ciudad') ? 'has-error' : ''}}">
        <label for="ciudad" class="form-check-label" > Ciudad<br>
        <input type="text" name="ciudad" class="form-control" value="{{$empresaexterna->ciudad}}">
       
        </label>{!! $errors->first('ciudad', '<span class=help-block>:message</span>') !!}
        </div>


        <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
        <label for="direccion" class="form-check-label" > Dirección<br>
        <input type="text" name="direccion" class="form-control" value="{{$empresaexterna->direccion}}">
     
        </label>{!! $errors->first('direccion', '<span class=help-block>:message</span>') !!}
        </div>       

              </div>

          </div>





        <hr class="lineaEdit">

        &nbsp&nbsp<button type="submit" class="btn btn-primary" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
                <a href="{{ route('empresasexternas.index') }}" class="btn btn-warning pull-left"
        role="button"><i class="fa fa-reply" aria-hidden="true"></i> Atrás</a>
    </form>
            </div>
          </div>
        </div>
      </div>

    </section>
@stop