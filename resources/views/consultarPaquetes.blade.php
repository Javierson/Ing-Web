
@extends('layouts.app')

@section('contenido')

<table class="table table-striped">
	<thead>
		<tr>
			<th class="center">ID</th>
			<th>Nombre</th>
			<th class="center">Costo</th>
			<th>Vehiculo</th>
			<th class="center">Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($paquete as $a)
			<tr>
				<td align="center">{{$a->id}}</td>
				<td>{{$a->nombre}}</td>
				<td align="center">{{$a->costo}}</td>
				<td>{{$a->tipo}}</td>
				<td align="center">
					<a href="{{url('/editarPaquete')}}/{{$a->id}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('/eliminarPaquete')}}/{{$a->id}}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@stop
