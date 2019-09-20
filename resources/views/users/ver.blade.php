
@extends('layout')


@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('users.index') }}"><i class="fa fa-dashboard"></i> Usuarios</a></li> 
        <li><a href=" "><i ></i> Ver Usuario</a></li>
        <li class="active"></li>
      </ol>
    <section class="content">
      <div class="row">

        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h2 class="titulo2" style="text-align: center;">Ver Usuario {{$user->name}} {{$user->apellidos}}</h2>
              <hr class="linea">

              
            <div class="col-md-12">
          <form method="" action="">    
          @csrf
                <div class="col-md-6">
                    <div class="form-group">
                      <img width="250px"src="/images/{{$user->avatar}}">  
                
                    </div>



        <div class="form-group">
        <label for="rut" class="labelText" > Rut: <br>
        <input type="text" style="width:300px;height:15px" id ="rut" class="sinborde" name="rut" value="{{$user->rut}}" readonly="readonly">
     
        </label></div>

  


                </div>

        <div class="col-md-6">

        <div class="form-group">
        <label for="fech_de_nac" class="labelText" > Fecha de Nacimiento: <br>
        <input type="text" style="width:300px;height:15px" id ="fech_de_nac" class="sinborde" name="fech_de_nac" value="{{$user->fech_de_nac}}"  readonly="readonly">
        </label></div>


        <div class="form-group">
        <label for="email" class="labelText" > Correo: <br>
        <input type="text" style="width:300px;height:15px" id ="email" class="sinborde" name="email" value="{{$user->email}}"  readonly="readonly">
        </label></div>
  
        <div class="form-group">
        <label for="telefono" class="labelText" > Teléfono: <br>
        <input type="text" style="width:300px;height:15px" id ="telefono" class="sinborde" name="telefono" value="{{$user->telefono}}"  readonly="readonly">
        </label></div>


        <div class="form-group">
        <label for="centrodesalud_codigo" class="labelText" > Centro de Salud: <br>
        <input type="text" style="width:300px;height:15px" id ="centrodesalud_codigo" class="sinborde" name="centrodesalud_codigo" value="{{$user->centrodesalud->nombre}}"  readonly="readonly">
        </label></div>
 


<div class="form-group">

         <label for="perfiles" class="form-check-label" > <p class="labelText">Perfil/es</p> <br>
      @foreach ($perfiles as $codigo=>$nombre)
          <div class="form-group">
              <label class="sinborde">
                <input  
                type="checkbox" 
                class="flat-red" 
                value="{{$codigo}}" 
                {{$user->perfiles->pluck('codigo')->contains($codigo) ? 'checked' : ''}}
                name="perfiles[]" disabled>
                {{$nombre}}

               </label>
          </div>
    @endforeach
        </label>
</div>


            </div>

                </form>

            </div>

            <br>
             <input type ='button' class="btn btn-warning"  style="margin: auto; display: block;"value = 'Atrás' onclick="location.href = '{{ route('users.index') }}'"/>
          <hr class="linea">
          </div>

        </div>
      </div>
    </section>
 @stop             
