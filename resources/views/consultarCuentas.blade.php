
@extends('layouts.app')

@section('contenido')

<fieldset style="display: inline-block; width: 54%">
	<legend>Cuenta</legend>
<table class="table table-striped">
	<thead>
		<tr>
			<th class="center">ID</th>
			<th>Cliente</th>
			<th>Paquete</th>
			<th class="center">Costo</th>
			<th class="center">Fecha</th>
			<th>Direccion</th>
			<th class="center">Opcion</th>
		</tr>
	</thead>
	<tbody>
		@foreach($cuenta as $c)
			<tr>
				<td align="center">{{$c->orden}}</td>
				<td>{{$c->cliente}}</td>
				<td>{{$c->paquete}}</td>
				<td align="center">{{$c->costo}}</td>
				<td align="center">{{$c->fecha}}</td>
				<td>{{$c->numero}}, {{$c->calle}}, {{$c->colonia}}</td>
				<td align="center">
				<!--
					<a href="{{url('/editarCuenta')}}/{{$c->id}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
				-->
					<a href="{{url('/eliminarCuenta')}}/{{$c->id}}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
</fieldset>

<fieldset style="display: inline-block; vertical-align: top; float: right; width: 45%">
	<legend>Evaluacion</legend>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Cuenta</th>
			<th>ID del Cliente</th>
			<th>Nombre</th>
			<th>Calificacion</th>
			<th>Comentario</th>
		</tr>
	</thead>
	<tbody>
		@foreach($evaluacion as $e)
			<tr>
				<td>{{$e->id}}</td>
				<td>{{$e->cuenta_id}}</td>
				<td>{{$e->idCliente}}</td>
				<td>{{$e->name}}</td>
				<td>{{$e->calificacion}}</td>
				<td>{{$e->comentario}}</td>
			</tr>
		@endforeach
	</tbody>
</table>

</fieldset>

@stop
