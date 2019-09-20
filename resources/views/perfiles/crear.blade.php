@extends('layout')


@section('contenido')
<br>

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2">Ingresar Nuevo Perfil</h2>
              <hr class="linea">
             
        <form method="POST" action="{{ route('perfiles.store')}}">
          @csrf
 
<div class="form-group">
        <label for="nombre" class="form-check-label" > Nombre <br>
        <input type="text" name="nombre" class="form-control">
        </label></div>

<div class="form-group">
        <label for="display_name" class="form-check-label" > Nombre de Perfil <br>
        <input type="text" name="display_name" class="form-control">
        </label></div>

        <div class="form-group">
         <label for="descripcion" class="form-check-label" > Descripción <br>
         <textarea  name="descripcion"
            cols="50" rows="10" class="form-control"></textarea>
        </label></div>
        <hr class="linea">
        <button type="submit" class="btn btn-primary" >Ingresar</button>
    </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop