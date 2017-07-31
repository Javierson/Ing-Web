
@extends('layouts.app')

@section('contenido')

<table class="table table-striped">
	<thead>
		<tr>
			<th class="center">ID</th>
			<th>Tipo</th>
			<th class="center">Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($vehiculo as $v)
			<tr>
				<td align="center">{{$v->id}}</td>
				<td>{{$v->tipo}}</td>
				<td align="center">
					<a href="{{url('/editarVehiculo')}}/{{$v->id}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('/eliminarVehiculo')}}/{{$v->id}}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@stop
