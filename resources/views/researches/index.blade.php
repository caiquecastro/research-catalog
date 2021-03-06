@extends('layout')

@section('content')
<h1>Consulta de Linha de Pesquisa</h1>

<form>
    <div class="form-group row">
        <label for="nome" class="col-md-2 col-form-label">Descrição</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="descricao" name="q">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary btn-block">Buscar</button>
        </div>
    </div>
</form>

<p>Encontrados {{ count($researches) }} resultados</p>

@include('researches.table')

<a href="#" class="btn btn-info">Exportar para PDF</a>
@endsection
