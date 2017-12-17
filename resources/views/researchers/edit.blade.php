@extends('layout')

@section('content')
<h1>Editar Servidor</h1>
@include('partials.messages')
<form role="form"
      class="form-horizontal"
      method="post"
      action="{{ route('researchers.update', $researcher) }}"
      id="form-servidor"
>
    @include('researchers.form')
</form>
@endsection