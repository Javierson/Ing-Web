
@extends('layouts.app')

@section('contenido')

<form action="{{url('/guardarSucursal')}}" method="POST">

<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">

<fieldset style="display: inline-block; width: 49%">
	<div class="form-group">
		<label for="numero">Numero:</label>
		<input type="number" min="0" class="form-control" name="numero" required>
	</div>

	<div class="form-group">
		<label for="calle">Calle:</label>
		<input type="text" class="form-control" name="calle" required>
	</div>

	<div class="form-group">
		<label for="cp">Codigo postal:</label>
		<input type="text" maxlength="5" placeholder="Cinco dígitos" class="form-control" name="cp" required>
	</div>
</fieldset>

<fieldset style="display: inline-block; width: 49%; vertical-align: top; float: right">
	<div class="form-group">
		<label for="colonia">Colonia:</label>
		<input type="text" class="form-control" name="colonia" required>
	</div>

	<div class="form-group">
		<label for="municipio">Municipio:</label>
		<input type="text" class="form-control" name="municipio" required>
	</div>

	<div class="form-group">
		<label for="estado">Estado:</label>
		<input type="text" class="form-control" name="estado" required>
	</div>
</fieldset>

	<div class="form-group">
		<label for="empresa">Empresa:</label>
		<select name="empresa" class="form-control" required>
		@foreach( $empresa as $e )
		<option value="{{ $e->id }}">{{ $e->nombre }}</option>
		@endforeach
		</select>
	</div>

	<div>
		<button type="submit" class="btn btn-primary">Registrar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>

</form>

@stop
