@extends('layout')

@section('content')
<h1>Editar Função/Cargo</h1>

@include('partials.messages')

<form method="post" action="{{ route('roles.update', $role) }}">
    {{ method_field('PATCH') }}
    @include('roles.form')
</form>

@include('roles.table')
@endsection
