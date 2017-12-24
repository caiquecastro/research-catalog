{{ csrf_field() }}
<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label text-right">Descrição</label>
    <div class="col-md-8">
        <input type="text" class="form-control" id="name" name="name" maxlength="50" value="{{ $subject->name }}">
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
    </div>
</div>
