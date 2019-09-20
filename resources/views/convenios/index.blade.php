@extends('layout')

@section('contenido')

<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css" rel="stylesheet"/>


      <ol class="breadcrumb">
        <li><a href="{{ route('convenios.index') }}"><i class="fa fa-dashboard"></i> Listado de Convenios </a></li>
        <li class="active"></li>
      </ol>
     <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h2 class="titulo">Convenios</h2>
              <br>
              @if(!auth()->user()->hasPerfiles(['jss']))
                <a href="{{ route('convenios.create') }}" class="btn btn-primary pull-left"
        role="button"><i class="fa fa-check" aria-hidden="true"></i> Crear Nueva</a>&nbsp
        @endif
                <br>
                <br>
         
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>

                <th scope="col" class="table1">Id Convenio</th>
                <th scope="col">Empresa</th>
                <th scope="col">Fecha de inicio</th>
                <th scope="col">Fecha de Término</th>
                <th scope="col">Estado</th>
              

                <th scope="col" class="table1"></th>
                @if(!auth()->user()->hasPerfiles(['jss']))
                <th scope="col" class="table1"></th>
                <th scope="col" class="table1"></th>
                @endif
            </tr>
        </thead>
            <tbody>
            @if($j>0)
                @foreach ($convenios as $convenio)
                <tr>

                <td>{{$convenio->id_convenio}}</td>
                <td>{{$convenio->empresaexterna->razon_social}}</td>
                <td>{{$convenio->fecha_inicio}}</td>
                <td>
                    @if ($convenio->fecha_termino==null)
                        {{"Indefinido"}}
                        @else
                        {{$convenio->fecha_termino}}
                    @endif
                   </td>
                <td>
                @if ($convenio->vigencia() && $convenio->visible)
                    {{"Vigente"}}
                    @else
                    {{"No vigente"}}
                @endif
                </td>

                <td>
                    <form method="GET" style="display:inline" action="{{ route('convenios.show', $convenio->codigo)}}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-success btn-xs" title="Ver">
                              <i class="fa fa-eye"></i>

                        </button>

                    </form>

                    </td>
                    @if(!auth()->user()->hasPerfiles(['jss']))
                <td>

                  <form method="GET" style="display:inline" action="{{ route('convenios.edit' , $convenio->codigo) }}">
                    @csrf

                        <button type="submit" class="btn btn-block btn-warning btn-xs" title="Editar">
                              <i class="fa fa-pencil"></i>

                        </button>

                    </form>
                 </td>


                <td>
                    <form method="POST" style="display:inline" action="{{ route('convenios.destroy', $convenio->codigo)}}" id="del{{$convenio->codigo}}">
                    @csrf
                    {!! method_field('DELETE') !!}

                     <button type="submit"   class="btn btn-block btn-danger btn-xs"  title="Eliminar" onClick="confirmFunction('del{{$convenio->codigo}}')">
                      <i class="fa fa-trash"></i>

                    </button>
                    </form>
                </td>
                @endif
                </tr>
                @endforeach
     @endif
            </tbody>



    </table>


          </div>
      </div>
  </div>
</div>
</section>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" defer ></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" defer></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js" defer></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js" defer></script>

<script>
  $(document).ready(function() {
  $('#example').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});

</script>


@stop
