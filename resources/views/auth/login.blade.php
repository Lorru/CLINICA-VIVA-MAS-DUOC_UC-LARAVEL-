<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Clinica Viva Mas</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @include('links.css')
  @include('links.js')
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Clinica</b> Viva Mas</a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Inicio de Sesion</p>
    @if($errors->has('auth.failed'))
      <h1>{{$errors->first('auth.failed')}}</h1>
    @endif
    <form action="Login" method="post" id="formLogin">
      {!! csrf_field() !!}
      <div class="form-group has-feedback">
        <input type="email" name="email" id="correoUsuarioAut" class="form-control" placeholder="Enter...">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="claveUsuarioAut" class="form-control" placeholder="Enter...">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <input type="submit" class="btn btn-primary btn-block btn-flat" value="Ingresar">
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>
