@extends('layout')

@section('content')
<h1>Editar Disciplina</h1>

@include('partials.messages')

<form role="form" id="form-funcao" class="form-horizontal" method="post" action="{{ route('subjects.update', $subject) }}">
    {{ method_field('PATCH') }}
    @include('subjects.form')
</form>

@include('subjects.table')
@endsection