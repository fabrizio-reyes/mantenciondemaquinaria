@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('tipos.index') }}"><i class="fa fa-dashboard"></i> Listado de Tipos </a></li> 
        <li class="active"></li>
      </ol>
   <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-info" >
            <div class="box-header with-border">
              <h2 class="titulo">Tipos</h2>
              <br>
                                        <a href="{{ route('tipos.create') }}" class="btn btn-primary pull-left"
        role="button"><i class="fa fa-check" aria-hidden="true"></i> Crear Nuevo</a>&nbsp
        <br>
        <br>
        <div class="table-responsive">
    <table id="example1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col" class="table1"></th>
                <th scope="col" class="table1"></th>
                <th scope="col" class="table1"></th>

            </tr>
            <tbody>
                @foreach ($tipos as $tipo)

                <tr>
             
                <td>{{$tipo->nombre}}</td>
                <td>{{$tipo->descripcion}}</td>
                <td>
                    <form method="GET" style="display:inline" action="{{ route('tipos.show', $tipo->codigo)}}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-success btn-xs" title="Ver">
                            <i class="fa fa-eye"></i>
                        </button>
                    </form>

                    </td>
                <td>

                 <form method="GET" style="display:inline" action="{{ route('tipos.edit' , $tipo->codigo) }}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-warning btn-xs" title="Editar">
                            <i class="fa fa-pencil"></i>
                        </button>
                    </form>


                    
                 </td>


                <td>
                    <form method="POST" style="display:inline" action="{{ route('tipos.destroy', $tipo->codigo)}}" id="del{{$tipo->codigo}}">
                    @csrf
                    {!! method_field('DELETE') !!}

                        <button type="submit" class="btn btn-block btn-danger btn-xs" title="Eliminar" onClick="confirmFunction('del{{$tipo->codigo}}')">
                             <i class="fa fa-trash"></i>
                        </button>
                    </form>

                    </td>

            </tr>
                @endforeach

            </tbody>
        </thead>
    </table>
    </div>
          </div>
      </div>
  </div>
</div>
</section>
@stop
