@extends('layout')

@section('contenido')

<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css" rel="stylesheet"/>


      <ol class="breadcrumb">
        <li><a href="{{ route('users.index') }}"><i class="fa fa-dashboard"></i> Usuarios</a></li> 
        <li class="active"></li>
      </ol>

   <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-info" >
            <div class="box-header with-border">
              <h2 class="titulo">Usuarios</h2>
              <br>
                <a href="{{ route('users.create') }}" class="btn btn-primary pull-left"
        role="button"><i class="fa fa-user-plus" aria-hidden="true"></i> Ingresar Usuario</a>&nbsp
        <br>
        <br>
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
          
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
                <th scope="col">Perfil/es</th>
                <th scope="col" class="table1"></th>
                @if(auth()->user()->hasPerfiles(['admin', 'jsg', 'ja']))
                <th scope="col" class="table1"></th>
                @endif
                <th scope="col" class="table1"></th>

            </tr>
          </thead>
            <tbody>

                @foreach ($users as $user)
                @if($user->id != auth()->user()->id)
                <tr>
              
                <td>{{$user->name}}</td>
                <td>{{$user->apellidos}}</td>
                <td>{{$user->telefono}}</td>
                <td>{{$user->email}}</td>
                <td>
                @foreach($user->perfiles as $perfil)
                    {{$perfil->display_name}}
                @endforeach
                </td>
                <td>
                    <form method="GET" style="display:inline" action="{{ route('users.show', $user->id)}}">
                    @csrf    
                    
                        <button type="submit" class="btn btn-block btn-success btn-xs" title="Ver">
                             <i class="fa fa-eye"></i>
                        </button>
                    </form>

                    </td>
                    @if(auth()->user()->hasPerfiles(['admin', 'jsg', 'ja']))
                <td> 
    
                    <form method="GET" style="display:inline" action="{{ route('users.edit' , $user->id) }}">
                    @csrf    
                    
                        <button type="submit" class="btn btn-block btn-warning btn-xs" title="Editar">
                             <i class="fa fa-pencil"></i>
                        </button>
                    </form>
                 </td>
                 @endif         
                <td>
                    <form method="POST" style="display:inline" action="{{ route('users.destroy', $user->id)}}" id="del{{$user->id}}">
                    @csrf    
                    {!! method_field('DELETE') !!}            
                    
                     <button type="submit" class="btn btn-block btn-danger btn-xs" title="Eliminar" onClick="confirmFunction('del{{$user->id}}')">
                         
                         <i class="fa fa-trash"></i>
                     </button>
                    </form>
                    </td>
                    </tr>
                    @endif
                @endforeach
                
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
