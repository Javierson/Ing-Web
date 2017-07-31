
@extends('layouts.app')

@section('contenido')

<!-- Promociones -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="http://lorempixel.com/1920/720/transport">
      <div class="carousel-caption">
        <h3 class="info">Noticia</h3>
        <p>Aprovecha estas ofertas</p>
      </div>
    </div>

    <div class="item">
      <img src="http://lorempixel.com/1920/720/cats">
      <div class="carousel-caption">
        <h3 class="info">Inauguracion</h3>
        <p>Nueva sucursal disponible en la ciudad</p>
      </div>
    </div>

    <div class="item">
      <img src="http://lorempixel.com/1920/720/nature">
      <div class="carousel-caption">
        <h3 class="info">Lo nuevo en Culiacan</h3>
        <p>Se agregaron nuevos servicios a vehiculos deportivo</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>

<!-- Servicios -->

<section>
    <article>
        <table>
        <tr>
            <td colspan="2" align="center"><h2>Servicios</h2></td>
        </tr>
        <tr>
            <td align="center" class="right"><span class="glyphicon glyphicon-time" aria-hidden="true" style="font-size: 4em"></span></td>

            <td>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.
            </td>
        </tr>
        <tr>
            <td align="center" class="right"><span class="glyphicon glyphicon-cog" aria-hidden="true" style="font-size: 4em"></span></td>
            <td>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.
            </td>
        </tr>
        <tr>
            <td align="center" class="right"><span class="glyphicon glyphicon-heart" aria-hidden="true" style="font-size: 4em;"></span></td>
            <td>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.
            </td>
        </tr>
    </table>
    </article>
    <article>
        <img id="servicios" src="img/Servicios.jpg" width="100%">
    </article>
</section>

<div style="padding-top: 1em">
<div class="panel panel-info">
  <!-- Default panel contents -->
  <div align="center" class="panel-heading">Promociones</div>
  <div class="panel-body">
    <p align="center">Aplican terminos y condiciones</p>
  </div>
  <table class="table">
  <tr>
    <th style="text-align: center">Nombre</th>
    <th style="text-align: center">Descripcion</th>
    <th style="text-align: center">Descuento</th>
    <th style="text-align: center">Fecha de Inicio</th>
    <th style="text-align: center">Fecha de Expiracion</th>
  </tr>
  @foreach($promocion as $p)
  <tr>
  <td align="center">{{$p->nombre}}</td>
  <td align="center">{{$p->descripcion}}</td>
  <td align="center">{{$p->descuento}} %</td>
  <td align="center">{{$p->fi}}</td>
  <td align="center">{{$p->fe}}</td>
  </tr>
  @endforeach
  </table>
</div>
</div>


<section id="about">

<h2 align="center">Acerca de Nosotros</h2>

<!-- <iframe src="https://www.youtube.com/embed/sFg464JvT18?controls=2" width="426" height="240"></iframe> -->

@foreach($informacion as $i)
    <article>
    <h4 align="center">Mision</h4>
    <p>
      {{ $i->mision }}
    </p>
    </article>

    <article>
    <h4 align="center">Vision</h4>
    <p>
      {{ $i->vision }}
    </p>
    </article>
@endforeach

</section>

<p align="center" style="margin-top: 1em">
  <input type="button" value="Mostrar localizacion" onclick="show(), myMap()" class="btn btn-info"> 
</p>

<div id="map" style="display: none; width: 100%; height: 360px"></div>

<footer>
  <article>
    <h4>Direccion</h4>
    @foreach($direccion as $d)
    <p>
      Numero: {{ $d->numero }}, Calle: {{ $d->calle }} <br>
      Colonia: {{ $d->colonia }}, Municipio: {{ $d-> municipio}}, Estado: {{ $d-> estado}}
    </p>
    @endforeach
  </article>
  <article>
    <h4>Contacto</h4>
    @foreach($informacion as $i)
    <p>
      <p>Empresa: {{ $i->nombre }}</p>
      <p>Correo: {{ $i->correo }}</p>
      <p>Telefono: {{ $i->telefono }}</p>
    </p>
    @endforeach
  </article>
  <article>
    <h4>Redes sociales</h4>
    <p>
    <table width="100%"s>
    <tr>
      <td align="center"><a href="https://www.facebook.com/" target="_blank" style="color: MediumBlue">Facebook</a></td>
      <td align="center"><a href="https://twitter.com/" target="_blank" style="color: DeepSkyBlue">Twitter</a></td>
      <td align="center"><a href="https://www.youtube.com/" target="_blank">YouTube</a></td>
    </tr>
    </table>
    </p>
  </article>
</footer>

<script>

function show() {
document.getElementById('map').style.display = 'block';
}

function myMap() {
  var myCenter = new google.maps.LatLng(24.788599, -107.396784);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 16};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);

  var infowindow = new google.maps.InfoWindow({
    content: "Narnia"
  });
  infowindow.open(map,marker);
}

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCI4k5iOMaOP4Qz2RKhtc1yAPC_VgSi5Gs&callback=myMap"></script>

@endsection
