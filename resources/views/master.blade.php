
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sistema de Control Autolavado</title>
  <link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">
  <script src="{{asset("js/jquery-3.2.1.js")}}"></script>
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
      <a class="navbar-brand" href="#">Autolavado</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{url('/')}}">Inicio</a></li>
        <li><a href="#">Link</a></li>
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
            <li><a href="{{url('/consultarPaquetes')}}">Consultar Paquetazos</a></li>
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
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
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

<footer class="text-center">
  <hr>
  Ing. Web &copy; 2017 
</footer>
<script src="{{asset("js/bootstrap.js")}}"></script>
</body>
</html>
