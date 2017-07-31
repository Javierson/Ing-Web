
@extends('layouts.app')

@section('contenido')

<form action="{{url('/actualizarEmpresa')}}/{{$empresa->id}}" method="POST">

<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
		<label for="nombre">Nombre:</label>
		<input type="text" class="form-control" name="nombre" value="{{$empresa->nombre}}" required>
	</div>

	<div class="form-group">
		<label for="mision">Mision:</label>
		<textarea name="mision" class="form-control" style="resize: vertical">{{$empresa->mision}}</textarea>
	</div>

	<div class="form-group">
		<label for="mision">Vision:</label>
		<textarea name="vision" class="form-control" style="resize: vertical">{{$empresa->vision}}</textarea>
	</div>

	<div class="form-group">
		<label for="correo">Correo:</label>
		<input type="text" class="form-control" name="correo" value="{{$empresa->correo}}" required>
	</div>

	<div class="form-group">
		<label for="telefono">Telefono:</label>
		<input type="text" placeholder="Diez dígitos" class="form-control" name="telefono" value="{{$empresa->telefono}}" required>
	</div>

	<div>
		<button type="submit" class="btn btn-primary">Registrar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>
</form>

@stop
