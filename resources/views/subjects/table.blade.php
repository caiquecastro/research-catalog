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
                    <form action="{{ route('subjects.destroy', $subject) }}" method="post" class="d-inline-block">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    <a class="btn btn-warning btn-sm" href="{{ route('subjects.edit', $subject) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
