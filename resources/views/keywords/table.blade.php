<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Palavra Chave</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($keywords as $keyword)
            <tr>
                <td>{{ $keyword->id }}</td>
                <td>{{ $keyword->name }}</td>
                <td>
                    <form action="{{ route('keywords.destroy', $keyword) }}" method="post" class="d-inline-block">
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
        @endforeach
    </tbody>
</table>
