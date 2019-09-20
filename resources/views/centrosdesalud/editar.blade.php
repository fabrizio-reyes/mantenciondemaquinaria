@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('centrosdesalud.index') }}"><i class="fa fa-dashboard"></i> Listado de Centros de Salud </a></li> 
        <li><a href=""><i ></i> Crear Centro de Salud</a></li>
        <li class="active"></li>
      </ol>

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-8" >
          <!-- general form elements -->
          <div class="box box-warning" >
            <div class="box-header with-border">
              <h2 class="titulo2">Editar Centro de Salud <b> {{$centrodesalud->nombre}} </b> </h2>
              <hr class="lineaEdit">

               
        <form method="POST" action="{{ route('centrosdesalud.update', $centrodesalud->codigo)}}">
          @csrf
          {!! method_field('PUT')!!}

          <div class="col-md-12">
            <div class="col-md-6">
                      <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}} ">
        <label for="nombre" class="form-check-label" > Nombre<br>
        <input type="text" name="nombre" class="form-control" value="{{$centrodesalud->nombre}}">
        
        </label>{!! $errors->first('nombre', "<span class=help-block>:message</span>") !!}
        </div>

        <div class="form-group {{ $errors->has('correo') ? 'has-error' : ''}}">
        <label for="correo" class="form-check-label" > Correo<br>
        <input type="correo" name="correo" class="form-control" value="{{$centrodesalud->correo}}">
       
        </label>{!! $errors->first('correo', "<span class=help-block>:message</span>") !!}
        </div>

        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
        <label for="telefono" class="form-check-label" > Teléfono<br>
        <input type="text" name="telefono" class="form-control" value="{{$centrodesalud->telefono}}">
        
        </label>{!! $errors->first('telefono', "<span class=help-block>:message</span>") !!}
        </div>

        <div class="form-group {{ $errors->has('ciudad') ? 'has-error' : ''}}">
        <label for="ciudad" class="form-check-label" > Ciudad<br>
        <input type="text" name="ciudad" class="form-control" value="{{$centrodesalud->ciudad}}">
        
        </label>{!! $errors->first('ciudad', "<span class=help-block>:message</span>") !!}
        </div>
            </div>

            <div class="col-md-6">
                      <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
        <label for="direccion" class="form-check-label" > Dirección<br>
        <input type="text" name="direccion" class="form-control" size="200px" value="{{$centrodesalud->direccion}}">
        
        </label>{!! $errors->first('direccion', "<span class=help-block>:message</span>") !!}
        </div>

        

        <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
        <label for="descripcion" class="form-check-label" >Descripción<br>
        <textarea class="form-control" type="text" name="descripcion" cols="50" rows="10" >{{ $centrodesalud->descripcion}}  </textarea>
      
        </label>{!! $errors->first('descripcion', "<span class=help-block>:message</span>") !!}</div>
            </div>


          </div>



        <hr class="lineaEdit">
        &nbsp&nbsp<button type="submit" class="btn btn-primary" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
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