{{ csrf_field() }}
<div class="form-group">
    <label for="nome" class="col-md-2 control-label">Descrição</label>
    <div class="col-md-8">
        <input type="text" class="form-control" id="nome" name="name" maxlength="50" value="{{ $subject->name }}">
    </div>
    <div class="col-md-2">
        <button type="submit" name="sent" class="btn btn-primary btn-block">Salvar</button>
    </div>
</div>