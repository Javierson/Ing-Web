
@extends('layouts.app')

@section('contenido')

<form action="{{url('/guardarCuenta')}}" method="POST" name="formulario">

<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">

<fieldset style="display: inline-block; width: 54%">

	<div class="form-group">
		<label for="sucursal">Sucursal:</label>
		<select name="sucursal" class="form-control" required>
		<option value>Seleccione su sucursal</option>
		@foreach( $sucursal as $s )
		<option value="{{ $s->id }}">Direccion: Numero: {{ $s->numero }}, Calle: {{ $s->calle }}, Colonia: {{ $s->colonia }}</option>
		@endforeach
		</select>
	</div>

	<div class="form-group">
		<label for="nc">Numero de cuenta del Cliente:</label>
		<input type="number" name="nc" onchange="Usuario()" onkeyup="Usuario()" min="1" class="form-control">
	</div>
<!--
	<div class="form-group">
		<label for="dc">Datos del Cliente:</label>
		<input type="text" class="form-control" name="dc">
	</div>
-->
<!-- -->

	<div class="form-group">
		<label for="cliente">Cliente:</label>
		<select name="cliente" id="Datos" disabled class="form-control">
		@foreach( $cliente as $c )
		<option value="{{ $c->id }}">Nombre: {{ $c->name }}, Puntos: {{ $c->puntos }}, Fecha de nacimiento: {{ $c->fecha_de_nacimiento }}</option>
		@endforeach
		</select>
	</div>

<!-- -->

</fieldset>

<fieldset style="display: inline-block; vertical-align: top; float: right; width: 45%">

	<div class="form-group">
		<label for="paquete">Paquete:</label>
		<select name="paquete" onchange="IllGetYou(1), Enable(), LP()" class="form-control" required>
		<option value>Seleccione un paquete</option>
		@foreach( $paquete as $p )
		<option value="{{ $p->id }}">Nombre: {{ $p->nombre }}, Costo: {{ $p->costo }} Vehiculo: {{ $p->tipo }}</option>
		@endforeach
		</select>
	</div>

	<div class="form-group">
		<label for="promocion">Promocion:</label>
		<select name="promocion" id="Turn on" onchange="IllGetYou(2), LP()" class="form-control" disabled required>
		<option value>Seleccione primero un paquete</option>
		@foreach( $promocion as $d )
		<option value="{{ $d->id }}">Nombre: {{ $d->nombre }}, Descuento: {{ $d->descuento }} %</option>
		@endforeach
		</select>
	</div>

	<div class="form-group">
		<label for="costo">Costo:</label>
		<input type="text" name="costo" min="0" readonly class="form-control" style="text-align: right">
	</div>

	<div class="form-group">
		<label for="lp">Puntos de vida sumados:</label>
		<input type="text" name="lp" min="0" readonly class="form-control" style="text-align: right">
	</div>

	<div class="form-group">
	<label for="payment" class="control-label">Metodo de pago:</label>
        <table width="40%">
        	<tr class="form-control">
        		<td width="20%"><input type="radio" id="payment" name="payment" value="1" onclick="LP2(this.value), PaymentByLP(this.value)" required></td>
        		<td width="40%">Efectivo</td>
        		<td width="20%"><input type="radio" id="payment" name="payment" value="0" onclick="LP2(this.value), PaymentByLP(this.value)"  required></td>
        		<td>Puntos</td>
        	</tr>
        </table>
    </div>

</fieldset>

	<div>
		<button type="submit" id="submit" onclick="Submit()" class="btn btn-primary">Registrar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>

<script>

function IllGetYou(n) {

var str = document.formulario.paquete.options[document.formulario.paquete.selectedIndex].text, costo = str.split("Costo: "), str2 = document.formulario.promocion.options[document.formulario.promocion.selectedIndex].text, descuento = str2.split("Descuento: ");

document.formulario.costo.value = parseFloat(costo[1]) * ( ( 100 - parseFloat(descuento[1]) ) / 100 );

switch(n) {
    
    case 1:

        document.formulario.costo.value = parseFloat(costo[1]);
      
        break;
    
    case 2:

        document.formulario.costo.value = parseFloat(costo[1]) * ( ( 100 - parseFloat(descuento[1]) ) / 100 );

    break;
}

}

function PaymentByLP(n) {

var str = document.formulario.cliente.options[document.formulario.cliente.selectedIndex].text, payment = str.split("Puntos: ");

var x = parseInt(payment[1]);

if (n == 0) {
if (x < document.formulario.costo.value) {
	document.getElementById("submit").disabled = true;
	alert('No se puede pagar con ' + x + ' puntos el costo de ' + document.formulario.costo.value);
}
else {
	document.getElementById("submit").disabled = false;
	alert('Si te alcanzan los ' + x + ' para pagar');
}
}
else
	document.getElementById("submit").disabled = false;

}

function LP() {
	document.formulario.lp.value = parseInt(parseFloat(document.formulario.costo.value) * .05);
}

function LP2(n) {
	document.formulario.lp.value = parseInt(parseFloat(document.formulario.costo.value) * .05) * n;
}

function Enable() {
	document.getElementById("Turn on").disabled = false;
}

function Submit() {

if ( document.formulario.nc.value == '' )
document.formulario.nc.value = '1';

}

function Usuario() {
    document.getElementById("Datos").selectedIndex = document.formulario.nc.value - 1;
}

</script>

</form>

@stop
