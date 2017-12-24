@extends('layout')

@section('content')
<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <h1>Restaurar Senha</h1>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">E-mail</label>

                <div class="col-sm-9">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                Enviar e-mail para recuperação de senha
            </button>
        </form>
    </div>
</div>
@endsection
