<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TracingGAMS | Iniciar sesión</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background-color: #605ca8">
<div class="icon">
  <i class="fa fa-random" style="
    font-size: 4200%; 
    position: absolute;
    color: rgba(0,0,0,0.15);
    bottom: : 0px;
    left: 50px;
    z-index: -1;
  "></i>
</div>
<div class="login-box">
  <div class="login-logo">
    <a href="{{route('home')}}" style="color: white"><b>tracing</b>GAMS</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingrese sus datos para iniciar su sesión</p>

    <form action="{{route('login')}}" method="post" autocomplete="off">
      {{csrf_field()}}
      <div class="form-group has-feedback {{$errors->has('username') ? 'has-error' : ''}}">
        <input name="username" type="text" class="form-control" value="{{old('username')}}" placeholder="Nombre de usuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        {!! $errors->first('username', '<span style="font-style: italic;" class="help-block">:message</span>')!!}
      </div>
      <div class="form-group has-feedback {{$errors->has('password') ? 'has-error' : ''}}">
        <input name="password" type="password" class="form-control" placeholder="Contraseña">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        {!! $errors->first('password', '<span style="font-style: italic;" class="help-block">:message</span>')!!}
      </div>
      <div class="row">
        <div class="col-xs-4 col-xs-offset-8">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
      </div>
    </form>

  </div>
</div>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->

</body>
</html>
