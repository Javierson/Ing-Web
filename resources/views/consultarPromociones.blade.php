
@extends('layouts.app')

@section('contenido')

<table class="table table-striped">
	<thead>
		<tr>
			<th class="center">ID</th>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th class="center">Fecha de Inicio</th>
			<th class="center">Fecha de Expiracion</th>
			<th class="center">Descuento</th>
			<th>Privacidad</th>
			<th>Sucursal</th>
			<th class="center">Opciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($promocion as $a)
			<tr>
				<td align="center">{{$a->id}}</td>
				<td>{{$a->nombre}}</td>
				<td>{{$a->descripcion}}</td>
				@if($a->fi and $a->fe != '')
				<td align="center">{{$a->fi}}</td>
				<td align="center">{{$a->fe}}</td>
				@else
				<td colspan="2" align="center">Sin fecha de expiracion</td>
				@endif
				<td align="center">{{$a->descuento}} %</td>
				@if($a->privacidad == 0)
				<td>Publico</td>
				@else
				<td>Privado</td>
				@endif
				<td>Numero: {{$a->numero}}, Calle: {{$a->calle}}, Colonia: {{$a->colonia}}</td>
				<td align="center">
					<a href="{{url('/editarPromocion')}}/{{$a->id}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('/eliminarPromocion')}}/{{$a->id}}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@stop
