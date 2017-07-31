
@extends('layouts.app')

@section('contenido')

<form action="{{url('/actualizarPromocion')}}/{{$promocion->id}}" method="POST">

<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">

<ul>

<li style="display: inline-block; width: 49%">

	<div class="form-group">
		<label for="nombre">Nombre:</label>
		<input type="text" class="form-control" name="nombre" value="{{$promocion->nombre}}" required>
	</div>

	<div class="form-group">
		<label for="mision">Descripcion:</label>
		<textarea name="descripcion" class="form-control" required style="resize: vertical">{{$promocion->descripcion}}</textarea>
	</div>

	<div class="form-group">
		<label for="mision">Fecha de Inicio:</label>
		<input type="date" min="2016-01-1" class="form-control" name="fi" placeholder="Año / Mes / Dia" value="{{$promocion->fecha_de_inicio}}">
	</div>
 
	<div class="form-group">
		<label for="correo">Fecha de Expiracion:</label>
		<input type="date" min="2016-01-1" class="form-control" name="fe" placeholder="Año / Mes / Dia" value="{{$promocion->fecha_de_expiracion}}">
	</div>

</li>

<li style="display: inline-block; vertical-align: top; float: right; width: 49%">

	<div class="form-group">
		<label for="descuento">Descuento:</label>
		<input type="number" min="0" max="100" placeholder="Este campo se maneja por porciento" class="form-control" name="descuento" value="{{$promocion->descuento}}" required>
	</div>

	<div class="form-group">
		<label for="sucursal">Sucursal:</label>
		<select name="sucursal" class="form-control" required>
		<option value>Seleccione una sucursal</option>
		@foreach( $sucursal as $s )
		<option value="{{ $s->id }}">Direccion: Numero: {{ $s->numero }}, Calle: {{ $s->calle }}, Colonia: {{ $s->colonia }}</option>
		@endforeach
		</select>
	</div>

	<div class="form-group">
	<label class="control-label">Privacidad:</label>
        <table width="34%">
        	<tr class="form-control">
        		<td width="10%">@if( $promocion->privacidad  == 0)<input name="privacidad" value="0" type="radio" checked required>@else<input name="privacidad" value="0" type="radio" required>@endif</td>
        		<td width="50%">Publico</td>
        		<td width="10%">@if( $promocion->privacidad  == 1)<input name="privacidad" value="1" type="radio" checked required>@else<td width="10%"><input name="privacidad" value="1" type="radio" required>@endif</td>
        		<td>Privado</td>
        	</tr>
        </table>
    </div>

</li>

	<div>
		<button type="submit" class="btn btn-primary">Registrar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>

</ul>

</form>

@stop
