@extends('layout')


@section('contenido')
<br>
<br>
    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
              <big> <h2 class="titulo"> Resolver Solicitud {{$solicitud->codigo}}  </h2> </big> 
              <br>

              @if(count($solicitud->maquinaria->convenios)==0)
    <h1 class="informacion">Esta Maquinaria no posee Convenio con ninguna empresa, por favor ingresar los datos solicitados</h1>
            <form method="POST" action="{{ route('empresasexternas.store')}}">
          @csrf
        <div class="form-group">
        <label for="razon_social" class="form-check-label" > Razón Social<br>
        <input type="text" name="razon_social" class="form-control" value="{{old('razon_social')}}">
        {!! $errors->first('razon_social', '<span class="error">:message</span>')!!}
        </label>
        </div>

        <div class="form-group">
        <label for="correo" class="form-check-label" > Correo<br>
        <input type="correo" name="correo" class="form-control" value="{{old('correo')}}">
        {!! $errors->first('correo', '<span class="error">:message</span>')!!}
        </label>
        </div>

        <div class="form-group">
        <label for="telefono" class="form-check-label" > Telefono<br>
        <input type="text" name="telefono" class="form-control" value="{{old('telefono')}}">
        {!! $errors->first('telefono', '<span class="error">:message</span>')!!}
        </label>
        </div>

        <div class="form-group">
        <label for="ciudad" class="form-check-label" > Ciudad<br>
        <input type="text" name="ciudad" class="form-control" value="{{old('ciudad')}}">
        {!! $errors->first('ciudad', '<span class="error">:message</span>')!!}
        </label>
        </div>

        <div class="form-group">
        <label for="rut" class="form-check-label" > Rut<br>
        <input type="text" name="rut" class="form-control" value="{{old('rut')}}">
        {!! $errors->first('rut', '<span class="error">:message</span>')!!}
        </label>
        </div>

        <div class="form-group">
        <label for="direccion" class="form-check-label" > Direccion<br>
        <input type="text" name="direccion" class="form-control" value="{{old('direccion')}}">
        {!! $errors->first('direccion', '<span class="error">:message</span>')!!}
        </label>
        </div>

                <button type="submit" class="btn btn-primary" >Ingresar</button>
    </form>

    @else

        <table id="" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
             
                <th scope="col">Fecha de Creación</th>
                <th scope="col">Fecha Última Modificación</th>
                <th scope="col">Detalle</th>
                <th scope="col">Usuario</th>
                <th scope="col">Maquinaria</th>
                <th scope="col">Estado</th>
                <th scope="col">Fallas</th>
                <th scope="col">Correo Empresa Externa</th>
                <th scope="col" class="table1">Aceptar</th>
                <th scope="col" class="table1">Rechazar</th>


            </tr>
            <tbody>
               

                <tr>
          
                <td>{{$solicitud->created_at}}</td>
                <td>{{$solicitud->updated_at}}</td>

                <td>{{$solicitud->detalle}}</td>

                <td> {{$solicitud->user->name}}</td>
                 <td>{{$solicitud->maquinaria->nombre}} </td>
                 <td>{{$solicitud->estadosolicitud->nombre}} </td>
                <td>
                @foreach($solicitud->tiposfallas as $tipofalla)
                    {{$tipofalla->nombre}}
                @endforeach
                </td>
            
                    <td> @foreach($solicitud->maquinaria->convenios as $convenio) 
                            {{$convenio->empresaexterna->correo}}
                        @endforeach</td>




            </tr>
         

            </tbody>
        </thead>
    </table>     
<br>
    <input type ='button' class="btn btn-warning"  value = 'Atrás' onclick="location.href = '{{ route('solicitudes.index') }}'"/>

    @endif   

            </div>
          </div>
        </div>
      </div>
    </section>
@stop
