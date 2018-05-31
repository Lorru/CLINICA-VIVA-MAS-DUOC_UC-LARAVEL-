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
<body class="hold-transition skin-blue sidebar-mini">
  @php
    function activeMenu($url)
    {
      return request()->is($url) ? 'active' : '';
    }
  @endphp
<div class="wrapper">
  <header class="main-header">
    <a href="{{ route('inicio') }}" class="logo">
      <span class="logo-mini"><b>C</b>VM</span>
      <span class="logo-lg"><b>Clinica</b> Viva Mas</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(auth()->check())
                <span class="hidden-xs">{{ auth()->user()->name }}</span>
              @endif
            </a>
            <ul class="dropdown-menu">
              <li class="user-header" style="height: 60px;">
                <p>{{ "Hola! " . auth()->user()->name}} <i class="fa fa-user"></i></p>
              </li>
              <li class="user-body">
                <p>{{"Tu Correo Es : ". auth()->user()->email}}</p>
              </li>
              <li class="user-footer">
                <a href="/Logout" class="btn btn-default btn-flat">Salir</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU DE NAVEGACION</li>
        <li class="{{ activeMenu('Inicio') }}"><a href="{{ route('inicio') }}"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
        @if(auth()->user()->id_perfil == 2 || auth()->user()->id_perfil == 1)
          <li class="{{ activeMenu('Reserva') }}"><a href="{{ route('Reserva.index') }}"><i class="fa fa-calendar"></i> <span>Reserva</span></a></li>
        @endif
        <li class="{{ activeMenu('Consulta') }}"><a href="{{ route('Consulta.index') }}"><i class="fa fa-th-list"></i> <span>Consulta</span></a></li>
        @if(auth()->user()->id_perfil == 1)
          <li class="{{ activeMenu('Usuarios') }}"><a href="{{ route('Usuarios.index') }}"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>
        @endif
      </ul>
    </section>
  </aside>
  @yield('contenido')
  <footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="">Clinica Viva Mas</a>.</strong></footer>
  <div class="control-sidebar-bg"></div>
</div>
</body>
</html>