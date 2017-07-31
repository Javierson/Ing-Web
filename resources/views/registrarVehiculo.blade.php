
@extends('layouts.app')

@section('contenido')

<form action="{{url('/guardarVehiculo')}}" method="POST">

<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
		<label for="tipo">Tipo:</label>
		<input type="text" class="form-control" name="tipo" required>
	</div>

	<div>
		<button type="submit" class="btn btn-primary">Registrar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>

</form>

@stop
