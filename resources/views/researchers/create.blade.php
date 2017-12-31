@extends('layout')

@section('content')
<h1>Cadastro de Servidor</h1>
@include('partials.messages')
<form method="post" action="{{ route('researchers.store') }}">
    @include('researchers.form')
</form>
@endsection
