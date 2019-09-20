@extends('layout')


@section('contenido')

         <ol class="breadcrumb">
        <li><a href="{{ route('maquinarias.index') }}"><i class="fa fa-dashboard"></i> Maquinarias</a></li> 
        <li><a href=""><i ></i> Importar</a></li>
        <li class="active"></li>
      </ol>

    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-6" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo2">Importar Archivo Maquinarias</h2>
              <hr class="linea">
            <div class="content">
                <div class="box box-success" >
                <div class="box-header with-border">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success" style="border-color: black;">Importar Archivo</button>
                <!-- <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>-->
                </form>

            </div>
        </div>
            </div>
                <input type ='button' style="margin: 0 auto; display: block; padding: 5px 40px" class="btn btn-warning" value = 'Atrás' onclick="location.href = '{{ route('maquinarias.index') }}'"/>
          </div>
      </div>
  </div>
</div>
</section>
@stop
