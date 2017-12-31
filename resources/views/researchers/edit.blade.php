@extends('layout')

@section('content')
<h1>Editar Servidor</h1>
@include('partials.messages')
<form method="post" action="{{ route('researchers.update', $researcher) }}">
    {{ method_field('PATCH') }}
    @include('researchers.form')
</form>
@endsection
