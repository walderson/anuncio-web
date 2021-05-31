@if (isset($slide->imagem))
<div class="input-field">
    <input type="text" class="validate" id="titulo" name="titulo"
           value="{{ isset($slide->titulo) ? $slide->titulo : '' }}">
    <label for="titulo">Título</label>
</div>
<div class="input-field">
    <input type="text" class="validate" id="descricao" name="descricao"
           value="{{ isset($slide->descricao) ? $slide->descricao : '' }}">
    <label for="descricao">Descrição</label>
</div>
<div class="input-field">
    <input type="text" class="validate" id="link" name="link"
           value="{{ isset($slide->link) ? $slide->link : '' }}">
    <label for="link">Link</label>
</div>
<div class="input-field">
    <input type="number" class="validate" id="ordem" name="ordem" min="0"
           value="{{ isset($slide->ordem) ? $slide->ordem : '' }}" step="1">
    <label for="ordem">Ordem</label>
</div>
<div class="input-field">
    <select name="status" id="status">
        <option value="Rascunho"{{ isset($slide->status) && $slide->status == "Rascunho" ? " selected" : "" }}>Rascunho</option>
        <option value="Publicado"{{ isset($slide->status) && $slide->status == "Publicado" ? " selected" : "" }}>Publicado</option>
    </select>
    <label for="status">Status</label>
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
        <img src="{{ asset($slide->imagem) }}" alt="" width="120px">
    </div>
</div>
@else
<div class="row">
    <div class="file-field input-field col m12 s12">
        <div class="btn">
            <span>Selecionar Imagens</span>
            <input type="file" multiple id="imagem" name="imagem[]">
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
        </div>
    </div>
</div>
@endif