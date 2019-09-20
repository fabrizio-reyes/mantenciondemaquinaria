@extends('layout')

@section('contenido')
      <ol class="breadcrumb">
        <li><a href="{{ route('solicitudes.index') }}"><i class="fa fa-dashboard"></i> Solicitudes</a></li>
        <li><a href=" "><i ></i> Ver Solicitud</a></li>
        <li class="active"></li>
      </ol>
    <section class="content" >
      <div class="row" >
        <!-- left column -->
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-primary" >
            <div class="box-header with-border">
                <div class="col-md-8">
              <h2 class="titulo2">Solicitud {{ $solicitud->codigo }}  </h2>
            </div>
          <?php if(auth()->user()->hasPerfiles(['admin', 'jsg'])){
                if($solicitud->estadosolicitud->nombre == 'Pendiente'){
          ?>
              <div class="col-md-2">
                                        <form method="GET"  action="{{ route('solicitudes.email', $solicitud->codigo)}}">
                    @csrf
                        <button type="submit" style="height: 30px" class="btn btn-block btn-success btn-xs" title="Aceptar">
                            <i class="fa fa-check"></i>
                        </button>
                    </form>

                </div>
 <div class="col-md-2">
                      <form method="GET" action="{{ route('solicitudes.rechazar', $solicitud->codigo)}}">
                    @csrf

                        <button style="height: 30px" type="submit" class="btn btn-block btn-danger btn-xs" title="Rechazar">
                            <i class="fa fa-close"></i>
                        </button>
                    </form>

              </div>

              <?php }?>

                <?php } ?>

              <hr >
              <hr class="linea">
              <br>

      <form method="" action="">


        <div class="col-md-6">
                  <div class="form-group">
        <label for="created_at" class="labelText" > Fecha de Ingreso<br>
        <input type="text" name="created_at" class="sinborde" value="{{ $solicitud->created_at}}" readonly="readonly">
        </label></div>

        <div class="form-group">
        <label for="updated_at" class="labelText" > Última Modificación<br>
        <input type="text" name="updated_at" class="sinborde" value="{{ $solicitud->updated_at}}" readonly="readonly">
        </label></div>

        <div class="form-group">
         <label for="usuario_codigo" class="labelText" > Usuario <br>
        <input type="text" name="usuario_codigo" class="sinborde" value="{{ $solicitud->user->name}}" readonly="readonly">
        </label></div>

        <div class="form-group">
         <label for="maquinaria_codigo" class="labelText" > Nombre de la Máquina <br>
        <input type="text" name="maquinaria_codigo" class="sinborde" value="{{ $solicitud->maquinaria->nombre}}" readonly="readonly">
        </label></div>

          <div class="form-group">
         <label for="estado_solicitud_codigo" class="labelText" > Estado <br>
        <input type="text" name="estado_solicitud_codigo" class="sinborde" value="{{ $solicitud->estadosolicitud->nombre}}" readonly="readonly">
        </label></div>

        </div>

        <div class="col-md-6">

        <div class="form-group">
         <label for="detalle" class="labelText" > Detalle <br>
        <textarea class="sinborde" type="text" name="detalle" cols="50" rows="10" readonly="readonly" >{{ $solicitud->detalle}}  </textarea>
        </label></div>


        </div>
    </form>

 <hr class="linea">


</div>
                  <a href="{{ route('solicitudes.index') }}" class="btn btn-warning pull-left"
          role="button"><i class="fa fa-reply" aria-hidden="true"></i> Atrás</a>
        </div>

            </div>
          </div>

    </section>
@stop
