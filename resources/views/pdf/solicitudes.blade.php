
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <style type="text/css">
    h4 {
      font-family: "arial", sans-serif !important;
    }
    table {
      text-align: center;
    }

  </style>
</head>

  <div class="box">
    <div class="box-header">
      <h4 class="card-title text-center"><b>REPORTE DE SOLICITUDES     @if($estado==1)
      <b style="text-transform: uppercase;">Pendientes</b>
    @elseif($estado==2)
      <b style="text-transform: uppercase;">Aceptadas</b>
    @else
      <b style="text-transform: uppercase;">Rechazadas</b>
    @endif </b><br><small>desde el {{ $fechaInicialTitulo }} hasta el {{ $fechaFinalTitulo }}</small></h4>
      <hr>
    </div>
    <br>
    <br>

    <h5>Fecha: {{$date}} <br> 
    Generado por: {{ $user}} {{ $user2}} <br>
    <b>Jefe de Servicios Generales<b>.</h5> 

    <hr>
    <br>
    <br>
 <table class="table table-striped table-bordered table-sm">
        <thead class="thead-dark">
            <tr>
             
                <th scope="col">Fecha de Creación</th>      
                <th scope="col">Usuario</th>
                <th scope="col">Maquinaria</th>
                <th scope="col">Estado</th>            

            </tr>
        </thead>
            
            <tbody>
     
               
                @foreach ($solicitudes as $solicitud)
             
                <tr>   
                <td>{{$solicitud->created_at}}</td>
                <td> {{$solicitud->user->name}}</td>
                 <td>{{$solicitud->maquinaria->nombre}} </td>
                 <td>{{$solicitud->estadosolicitud->nombre}} </td>
				</tr>
                @endforeach
			</tbody>
        
    </table>
	



