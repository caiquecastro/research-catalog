@extends('layout')

@section('content')
<h1>Consulta de Função</h1>

<form role="form" class="form-horizontal">
    <div class="form-group">
        <label for="name" class="col-md-2 control-label">Descrição</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="name" name="q">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-block">Buscar</button>
        </div>
    </div>
</form>
<p>Encontrados {{ count($roles) }} resultados</p>

@include('roles.table')

<a href="#" class="btn btn-default">Exportar para PDF</a>
@endsection
