
@extends('layouts.app')

@section('contenido')

<fieldset>
	<legend>Mis datos</legend>
	<table class="table table-striped">
		<tr>
			<th class="center">ID</th>
			<th>Nombre</th>
			<th class="center">Fecha de nacimiento</th>
			<th class="center">Codigo postal</th>
			<th>Rol</th>
		</tr>
		@foreach($usuario as $u)
		<tr>
			<td align="center">{{$u->id}}</td>
			<td>{{$u->name}} {{$u->apellido_paterno}} {{$u->apellido_materno}}</td>
			<td align="center">{{$u->fecha_de_nacimiento}}</td>
			@if($u->codigo_postal == '')
			<td align="center">Codigo postal indefinido</td>
			@else
			<td align="center">{{$u->codigo_postal}}</td>
			@endif
			@if($u->rol == '')
			<td>Cliente</td>
			@else
			<td>Adiministrador</td>
			@endif
		</tr>
		@endforeach
	</table>
</fieldset>

<fieldset style="display: inline-block; width: 54%">
	<legend>Cuentas</legend>
<table class="table table-striped">
	<thead>
		<tr>
			<th class="center">ID</th>
			<th>Cliente</th>
			<th>Paquete</th>
			<th class="center">Costo</th>
			<th class="center">Fecha</th>
			<th>Direccion</th>
			<th class="center">Calificar</th>
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
					<a href="{{url('/evaluar')}}/{{$c->orden}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
</fieldset>

<fieldset style="display: inline-block; vertical-align: top; float: right; width: 45%">
	<legend>Evaluaciones</legend>
<table class="table table-striped">
	<thead>
		<tr>
			<th class="center">ID</th>
			<th class="center">Cuenta</th>
			<th class="center">ID del Cliente</th>
			<th>Nombre</th>
			<th class="center">Calificacion</th>
			<th>Comentario</th>
		</tr>
	</thead>
	<tbody>
		@foreach($evaluacion as $e)
			<tr>
				<td align="center">{{$e->id}}</td>
				<td align="center">{{$e->cuenta_id}}</td>
				<td align="center">{{$e->idCliente}}</td>
				<td>{{$e->name}}</td>
				<td align="center">{{$e->calificacion}}</td>
				<td>{{$e->comentario}}</td>
			</tr>
		@endforeach
	</tbody>
</table>

</fieldset>

@stop
