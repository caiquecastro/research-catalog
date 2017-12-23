<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Linha de Pesquisa</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach($researches as $research)
        <tr>
            <td>{{ $research->id }}</td>
            <td>{{ $research->name }}</td>
            <td>
                <form action="{{ route('researches.destroy', $research) }}" method="post" class="visible-lg-inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
                <a class="btn btn-warning btn-sm" href="{{ route('researches.edit', $research) }}">
                    <i class="fas fa-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>