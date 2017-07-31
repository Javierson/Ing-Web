
@extends('layouts.app')

@section('contenido')

<fieldset>
	<legend>Empresa<span style="float: right">Ganancias en ventas: @foreach($ganancias as $g) {{$g->ganancias}} @endforeach $</span></legend>
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Telefono</th>
			<th colspan="2" class="center">Sumatoria de evaluaciones entre cantidad de evaluaciones</th>
			<th>Promedio de satisfaccion del cliente en general</th>
		</tr>
	</thead>
	<tbody>
		@foreach($gestion as $g)
			<tr>
				<td>{{$g->id}}</td>
				<td>{{$g->nombre}}</td>
				<td>{{$g->correo}}</td>
				<td>{{$g->telefono}}</td>
				@foreach($count as $c)
				<td align="center">{{$c->sumatoria}}</td>
				<td align="center">{{$c->cantidad}}</td>
				<td align="center">{{$c->promedio}} <span class="glyphicon glyphicon-star" aria-hidden="true"></span></td>
				@endforeach
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
</fieldset>

<fieldset>
	<legend>Evaluacion por sucursal</legend>

<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Direccion</th>
			<th colspan="2" class="center">Sumatoria de evaluaciones entre cantidad de evaluaciones</th>
			<th>Promedio de satisfaccion del cliente en general</th>
		</tr>
	</thead>
	<tbody>
		@foreach($calificacion as $c)
			<tr>
				<td>{{$c->sucursal}}</td>
				<td>Numero: {{$c->numero}}, Calle: {{$c->calle}}, Colonia: {{$c->colonia}}, Municipio: {{$c->municipio}}, Estado: {{$c->estado}}</td>
				<td align="center">{{$c->sumatoria}}</td>
				<td align="center">{{$c->cantidad}}</td>
				<td align="center">{{$c->promedio}} <span class="glyphicon glyphicon-star" aria-hidden="true"></span></td>
				
			</tr>
		@endforeach
	</tbody>
</table>

</fieldset>

<fieldset>
	<legend>Administradores</legend>
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
		@foreach($administrador as $a)
			<tr>
				<td align="center">{{$a->id}}</td>
				<td>{{$a->name}} {{$a->apellido_paterno}} {{$a->apellido_materno}}</td>
				<td align="center">{{$a->fn}}</td>
				<td align="center">{{$a->codigo_postal}}</td>
				<td>{{$a->email}}</td>
				<td align="center">{{$a->puntos}}</td>
				@if($a->rol == '')
				<td>Cliente</td>
				@else
				<td>Administrador</td>
				@endif
				<td align="center">
					<a href="{{url('editarPerfil')}}/{{$a->id}}" class="btn btn-primary btn-xs">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>
					<a href="{{url('eliminarCliente')}}/{{$a->id}}" class="btn btn-danger btn-xs">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>	
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
</fieldset>

<fieldset>
	<legend>Cantidad de visitas por cliente</legend>

<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th class="center">Visitas</th>
			<th class="center">Correo</th>
		</tr>
	</thead>
	<tbody>
		@foreach($visita as $v)
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->name}} {{$v->apellido_paterno}} {{$v->apellido_materno}}</td>
				<td align="center">{{$v->cantidad}}</td>
				<td align="center">
					<a href="{{url('/correo')}}/{{$v->id}}" class="btn btn-default btn-xs">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

</fieldset>

@stop
