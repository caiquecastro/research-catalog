{{ csrf_field() }}
<div class="form-group">
    <label for="name" class="col-md-2 control-label">Descrição</label>
    <div class="col-md-5">
        <input type="text" class="form-control" id="name" name="name" maxlength="60" value="{{ $role->name }}">
    </div>
    <label for="ck-professor" class="col-md-2 control-label">É professor?</label>
    <div class="col-md-1">
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
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
    </div>
</div>
