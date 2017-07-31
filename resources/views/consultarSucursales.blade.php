
@extends('layouts.app')

@section('contenido')

<table class="table table-striped">
	<thead>
		<tr>
			<th class="center">ID</th>
			<th class="center">Numero</th>
			<th>Calle</th>
			<th class="center">Codigo postal</th>
			<th>Colonia</th>
			<th>Municipio</th>
			<th>Estado</th>
			<th>Empresa</th>
			<th class="center">Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($sucursal as $a)
			<tr>
				<td align="center">{{$a->id}}</td>
				<td align="center">{{$a->numero}}</td>
				<td>{{$a->calle}}</td>
				<td align="center">{{$a->cp}}</td>
				<td>{{$a->colonia}}</td>
				<td>{{$a->municipio}}</td>
				<td>{{$a->estado}}</td>
				<td>{{$a->nombre}}</td>
				<td align="center">
					<a href="{{url('/editarSucursal')}}/{{$a->id}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('/eliminarSucursal')}}/{{$a->id}}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@stop
