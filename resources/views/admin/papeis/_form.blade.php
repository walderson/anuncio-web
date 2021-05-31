<div class="input-field">
    <input type="text" class="validate" id="nome" name="nome" required
           value="{{ isset($categoria->nome) ? $categoria->nome : '' }}">
    <label for="nome">Nome</label>
</div>
<div class="input-field">
    <input type="text" class="validate" id="descricao" name="descricao" required
           value="{{ isset($categoria->descricao) ? $categoria->descricao : '' }}">
    <label for="descricao">Descrição</label>
</div>
