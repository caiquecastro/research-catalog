@extends('layout')

@section('content')
<h1>Cadastro de Palavra Chave</h1>
@include('partials.messages')
<form role="form" id="form-funcao" class="form-horizontal" method="post" action="{{ route('keywords.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name" class="col-md-2 control-label">Descrição</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="name" name="name" maxlength="60" value="{{ $keyword->name }}">
        </div>
        <div class="col-md-2">
            <button type="submit" name="sent" class="btn btn-primary btn-block">Salvar</button>
        </div>
    </div>
</form>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Palavra Chave</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($keywords as $keyword) :
            ?>
            <tr>
                <td>{{ $keyword->id }}</td>
                <td>{{ $keyword->name }}</td>
                <td>
                    <form action="{{ route('keywords.destroy', $keyword) }}" method="post" class="visible-lg-inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    <a class="btn btn-warning btn-sm" href="{{ route('keywords.edit', $keyword) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
            <?php
        endforeach;
        ?>
    </tbody>
</table>
@endsection
