@extends('layout')

@section('content')
<h1>Cadastro de Função/Cargo</h1>

<form role="form" id="form-funcao" class="form-horizontal" method="post" action="{{ route('roles.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name" class="col-md-2 control-label">Descrição</label>
        <div class="col-md-5">
            <input type="text" class="form-control" id="name" name="name" maxlength="60" value="{{ $role->name }}">
        </div>
        <label for="ck-professor" class="col-md-2 control-label">É professor?</label>
        <div class="col-md-1">
            <div class="checkbox">
                <input type="checkbox"
                       name="is_professor"
                       id="ck-professor"
                       value="1"
                       {{ $role->is_professor ? ' checked' : '' }}
                >
            </div>
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
            <th>Função</th>
            <th>É professor</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->is_professor ? 'Sim' : 'Não' }}</td>
                <td>
                    <form action="{{ route('roles.destroy', $role) }}" method="post" class="visible-lg-inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    <a class="btn btn-warning btn-sm" href="{{ route('roles.edit', $role) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
