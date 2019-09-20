<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mantención de Maquinarias</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/adminlte/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/AdminLTE.min.css">

  <!-- Date-range -->
  <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">


  <link rel="stylesheet" href="/bower_components/select2/dist/css/select2.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/adminlte/plugins/iCheck/all.css">

  <link rel="stylesheet" href="/dist/css/styles.css">
  <link rel="stylesheet" href="/adminlte/dist/css/skins/skin-blue.min.css">

    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">

    
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">


    <!-- Logo -->
        <a href="" class="logo" style="background: #0f69b4;">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SG</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SG</b>M<b>M</b></span>
        </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation" style="background: #0f69b4;">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
  
          
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

       
         <li style="margin-left: auto;
                margin-right: auto;">
              @if(auth()->user()->hasPerfiles(['jsg']))
            
                <div id="app" >
                  <notifications ></notifications>
                </div>
               @endif
            </li>

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="/images/{{auth()->user()->avatar}}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ auth()->user()->name}}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header" style="height: 600;">
                  <img src="/images/{{auth()->user()->avatar}}" class="img-circle" alt="User Image">

                  <p>
                    {{ auth()->user()->name}}<br>

                    <small>{{ auth()->user()->email}}</small>
                  </p>
          </li>
          <!-- Control Sidebar Toggle Button -->
               <li class="user-footer">
                  <div class="pull-right">
                    <a href="{{ route('users.edit' , auth()->user()->id) }}" class="btn btn-success">Mi perfil</a>
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Cerrar sesion') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                    
                  </div>
                </li>
            </ul>
           </li>
          </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar <img class="pequeña" src="/dist/img/logonuble.png"> -->
    <aside class="main-sidebar">
    
    <section class="sidebar" >
      <img class="pequeña"  src="{{ asset('/dist/img/logo2.png') }}"><br>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header" style="text-align: center">MENÚ</li>
        @if(auth()->user()->hasPerfiles(['admin', 'jsg', 'jss']))
        <li><a href="<?php echo route('maquinarias.index')?>"><i class="fa  fa-gears"></i>Maquinarias</a></li>
        @endif


        @if(auth()->user()->hasPerfiles(['admin', 'jss']))

        <li><a href="<?php echo route('centrosdesalud.index')?>"><i class="fa  fa-hospital-o"></i> Centros De Salud</a></li>
        @endif

        @if(auth()->user()->hasPerfiles(['admin']))

        <li><a href="{{route('perfiles.index')}}"><i class="fa  fa-user"></i> Perfiles</a></li>    
        @endif


        @if(auth()->user()->hasPerfiles(['admin', 'jsg']))

        <li><a href="{{route('empresasexternas.index')}}"><i class="fa fa-building"></i>Empresas Externas</a></li>    

        @endif

        @if(auth()->user()->hasPerfiles(['admin', 'jsg', 'jss']))
        <li><a href="{{route('convenios.index')}}"> <i class="fa fa-newspaper-o"></i> Convenios</a></li>          
        @endif

        @if(auth()->user()->hasPerfiles(['admin']))
        <li><a href="{{route('tipos.index')}}"><i class="fa fa-cubes"></i>Tipos</a></li>           
        @endif

        @if(auth()->user()->hasPerfiles(['admin']))
        <li><a href="{{route('areas.index')}}"><i class="fa fa-map"></i>Áreas</a></li> 
        @endif       


        @if(auth()->user()->hasPerfiles(['admin']))
        <li><a href="{{route('salas.index')}}"> <i class="fa fa-plus-circle"></i> Salas</a></li> 
        @endif

        @if(auth()->user()->hasPerfiles(['admin']))

        <li><a href="{{route('ubicaciones.index')}}"><i class="fa fa-crosshairs"></i> Ubicaciones</a></li> 

        @endif

        <li><a href="{{route('solicitudes.index')}}"><i class="fa fa-file"></i>Solicitudes</a></li> 
            
  @if(auth()->user()->hasPerfiles(['admin', 'jsg', 'jss']))
        <li><a href="{{route('mantenciones.index')}}"><i class="fa fa-wrench"></i> Mantenciones</a></li>
       @endif
    @if(!auth()->user()->hasPerfiles(['jss']))
        <li><a href="{{route('maquinarias.mantencionesPreventivas')}}"><i class="fa fa-plus-square"></i> Mantenciones Preventivas</a></li>
   @endif

        @if(auth()->user()->hasPerfiles(['admin', 'jss']))
        <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i> Usuarios</a></li> 
        @endif

      </ul>
    </section>
  
  </aside>
  
  <!-- jQuery 2.2.3 -->
