@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Cadastre-se</h1>
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-3 col-form-label">Nome</label>

                    <div class="col-sm-9">
                        <input id="name"
                               type="text"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                               name="name"
                               value="{{ old('name') }}"
                               required
                               autofocus
                        >
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">E-Mail Address</label>

                    <div class="col-md-9">
                        <input id="email"
                               type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email"
                               value="{{ old('email') }}"
                               required
                        >
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>

                    <div class="col-sm-9">
                        <input id="password"
                               type="password"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="password"
                               required
                        >
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-sm-3 col-form-label">Confirm Password</label>

                    <div class="col-md-9">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Cadastre-se
                </button>
            </form>
        </div>
    </div>
@endsection
