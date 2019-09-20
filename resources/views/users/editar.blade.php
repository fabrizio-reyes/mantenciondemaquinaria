@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('users.index') }}"><i class="fa fa-dashboard"></i> Usuarios</a></li> 
        <li><a href=" "><i ></i> Editar Usuario</a></li>
        <li class="active"></li>
      </ol>

<section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-8" >
          <!-- general form elements -->
          <div class="box box-warning" >
            <div class="box-header with-border">
              <h2 class="titulo2">Editar Usuario <b> {{$user->name}} </b></h2>
              <hr class="lineaEdit">
              <div class="content">
              @if(session()->has('info'))
              <div class="alert alert-success">{{session('info')}}</div>
              @endif

        <form method="POST" action="{{ route('users.update', $user->id )}}" enctype="multipart/form-data">
        @csrf
        {!! method_field('PUT')!!}

              <div class="col-md-12">


                <div class="col-md-6">
                       <div class="form-group {{ $errors->has('avatar') ? 'has-error' : ''}}">
        <label for="avatar"> Imagen de Perfil 
        <input type="file" name="avatar">
       </label>{!! $errors -> first('avatar', '<span class=help-block>:message</span>') !!}</div>

        <img width="200px"src="/images/{{$user->avatar}}">


        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <label for="name" class="form-check-label" > Nombre <br>
        <input type="text"  id ="name" class="form-control" name="name" value="{{$user->name}}">
         
        </label>{!! $errors -> first('name', '<span class=help-block>:message</span>') !!}</div>

             <div class="form-group"><label for="rut" class="form-check-label"> RUT <br>
            <input type="text" class="form-control"
            name="rut" id="rut" placeholder="RUT"
            maxlength="12" onChange="Valida_Rut(this);" onkeyup="formatCliente(this)" value="{{$user->rut}}"></label></div>

           <div class="form-group {{ $errors->has('apellidos') ? 'has-error' : ''}}">
        <label for="apellidos" class="form-check-label" > Apellidos <br>
        <input type="text"  id ="apellidos" class="form-control" name="apellidos" value="{{$user->apellidos}}" placeholder="Bastias Correa">
         </label>{!! $errors -> first('apellidos', '<span class=help-block>:message</span>') !!}</div>
         @if(auth()->user()->hasPerfiles(['admin']))

                 <div class="form-group {{ $errors->has('perfiles') ? 'has-error' : ''}}">
        <label for="perfiles" class="form-check-label" > Perfil/es <br>
      @foreach ($perfiles as $codigo=>$nombre)
          <div class="form-group">
              <label>
                <input 
                type="checkbox" 
                class="flat-red" 
                value="{{$codigo}}" 
                {{$user->perfiles->pluck('codigo')->contains($codigo) ? 'checked' : ''}}
                name="perfiles[]">
                {{$nombre}}
               </label>
          </div>
    @endforeach
  </label>{!! $errors -> first('perfiles', '<span class=help-block>:message</span>') !!}
  </div>
  @endif
   


                </div>


                <div class="col-md-6">
                      <div class="form-group {{ $errors->has('fech_de_nac') ? 'has-error' : ''}}">
        <label for="fech_de_nac" class="form-check-label" > Fecha de Nacimiento <br>
        <input type="date"  id ="fech_de_nac" class="form-control" name="fech_de_nac" value="{{$user->fech_de_nac}}">
         </label>{!! $errors -> first('fech_de_nac', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
        <label for="telefono" class="form-check-label" > Teléfono<br>
        <input type="number" name="telefono" class="form-control" value="{{$user->telefono}}">
         </label>{!! $errors -> first('telefono', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        <label for="email" class="form-check-label"  hidden="true"> Correo <br>
        <input type="text"  id ="email" class="form-control" name="email" value="{{$user->email}}">
         
        </label>{!! $errors -> first('email', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group {{ $errors->has('centrodesalud_codigo') ? 'has-error' : ''}}">
                <label for="centrodesalud_codigo">Centro de Salud</label>
                <select name="centrodesalud_codigo" id="centrodesalud_codigo" class="form-control">
                <option value="{{$user->centrodesalud->codigo}}"> {{$user->centrodesalud->nombre}}</option>
                @foreach ($centrosdesalud as $centrodesalud)
                <option value="{{ $centrodesalud['codigo'] }}">{{ $centrodesalud['nombre']}}</option>
                @endforeach
               </select>{!! $errors -> first('centrodesalud_codigo', '<span class=help-block>:message</span>') !!}
        </div>    




                </div>
                




              </div>
         <hr class="lineaEdit">

        <button type="submit" style="margin: auto; display: inline-block; " class="btn btn-primary">Editar</button>

                       <a href="{{ route('solicitudes.index') }}" class="btn btn-warning pull-left"
        role="button"><i class="fa fa-reply" aria-hidden="true"></i> Atrás</a>
    </form>

        </div>

              </div>
            </div>
          </div>
        </div>
      </section>
@stop