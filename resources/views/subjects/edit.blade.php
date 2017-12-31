@extends('layout')

@section('content')
<h1>Editar Disciplina</h1>

@include('partials.messages')

<form method="post" action="{{ route('subjects.update', $subject) }}">
    {{ method_field('PATCH') }}
    @include('subjects.form')
</form>

@include('subjects.table')
@endsection