<script src="/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
 
  <div class="content-wrapper">

    <section class="content container-fluid">
      
    @yield('contenido')
  
    </section>
    <!-- /.content -->

    @yield('script')
  </div>


<script src="/js/app.js"></script>

  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <img src="{{ asset('dist/img/logo-ubb.png') }}" class="logo">
    <strong>Proyecto de Título Ingeniería Civil en Informática Reyes-Sepúlveda
    <b>2019</b>
  </footer>
  <!-- /.content-wrapper -->
  <!-- /.control-sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
</body>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- Bootstrap 3.3.6 -->
<script src="/adminlte/bootstrap/js/bootstrap.min.js"></script>
   <!-- AdminLTE App -->
<script src="/adminlte/dist/js/app.min.js"></script>
   <!-- jQuery UI 1.11.4 -->
   <script src="/bower_components/jquery-ui/jquery-ui.min.js"></script>


<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="/adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="/adminlte/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>


 <!-- Select2 -->
  <script src="/bower_components/select2/dist/js/select2.full.min.js"></script>

  <script src="/dist/js/Valida_Rut.js"></script>

     <!--TOAST JS -->
  <script src="/js/jquery.toast.min.js"></script>
  <!--TOAST CSS -->
  <link rel="stylesheet" type="text/css" href="/css/jquery.toast.min.css">
  <!-- SWEET ALERT-->
  <link rel="stylesheet" type="text/css" href="/css/sweetalert2.min.css">

   @include('common.success')
   @include('common.deleted')
   @include('common.confirmDelete')


  <!-- SWEET ALERT-->
  <link rel="stylesheet" type="text/css" href="/css/sweetalert2.min.css">
  <script src="/js/sweetalert2.min.js"></script>
  <script src="/js/sweetalert2.all.min.js"></script>


  <script src="/adminlte/plugins/iCheck/icheck.min.js"></script>


<script>
  $(function () {

    //Initialize Select2 Elements
    $(".select2").select2();


    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

        //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'YYYY-MM-DD h:mm A'});
    //Date range as a button

        //Date range picker
    $('#reservation').daterangepicker();
        //Colorpicker

    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();



    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
  });
</script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

    <script>
      var getDate = function (input) {
        return new Date(input.date.valueOf());
    }

    $('#fecha_inicio, #fecha_termino').datepicker({
        format: "yyyy-mm-dd",
        language: 'es'
    });

    $('#fecha_termino').datepicker({
        startDate: '+6d',
        endDate: '+36d',
    });

    $('#fecha_inicio').datepicker({
        startDate: '+5d',
        endDate: '+35d',
    }).on('changeDate',
        function (selected) {
            $('#fecha_termino').datepicker('clearDates');
            $('#fecha_termino').datepicker('setStartDate', getDate(selected));
        });

          
    </script>
              <script>
      
      jQuery(document).ready(function ($) {
        $("#fechaI").datepicker({format: 'dd-mm-yyyy',  endDate: '+0d', weekStart: 1 });
        $("#fechaF").datepicker({format: 'dd-mm-yyyy',  endDate: '+0d', weekStart: 1  });
      });
      </script>



</body>
</html>