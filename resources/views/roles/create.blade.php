@extends('layout')

@section('content')
<h1>Cadastro de Função/Cargo</h1>

<form role="form" id="form-funcao" class="form-horizontal" method="post" action="{{ route('roles.store') }}">
    @include('roles.form')
</form>
@include('roles.table')
@endsection
