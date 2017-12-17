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
        <label for="nascimento" class="col-md-1 control-label">Nascimento</label>
        <div class="col-md-3">
            <input type="date" class="form-control" id="nascimento" name="nascimento" value="{{ $researcher->birthday }}">
        </div>
    </div>
    <div class="form-group">
        <label for="endereco" class="col-md-2 control-label">Endereço Residencial</label>
        <div class="col-md-6">
            <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $researcher->address }}">
        </div>
        <label for="sexo" class="col-md-1 control-label">Sexo</label>
        <div class="col-md-3">
            <select id="sexo" name="sexo" class="form-control">
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
        <label for="telefone" class="col-md-1 control-label">Telefone</label>
        <div class="col-md-2">
            <input type="text" id="telefone" class="telefone form-control" name="telefone" value="{{ $researcher->phone }}">
        </div>
        <label for="celular" class="col-md-1 control-label">Celular</label>
        <div class="col-md-2">
            <input type="text" id="celular" class="celular form-control" name="celular" value="{{ $researcher->mobile_phone }}">
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Servidor</legend>
    <div class="form-group">
        <label for="funcao" class="col-md-2 control-label">Função / Cargo</label>
        <div class="col-md-3">
            <select class="form-control" id="funcao" name="funcao" required>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}"
                            data-professor="{{ $role->isTeacher }}"
                            {{ $researcher->roles->contains($role) ? ' selected' : '' }}
                    >
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <label for="situacao" class="col-md-1 control-label">Situação</label>
        <div class="col-md-2">
            <select class="form-control" id="situacao" name="situacao">
                <option value="A" {{ $researcher->status === 'A' ? ' selected': '' }}>Efetivo</option>
                <option value="B" {{ $researcher->status === 'B' ? ' selected': '' }}>Exonerado</option>
                <option value="C" {{ $researcher->status === 'C' ? ' selected': '' }}>Aposentado</option>
                <option value="D" {{ $researcher->status === 'D' ? ' selected': '' }}>Afastado</option>
            </select>
        </div>
        <label for="admissao" class="col-md-1 control-label">Admissão</label>
        <div class="col-md-3">
            <input type="date" class="form-control" id="admissao" name="admissao" value="{{ $researcher->admission }}">
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
<button type="submit" class="btn btn-primary" name="sent">Salvar</button>