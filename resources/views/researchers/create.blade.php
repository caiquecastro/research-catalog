@extends('layout')

@section('content')
<h1>Cadastro de Servidor</h1>
@include('partials.messages')
<form role="form" class="form-horizontal" method="post" action="{{ route('researchers.store') }}" id="form-servidor">
    @include('researchers.form')
</form>
@endsection
