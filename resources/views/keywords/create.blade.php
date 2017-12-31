@extends('layout')

@section('content')
<h1>Cadastro de Palavra Chave</h1>
@include('partials.messages')
<form method="post" action="{{ route('keywords.store') }}">
    @include('keywords.form')
</form>

@include('keywords.table')
@endsection
