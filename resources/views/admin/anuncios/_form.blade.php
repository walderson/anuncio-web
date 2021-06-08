<div class="input-field">
    <input type="text" class="validate" id="titulo" name="titulo" required
           value="{{ isset($anuncio->titulo) ? $anuncio->titulo : '' }}">
    <label for="titulo">Título</label>
</div>
<div class="input-field">
    <input type="text" class="validate" id="descricao" name="descricao" required
           value="{{ isset($anuncio->descricao) ? $anuncio->descricao : '' }}">
    <label for="descricao">Descrição</label>
</div>
<div class="row">
    <div class="file-field input-field col m6 s12">
        <div class="btn">
            <span>Imagem</span>
            <input type="file" id="imagem" name="imagem"{{ isset($anuncio->imagem) ? '' : ' required' }}>
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
        </div>
    </div>
    <div class="col m6 s12">
        @if (isset($anuncio->imagem))
        <img src="{{ asset($anuncio->imagem) }}" alt="" width="120px">
        @endif
    </div>
</div>
<div class="input-field">
    <select name="finalidade" id="finalidade" required>
        <option value="Aluguel"{{ isset($anuncio->finalidade) && $anuncio->finalidade == "Aluguel" ? " selected" : "" }}>Aluguel</option>
        <option value="Troca"{{ isset($anuncio->finalidade) && $anuncio->finalidade == "Troca" ? " selected" : "" }}>Troca</option>
        <option value="Venda"{{ isset($anuncio->finalidade) && $anuncio->finalidade == "Venda" ? " selected" : "" }}>Venda</option>
    </select>
    <label for="finalidade">Finalidade</label>
</div>
<div class="input-field">
    <select name="categoria_id" id="categoria_id" required>
        @foreach($categorias as $categoria)
        <option value="{{ $categoria->id }}"{{ isset($anuncio->categoria_id) && $anuncio->categoria_id == $categoria->id ? " selected" : "" }}>{{ $categoria->titulo }}</option>
        @endforeach
    </select>
    <label for="categoria_id">Categoria</label>
</div>
<div class="input-field">
    <input type="text" class="validate" id="endereco" name="endereco"
           value="{{ isset($anuncio->endereco) ? $anuncio->endereco : '' }}">
    <label for="endereco">Endereço</label>
</div>
<div class="input-field">
    <input type="text" class="validate" id="cep" name="cep"
           value="{{ isset($anuncio->cep) ? $anuncio->cep : '' }}">
    <label for="cep">CEP (Ex.: 12345-678)</label>
</div>
<div class="input-field">
    <select name="municipio_id" id="municipio_id" required>
        @foreach($municipios as $municipio)
        <option value="{{ $municipio->id }}"{{ isset($anuncio->municipio_id) && $anuncio->municipio_id == $municipio->id ? " selected" : "" }}>{{ $municipio->nome }} - {{ $municipio->sigla_uf }}</option>
        @endforeach
    </select>
    <label for="municipio_id">Município</label>
</div>
<div class="input-field">
    <input type="number" class="validate" id="valor" name="valor" min="0" required
           value="{{ isset($anuncio->valor) ? number_format($anuncio->valor, 2, '.', '') : '' }}" step="0.01">
    <label for="valor">Valor (Ex.: 324,90)</label>
</div>
<div class="input-field">
    <textarea id="detalhes" name="detalhes" class="materialize-textarea"
        required>{{ isset($anuncio->detalhes) ? $anuncio->detalhes : '' }}</textarea>
    <label for="detalhes">Detalhes</label>
</div>
<div class="input-field">
    <textarea id="mapa" name="mapa" class="materialize-textarea">{{ isset($anuncio->mapa) ? $anuncio->mapa : '' }}</textarea>
    <label for="mapa">Mapa (Copie e cole o iframe do Google Maps)</label>
</div>
<div class="input-field">
    <select name="status" id="status" required>
        <option value="Rascunho"{{ isset($anuncio->status) && $anuncio->status == "Rascunho" ? " selected" : "" }}>Rascunho</option>
        <option value="Publicado"{{ isset($anuncio->status) && $anuncio->status == "Publicado" ? " selected" : "" }}>Publicado</option>
    </select>
    <label for="status">Status</label>
</div>
