@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-6">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

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
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Senha</label>

                <div class="col-sm-9">
                    <input id="password"
                           type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           name="password"
                           required
                        >
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="custom-control custom-checkbox">
                    <input type="checkbox"
                            class="custom-control-input"
                            name="remember"
                            {{ old('remember') ? 'checked' : '' }}
                    >
                    <span class="custom-control-label">Lembrar de mim</span>
                </label>
            </div>

            <button type="submit" class="btn btn-primary">
                Entrar
            </button>

            <a class="btn btn-link" href="{{ route('password.request') }}">
                Esqueci a senha
            </a>
        </form>
    </div>
</div>
@endsection
