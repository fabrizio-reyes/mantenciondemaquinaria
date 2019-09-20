
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SGM | Ingreso</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="/dist/css/styles.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">



</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img class="imgLogin" src="{{ asset('dist/img/logonuble.png') }}">
    <a href=""><b>Sistema de</b> Mantención</a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg"><h2>Reestablecer <b>Contraseña</b></p></h2>
   
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus placeholder="Correo">
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{!! $errors -> first('email', '<span class=help-block>:message</span>') !!}</strong>
            </span>
        @endif
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password"  name="password"  class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña">
        @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{!! $errors -> first('password', '<span class=help-block>:message</span>') !!}</strong>
                </span>
        @endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

            <div class="form-group has-feedback">
        <input id="password-confirm" type="password"  name="password_confirmation"  class="form-control"  placeholder="Confirmar Contraseña" required>

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reestablecer Contraseña') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
 <img src="{{ asset('dist/img/logo-ubb.png') }}" class="logo">
  </div>
</div>

<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
