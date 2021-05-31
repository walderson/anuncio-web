<div class="input-field">
    <input type="text" class="validate" id="nome" name="nome" required
           value="{{ isset($papel->nome) ? $papel->nome : '' }}">
    <label for="nome">Nome</label>
</div>
<div class="input-field">
    <input type="text" class="validate" id="descricao" name="descricao" required
           value="{{ isset($papel->descricao) ? $papel->descricao : '' }}">
    <label for="descricao">Descrição</label>
</div>
