
@extends('layouts.app')

@section('contenido')

<table class="table table-striped">
	<thead>
		<tr>
			<th class="center">ID</th>
			<th>Nombre</th>
			<th class="center">Fecha de nacimiento</th>
			<th class="center">Codigo postal</th>
			<th>Correo</th>
			<th class="center">Puntos</th>
			<th>Rol</th>
			<th class="center">Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($cliente as $c)
			<tr>
				<td align="center">{{$c->id}}</td>
				<td>{{$c->name}} {{$c->apellido_paterno}} {{$c->apellido_materno}}</td>
				<td align="center">{{$c->fn}}</td>
				<td align="center">{{$c->codigo_postal}}</td>
				<td>{{$c->email}}</td>
				<td align="center">{{$c->puntos}}</td>
				@if($c->rol == '')
				<td>Cliente</td>
				@else
				<td>Administrador</td>
				@endif
				<td align="center">
					<a href="{{url('editarPerfil')}}/{{$c->id}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('eliminarCliente')}}/{{$c->id}}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@stop
