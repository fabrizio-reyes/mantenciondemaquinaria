@extends('layout')


@section('contenido')
<br>

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-warning" >
            <div class="box-header with-border">
              <h2 class="titulo2">Editar Perfil {{$perfil->display_name}}</h2>
              <hr class="lineaEdit">
               
        <form method="POST" action="{{ route('perfiles.update', $perfil->codigo)}}">
          @csrf
      {!! method_field('PUT')!!}
      <div class="form-group">
        <label for="nombre" class="form-check-label" > Nombre <br>
        <input type="text" name="nombre" class="form-control" value="{{$perfil->nombre}}">
        </label></div>
        

      <div class="form-group">   
        <label for="display_name" class="form-check-label" > Nombre de Perfil <br>
        <input type="text" name="display_name" class="form-control" value="{{$perfil->display_name}}">
        </label></div>
       
      <div class="form-group">
        <label for="descripcion" class="form-check-label" > Descripción <br>
        <textarea class="form-control" type="text" name="descripcion" cols="50" rows="10" >{{ $perfil->descripcion}}  </textarea>
        </label></div>

      <hr class="lineaEdit">
        <button type="submit" class="btn btn-primary" >Editar</button>
        <input type ='button' class="btn btn-warning" value = 'Atrás' onclick="location.href = '{{ route('perfiles.index') }}'"/>
    </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop