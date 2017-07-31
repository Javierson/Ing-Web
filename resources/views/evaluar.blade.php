
@extends('layouts.app')

@section('contenido')

<fieldset>
	<legend>Evaluacion</legend>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Cliente</th>
			<th>Paquete</th>
			<th>Costo</th>
			<th>Fecha</th>
			<th>Direccion</th>
		</tr>
	</thead>
	<tbody>
		@foreach($cuenta as $c)
			<tr>
				<td>{{$c->orden}}</td>
				<td>{{$c->cliente}}</td>
				<td>{{$c->paquete}}</td>
				<td>{{$c->costo}}</td>
				<td>{{$c->fecha}}</td>
				<td>{{$c->numero}}, {{$c->calle}}, {{$c->colonia}}</td>
			</tr>
		@endforeach
	</tbody>
</table>

</fieldset>

<form action="{{url('/guardarEvaluacion')}}" method="POST" name="formulario" class="form-horizontal">

<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">

@foreach($cuenta as $c)
<input type="hidden" name="cuenta" value="{{$c->orden}}">
@endforeach

<fieldset style="display: inline-block; width: 44%">

	<div class="form-group">
		<label for="calificacion">Calificacion:</label>
		<input type="range" name="calificacion" max="5" onchange="myFunction(this.value)" class="form-control">
	</div>
<!--
	<div class="form-group">
		<label for="myComment">Mi opinion es:</label>
		<input type="text" class="form-control" name="myComment">
	</div>
-->
</fieldset>

<fieldset style="display: inline-block; width: 50%; float: right; vertical-align: top">

	<div class="form-group">
		<label for="calificacion">Comentario:</label>
		<textarea name="comentario" placeholder="Escribir un comentario..." class="form-control" style="resize: vertical"></textarea>
	</div>

</fieldset>

	<div>
		<button type="submit" class="btn btn-primary">Registrar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>

</form>


<script>

function myFunction(val) {

var n = val;

switch(val) {
    
    case 1:

        alert("Papu 1" + n);
        
        break;
    
    case 2:

        alert("Papu 2" + n);

    break;
}

}

</script>

@stop
