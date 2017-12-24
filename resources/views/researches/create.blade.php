@extends('layout')

@section('content')
<h1>Cadastro de Linha de Pesquisa</h1>

<form method="post" action="{{ route('researches.store') }}">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="nome" class="col-sm-2 col-form-label text-right">Descrição</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nome" name="name" maxlength="60" value="{{ $research->name }}">
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary btn-block">Salvar</button>
        </div>
    </div>
</form>

@include('researches.table')
@endsection
