{{ csrf_field() }}
<fieldset>
    <legend>Geral</legend>
    <div class="form-group">
        <label for="fullname" class="col-md-2 control-label">Nome Completo</label>
        <div class="col-md-6">
            <input type="text"
                    class="form-control"
                    id="fullname"
                    name="fullname"
                    maxlength="60"
                    value="{{ $researcher->fullname }}"
                    required
            >
        </div>
        <label for="birthday" class="col-md-1 control-label">Nascimento</label>
        <div class="col-md-3">
            <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $researcher->birthday }}">
        </div>
    </div>
    <div class="form-group">
        <label for="address" class="col-md-2 control-label">Endereço Residencial</label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="address" name="address" value="{{ $researcher->address }}">
        </div>
        <label for="gender" class="col-md-1 control-label">Sexo</label>
        <div class="col-md-3">
            <select id="gender" name="gender" class="form-control">
                <option value="M"{{ $researcher->gender === 'M' ? ' selected' : '' }}>Masculino</option>
                <option value="F"{{ $researcher->gender === 'F' ? ' selected' : '' }}>Feminino</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-md-2 control-label">E-mail</label>
        <div class="col-md-4">
            <input type="email" class="form-control" id="email" name="email" value="{{ $researcher->email }}">
        </div>
        <label for="phone" class="col-md-1 control-label">Telefone</label>
        <div class="col-md-2">
            <input type="text" id="phone" class="telefone form-control" name="phone" value="{{ $researcher->phone }}">
        </div>
        <label for="mobile_phone" class="col-md-1 control-label">Celular</label>
        <div class="col-md-2">
            <input type="text" id="mobile_phone" class="celular form-control" name="mobile_phone" value="{{ $researcher->mobile_phone }}">
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Servidor</legend>
    <div class="form-group">
        <label for="role_id" class="col-md-2 control-label">Função / Cargo</label>
        <div class="col-md-3">
            <select class="form-control" id="role_id" name="role_id" required>
                <option value="">Selecione</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}"
                            data-professor="{{ $role->is_professor }}"
                            {{ $researcher->role_id == $role->id ? 'selected' : '' }}
                    >
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <label for="status" class="col-md-1 control-label">Situação</label>
        <div class="col-md-2">
            <select class="form-control" id="status" name="status">
                <option value="active" {{ $researcher->status === 'active' ? ' selected': '' }}>Efetivo</option>
                <option value="discharged" {{ $researcher->status === 'discharged' ? ' selected': '' }}>Exonerado</option>
                <option value="retired" {{ $researcher->status === 'retired' ? ' selected': '' }}>Aposentado</option>
                <option value="away" {{ $researcher->status === 'away' ? ' selected': '' }}>Afastado</option>
            </select>
        </div>
        <label for="admission_date" class="col-md-1 control-label">Admissão</label>
        <div class="col-md-3">
            <input type="date" class="form-control" id="admission_date" name="admission_date" value="{{ $researcher->admission_date }}">
        </div>
    </div>
</fieldset>
<fieldset id="fieldset-professor">
    <legend>Professor</legend>
    <div class="form-group">
        <label for="area" class="col-md-2 control-label">Área de Atuação</label>
        <div class="col-md-3">
            <select class="form-control" id="area" name="area">
                <option value="B" {{ $researcher->field === 'B' ? 'selected' : '' }}>Biociências</option>
                <option value="E" {{ $researcher->field === 'E' ? 'selected' : '' }}>Exatas</option>
                <option value="H" {{ $researcher->field === 'H' ? 'selected' : '' }}>Humanas</option>
            </select>
        </div>
        <label for="concurso" class="col-md-2 control-label">Disciplina de Concurso</label>
        <div class="col-md-5">
            <select class="form-control" id="concurso" name="concurso">
                @foreach ($subjects as $subject)
                    <option value="<?= $disciplina['id']; ?>" <?php if($concurso == $disciplina['id']) { echo "selected"; } ?>>
                        <?= $disciplina['name']; ?>
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="titulacao" class="col-md-2 control-label">Titulação</label>
        <div class="col-md-3">
            <select class="form-control" id="titulacao" name="titulacao">
                <option value="E" {{ $researcher->title == 'E' ? ' selected' : '' }}>Especialista</option>
                <option value="M" {{ $researcher->title == 'M' ? ' selected' : '' }}>Mestre</option>
                <option value="D" {{ $researcher->title == 'D' ? ' selected' : '' }}>Doutor</option>
                <option value="P" {{ $researcher->title == 'P' ? ' selected' : '' }}>PhD</option>
            </select>
        </div>
        <label for="lattes" class="col-md-1 control-label">Lattes</label>
        <div class="col-md-6">
            <input class="form-control" id="lattes" name="lattes" value="{{ $researcher->lattes }}">
        </div>
    </div>
    <div class="form-group">
        <label for="disciplinas" class="col-md-2 control-label">Disciplinas Ministradas</label>
        <div class="col-md-10">
            <input class="form-control" type="text" id="disciplinas" name="disciplinas" value="{{ $researcher->subjects->implode(';') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="projetos" class="col-md-2 control-label">Projetos de Extensão</label>
        <div class="col-md-10">
            <input class="form-control" type="text" id="projetos" name="projetos" value="{{ $researcher->projects }}">
        </div>
    </div>
    <div class="form-group">
        <label for="pesquisas" class="col-md-2 control-label">Linhas de Pesquisa</label>
        <div class="col-md-10">
            <input class="form-control" type="text" id="pesquisas" name="pesquisas" value="{{ $researcher->rechearches }}">
        </div>
    </div>
    <div class="form-group">
        <label for="palavrachaves" class="col-md-2 control-label">Palavras-chaves</label>
        <div class="col-md-10">
            <input class="form-control" type="text" id="palavrachaves" name="palavras" value="{{ $researcher->keywords }}">
        </div>
    </div>
</fieldset>
<button type="submit" class="btn btn-primary">Salvar</button>
