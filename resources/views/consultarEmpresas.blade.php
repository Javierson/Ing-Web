
@extends('layouts.app')

@section('contenido')

<table class="table table-striped">
	<thead>
		<tr>
			<th class="center">ID</th>
			<th>Nombre</th>
			<th>Mision</th>
			<th>Vision</th>
			<th>Correo</th>
			<th class="center">Telefono</th>
			<th class="center">Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($empresa as $a)
			<tr>
				<td align="center">{{$a->id}}</td>
				<td>{{$a->nombre}}</td>
				<td>{{$a->mision}}</td>
				<td>{{$a->vision}}</td>
				<td>{{$a->correo}}</td>
				<td align="center">{{$a->telefono}}</td>
				<td align="center">
					<a href="{{url('/editarEmpresa')}}/{{$a->id}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('/eliminarEmpresa')}}/{{$a->id}}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@stop
