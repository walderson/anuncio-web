@if (isset($imagem->imagem))
<div class="input-field">
    <input type="text" class="validate" id="titulo" name="titulo"
           value="{{ isset($imagem->titulo) ? $imagem->titulo : '' }}">
    <label for="titulo">Título</label>
</div>
<div class="input-field">
    <input type="text" class="validate" id="descricao" name="descricao"
           value="{{ isset($imagem->descricao) ? $imagem->descricao : '' }}">
    <label for="descricao">Descrição</label>
</div>
<div class="input-field">
    <input type="number" class="validate" id="ordem" name="ordem" min="0"
           value="{{ isset($imagem->ordem) ? $imagem->ordem : '' }}" step="1">
    <label for="ordem">Ordem</label>
</div>
<div class="row">
    <div class="file-field input-field col m6 s12">
        <div class="btn">
            <span>Imagem</span>
            <input type="file" id="imagem" name="imagem">
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
        </div>
    </div>
    <div class="col m6 s12">
        <img src="{{ asset($imagem->imagem) }}" alt="" width="120px">
    </div>
</div>
@else
<div class="row">
    <div class="file-field input-field col m12 s12">
        <div class="btn">
            <span>Selecionar Imagens</span>
            <input type="file" multiple id="imagem" name="imagem[]" required>
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
        </div>
    </div>
</div>
@endif