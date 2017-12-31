@extends('layout')

@section('content')
<h1>Editar Palavra Chave</h1>

@include('partials.messages')

<form method="post" action="{{ route('keywords.update', $keyword) }}">
    {{ method_field('PATCH') }}
    @include('keywords.form')
</form>

@include('keywords.table')
@endsection
