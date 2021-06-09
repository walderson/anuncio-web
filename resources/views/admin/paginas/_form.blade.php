<div class="input-field">
    <input type="text" class="validate" id="titulo" name="titulo" required
           value="{{ isset($pagina->titulo) ? $pagina->titulo : '' }}">
    <label for="titulo">Título</label>
</div>
<div class="input-field">
    <input type="text" class="validate" id="descricao" name="descricao" required
           value="{{ isset($pagina->descricao) ? $pagina->descricao : '' }}">
    <label for="descricao">Descrição</label>
</div>
@if (isset($pagina->email))
<div class="input-field">
    <input type="email" class="validate" id="email" name="email"
           value="{{ $pagina->email }}">
    <label for="email">E-mail</label>
</div>
@endif
<div class="input-field">
    <textarea id="texto" name="texto" class="materialize-textarea">{{ isset($pagina->texto) ? $pagina->texto : '' }}</textarea>
    <label for="texto">Texto</label>
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
        @if (isset($pagina->imagem))
        <img src="{{ asset($pagina->imagem) }}" alt="" width="120px">
        @endif
    </div>
</div>
<div class="input-field">
    <textarea id="mapa" name="mapa" class="materialize-textarea">{{ isset($pagina->mapa) ? $pagina->mapa : '' }}</textarea>
    <label for="mapa">Mapa (Copie e cole o iframe do Google Maps)</label>
</div>
