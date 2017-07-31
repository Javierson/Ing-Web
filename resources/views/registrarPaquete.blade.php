
@extends('layouts.app')

@section('contenido')

<form action="{{url('/guardarPaquete')}}" method="POST">

<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
		<label for="nombre">Nombre:</label>
		<input type="text" class="form-control" name="nombre" required>
	</div>

	<div class="form-group">
		<label for="costo">Costo:</label>
		<input type="text" class="form-control" name="costo" required>
	</div>

	<div class="form-group">
		<label for="vehiculo">Vehiculo:</label>
		<select name="vehiculo" class="form-control" required>
		<option value>Seleccione el tipo de vehiculo</option>
		@foreach( $vehiculo as $v )
		<option value="{{ $v->id }}">{{ $v->tipo }}</option>
		@endforeach
		</select>
	</div>

	<div>
		<button type="submit" class="btn btn-primary">Registrar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>

</form>

@stop
