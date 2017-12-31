@extends('layout')

@section('content')
<h1>Cadastro de Função/Cargo</h1>
@include('partials.messages')
<form method="post" action="{{ route('roles.store') }}">
    @include('roles.form')
</form>
@include('roles.table')
@endsection
