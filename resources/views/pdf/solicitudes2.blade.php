
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
      <h4 style="text-transform: uppercase;" class="card-title text-center"><b>REPORTE DE SOLICITUDES           @if($estado==1)
          Pendientes
          @elseif($estado==2)
          Aceptadas
          @else
          Rechazadas
          @endif</b><br><small>


      </small></h4>
      <hr>
    </div>
    <br>
    <br>
    <br>
    <br>
        <h5>Fecha: {{$date}} <br> 

  {{$centro}}<br>
    Generado por: {{ $user}} {{ $user2}}<br>
    <b>Jefe de Servicio de Salud<b></h5>
      <br>
      <br>
 <table class="table table-striped table-bordered table-sm">
        <thead>
            <tr>
             
                <th scope="col">Fecha de Creación</th>      
                <th scope="col">Usuario</th>
                <th scope="col">Maquinaria</th>
                <th scope="col">Estado</th>
                <th scope="col">Centro</th>            

            </tr>
        </thead>
            
            <tbody>
     
               
                @foreach ($solicitudes as $solicitud)
                @if($solicitud->user->centrodesalud->codigo == $centro2)
                <tr>   
                <td>{{$solicitud->created_at}}</td>
                <td> {{$solicitud->user->name}}</td>
                 <td>{{$solicitud->maquinaria->nombre}} </td>
                 <td>{{$solicitud->estadosolicitud->nombre}} </td>
                 <td>{{$solicitud->user->centrodesalud->nombre}} </td>
				</tr>
        @endif
                @endforeach
			</tbody>
        
    </table>
	



