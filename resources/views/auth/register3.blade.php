
@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('register') }}" class="form-horizontal" style="width: 100%; max-width: 1024px; margin: 0 auto">

<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">

  <fieldset>

    <legend>Perfil</legend>

    <div class="form-group">
      <label for="email" class="col-lg-2 control-label">Correo</label>
      <div class="col-lg-10">
        <input class="form-control" id="email" type="text" required autofocus>
      </div>
    </div>

    <div class="form-group">
      <label for="password" class="col-lg-2 control-label">Contraseña</label>
      <div class="col-lg-10">
        <input class="form-control" id="password" type="password" required>
      </div>
    </div>

    <div class="form-group">
      <label for="password-confirm" class="col-lg-2 control-label">Confirmar contraseña</label>
      <div class="col-lg-10">
        <input class="form-control" id="password-confirm" type="password" required>
      </div>
    </div>

  </fieldset>

  <fieldset>

    <legend>Usuario</legend>

    <div class="form-group">
      <label for="name" class="col-lg-2 control-label">Nombre</label>
      <div class="col-lg-10">
        <input class="form-control" id="name" type="text" value="{{ old('name') }}" required>
      </div>
    </div>

    <div class="form-group">
      <label for="ap" class="col-lg-2 control-label">Appelido paterno</label>
      <div class="col-lg-10">
        <input class="form-control" id="ap" type="text">
      </div>
    </div>

    <div class="form-group">
      <label for="am" class="col-lg-2 control-label">Appelido materno</label>
      <div class="col-lg-10">
        <input class="form-control" id="am" type="text">
      </div>
    </div>

    <div class="form-group">
      <label for="fn" class="col-lg-2 control-label">Fecha de nacimiento</label>
      <div class="col-lg-10">
        <input class="form-control" id="fn" placeholder="Año / Mes / Dia" type="date">
      </div>
    </div>

    <div class="form-group">
      <label for="cp" class="col-lg-2 control-label">Codigo postal</label>
      <div class="col-lg-10">
        <input class="form-control" id="cp" placeholder="Cinco digitos" type="number">
      </div>
    </div>

  </fieldset>

<div class="form-group">
	<div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Registrar</button>
        <a href="{{url('/')}}" class="btn btn-default">Cancelar</a>
    </div>
</div>

</form>

@endsection
