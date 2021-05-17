<div class="input-field">
    <input type="text" class="validate" id="nome" name="nome"
           value="{{ isset($municipio->nome) ? $municipio->nome : '' }}">
    <label for="nome">Nome</label>
</div>
<div class="input-field">
    <input type="text" class="validate" id="uf" name="uf"
           value="{{ isset($municipio->uf) ? $municipio->uf : '' }}">
    <label for="uf">Unidade Federativa</label>
</div>
<div class="input-field">
    <input type="text" class="validate" id="sigla_uf" name="sigla_uf"
           value="{{ isset($municipio->sigla_uf) ? $municipio->sigla_uf : '' }}">
    <label for="sigla_uf">Sigla UF</label>
</div>
