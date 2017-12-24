@extends('layout')

@section('content')
<h1>Cadastro de Disciplina</h1>

@include('partials.messages')

<form method="post" action="{{ route('subjects.store') }}">
    @include('subjects.form')
</form>

@include('subjects.table')
@endsection
