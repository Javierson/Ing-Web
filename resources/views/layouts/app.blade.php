
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
<!--
    Styles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
-->

<!-- Bootstrap -->

  <link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">
  <script src="{{asset("js/bootstrap.js")}}"></script>
  <script src="{{asset("js/jquery-3.2.1.js")}}"></script>

<style type="text/css">

/* Estilos de la pagina de aterrizaje */

  .info {
    color: white;
  }

  .right {
    padding-right: 10px;
    padding-bottom: 20px;
  }

  section article {
    width: 48%;
    padding: 1em;
    margin-top: 1em;
    vertical-align: top;
    display: inline-block;
  }

  footer {
    margin-top: 1em;
    margin-bottom: 2em;
    border: 1px solid #28A4C9;
    border-radius: 5px;
  }

  footer h4 {
    text-align: center;
  }

  footer article {
    width: 33%;
    padding: 1em;
    margin-top: 1em;
    vertical-align: top;
    display: inline-block;
  }

/* Estilos del menu  */

body {
  width: 100%;
  max-width: 1920px;
  margin: 0 auto;
}

.estatus {
  float: left;
  padding: 11px 15px;
  font-size: 17px;
  line-height: 18px;
  height: 40px;
}

.estatus > li {
  display: inline-block; }

.estatus > li + li:before {
  content: "/\00a0";
  padding: 0 5px;
  color: #cccccc; }

.estatus > .active {
  color: #808080; }

/* Estilos de las vistas */

.center {
  text-align: center;
}

</style>

<!-- Redes sociales -->

<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<!-- -->

<!-- Switch con Bootstrap Toggle

<link rel="stylesheet" href="{{asset("css/bootstrap2-toggle.css")}}">
<script src="{{asset("js/bootstrap2-toggle.js")}}"></script>

-->

</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      @if (!Auth::guest())
         <ul class="estatus">
          <li>Bienvenido <a href="{{ url('/miPerfil') }}">{{ Auth::user()->name }}</a></li>
          <li>Tienes {{ Auth::user()->puntos }} puntos</li>
        </ul>
      @endif

      @if (!Auth::guest() and Auth::user()->rol == 1)
      <ul class="nav navbar-nav">
        <li><a href="{{url('/gestion')}}">Gestion</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menú de Clientes <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('/registrarCuenta')}}">Facturar Cuenta</a></li>
            <li><a href="{{url('/consultarCuentas')}}">Consultar Cuentas</a></li>
            <li class="divider"></li>
            <li><a href="{{url('/registrarCliente')}}">Registrar Cliente</a></li>
            <li><a href="{{url('/consultarClientes')}}">Consultar Clientes</a></li>
            <li class="divider"></li>
            <li><a href="{{url('/registrarPromocion')}}">Registrar Promocion</a></li>
            <li><a href="{{url('/consultarPromociones')}}">Consultar Promociones</a></li>
            <li class="divider"></li>
            <li><a href="{{url('/registrarPaquete')}}">Registrar Paquete</a></li>
            <li><a href="{{url('/consultarPaquetes')}}">Consultar Paquetes</a></li>
          </ul>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menú de Sistema <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('/registrarVehiculo')}}">Registrar Vehiculo</a></li>
            <li><a href="{{url('/consultarVehiculos')}}">Consultar Vehiculos</a></li>
            <li class="divider"></li>
            <li><a href="{{url('/registrarSucursal')}}">Registrar Sucursal</a></li>
            <li><a href="{{url('/consultarSucursales')}}">Consultar Sucursales</a></li>
            <li class="divider"></li>
            <li><a href="{{url('/registrarEmpresa')}}">Registrar Empresa</a></li>
            <li><a href="{{url('/consultarEmpresas')}}">Consultar Empresas</a></li>
          </ul>
        </li>
      </ul>
      @endif

      <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
        <li><a href="{{ route('login') }}">Iniciar sesion</a></li>
        <li><a href="{{ route('register') }}">Registrarse</a></li>
        @else
        <li><a href="{{ url('/miPerfil') }}">Mi perfil</a></li>
        <li><a href="{{url('editarPerfil')}}/{{Auth::user()->id}}">Configuracion</a></li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesion</a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }} </form>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>


<div class="container">
  <div class="row">
    <div class="col-xs-12">
      @yield('contenido')
    </div>
  </div>
</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
