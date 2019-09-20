@extends('layout')

@section('contenido')

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h3 class="box-title">Tipo de falla <?php echo $tipofalla->nombre ?> </h3>
              <br>
              <br>



<div class="form-group">
        <label for="nombre" class="form-check-label" > Nombre <br>
        <input type="text" name="nombre" class="form-check-input" value="{{ $tipofalla->nombre}}" readonly="readonly">
        </label></div>

<div class="form-group">
         <label for="descripcion" class="form-check-label" > Descripcion <br>
        <input type="text" name="descripcion" class="form-check-input" value="{{ $tipofalla->descripcion}}" readonly="readonly">
        </label></div>

        <br>
    </form>
    <input type ='button' class="btn btn-warning"  value = 'Atrás' onclick="location.href = '{{ route('tiposfallas.index') }}'"/>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
