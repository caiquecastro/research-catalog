@extends('layout')

@section('content')
<h1>Cadastro de Linha de Pesquisa</h1>

<form role="form" id="form-funcao" class="form-horizontal" method="post" action="{{ route('researches.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="nome" class="col-md-2 control-label">Descrição</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="nome" name="name" maxlength="60" value="{{ $research->name }}">
        </div>
        <div class="col-md-2">
            <button type="submit" name="sent" class="btn btn-primary btn-block">Salvar</button>
        </div>
    </div>
</form>

@include('researches.table')
@endsection
