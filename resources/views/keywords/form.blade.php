{{ csrf_field() }}
<div class="form-group">
    <label for="name" class="col-md-2 control-label">Descrição</label>
    <div class="col-md-8">
        <input type="text" class="form-control" id="name" name="name" maxlength="60" value="{{ $keyword->name }}">
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
    </div>
</div>
