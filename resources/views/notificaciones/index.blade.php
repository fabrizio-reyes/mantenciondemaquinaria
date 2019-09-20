@extends('layout')

@section('contenido')

<div class="container">
	<h1>Notificacion</h1>
	<div class="row">
		<div class="col-md-6">
			<h2>No Leídas</h2>
			<ul class="list-group">
			@foreach($unreadNotifications as $unreadNotification)
					<li class="list-group-item">
						<a href="{{$unreadNotification->data['link']}}">{{$unreadNotification->data['text']}}</a>

						<form class="pull-right" method="POST" action="{{route('notificaciones.read', $unreadNotification->id)}}">
							{{method_field('PATCH')}}
							@csrf
							<button class="btn btn-danger btn-xs">X</button>
							
						</form>
						</li>
			@endforeach	
			</ul>

			
		</div>

		<div class="col-md-6">
			<h2>Leídas</h2>
						<ul class="list-group">
			@foreach($readNotifications as $readNotification)
					<li class="list-group-item">
					<a href="{{$readNotification->data['link']}}">{{$readNotification->data['text']}}</a></li>
				
			@endforeach
				
			</ul>

		</div>
		

	</div>


</div>



@stop