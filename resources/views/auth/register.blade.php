
@extends('layouts.app')

@section('contenido')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<!-- -->
                        <div class="form-group">
                            <label for="ap" class="col-md-4 control-label">Apellido paterno</label>
                            <div class="col-md-6">
                                <input id="ap" type="text" class="form-control" name="ap" value="{{ old('ap') }}">
                            </div>
                        </div>
<!-- -->

<!-- -->
                        <div class="form-group">
                            <label for="am" class="col-md-4 control-label">Apellido materno</label>
                            <div class="col-md-6">
                                <input id="am" type="text" class="form-control" name="am" value="{{ old('am') }}">
                            </div>
                        </div>
<!-- -->

<!-- -->
                        <div class="form-group">
                            <label for="fn" class="col-md-4 control-label">Fecha de nacimieto</label>
                            <div class="col-md-6">
                                <input id="fn" type="date" class="form-control" name="fn" value="{{ old('fn') }}" required>
                            </div>
                        </div>
<!-- -->

<!-- -->
                        <div class="form-group">
                            <label for="cp" class="col-md-4 control-label">Codigo postal</label>
                            <div class="col-md-6">
                                <input id="cp" type="text" class="form-control" name="cp" minlength="5" maxlength="5" value="{{ old('cp') }}">
                            </div>
                        </div>
<!-- -->

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" minlength="6" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" minlength="6" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
