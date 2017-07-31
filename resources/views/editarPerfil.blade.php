
@extends('layouts.app')

@section('contenido')

<form action="{{url('actualizarPerfil')}}/{{$usuario->id}}" method="POST">

<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">

<fieldset style="display: inline-block; width: 49%">
	<div class="form-group">
		<label for="name">Nombre:</label>
		<input type="text" class="form-control" id="name" name="name" value="{{$usuario->name}}" required>
	</div>

	<div class="form-group">
		<label for="mision">Apellido paterno:</label>
		<input type="text" class="form-control" id="ap" name="ap" value="{{$usuario->ap}}" required>
	</div>

	<div class="form-group">
		<label for="mision">Apellido materno:</label>
		<input type="text" class="form-control" id="am" name="am" value="{{$usuario->am}}" required>
	</div>

	<div class="form-group">
		<label for="cp">Codigo postal:</label>
		<input type="text" class="form-control" id="cp" name="cp" minlength="5" maxlength="5" value="{{$usuario->cp}}" placeholder="Cinco digitos">
	</div>
</fieldset>

<fieldset style="display: inline-block; width: 49%; float: right; vertical-align: top">
	<div class="form-group">
		<label for="email">Correo:</label>
		<input type="email" class="form-control" id="email" name="email" value="{{$usuario->email}}" required>
	</div>

	<div class="form-group">
		<label for="password">Contraseña:</label>
		 <input id="password" type="text" class="form-control" name="password" minlength="6" placeholder="Minimo seis digitos">
	</div>

<!--
	<div class="form-group">
		<label for="password">Confirmar contraseña:</label>
		<input type="text" class="form-control" id="password-confirm" name="password-confirm" minlength="6" placeholder="Minimo seis digitos">
	</div>
-->

@if(Auth::user()->rol == 1)
<fieldset>
<legend>Privilegios del Administrador</legend>
	<div class="form-group">
		<label for="fn">Fecha de nacimiento:</label>
		<input type="date" class="form-control" id="fn" name="fn" value="{{$usuario->fn}}" placeholder="Año / Mes / Dia" value="{{$usuario->fn}}" required>
	</div>

	<div class="form-group">
	<label class="control-label">Rol:</label>
        <table width="50%">
        	<tr class="form-control">
        		<td width="10%"><input type="radio" id="rol" name="rol" value required></td>
        		<td width="50%">Cliente</td>
        		<td width="10%"><input type="radio" id="rol" name="rol" value="1"  required></td>
        		<td>Administrador</td>
        	</tr>
        </table>
    </div>
</fieldset>
@endif

</fieldset>

	<div>
		<button type="submit" class="btn btn-primary">Registrar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>

</form>

@stop
