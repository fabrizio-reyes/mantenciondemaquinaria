
@extends('layout')


@section('contenido')

<script>
  function formatCliente(rut)
{rut.value=rut.value.replace(/[.-]/g, '')
.replace( /^(\d{1,2})(\d{3})(\d{3})(\w{1})$/, '$1.$2.$3-$4')}
</script>

      <ol class="breadcrumb">
        <li><a href="{{ route('users.index') }}"><i class="fa fa-dashboard"></i> Usuarios</a></li> 
        <li><a href=""><i ></i> Crear Usuario</a></li>
        <li class="active"></li>
      </ol>
      
  

    <section class="content">
      <div class="row">

        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="titulo2">Crear Usuario</h2>
              <hr class="linea">
              <div class="content">


          <form method="POST" action="{{ route('users.store' )}}" enctype="multipart/form-data">    
          @csrf        
               <div class="col-md-12">


                <div class="col-md-6">
        <div class="form-group {{ $errors->has('avatar') ? 'has-error' : ''}}">
        <label for="avatar"> Imagen de Perfil 
        <input type="file" name="avatar">
       </label>{!! $errors -> first('avatar', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <label for="name" class="form-check-label" > Nombre <br>
        <input type="text"  id ="name" class="form-control" name="name" value="{{old('name')}}" placeholder="Juan">
         </label>{!! $errors -> first('name', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group {{ $errors->has('apellidos') ? 'has-error' : ''}}">
        <label for="apellidos" class="form-check-label" > Apellidos <br>
        <input type="text"  id ="apellidos" class="form-control" name="apellidos" value="{{old('apellidos')}}" placeholder="Bastias Correa">
         </label>{!! $errors -> first('apellidos', '<span class=help-block>:message</span>') !!}</div>
      

         <div class="form-group {{ $errors->has('rut') ? 'has-error' : ''}}">
          <label for="rut" class="form-check-label"> Rut <br>
            <input type="text" class="form-control" value="{{old('rut')}}"
            name="rut" id="rut" placeholder="Rut"
            maxlength="12" onkeyup="formatCliente(this)"></label>{!! $errors -> first('rut', '<span class=help-block>:message</span>') !!}
          </div>


        <div class="form-group {{ $errors->has('perfiles') ? 'has-error' : ''}}">
        <label for="perfiles" class="form-check-label" > Perfil/es <br>
        @foreach ($perfiles as $codigo=>$nombre)
        @if($nombre!='Administrador')
          <div class="form-group">
              <label>
                <input type="checkbox" class="flat-red" value="{{$codigo}}" name="perfiles[]">
                {{$nombre}}
               </label></div>
               @endif  
        @endforeach

        </label>{!! $errors -> first('perfiles', '<span class=help-block>:message</span>') !!}</div> 



                  </div>

                  <div class="col-md-6">
                    
                <div class="form-group {{ $errors->has('fech_de_nac') ? 'has-error' : ''}}">
        <label for="fech_de_nac" class="form-check-label" > Fecha de nacimiento <br>
        <input type="date"  id ="fech_de_nac" class="form-control" name="fech_de_nac" value="{{old('fech_de_nac')}}">
         </label>{!! $errors -> first('fech_de_nac', '<span class=help-block>:message</span>') !!}</div>

        <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
        <label for="telefono" class="form-check-label" > Teléfono<br>
        <input type="number" pattern="[0-9]{9}" name="telefono" class="form-control" value="{{old('telefono')}}">
         </label>{!! $errors -> first('telefono', '<span class=help-block>:message</span>') !!}</div>
        
     
      
        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        <label for="email" class="form-check-label" > Correo <br>
        <input type="text"  id ="email" class="form-control" name="email" value="{{old('email')}}" placeholder="correo@correo.cl" >
        </label>{!! $errors -> first('email', '<span class=help-block>:message</span>') !!}</div>


                         <div class="form-group {{ $errors->has('centrodesalud_codigo') ? 'has-error' : ''}}">
                <label for="centrodesalud_codigo">Centro de Salud</label>
                <select name="centrodesalud_codigo" id="centrodesalud_codigo" class="form-control">
                <option value=""> Seleccione Centro de Salud</option>
                @foreach ($centrosdesalud as $centrodesalud)
                <option value="{{ $centrodesalud['codigo'] }}">{{ $centrodesalud['nombre']}}</option>
                @endforeach
               </select>{!! $errors -> first('centrodesalud_codigo', '<span class=help-block>:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
         <label for="password" class="form-check-label" > Contraseña <br>
        <input type="password" id="password" class="form-control" name="password" value="{{old('password')}}" placeholder="**********">  
        </label>{!! $errors -> first('password', '<span class=help-block>:message</span>') !!}</div>

          <div class="form-group ">
         <label for="password_confirmation" class="form-check-label" > Confirmar Contraseña <br>
        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="**********">
        
        </label></div>

<br>
<br>
                  </div>

          
              </div>

    <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Ingresar</button>
    <hr class="linea">
    </form>        
    
      </div>
            </div>
            </div>
        </div>
      </div>
    </section> 

@stop
