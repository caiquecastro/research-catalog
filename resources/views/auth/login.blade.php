@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">E-mail</label>

                <div class="col-sm-9">
                    <input id="email"
                            type="email"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                    >

                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Senha</label>

                <div class="col-sm-9">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-check">
                <label class="custom-control custom-checkbox">
                    <input type="checkbox"
                            class="custom-control-input"
                            name="remember"
                            {{ old('remember') ? 'checked' : '' }}
                    >
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Remember Me</span>
                </label>
            </div>

            <button type="submit" class="btn btn-primary">
                Login
            </button>

            <a class="btn btn-link" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        </form>
    </div>
</div>
@endsection
