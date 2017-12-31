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
                    <form action="{{ route('roles.destroy', $role) }}" method="post" class="d-inline-block">
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
