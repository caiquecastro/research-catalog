@include('header')

<h1>Cadastro de Disciplina</h1>
<div id="messages">
    <div class="alert alert-success" role="alert">Disciplina cadastrada com sucesso</div>
</div>
<form role="form" id="form-funcao" class="form-horizontal" method="post" action="{{ route('subjects.store') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="nome" class="col-md-2 control-label">Descrição</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="nome" name="name" maxlength="50" value="{{ $subject->name }}">
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
            <th>Disciplina</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subjects as $subject)
            <tr>
                <td>{{ $subject->id }}</td>
                <td>{{ $subject->name }}</td>
                <td>
                    <a class="btn btn-danger btn-sm" href="{{ route('subjects.destroy', $subject) }}">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                    <a class="btn btn-warning btn-sm" href="{{ route('subjects.edit', $subject) }}">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@include('footer')
