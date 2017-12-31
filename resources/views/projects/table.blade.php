<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Projeto de Extensão</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->name }}</td>
            <td>
                <form action="{{ route('projects.destroy', $project) }}" method="post" class="d-inline-block">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
                <a class="btn btn-warning btn-sm" href="{{ route('projects.edit', $project) }}">
                    <i class="fas fa-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
