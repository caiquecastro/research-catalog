@extends('layout')

@section('content')
<h1>Cadastro de Projeto de Extensão</h1>
@include('partials.messages')
<form role="form" id="form-funcao" class="form-horizontal" method="post" action="{{ route('projects.store') }}">
    @include('projects.form')
</form>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Projeto de Extensão</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td>
                    <form action="{{ route('projects.destroy', $project) }}" method="post" class="visible-lg-inline">
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
@endsection
