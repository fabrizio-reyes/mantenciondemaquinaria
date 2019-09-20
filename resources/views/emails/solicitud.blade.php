<!DOCTYPE html>
<html>
<head>
	<title>Mail</title>
</head>
<body>
	
	<p> Estimados <strong>{!! $nombreEmpresa!!}</strong>,<br><br> Junto con saludar, se solicita realizar mantención para la maquinaria indicada a continuación:
	<ol>
	<li> <b>Nombre de la maquinaria:</b><br>{!! $nombreMaquinaria !!} </li>
	<li> <b>Código de la maquinaria:</b><br>{!! $maqCodigo !!} </li>
	<li> <b>Tipo de maquinaria:</b><br>{!! $tipoMaquinaria !!} </li>
	<li> <b>Descripción de mantención:<br></b>{!! $detalleSolicitud !!} </li>
	</ol>
	perteneciente al centro de salud {!!$nombreCentro !!} ubicado en: {!! $ubicacionCentro!!}.
	<br>
	<br>
	<br>
	<br>
	se despide atentamente: <h5>{!! $usuario !!}</h5> Jefe de Servicios Generales {!!$nombreCentro !!}
	</p>

	<h4>Este correo fue generado automáticamente, por favor no responderlo.</h4>
</body>
</html>