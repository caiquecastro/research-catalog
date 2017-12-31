@extends('layout')

@section('content')
<h1>Cadastro de Projeto de Extensão</h1>
@include('partials.messages')
<form method="post" action="{{ route('projects.store') }}">
    @include('projects.form')
</form>
@include('projects.table')
@endsection
