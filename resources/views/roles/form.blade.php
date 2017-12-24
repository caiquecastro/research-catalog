{{ csrf_field() }}
<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label text-right">Descrição</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" id="name" name="name" maxlength="60" value="{{ $role->name }}">
    </div>
    <label for="ck-professor" class="col-sm-2 col-form-label text-right">É professor?</label>
    <div class="col-sm-1">
        <div class="checkbox">
            <input type="hidden" name="is_professor" value="0">
            <input type="checkbox"
                    name="is_professor"
                    id="ck-professor"
                    value="1"
                    {{ $role->is_professor ? ' checked' : '' }}
            >
        </div>
    </div>
    <div class="col-sm-2">
        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
    </div>
</div>
